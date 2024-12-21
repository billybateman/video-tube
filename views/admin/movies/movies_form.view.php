<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        <h3>Create Movie</h3>

        <div class="col-12">
            <video controls id="video-tag" style="width: 100%; height: 320px; object-fit: cover;">
                <source id="video-source" src="">
                Your browser does not support the video tag.
            </video>
            <script type="text/javascript">

                $('#update').submit(function(e) { // catch the form's submit event
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

                    if($("#coverToUpload")[0].files.length) {
                        var coverToUpload = $("#coverToUpload")[0].files[0];
                       formdata.append("coverToUpload", coverToUpload);
                    }
                   
                    
                    $.ajax({ // update an AJAX call...
                        type: 'POST',
                        url: $(this).attr('action'),
                        enctype: 'multipart/form-data',
                        data: formdata,
                        processData: false,
                        contentType: false,
                       
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                        }
                    });
                    
                    return false; // cancel original event to prevent form submitting
                });
                
               
            </script>
            
            <form id="update" name="update" method="POST" action="/admin/movies/create_action/" enctype="multipart/form-data">
            
                <div class="row">
                    <div class="col-md-6 setting-card">
                    <h5>Photos</h5>
                    <div class="change-avatar img-upload">
                        <?php
                                $thumbnail = "/assets/admin/images/upload-image.png";

                            
                            ?>
                            <div class="profile-img">
                                <img src="<?php echo  $thumbnail; ?>" id="output">
                            </div>
                            <div class="upload-img">
                            <h5>Thumbnail/Poster Image</h5>
                            
                            <script>
                            
                            

                            var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                                }
                            };

                            var removeFile = function(){
                                var input = document.getElementById('fileToUpload');
                                input.value = null;
                                searchPic = new Image(100,100);
                                searchPic.src = "<?php echo $thumbnail; ?>";
                                var output = document.getElementById('output');
                                output.src = searchPic.src;

                            }

                            var importVideo = function(url){
                                var formdata = new FormData();
                                //var url = $('#youtube').val();
                                formdata.append("youtube_url", url);

                                fetch('/admin/movies/import/', {
                                method: "POST", 
                                body: formdata
                                }).then(response => {
                                    // Check if the request was successful
                                    if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                    }
                                    // Parse the response as JSON
                                    return response.json();
                                })
                                .then(data => {
                                    // Handle the JSON data
                                    console.log(data);
                                    var input = document.getElementById('videoToUpload');
                                    input.value = null;
                                    var output = document.getElementById('video-tag');
                                    output.src = data;
                                    var input_link = document.getElementById('video_link');
                                    input_link.value = data;
                                })
                                .catch(error => {
                                    // Handle any errors that occurred during the fetch
                                    //console.error('Fetch error:', error);
                                }); 
                                

                            }
                            </script>
                            <div class="imgs-load d-flex align-items-center">
                                <div class="d-none">
                                    <input type="file" class="upload" id="fileToUpload" name="fileToUpload" onchange="loadFile(event)">
                                </div>
                                <a href="javascript:void(0);" onclick="$('#fileToUpload').click();" class="btn btn-primary">Choose</a>
                                
                                <a href="javascript:void(0);" onclick="removeFile();" class="btn btn-warning">Remove</a>
                            </div>
                            <small>Your Image should Below 4 MB, Accepted format jpg,png,svg</small>
                            </div>
                        </div>

                        <div class="change-avatar img-upload">
                                <?php
                                $cover = "/assets/admin/images/upload-image.png";

                                
                                ?>
                                <div class="profile-img">
                                    <img src="<?php echo $cover; ?>" id="cover-output">
                                </div>
                                <div class="upload-img">
                                <h5>Large Artwork</h5>
                                
                                <script>
                                
                                

                                var loadCoverFile = function(event) {
                                    var output = document.getElementById('cover-output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                    }
                                }

                                var removeCoverFile = function(){
                                    var input = document.getElementById('coverToUpload');
                                    input.value = null;
                                    searchPic = new Image(100,100);
                                    searchPic.src = "<?php echo $cover; ?>";
                                    var output = document.getElementById('cover-output');
                                    output.src = searchPic.src;

                                }
                                </script>
                                <div class="imgs-load d-flex align-items-center">
                                    <div class="d-none">
                                        <input type="file" class="upload" id="coverToUpload" name="coverToUpload" onchange="loadCoverFile(event)">
                                    </div>
                                    <a href="javascript:void(0);" onclick="$('#coverToUpload').click();" class="btn btn-primary">Choose</a>
                                
                                    <a href="javascript:void(0);" onclick="removeCoverFile();" class="btn btn-warning">Remove</a>
                                </div>
                                <small>Your Image should Below 40 MB, Accepted format jpg,png,svg</small>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6 setting-card row">

                    <h5>Video</h5>
                        <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Upload</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Import</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Link</button>
                        </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                
                            
                                <?php
                                $video = "";

                               
                                ?>
                            


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
                                    var url = '/admin/movies/create_video/';
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


                                var convertName = function(name_str, new_elem){
                                    var input = document.getElementById(new_elem);
                                    input.value = convertToSeoSlug(name_str);
                                }

                                function convertToSeoSlug(title) {
                                    return title
                                    .toLowerCase()
                                    .trim()
                                    .replace(/[^a-z0-9 -]/g, '') // Remove special characters
                                    .replace(/\s+/g, '-') // Replace spaces with dashes
                                    .replace(/-+/g, '-'); // Replace multiple dashes with a single dash
                                }
                                </script>
                            
                                    <div class="d-none">
                                        <input type="file" accept="video/*" name="videoToUpload" id="videoToUpload"  />
                                    </div>
                                    <a href="javascript:void(0);" onclick="$('#videoToUpload').click();" class="btn btn-primary">Choose</a>
                                    <a href="javascript:void(0);" onclick="removeVideo();" class="btn btn-warning">Remove</a>
                                <br>
                                    <small>Your video should Below 1 GB, Accepted format mov, mp4</small>
                                
                            

                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <label>Youtube Link</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="" onclick="removeVideoInput();"  onchange="importVideo(this.value);">
                                
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <label>Video Link</label>
                                <input type="text" class="form-control" id="video_link" name="video_link" onclick="removeVideoInput();" value="" onchange="importLink(this.value);">
                        
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
           
                <div class="row"> 
                    <div class="setting-title">
                        <h5>Information</h5>
                    </div>
                    <div class="setting-card">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="Some amazing video" name="name" value="" onchange="convertName(this.value, 'slug');" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Director <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="" name="director" value="" required>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Relese Date <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="August 1st, 2024" name="releaseDate" value="" required>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-wrap">
                                <label class="col-form-label">SEO Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="some-amazing-video" id="slug" name="slug" value="" required>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-wrap">
                                <label class="col-form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description"  placeholder="This is one amazing video." required></textarea>
                            </div>
                            </div>
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
                            <div class="col-lg-3">
                                    <div class="form-group px-3 ">
                                        <label class="form-label flex-grow-1" for="Content Rating">
                                            <strong>Content Rating</strong> :
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <!-- toggle switch -->
                                        <!-- common inputs -->
                                        <input name="rating" type="text" class="form-control " placeholder="ie. PG-13" value="" required>
                                    </div>                                
                                </div>   
                                <div class="col-lg-12 mt-4 px-3">
                                <div class="form-group d-flex align-self-start justify-content-between" name="status">
                                    <label class="form-label flex-grow-1" for="Status">
                                        <strong>Status</strong>:
                                    </label>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check form-switch ms-2">
                                            <input name="status" class="form-check-input" type="checkbox">
                                        </div>
                                    </div><span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="modal-btn text-end">
                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
    