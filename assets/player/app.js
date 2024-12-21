const videoContainer = document.querySelector('.video-container');
const video = document.querySelector('.video-container video');

const controlsContainer = document.querySelector('.video-container .controls-container');

const playPauseButton = document.querySelector('.video-container .controls button.play-pause');
const rewindButton = document.querySelector('.video-container .controls button.rewind');
const fastForwardButton = document.querySelector('.video-container .controls button.fast-forward');
const volumeButton = document.querySelector('.video-container .controls button.volume');
const fullScreenButton = document.querySelector('.video-container .controls button.full-screen');
const playButton = playPauseButton.querySelector('.playing');
const pauseButton = playPauseButton.querySelector('.paused');
const fullVolumeButton = volumeButton.querySelector('.full-volume');
const mutedButton = volumeButton.querySelector('.muted');
const maximizeButton = fullScreenButton.querySelector('.maximize');
const minimizeButton = fullScreenButton.querySelector('.minimize');


const progressBar = document.querySelector('.video-container .progress-controls .progress-bar');
const watchedBar = document.querySelector('.video-container .progress-controls .progress-bar .watched-bar');
const timeLeft = document.querySelector('.video-container .progress-controls .time-remaining');

let controlsTimeout;
controlsContainer.style.opacity = '0';
watchedBar.style.width = '0px';
pauseButton.style.display = '';
minimizeButton.style.display = 'none';

const displayControls = () => {
  controlsContainer.style.opacity = '1';
  document.body.style.cursor = 'initial';
  if (controlsTimeout) {
    clearTimeout(controlsTimeout);
  }
  controlsTimeout = setTimeout(() => {
    controlsContainer.style.opacity = '0';
    document.body.style.cursor = 'none';
  }, 5000);
};

const playPause = () => {
  if (video.paused) {
    video.play();
    playButton.style.display = 'none';
    pauseButton.style.display = '';
  } else {
    video.pause();
    playButton.style.display = '';
    pauseButton.style.display = 'none';
  }
};

const toggleMute = () => {
  video.muted = !video.muted;
  if (video.muted) {
    fullVolumeButton.style.display = 'none';
    mutedButton.style.display = '';
  } else {
    fullVolumeButton.style.display = '';
    mutedButton.style.display = 'none';
  }
};

const toggleFullScreen = () => {
  if (!document.fullscreenElement) {
    videoContainer.requestFullscreen();
  } else {
    document.exitFullscreen();
  }
};

document.addEventListener('fullscreenchange', () => {
  if (!document.fullscreenElement) {
    maximizeButton.style.display = '';
    minimizeButton.style.display = 'none';
  } else {
    maximizeButton.style.display = 'none';
    minimizeButton.style.display = '';
  }
});

document.addEventListener('keyup', (event) => {
  if (event.code === 'Space') {
    playPause(); 
  }

  if (event.code === 'KeyM') {
    toggleMute();
  }

  if (event.code === 'KeyF') {
    toggleFullScreen();
  }

  displayControls();
});

document.addEventListener('mousemove', () => {
  displayControls();
});

video.addEventListener('timeupdate', () => {
  watchedBar.style.width = ((video.currentTime / video.duration) * 100) + '%';
  // TODO: calculate hours as well...
  const totalSecondsRemaining = video.duration - video.currentTime;
  // THANK YOU: BEGANOVICH
  const time = new Date(null);
  time.setSeconds(totalSecondsRemaining);
  let hours = null;

  if(totalSecondsRemaining >= 3600) {
    hours = (time.getHours().toString()).padStart('2', '0');
  }

  let minutes = (time.getMinutes().toString()).padStart('2', '0');
  let seconds = (time.getSeconds().toString()).padStart('2', '0');

  timeLeft.textContent = `${hours ? hours : '00'}:${minutes}:${seconds}`;
});

progressBar.addEventListener('click', (event) => {
  const pos = (event.pageX  - (progressBar.offsetLeft + progressBar.offsetParent.offsetLeft)) / progressBar.offsetWidth;
  video.currentTime = pos * video.duration;
});

playPauseButton.addEventListener('click', playPause);

rewindButton.addEventListener('click', () => {
  video.currentTime -= 10;
});

fastForwardButton.addEventListener('click', () => {
  video.currentTime += 10;
});

volumeButton.addEventListener('click', toggleMute);

fullScreenButton.addEventListener('click', toggleFullScreen);


$(document).scroll(function() {
  var isScrolled = $(this).scrollTop() > $(".topBar").height();
  $(".topBar").toggleClass("scrolled", isScrolled);
})

window.addEventListener('scroll', function() {
  // Code to execute when the page is scrolled
  console.log('Page scrolled!'); 
});

function volumeToggle(button) {
  var muted = $(".previewVideo").prop("muted");
  $(".previewVideo").prop("muted", !muted);

  $(button).find("i").toggleClass("fa-volume-mute");
  $(button).find("i").toggleClass("fa-volume-up");
}

function previewEnded() {
  $(".previewVideo").toggle();
  $(".previewImage").toggle();
}

function goBack() {
  window.history.back();
}

function startHideTimer() {
  var timeout = null;
  
  $(document).on("mousemove", function() {
      clearTimeout(timeout);
      $(".watchNav").fadeIn();

      timeout = setTimeout(function() {
          $(".watchNav").fadeOut();
      }, 2000);
  })
}

function initVideo(videoId, username) {
  startHideTimer();
  setStartTime(videoId, username);
  updateProgressTimer(videoId, username);
}

function updateProgressTimer(videoId, username) {
  addDuration(videoId, username);

  var timer;

  $("video").on("playing", function(event) {
      window.clearInterval(timer);
      timer = window.setInterval(function() {
          updateProgress(videoId, username, event.target.currentTime);
      }, 3000);
  })
  .on("ended", function() {
      setFinished(videoId, username);
      window.clearInterval(timer);
  })
}

function addDuration(videoId, username) {
  $.post("/video/addDuration", { videoId: videoId, username: username }, function(data) {
      if(data !== null && data !== "") {
          alert(data);
      }
  })
}

function updateProgress(videoId, username, progress) {
  $.post("/video/updateDuration", { videoId: videoId, username: username, progress: progress }, function(data) {
      if(data !== null && data !== "") {
          alert(data);
      }
  })
}

function setFinished(videoId, username) {
  $.post("/video/setFinished", { videoId: videoId, username: username }, function(data) {
      if(data !== null && data !== "") {
          alert(data);
      }
  })
}

function setStartTime(videoId, username) {
  $.post("/video/setProgress", { videoId: videoId, username: username }, function(data) {
      if(isNaN(data)) {
          alert(data);
          return;
      }

      $("video").on("canplay", function() {
          this.currentTime = data;
          $("video").off("canplay");
      })
  })
}

function restartVideo() {
  $("video")[0].currentTime = 0;
  $("video")[0].play();
  $(".upNext").fadeOut();
}

function watchVideo(videoId) {
  $("video")[0].src = videoId;
  
}

function showUpNext() {
  $(".upNext").fadeIn();
}