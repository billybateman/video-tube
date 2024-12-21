<div class="content-body">
   <!-- row -->
   <div class="container-fluid">
      <div class="dashboard-breadcrumb mb-25">
         <h2>Categories</h2>
      </div>
      <div class="row">
         <div class="col-xxl-4 col-md-5">
            <div class="panel">
               <div class="setting-card">
                  <div class="panel-header">
                     <h5>Add New Category</h5>
                  </div>
                  <div class="panel-body">
                  <script type="text/javascript">
                     $('#create').submit(function() { // catch the form's submit event
                           $.ajax({ // create an AJAX call...
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
                  <form id="create" method="post" action="/admin/categories/create_action" enctype="multipart/form-data">
                     <div class="row g-3">
                          
                        <div class="col-12">
                           <label class="form-label">Category Name</label>
                           <input type="text" class="form-control form-control-sm" name="categories_name">
                        </div>
                        
                        <div class="col-sm-6">
                           <label class="form-label">Slug</label>
                           <input type="text" class="form-control form-control-sm" name="categories_slug">
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                           <div class="btn-box">
                                 <button class="btn btn-sm btn-primary">Save Category</button>
                           </div>
                        </div>
                          
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xxl-8 col-md-7">
            <div class="panel">
               <div class="setting-card">
                  <div class="panel-header">
                     <h5>All Categories</h5>
                  </div>
                  <div class="panel-body">
                     <div id="allProductTable_wrapper" class="dataTables_wrapper no-footer">
                        <div class="dataTables_scroll">
                           <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                              <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 812px; padding-right: 0px;">
                                 
                              </div>
                           </div>
                           <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
                              <table class="table table-dashed table-hover digi-dataTable all-product-table table-striped dataTable no-footer" id="allProductTable" aria-describedby="allProductTable_info" style="width: 810px;">
                                 <thead>
                                    <tr style="height: 0px;">
                                       
                                       <th class="sorting" aria-controls="allProductTable" rowspan="1" colspan="1" style="width: 106px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Name: activate to sort column ascending">
                                          <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Name</div>
                                       </th>
                                       
                                       <th class="sorting" aria-controls="allProductTable" rowspan="1" colspan="1" style="width: 32px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Slug: activate to sort column ascending">
                                          <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Slug</div>
                                       </th>
                                       
                                       <th class="sorting" aria-controls="allProductTable" rowspan="1" colspan="1" style="width: 66px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Action: activate to sort column ascending">
                                          <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Action</div>
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                 
                                    foreach($categories_data as $category){ ?>
                                 <tr class="odd">
                                       
                                       <td><?php echo $category->categories_name; ?></td>
                                       <td><?php echo $category->categories_slug; ?></td>
                                       <td>
                                       
                                          <div class="action-item">
                                          <a href="/admin/categories/update/<?php echo $category->categories_id; ?>" class="content-loader" title="Update"><i class="fa-solid fa-pencil"></i>
                                          </a>
                                          <a href="javascript:void(0);" onclick="deletecategory('<?php echo $category->categories_id; ?>');" title="Delete"><i class="fa-solid fa-trash-can"></i>
                                             </a>

                                          </div>
                                               
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
   var cancelcategory = function(id){
        swal({
            title: "Are you sure to unpublish this category ?",
            text: "Use the publish button to publish this category if needed !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, unpublish !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/categories/cancel/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'category Cancelled !',
                                text: 'The category has been cancelled!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

    var deletecategory = function(id){
        swal({
            title: "Are you sure you want to delete this category ?",
            text: "You will not be able to recover this category !!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/categories/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Category Deleted !',
                                text: 'The category has been deleted!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

   


    var activecategory = function(id){
        swal({
            title: "Are you sure you want to publish ?",
            text: "Publish this category!!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, publish it !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/categories/active/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Published Category!',
                                text: 'The category has been set to published!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }
</script>