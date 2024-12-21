<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        <h3>Update Show</h3>

        <div class="col-12">
            <script type="text/javascript">
                $('#create').submit(function() { // catch the form's submit event
                    $.ajax({ // create an AJAX call...
                        type: 'POST',
                        url: '/admin/shows/update_action/<?php echo $data['id']; ?>',
                        enctype: 'multipart/form-data',
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                        }
                    });
                    return false; // cancel original event to prevent form submitting
                });
            </script>
            <div class="setting-card">
                <form id="create" method="post" action="/admin/shows/update_action/<?php echo $data['id']; ?>" enctype="multipart/form-data">
                        <div class="section-form">
                            <fieldset>
                            
                            <div class="change-avatar img-upload">
                                <?php
                                $thumbnail = "/assets/admin/images/no-img-avatar.png";

                                if(isset($data['thumbnail'])){
                                    $thumbnail = $data['thumbnail'];
                                }

                                if(isset($data['images_file'])){
                                    $thumbnail = $data['images_file'];
                                }
                                ?>
                                <div class="profile-img">
                                    <img src="<?php echo $thumbnail; ?>" id="output">
                                </div>
                                <div class="upload-img">
                                <h5>Thumbnail</h5>
                                
                                <script>
                                
                             

                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                    URL.revokeObjectURL(output.src) // free memory
                                    }
                                }

                                var removeFile = function(){
                                    var input = document.getElementById('fileToUpload');
                                    input.value = null;
                                    searchPic = new Image(100,100);
                                    searchPic.src = "<?php echo $thumbnail; ?>";
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
                            

                            <div class="change-avatar img-upload">
                                <?php
                                $cover = "/assets/admin/images/no-img-avatar.png";

                                if(isset($data['cover'])){
                                    $cover = $data['cover'];
                                }

                                
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
                                    <div class="change-photo">
                                        Upload New
                                        <input type="file" class="upload" id="coverToUpload" name="coverToUpload" onchange="loadCoverFile(event)">
                                    </div>
                                    <a href="javascript:void(0);" onclick="removeCoverFile();" class="upload-remove">Remove</a>
                                </div>
                                <p class="form-text">Your Image should Below 40 MB, Accepted format jpg,png,svg</p>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <div class="form-group px-3 ">
                                        <label class="form-label flex-grow-1" for="Show Name">
                                            <strong>Show Name</strong> <span class="text-danger">*</span>:
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <!-- toggle switch -->
                                        <!-- common inputs -->
                                        <input name="name" type="text" class="form-control " placeholder="Enter Show Name" value="<?php echo $data['name']; ?>" required>
                                    </div>                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group px-3 ">
                                        <label class="form-label flex-grow-1" for="Description">
                                            <strong>Description</strong> :
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <textarea name="description" class="form-control" placeholder="Description"><?php echo $data['description']; ?></textarea>
                                    </div>                                
                                </div>
                            </div>
                            <div class="row mt-3 px-3">
                                <div class="col-lg-6">
                                    <label class="form-label flex-grow-1" for="access"><strong>Seasons:</strong></label>
                                    <div class="form-group">
                                        <input type="text" name="seasons" value="<?php echo $data['seasons']; ?>" class="form-control" required>    
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label flex-grow-1" for="access"><strong>Episodes:</strong></label>
                                    <div class="form-group">
                                        <input type="text" name="episodes" value="<?php echo $data['episodes']; ?>" class="form-control" required>    
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label flex-grow-1" for="genres"><strong>Episode Years:</strong></label>
                                        <input class="form-control" type="text" name="years" value="<?php echo $data['years']; ?>" placeholder="ie. 2022 - 2024" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label flex-grow-1" for="language"><strong>Slug:</strong></label>
                                    <div class="form-group">
                                        <input type="text" name="slug" class="form-control" value="<?php echo $data['slug']; ?>" required> 
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label class="form-label flex-grow-1" for="Content Rating">
                                            <strong>Rating</strong> :
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <!-- toggle switch -->
                                        <!-- common inputs -->
                                        <input name="rating" type="text" class="form-control " placeholder="ie. PG-13" value="<?php echo $data['rating']; ?>" required>
                                    </div>                                
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label flex-grow-1" for="Genres"><strong>Category:</strong></label>
                                    <div class="form-group">
                                        <select id="category" name="categoryId" type="select" class="form-control">
                                        <?php foreach($categories_data as $category){ ?>
                                                <option value="<?php echo $category->categories_id; ?>" <?php if($category->categories_id == $data['categoryId']){ ?>selected<?php } ?>><?php echo $category->categories_name; ?></option>
                                            <?php } ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-4 px-3 d-none">
                                <h5 class="mb-0">
                                    <strong>Casts / Crews</strong>
                                </h5>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cast-modal">
                                    <i class="fa-solid fa-square-plus me-2"></i>Add Cast / Crew
                                </button>
                                
                                <div class="modal fade" id="cast-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cast-modal-label">Add Cast/Crew</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group px-3 ">
                                                                <label class="form-label flex-grow-1" for="Person">
                                                                    <strong>Person</strong> :
                                                                </label>
                                                            
                                                                <!-- textarea input -->
                                                                <!-- toggle switch -->
                                                                <!-- common inputs -->
                                                                <input id="Person" type="text" class="form-control " placeholder="Enter Name" value="" min="" multiple="">
                                                            </div>                        
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group px-3 d-flex flex-column">
                                                                <label class="form-label flex-grow-1" for="cast-occupation"><strong>Occupation:</strong></label>
                                                                <select id="cast-occupation" type="select" class="form-control select2-basic-multiple select2-hidden-accessible" placeholder="Select Occupation" tabindex="-1" aria-hidden="true" data-select2-id="select2-data-cast-occupation">
                                                                    <option data-select2-id="select2-data-44-txda">Cast</option>
                                                                    <option>Crew</option>
                                                                    <option>Production</option>
                                                                    <option>Director</option>
                                                                    <option>Actor</option>
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-43-8fde" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-cast-occupation-container" aria-controls="select2-cast-occupation-container"><span class="select2-selection__rendered" id="select2-cast-occupation-container" role="textbox" aria-readonly="true" title="Cast">Cast</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group px-3 ">
                                                                <label class="form-label flex-grow-1" for="As">
                                                                    <strong>As</strong> :
                                                                </label>
                                                            
                                                                <!-- textarea input -->
                                                                <!-- toggle switch -->
                                                                <!-- common inputs -->
                                                                <input id="As" type="text" class="form-control " placeholder="Played as" value="" min="" multiple="">
                                                            </div>                        
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group px-3 d-flex justify-content-between">
                                                                <label class="form-label flex-grow-1" for="Status">
                                                                    <strong>Status</strong> :
                                                                </label>
                                                            
                                                                <!-- textarea input -->
                                                                <!-- toggle switch -->
                                                                    <div class="form-check form-switch ms-2">
                                                                        <input id="Status" class="form-check-input" type="checkbox">
                                                                    </div>
                                                            </div>                        
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="row px-3 d-none">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-strip">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Cast/Crew</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>Cast</td>
                                                <td>ABC</td>
                                                <td>James</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <a aria-current="page" href="#" class="active text-success" title="Edit">
                                                            <i class="fa-solid fa-pen mx-4"></i>
                                                        </a>
                                                        <a aria-current="page" href="#" class="active text-danger" title="Delete">
                                                            <i class="fa-solid fa-trash me-4"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td>Crew</td>
                                                <td>XYZ</td>
                                                <td>Producer</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <a aria-current="page" href="#" class="active text-success" title="Edit">
                                                            <i class="fa-solid fa-pen mx-4"></i>
                                                        </a>
                                                        <a aria-current="page" href="#" class="active text-danger" title="Delete">
                                                            <i class="fa-solid fa-trash me-4"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    
                            <div class="col-lg-12 mt-4 px-3">
                                <div class="form-group d-flex align-self-start justify-content-between" name="status">
                                    <label class="form-label flex-grow-1" for="Status">
                                        <strong>Status</strong>:
                                    </label>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check form-switch ms-2">
                                            <input name="status" class="form-check-input" type="checkbox" <?php if($data['status'] == 1){ ?>checked <?php } ?>>
                                        </div>
                                    </div><span class="text-danger"></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                
                    <div class="modal-btn text-end">
                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>