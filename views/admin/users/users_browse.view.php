
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
    
        <div class="dashboard-header">
            <h3>Users</h3>
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
                                url: '/admin/users/?q=' + term,
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
                    <a href="/admin/users/create" class="content-loader btn btn-primary"><i class="fa fa-plus me-1"></i> Create</a>
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
                                    
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Movie: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Publish Date: activate to sort column ascending">Signup Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Slug: activate to sort column ascending">Email</th>

                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Views: activate to sort column ascending">Role</th>

                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Views: activate to sort column ascending">Blocked</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Subscriber</th>
                          
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   
                                
                                    foreach($users_data as $user){ 
                                        $thumbnail = "/assets/admin/images/upload-image.png";
                                        if($user->images_file){
                                            $thumbnail = $user->images_file;
                                        }
                                        
                                     ?> 
                                    <tr class="odd">
                                   
                                    <td>
                                        <div class="d-flex">
                                           
                                                <img src="<?php echo $thumbnail; ?>" alt="image" class="rounded-2 avatar avatar-55 img-fluid">
                                                <div class="d-flex flex-column ms-3 justify-content-center">
                                                    <h6 class="text-capitalize"> <a href="/admin/users/view/<?php echo $user->users_email; ?>"><?php echo $user->users_first_name; ?> <?php echo $user->users_last_name; ?></a></h6>
                                                <!--<small>2h 21m</small>
                                                    <small class="text-capitalize">(english, hindi)</small>-->
                                                </div>
                                            
                                        </div>
                                    </td>
                                   
                                   
                                    <td>
                                        <small><?php echo date( "m/d/Y", strtotime($user->users_date)); ?></small>
                                    </td>
                                   
                                    <td><?php echo $user->users_email; ?></td>
                                    <td><?php echo $user->users_types_name; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="block_<?php echo $user->users_id; ?>" onclick="toggleBlock('<?php echo $user->users_id; ?>', 'block_<?php echo $user->users_id; ?>');" class="form-check-input" type="checkbox" <?php if($user->users_blocked){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="subscriber_<?php echo $user->users_id; ?>" onclick="toggleSubscriber('<?php echo $user->users_id; ?>', 'subscriber_<?php echo $user->users_id; ?>');" class="form-check-input" type="checkbox" <?php if($user->users_subscriber){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="action-item">
                                            <a href="/admin/users/update/<?php echo $user->users_id; ?>" class="content-loader" title="Update"><i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="deleteuser('<?php echo $user->users_id; ?>');" title="Delete"><i class="fa-solid fa-trash-can"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           
                            <?php
                            $totalPages = $total_rows / $per_page;
                            $totalLinkPages = $totalPages;

                            $current = $start / $per_page;
                            
                            if($totalPages > 10){
                               
                                $totalLinkPages = $current + 10;
                                if($totalLinkPages > $totalPages){
                                    $totalLinkPages = $totalPages;

                                }
                                
                            }
                            ?>
                            <li class="page-item"><a class="content-loader page-link" href="<?php echo $url; ?>&start=0">First</a></li>
                            <?php if($current > 1){ ?>
                            <li class="page-item"><a class="content-loader page-link" href="<?php echo $url; ?>&start=<?php echo ($current - 1) * $per_page; ?>">Previous</a></li>
                            <?php } ?>
                            <?php
                            for($i = $current; $i < $totalLinkPages; $i++){
                                ?>
                                <li class="page-item"><a class="content-loader page-link" href="<?php echo $url; ?>&start=<?php echo $i * $per_page; ?>"><?php echo $i + 1; ?></a></li>
                                <?php
                            }
                            ?>
                             <?php if($current < $totalLinkPages){ ?>
                            <li class="page-item"><a class="content-loader page-link" href="<?php echo $url; ?>&start=<?php echo ($current + 1) * $per_page; ?>">Next</a></li>
                            <?php } ?>
                            <li class="page-item"><a class="content-loader page-link" href="<?php echo $url; ?>&start=<?php echo $total_rows - $per_page; ?>">Last</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script type="text/javascript">
   var toggleSubscriber = function(id, status){
    status =  $('#' + status).is(':checked');
        console.log(status);
        if(status == true){
            status = 1;
        } else {
            status = 0;
        }


        if (status == 1) {
        swal({
            title: "Subscribe User?",
            text: "This will add permissions to access subscriber features and content.!",
            type: "warning",
            userCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Subscribe",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/users/subscribe/' + id + '/1/',
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            
                        }
                    });
            }
            return false;
        });
    } else {
            $.ajax({ // create an AJAX call...
                type: 'GET',
                url: '/admin/users/subscribe/' + id + '/0/',
                processData: false,
                contentType: false,
                success: function(response) { // on success..
                    //$('#main-content').html(response); // update the DIV
                    
                }
            });

        }
    }


    var toggleBlock = function(id, status){
        status =  $('#' + status).is(':checked');
        console.log(status);
        if(status == true){
            status = 1;
        } else {
            status = 0;
        }


        if (status == 1) {
            swal({
                title: "Block User?",
                text: "This will log them out and not allow them to log back in!",
                type: "warning",
                userCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Block",
                cancelButtonText: "Cancel"
            }).then((value) => {
                
                if (value.value) {

                // Add Your Custom Code for CRUD
                        $.ajax({ // create an AJAX call...
                            type: 'GET',
                            url: '/admin/users/block/' + id + '/1/',
                            processData: false,
                            contentType: false,
                            success: function(response) { // on success..
                               // $('#main-content').html(response); // update the DIV
                                
                            }
                        });
                }
                return false;
            });
        } else {
            $.ajax({ // create an AJAX call...
                type: 'GET',
                url: '/admin/users/block/' + id + '/0/',
                processData: false,
                contentType: false,
                success: function(response) { // on success..
                    //$('#main-content').html(response); // update the DIV
                    
                }
            });

        }
    }

    var deleteuser = function(id){
        swal({
            title: "Are you sure you want to delete this user ?",
            text: "You will not be able to recover this user !!",
            type: "warning",
            userCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/users/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'user Deleted !',
                                text: 'The user has been deleted!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

</script>