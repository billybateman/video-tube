<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        <h3>Categories Update</h3>

        <div class="col-12">
            <script type="text/javascript">
                $('#update').submit(function() { // catch the form's submit event
                    $.ajax({ // update an AJAX call...
                        type: 'POST',
                        url: $(this).attr('action'),
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
           
            <form id="update" method="post" action="/admin/categories/update_action/<?php echo $data['categories_id']; ?>" enctype="multipart/form-data">
                
                <div class="setting-card">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  name="categories_name" value="<?php echo $data['categories_name']; ?>" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="categories_slug" value="<?php echo $data['categories_slug']; ?>" required>
                        </div>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="modal-btn text-end">
                    <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    