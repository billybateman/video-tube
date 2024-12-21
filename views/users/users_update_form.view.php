<div id="content-wrapper">
    <div class="container-fluid upload-details">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                <h4>My Account</h4>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('#update').submit(function() { // catch the form's submit event

                var formdata = new FormData(this);

                if($("#fileToUpload")[0].files.length) {
                    var fileToUpload = $("#fileToUpload")[0].files[0];
                    formdata.append("fileToUpload", fileToUpload);
                }

                $.ajax({ // create an AJAX call...
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
        <form id="update" method="post" action="/users/update_action/" enctype="multipart/form-data">
            <input type="hidden" name="users_id" value="<?php echo $data['users_id']; ?>">
            <div class="setting-card">
                <div class="form-group ">
                    <label class="form-label flex-grow-1" for="Channel Name">
                        <strong>Profile Image</strong>
                    </label>
                    <div class="imgs-load d-flex align-items-center d-none">
                            <input type="file" class="upload" id="fileToUpload" name="fileToUpload" onchange="loadFile(event)"> 
                    </div>
                    <div class="change-avatar img-upload">
                        <?php
                        $image = "/assets/admin/images/upload-image.png";
                        
                        if(isset($data['images_file'])){
                            $image = $data['images_file'];
                        }
                        ?>
                        <div class="profile-img">
                            <img src="<?php echo $image; ?>" id="output">
                            <a href="javascript:void(0);" onclick="removeFile();" class="remove-upload-user"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="upload-img">
                            <script>
                            $("#profile_image").attr("src","<?php echo $image; ?>");

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
                                searchPic.src = "<?php echo $image; ?>";
                                var output = document.getElementById('output');
                                output.src = searchPic.src;

                            }
                            </script>
                           
                            <p class="form-text"><small>Your Image should Below 4 MB, Accepted format jpg,png,svg</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="setting-title">
                <h6>Information</h6>
            </div>
            <div class="setting-card">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control"  name="users_first_name" value="<?php echo $data['users_first_name']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="users_last_name" value="<?php echo $data['users_last_name']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="405-599-1234" name="users_phone" value="<?php echo $data['users_phone']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="you@address.com" name="users_email" value="<?php echo $data['users_email']; ?>" required>
                    </div>
                    </div>
            
                </div>
            </div>
            <div class="setting-title">
                <h6>Account</h6>
            </div>
            <div class="setting-card">
                <div class="row">
                    
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Password</label>
                        <input type="text" class="form-control" name="users_password" id="users_password">
                    </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="users_password_confirm" id="users_password_confirm">
                    </div>
                    </div>
                    
                </div>
            </div>
            <div class="setting-title">
                <h6>Address</h6>
            </div>
            <div class="setting-card">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-wrap">
                        <label class="col-form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="users_address" value="<?php echo $data['users_address']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">City <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="users_city" value="<?php echo $data['users_city']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="CA" name="users_state" value="<?php echo $data['users_state']; ?>" required>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="col-form-label">Zip Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="users_zip" value="<?php echo $data['users_zip']; ?>" required>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-btn text-end mt-3">
                <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
            </div>
        </form>
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
                    <a href="/settings.html#"><img alt="" src="./settings_files/google.png"></a>
                    <a href="/settings.html#"><img alt="" src="./settings_files/apple.png"></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
</div>