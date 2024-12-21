<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        <h3>Create Role</h3>

        <div class="col-12">
            <script type="text/javascript">
                $('#create').submit(function() { // catch the form's submit event
                    $.ajax({ // create an AJAX call...
                        type: 'POST',
                        url: '/admin/users_types/create_action/',
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
                <form id="create" method="post" action="/admin/users_types/create_action/" enctype="multipart/form-data">
                    <div class="section-form">
                        <fieldset>
                        
                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <div class="form-group px-3 ">
                                        <label class="form-label flex-grow-1" for="Show Name">
                                            <strong>Role</strong> <span class="text-danger">*</span>:
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <!-- toggle switch -->
                                        <!-- common inputs -->
                                        <input name="users_types_name" type="text" class="form-control " value="" required>
                                    </div>                                
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group px-3 ">
                                        <label class="form-label flex-grow-1" for="Description">
                                            <strong>Permission</strong> :
                                        </label>
                                    
                                        <!-- textarea input -->
                                        <input name="users_types_value" type="text" class="form-control " value="" required>
                                        </div>                                
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
    