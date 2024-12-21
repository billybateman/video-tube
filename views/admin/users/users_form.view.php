<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        <h3>Create Users</h3>

        <div class="col-12">
            <script type="text/javascript">
                $('#create').submit(function() { // catch the form's submit event

                    var formdata = new FormData(this);

                    if($("#fileToUpload")[0].files.length) {
                        var fileToUpload = $("#fileToUpload")[0].files[0];
                       formdata.append("fileToUpload", fileToUpload);
                    }

                    $.ajax({ // create an AJAX call...
                        type: 'POST',
                        url: $(this).attr('action'),
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
            <form id="create" method="post" action="/admin/users/create_action" enctype="multipart/form-data">
                <div class="setting-card">
                    <div class="change-avatar img-upload">
                        <div class="profile-img">
                            <img src="/assets/admin/images/upload-image.png" id="output">
                        </div>
                        <div class="upload-img">
                        <h5>Profile Image</h5>
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
                            searchPic.src = "/assets/admin/images/no-img-avatar.png";
                            var output = document.getElementById('output');
                            output.src = searchPic.src;

                        }
                        </script>
                        <div class="imgs-load d-flex align-items-center">
                            <div class="change-photo">
                                Upload New
                                <input type="file" class="upload" id="fileToUpload" name="fileToUpload" onchange="loadFile(event)">
                            </div>
                            <a href="javascript:void(0);" onclick="removeFile();" class="upload-remove">Remove</a>
                        </div>
                        <p class="form-text">Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h5>Information</h5>
                </div>
                <div class="setting-card">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  name="users_first_name" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="users_last_name" required>
                        </div>
                        </div>
                        
                       
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="405-599-1234" name="users_phone" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" placeholder="you@address.com" name="users_email" required>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h5>Address</h5>
                </div>
                <div class="setting-card">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-wrap">
                            <label class="col-form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="users_address" >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="users_city" >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="CA" name="users_state">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Zip Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="users_zip">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h5>Security</h5>
                </div>
                <div class="setting-card">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="users_password" >
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Retype Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="users_password_confirm" r                        </div>
                        </div>
                        <?php  if($user['users_types_id'] == 1 || $user['users_types_id'] == 5){?>
                            
                            <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-control" name="users_types_id" required>
                                <?php foreach($users_types as $role){ ?>
                                <option value="<?php echo $role->users_types_id; ?>"><?php echo $role->users_types_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-btn text-end">
                    <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    