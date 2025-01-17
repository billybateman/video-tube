
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="keywords" content="YourOwnTV" />
   <meta name="description" content="YourOwnTV" />
   <meta name="author" content="StreamLab" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>YourOwnTV - Watch <?php echo $data['name']; ?></title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="/assets/images/favicon.png">
   <!-- CSS bootstrap-->
   <!--  Style -->
   <link rel="stylesheet" href="/assets/css/style.css" />
   <!--  Responsive -->
   <link rel="stylesheet" href="/assets/css/responsive.css" />

   <script src="/assets/js/jquery.min.js"></script>
</head>

<body>

   <!--=========== Loader =============-->
   <div id="gen-loading">
      <div id="gen-loading-center">
         <img src="/assets/images/logo-1.png" alt="loading">
      </div>
   </div>
   <!--=========== Loader =============-->

   
   
   <link rel="stylesheet" href="/assets/player/styles.css">
  <link rel="stylesheet" href="/assets/player/player.css" >

  <div class="video-container">
    <!-- <video src="bbb.mp4"></video> -->

    <div class="videoControls upNext" style="display:none;">

        <button onclick="restartVideo();"><i class="fas fa-redo"></i></button>

        <div class="upNextContainer">
            <h2>Up next:</h2>
            <h3><?php echo $upNextVideo['title']; ?></h3>

            <button class="playNext" onclick="watchVideo('<?php echo $upNextVideo['filePath']; ?>');">
                <i class="fas fa-play"></i> Play
            </button>
        </div>

    </div>


    <video id="video-tag" src="<?php echo $data['filePath']; ?>" autoplay onended="showUpNext()"></video>
    <div class="controls-container" style="opacity: 0;">
      <div class="progress-controls">
        <div class="progress-bar">
          <div class="watched-bar" style="width: 0px;"></div>
          <div class="playhead"></div>
        </div>
        <div class="time-remaining">
          00:00
        </div>
      </div>
      <div class="controls">
        <button id="play_pause"  class="play-pause">
          <svg class="playing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="display: none;">
            <polygon points="5 3 19 12 5 21 5 3"></polygon>
          </svg>
          <svg class="paused" viewBox="0 0 24 24" style="display:inline;">
            <rect x="6" y="4" width="4" height="16"></rect>
            <rect x="14" y="4" width="4" height="16"></rect>
          </svg>
        </button>
        <button class="rewind">
          <svg viewBox="0 0 24 24">
            <path fill="#ffffff" d="M12.5,3C17.15,3 21.08,6.03 22.47,10.22L20.1,11C19.05,7.81 16.04,5.5 12.5,5.5C10.54,5.5 8.77,6.22 7.38,7.38L10,10H3V3L5.6,5.6C7.45,4 9.85,3 12.5,3M10,12V22H8V14H6V12H10M18,14V20C18,21.11 17.11,22 16,22H14A2,2 0 0,1 12,20V14A2,2 0 0,1 14,12H16C17.11,12 18,12.9 18,14M14,14V20H16V14H14Z"></path>
          </svg>
        </button>
        <button class="fast-forward">
          <svg viewBox="0 0 24 24">
            <path fill="#ffffff" d="M10,12V22H8V14H6V12H10M18,14V20C18,21.11 17.11,22 16,22H14A2,2 0 0,1 12,20V14A2,2 0 0,1 14,12H16C17.11,12 18,12.9 18,14M14,14V20H16V14H14M11.5,3C14.15,3 16.55,4 18.4,5.6L21,3V10H14L16.62,7.38C15.23,6.22 13.46,5.5 11.5,5.5C7.96,5.5 4.95,7.81 3.9,11L1.53,10.22C2.92,6.03 6.85,3 11.5,3Z"></path>
          </svg>
        </button>
        <button class="volume">
          <svg class="full-volume" viewBox="0 0 24 24">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
            <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
          </svg>
          <svg class="muted" viewBox="0 0 24 24">
            <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
            <line x1="23" y1="9" x2="17" y2="15"></line>
            <line x1="17" y1="9" x2="23" y2="15"></line>
          </svg>
        </button>
        <p class="title">
          <span class="series"><?php echo $data['name']; ?></span> <span class="episode"></span>
        </p>
        <button class="help d-none">
          <svg viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
            <line x1="12" y1="17" x2="12.01" y2="17"></line>
          </svg>
        </button>
        <button class="next d-none">
          <svg viewBox="0 0 24 24">
            <polygon points="5 4 15 12 5 20 5 4"></polygon>
            <line x1="19" y1="5" x2="19" y2="19"></line>
          </svg>
        </button>
        <button class="episodes d-none">
          <svg viewBox="0 0 24 24">
            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
            <polyline points="2 17 12 22 22 17"></polyline>
            <polyline points="2 12 12 17 22 12"></polyline>
          </svg>
        </button>
        <button class="captions d-none">
          <svg viewBox="0 0 20 20">
            <path d="M17 0H3a3 3 0 00-3 3v10a3 3 0 003 3h11.59l3.7 3.71A1 1 0 0019 20a.84.84 0 00.38-.08A1 1 0 0020 19V3a3 3 0 00-3-3zM3.05 9.13h2a.75.75 0 010 1.5h-2a.75.75 0 110-1.5zm3.89 4.44H3.05a.75.75 0 010-1.5h3.89a.75.75 0 110 1.5zm5 0H10a.75.75 0 010-1.5h2a.75.75 0 010 1.5zm0-2.94H8.08a.75.75 0 010-1.5H12a.75.75 0 010 1.5zm5 0H15a.75.75 0 010-1.5h2a.75.75 0 010 1.5z"></path>
          </svg>
        </button>
        <button class="cast d-none">
          <svg viewBox="0 0 24 24">
            <path d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6">
            </path>
            <line x1="2" y1="20" x2="2.01" y2="20"></line>
          </svg>
        </button>
        <button class="full-screen">
          <svg class="maximize" viewBox="0 0 24 24" style="">
            <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
            </path>
          </svg>
          <svg class="minimize" viewBox="0 0 24 24" style="display: none;">
            <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3">
            </path>
          </svg>
        </button>
      </div>
    </div>
  </div>
  <script src="/assets/player/app.js"></script>


  <script>
$(document).ready(function() {

  //$('#play_pause').click();

  //var header = $("header"); // Replace with your header selector

  //header.hide(); // Hide the header initially

  $(document).on("mousemove", function(e) {
    if (e.pageY < 150) { // Adjust the value as needed
      //header.fadeIn();
    } else {
      //header.fadeOut();
    }
  });


  let videoElem = document.getElementById("video-tag");
   //videoElem.play();
   $('#play_pause').click();
});
</script>

<script src="/assets/js/asyncloader.min.js"></script>
   <!-- JS bootstrap -->
   <script src="/assets/js/bootstrap.min.js"></script>
   <!-- owl-carousel -->
   <script src="/assets/js/owl.carousel.min.js"></script>
   <!-- counter-js -->
   <script src="/assets/js/jquery.waypoints.min.js"></script>
   <script src="/assets/js/jquery.counterup.min.js"></script>
   <!-- popper-js -->
   <script src="/assets/js/popper.min.js"></script>
   <script src="/assets/js/swiper-bundle.min.js"></script>
   <!-- Iscotop -->
   <script src="/assets/js/isotope.pkgd.min.js"></script>

   <script src="/assets/js/jquery.magnific-popup.min.js"></script>

   <script src="/assets/js/slick.min.js"></script>

   <script src="/assets/js/streamlab-core.js"></script>

   <script src="/assets/js/script.js"></script>