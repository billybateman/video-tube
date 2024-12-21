
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
    
        <div class="dashboard-header">
            <h3>User Roles</h3>
            <ul class="header-list-btns">
                <li>
                    <div class="input-block dash-search-input">
                    <script>
                        function doSearch(term){
                            var formdata = new FormData();
                            formdata.append("q", term);

                            console.log(term);
                            $.ajax({ // update an AJAX call...
                                type: 'POST',
                                url: '/admin/users_types/?q=' + term,
                                enctype: 'multipart/form-data',
                                data: formdata,
                                processData: false,
                                contentType: false,
                            
                                success: function(response) { // on success..
                                    $('#main-content').html(response); // update the DIV
                                }
                            });
                        }
                    </script>
                    <input type="text" onchange="doSearch(this.value);" <?php if($q != ""){?>value="<?php echo $q; ?>"<?php } ?> class="form-control" placeholder="Search">
                    <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                </li>
              
                <li>
                    <a href="/admin/users_types/create" class="content-loader btn btn-primary"><i class="fa fa-plus me-1"></i> Create</a>
                </li>
            </ul>
        </div>
      
        <div class="tab-content appointment-tab-content grid-user">
            <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                <div class="row">

                    <div class="table-responsive my-3">
                        <table id="seasonTable" class="data-tables table custom-table movie_table dataTable no-footer" data-toggle="data-table" aria-describedby="seasonTable_info">
                            <thead>
                                <tr class="text-uppercase">
                                    
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Movie: activate to sort column ascending">Role</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Publish Date: activate to sort column ascending">Permission</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($users_types_data as $users_types) { ?>
                                <tr>
                                    <td><?php echo $users_types->users_types_name ?></td>
                                    <td><?php echo $users_types->users_types_value ?></td>
                                    <td>
                                        <div class="action-item">
                                            <a href="/admin/users_types/update/<?php echo $users_types->users_types_id; ?>" class="content-loader" title="Update"><i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="deleteRole('<?php echo $users_types->users_types_id; ?>');" title="Delete"><i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                     </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> 
 </div>

<script>
 var deleteRole = function(id){
        swal({
            title: "Delete Role ?",
            text: "This action cannot be undone!",
            type: "warning",
            VideoCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/users_types/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Role Deleted !',
                                text: '',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }
    </script>