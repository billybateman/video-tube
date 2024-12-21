<div id="content-wrapper">
    <div class="container-fluid upload-details">
        <div class="row">
            <div class="col-12">
                <div class="main-title">
                <h4>Create Video</h4>
                </div>
            </div>
            <script type="text/javascript">

                $('#create').submit(function(e) { // catch the form's submit event
                    e.preventDefault();

                    var formdata = new FormData(this);

                    if($("#videoToUpload")[0].files.length) {
                        var videoToUpload = $("#videoToUpload")[0].files[0];
                       formdata.append("videoToUpload", videoToUpload);
                    }

                    if($("#fileToUpload")[0].files.length) {
                        var fileToUpload = $("#fileToUpload")[0].files[0];
                       formdata.append("fileToUpload", fileToUpload);
                    }
                   
                    
                    $.ajax({ // update an AJAX call...
                        type: 'POST',
                        url: '/videos/create_action/',
                        data: formdata,
                        processData: false,
                        contentType: false,
                       
                        success: function(response) { // on success..
                           

                        }
                    });
                    
                    return false; // cancel original event to prevent form submitting
                });
            </script>
             <form id="create" method="post" action="/videos/create_action/" enctype="multipart/form-data">
                <div class="col-12" id="upload_video">
                    <div class="row">
                        <div class="col-12 single-video">
                                <!--
                                <link rel="stylesheet" href="https://cdn.vidstack.io/player/theme.css" />
                                <link rel="stylesheet" href="https://cdn.vidstack.io/player/video.css" />
                                <script type="module">
                                import { VidstackPlayer, VidstackPlayerLayout } from 'https://cdn.vidstack.io/player';

                                const player = await VidstackPlayer.create({
                                    target: '#video-tag',
                                    title: '<?php echo $data['title']; ?>',
                                    src: '<?php echo $data['filePath']; ?>',
                                    poster: '<?php echo $data['thumbnail']; ?>',
                                    layout: new VidstackPlayerLayout({
                                    thumbnails: 'https://files.vidstack.io/sprite-fight/thumbnails.vtt',
                                    }),
                                });
                                </script>
                                -->
                                <video controls id="video-tag" style="width: 100%; height: 320px; object-fit: cover;">
                                    <source id="video-source" src="">
                                    Your browser does not support the video tag.
                                </video>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="e1">Video File</label>
                                <input type="file" accept="video/*" name="videoToUpload" id="videoToUpload" class="form-control">
                            </div>
                            <script>
                                const videoSrc = document.querySelector("#video-source");
                                const videoTag = document.querySelector("#video-tag");
                                const inputTag = document.querySelector("#videoToUpload");

                                inputTag.addEventListener('change',  readVideo)
                                //inputTag.addEventListener('change',  uploadVideo)

                                function readVideo(event) {

                                

                                if (event.target.files && event.target.files[0]) {

                                

                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        
                                        

                                    videoSrc.src = e.target.result
                                    videoTag.load()
                                    }.bind(this)

                                    reader.onloadend = function (e)
                                    {
                                        
                                        
                                        
                                        
                                    }

                                    reader.readAsDataURL(event.target.files[0]);

                                    /*
                                    const formData = new FormData();

                                    // A file <input> element
                                    
                                    if($("#videoToUpload")[0].files.length) {
                                        var videoToUpload = $("#videoToUpload")[0].files[0];
                                        formData.append("videoToUpload", videoToUpload);
                                    }

                                    var file = event.target.files[0]; 

                                    if (file) {
                                        var blob = new Blob([file], { type: file.type });

                                        // Now you can use the blob object
                                        console.log(blob); 
                                    }

                                    // JavaScript file-like object
                                    //const content = '<q id="a"><span id="b">hey!</span></q>';
                                    //const blob = new Blob([content], { type: "text/xml" });
                                    formData.append("videoToUpload", blob, "videoToUpload");


                                    var sendImage = new XMLHttpRequest();
                                    var url = '/admin/videos/create_video/';
                                    sendImage.open("POST",url, true);
                                    sendImage.setRequestHeader('Content-type', 'multipart/form-data');
                                    
                                    sendImage.send(formData);
                                    */
                                    
                                }
                                }

                                var importLink = function(url){
                                    var output = document.getElementById('video-tag');
                                    output.src = url;

                                }

                                var removeVideo = function(){
                                    var input = document.getElementById('videoToUpload');
                                    input.value = null;
                                    var output = document.getElementById('video-tag');
                                    output.src = "";

                                }

                                var removeVideoInput = function(){
                                    var input = document.getElementById('videoToUpload');
                                    input.value = null;

                                }
                            </script>
                            <small>Your video should Below 1 GB, Accepted format mov, mp4</small>
                        </div> 
                        <div class="col-12 mt-3">
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="$('#upload_video').hide(); $('#update_video').removeClass('d-none');">Save & Continue</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-none" id="update_video">
                    <div class="col-12 row mb-2 mt-2">
                        <div class="col-4">
                           <label for="e1">Thumbnail</label>
                           
                          
                            <?php

                                $cover = "/assets/admin/images/no-img-avatar.png";
                                
                            ?>
                                
                            <img src="<?php echo $cover; ?>" id="cover-output">
                                
                         
                        </div>
                        <div class="col-8">
                            <script>
                            
                            var loadFile = function(event) {
                                var output = document.getElementById('cover-output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                                }
                            };

                            var removeFile = function(){
                                var input = document.getElementById('fileToUpload');
                                input.value = null;
                                searchPic = new Image(100,100);
                                searchPic.src = "<?php echo $cover; ?>";
                                var output = document.getElementById('cover-output');
                                output.src = searchPic.src;

                            }
                            </script>
                            <input type="file" accept="image/png, image/gif, image/jpeg" name="fileToUpload" id="fileToUpload" class="mt-5 form-control" onchange="loadFile(event)">
                            
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e1">Video Title</label>
                                        <input type="text" placeholder="Contrary to popular belief, Lorem Ipsum (2020) is not." name="title" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e2">About</label>
                                        <textarea rows="3"  class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e3">Orientation</label>
                                        <select id="e3" class="custom-select">
                                        <option>Straight</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e4">Privacy Settings</label>
                                        <select id="e4" class="custom-select">
                                        <option>Public</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e5">Monetize</label>
                                        <select id="e5" class="custom-select">
                                        <option>Yes</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e6">License</label>
                                        <select id="e6" class="custom-select">
                                        <option>Standard</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="e7">Tags (13 Tags Remaining)</label>
                                        <input type="text" placeholder="Gaming, PS4" id="e7" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="e8">Cast (Optional)</label>
                                        <input type="text" placeholder="Nathan Drake," id="e8" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="e9">Language in Video (Optional)</label>
                                        <select id="e9" class="custom-select">
                                        <option>English</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                        
                            <div class="row category-checkbox">
                                <div class="col-lg-12">
                                    <label class="form-label flex-grow-1" for="Genres"><strong>Category:</strong></label>
                                    <div class="form-group">
                                        <select id="category" name="categoryId" type="select" class="form-control">
                                            <?php foreach($categories_data as $category){ ?>
                                                <option value="<?php echo $category->categories_id; ?>"><?php echo $category->categories_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>  
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="col-12 d-none">
                <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
            </div>
        </div>
    </div>
    <footer class="sticky-footer">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0">© Copyright <?php echo date('Y'); ?> <strong class="text-dark">YourOwnTV</strong>. All Rights Reserved<br>
                   
                </p>
                </div>
                <div class="col-lg-6 col-sm-6 text-right">
                <div class="app">
                    <a href="#"><img alt="" src="/assets/frontend/images/google.png"></a>
                    <a href="#"><img alt="" src="/assets/frontend/images/apple.png"></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
</div>