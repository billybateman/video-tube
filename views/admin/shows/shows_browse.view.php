
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
    
        <div class="dashboard-header">
            <h3>TV Shows</h3>
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
                                url: '/admin/shows/browse/0/' + term,
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
                    <a href="/admin/shows/create" class="content-loader btn btn-primary"><i class="fa fa-plus me-1"></i> Create</a>
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
                                    
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Show: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Seasons: activate to sort column ascending">Seasons</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Category</th>
                                   
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Slug: activate to sort column ascending">Slug</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Views: activate to sort column ascending">Featured</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach($shows_data as $show){  ?> 
                                    <tr class="odd">
                                   
                                    <td>
                                        <div class="d-flex">
                                            <img src="<?php echo $show->thumbnail; ?>" alt="image" class="rounded-2 avatar avatar-55 img-fluid">
                                            <div class="d-flex flex-column ms-3 justify-content-center">
                                                <h6 class="text-capitalize"><a href="/shows/watch/<?php echo $show->slug; ?>"><?php echo $show->name; ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <small><?php echo $show->seasons; ?></small>
                                    </td>
                                    <td>
                                    <?php echo $show->categories_name; ?>
                                    </td>
                                   
                                   
                                    <td><?php echo $show->slug; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="fav_<?php echo $show->id; ?>" onclick="toggleFeatured('<?php echo $show->id; ?>');" class="form-check-input" type="checkbox" <?php if($show->featured){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="status_<?php echo $show->id; ?>" onclick="toggleStatus('<?php echo $show->id; ?>');" class="form-check-input" type="checkbox" <?php if($show->status){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-item">
                                            <a href="/admin/shows/update/<?php echo $show->id; ?>" class="content-loader" title="Update"><i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="deleteshow('<?php echo $show->id; ?>');" title="Delete"><i class="fa-solid fa-trash-can"></i>
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
                            $current = $start / $per_page;
                            
                            ?>
                            <li class="page-item"><a class="page-link" href="/admin/shows/browse/">1</a></li>
                            <?php
                            for($i = 1; $i < $totalPages; $i++){
                                ?>
                                <li class="page-item"><a class="content-loader page-link" href="/admin/shows/browse/<?php echo $i * $per_page; ?>/"><?php echo $i + 1; ?></a></li>
                                <?php
                            }
                            ?>
                           
                        </ul>
                    </nav>
                </div>
            </div>
           
        </div>
    </div>
</div>

<script type="text/javascript">
   var cancelshow = function(id){
        swal({
            title: "Are you sure to unpublish this Show ?",
            text: "Use the publish button to publish this Show if needed !!",
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
                        url: '/admin/shows/cancel/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Show Unpublished !',
                                text: 'The Show has been unpublished!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

    var deleteshow = function(id){
        swal({
            title: "Are you sure you want to delete this Show ?",
            text: "You will not be able to recover this Show !!",
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
                        url: '/admin/shows/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Show Deleted !',
                                text: 'The Show has been deleted!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

   


    var activeshow = function(id){
        swal({
            title: "Are you sure you want to publish ?",
            text: "Publish this Show!!",
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
                        url: '/admin/shows/active/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Published Show!',
                                text: 'The Show has been set to published!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }


    var toggleFeatured = function(id){
        var featured = 0;
        if ($('#fav_' + id).prop('checked')==true){ 
            featured = 1;
        }
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/shows/featured/' + id + '/' + featured,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            
                        }
                    });
         
        return false;
            
       
    }


    var toggleStatus = function(id){
        var status = 0;
        if ($('#status_' + id).prop('checked')==true){ 
            status = 1;
        }
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/shows/status/' + id + '/' + status,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            
                        }
                    });
         
        return false;
            
       
    }
</script>