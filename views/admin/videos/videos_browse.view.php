
<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
    
        <div class="dashboard-header">
            <h3>Episodes</h3>
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
                                url: '/admin/videos/?q=' + term,
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
                    <a href="/admin/videos/create" class="content-loader btn btn-primary"><i class="fa fa-plus me-1"></i> Create</a>
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
                                   <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Publish Date: activate to sort column ascending">Publish Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Slug: activate to sort column ascending">Slug</th>

                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Views: activate to sort column ascending">Featured</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="seasonTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach($videos_data as $video){ 
                                    $thumbnail = $video->thumbnail;
                                    if($video->images_file){
                                        $thumbnail = $video->images_file;
                                    }
                                    if($thumbnail == ""){
                                        $thumbnail =  "/assets/admin/images/upload-image.png";

                                    }
                                    //var_dump($video); ?> 
                                    <tr class="odd">
                                   
                                    <td>
                                        <div class="d-flex">
                                           
                                                <img src="<?php echo $thumbnail; ?>" alt="image" class="rounded-2 avatar avatar-55 img-fluid">
                                                <div class="d-flex flex-column ms-3 justify-content-center">
                                                    <h6 class="text-capitalize"> <a href="/video/watch/<?php echo $video->slug; ?>"><?php echo $video->title; ?></a></h6>
                                                <!--<small>2h 21m</small>
                                                    <small class="text-capitalize">(english, hindi)</small>-->
                                                </div>
                                            
                                        </div>
                                    </td>
                                   
                                   
                                    <td>
                                        <small><?php echo date( "m/d/Y", strtotime($video->uploadDate)); ?></small>
                                    </td>
                                   
                                    <td><?php echo $video->slug; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="fav_<?php echo $video->videos_id; ?>" onclick="toggleFeatured('<?php echo $video->videos_id; ?>');" class="form-check-input" type="checkbox" <?php if($video->featured){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch ms-2">
                                                <input id="status_<?php echo $video->videos_id; ?>" onclick="toggleStatus('<?php echo $video->videos_id; ?>');" class="form-check-input" type="checkbox" <?php if($video->status){ ?>checked=""<?php } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="action-item">
                                            <a href="/admin/videos/update/<?php echo $video->videos_id; ?>" class="content-loader" title="Update"><i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="javascript:void(0);" onclick="deletevideo('<?php echo $video->videos_id; ?>');" title="Delete"><i class="fa-solid fa-trash-can"></i>
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
                            <li class="page-item"><a class="content-loader page-link" href="/admin/videos/browse/">First</a></li>
                            <?php if($current > 1){ ?>
                            <li class="page-item"><a class="content-loader page-link" href="/admin/videos/browse/<?php echo ($current - 1) * $per_page; ?>">Previous</a></li>
                            <?php } ?>
                            <?php
                            for($i = $current; $i < $totalLinkPages; $i++){
                                ?>
                                <li class="page-item"><a class="content-loader page-link" href="/admin/videos/browse/<?php echo $i * $per_page; ?>"><?php echo $i + 1; ?></a></li>
                                <?php
                            }
                            ?>
                             <?php if($current < $totalLinkPages){ ?>
                            <li class="page-item"><a class="content-loader page-link" href="/admin/videos/browse/<?php echo ($current + 1) * $per_page; ?>">Next</a></li>
                            <?php } ?>
                            <li class="page-item"><a class="content-loader page-link" href="/admin/videos/browse/<?php echo $total_rows - $per_page; ?>">Last</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
        </div>
    </div>
</div>


<script type="text/javascript">
   var cancelvideo = function(id){
        swal({
            title: "Are you sure to unpublish this Video ?",
            text: "Use the publish button to publish this Video if needed !!",
            type: "warning",
            VideoCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, unpublish !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/videos/cancel/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Unpublished !',
                                text: 'The Video has been unpublished!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

    var deletevideo = function(id){
        swal({
            title: "Are you sure you want to delete this Video ?",
            text: "You will not be able to recover this Video !!",
            type: "warning",
            VideoCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/videos/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Deleted !',
                                text: 'The Video has been deleted!',
                                type: 'success'
                            });
                        }
                    });
            }
            return false;
        });
    }

   


    var activevideo = function(id){
        swal({
            title: "Are you sure you want to publish ?",
            text: "Publish this Video!!",
            type: "warning",
            VideoCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, publish it !!",
            cancelButtonText: "No"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/admin/videos/active/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Published Video!',
                                text: 'The Video has been set to published!',
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
                        url: '/admin/videos/featured/' + id + '/' + featured,
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
                        url: '/admin/videos/status/' + id + '/' + status,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            
                        }
                    });
         
        return false;
            
       
    }
</script>