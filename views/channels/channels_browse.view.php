<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title">
                        <div class="btn-group float-right right-action">
                            <a href="/channels/view/1" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/channels/view/1"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                <a class="dropdown-item" href="/channels/view/1"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                <a class="dropdown-item" href="/channels/view/1"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                            </div>
                        </div>
                        <h6>Channels</h6>
                    </div>
                </div>
                <?php foreach($channels_data as $channel){
                     $thumbnail = $channel->channels_users_info->images_file; 
                ?>
                    <div class="col-xl-2 col-sm-3 mb-3">
                        <div class="channels-card">
                            <div class="channels-card-image">
                                <a href="/channels/view/<?php echo $channel->channels_slug; ?>"><img class="img-fluid" src="<?php echo $thumbnail; ?>" alt=""></a>
                                <div class="channels-card-image-btn">
                                    <?php if(isset($channel->subscriptions_id)){ ?>
                                            <button id="subscribe_btn_<?php echo $channel->channels_id; ?>" onclick="addSubscribe('<?php echo $channel->channels_id; ?>');" class="btn btn-outline-success btn-sm d-none" type="button">Subscribe</button>
                                            <button id="unsubscribe_btn_<?php echo $channel->channels_id; ?>" onclick="unSubscribe('<?php echo $channel->channels_id; ?>');" class="btn btn-outline-danger btn-sm" type="button">Un-Subscribe</button>
                                        <?php } else { ?> 
                                            <button id="subscribe_btn_<?php echo $channel->channels_id; ?>" onclick="addSubscribe('<?php echo $channel->channels_id; ?>');" class="btn btn-outline-success btn-sm" type="button">Subscribe</button>
                                            <button id="unsubscribe_btn_<?php echo $channel->channels_id; ?>" onclick="unSubscribe('<?php echo $channel->channels_id; ?>');" class="btn btn-outline-danger btn-sm d-none" type="button">Un-Subscribe </button>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="channels-card-body">
                                <div class="channels-title">
                                    <a href="/channels/view/<?php echo $channel->channels_slug; ?>"><?php echo $channel->channels_name; ?></a>
                                </div>
                                <div class="channels-view">
                                    <?php echo $channel->channels_subscribers; ?> subscribers
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
               
            <?php
            $totalPages = $total_rows / $per_page;
            $current = ($start / $per_page) + 1;
            
            if($totalPages > 1){
                ?>
        

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pagination-sm mb-0">
                        <?php if($current > 1){?>
                            <li class="page-item btn-sm btn-primary mr-3"><a tabindex="-1" href="<?php echo $url; ?>/" class="page-link">First</a></li>
                            <li class="page-item btn-sm btn-primary mr-3"><a tabindex="-1" href="<?php echo $url; ?>/<?php echo ($current - 2) * $per_page; ?>/" class="page-link">Previous</a></li>
                        <?php } ?>
                        <?php
                        $counter = 0;
                        $pages = $current;
                        if($current > 1){
                            $pages = $current - 4;
                            if($pages < 1){
                                $pages = 1;
                            }
                        }
                        for($i = $pages; $i < $totalPages; $i++){
                            $counter++;
                            if($counter  < 10){
                            ?>
                            <li class="page-item <?php if($current == $i){ echo "active"; } ?>"><a <?php if($current == $i){ ?> class="page-link current" <?php } else { ?> class="page-link" <?php } ?>  href="<?php echo $url; ?>/<?php echo ($i - 1) * $per_page; ?>/"><?php echo $i; ?></a></li>
                            <?php
                            } 
                        }
                            ?>
                        <?php 
                             if($current < $totalPages){?>
                            <li class="page-item btn-sm btn-primary ml-3"><a href="<?php echo $url; ?>/<?php echo ($current) * $per_page; ?>/" class="page-link">Next</a></li>
                            <li class="page-item btn-sm btn-primary ml-3"><a href="<?php echo $url; ?>/<?php echo ($totalPages - 1) * $per_page; ?>/" class="page-link">Last</a></li>
                        <?php }
                         ?>
                        </ul>
                    </nav>
                <?php 
                    }
                
                ?>
            
        </div>
        <div class="video-block section-padding d-none">
            <div class="row">
                <div class="col-md-12">
                <div class="main-title">
                    <div class="btn-group float-right right-action">
                        <a href="/channels/browse/1" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/channels/ranking"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                            <a class="dropdown-item" href="/channels/views"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                        </div>
                    </div>
                    <h6>Featured Videos</h6>
                </div>
                </div>
                <?php foreach($videos_featured_data as $video){ 
                    $thumbnail = $video->images_file;    
                ?>
                <div class="col-xl-2 col-sm-3 mb-3">
                    <div class="video-card">
                        <div class="video-card-image">
                            <a class="play-icon" href="/videos/view/<?php echo $video->slug; ?>"><i class="fas fa-play-circle"></i></a>
                            <a href="/videos/view/<?php echo $video->slug; ?>"><img class="img-fluid" src="<?php echo $thumbnail; ?>" alt=""></a>
                            <div class="time"><?php echo $video->duration; ?></div>
                        </div>
                        <div class="video-card-body">
                            <div class="video-title">
                                <a href="/videos/view/<?php echo $video->slug; ?>"><?php echo $video->title; ?></a>
                            </div>
                            <div class="video-page text-success">
                            <?php echo $video->users_first_name; ?> <?php echo $video->users_last_name; ?><a title="" data-placement="top" data-toggle="tooltip" href="/users/view/<?php echo $video->users_id; ?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                            </div>
                            <div class="video-view">
                            <?php echo $video->views; ?> views &nbsp;<i class="fas fa-calendar-alt"></i><?php echo date( "m/d/Y", strtotime($video->uploadDate)); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
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
                    <a href="#"><img alt="" src="/assets/frontend/images/google.png"></a>
                    <a href="#"><img alt="" src="/assets/frontend/images/apple.png"></a>
                </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script type="text/javascript">
   var addSubscribe = function(id){
        <?php if(isset($user)){ ?>
        swal({
            title: "Subscribe?",
            text: "This will subscribe to this channel!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Subscribe",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/users/add_subscription/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                           // $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Subscribed',
                                text: 'You have been subscribed to this channel!',
                                type: 'success'
                            });
   
                            $('#subscribe_btn_' + id).addClass('d-none');
                            $('#unsubscribe_btn_' + id).removeClass('d-none');
                        }
                    });
            }
            return false;
        });
        <?php } else { ?>
            window.location.href = '/login';
        <?php } ?>
    }
   
    var unSubscribe = function(id){
        swal({
            title: "Remove Subscription?",
            text: "This will unsubscribe from this channel!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Un-Subscribe",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/users/un_subscription/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Un-Subscribed',
                                text: 'You have un-subscribed from this channel!',
                                type: 'success'
                            });
                            
                            $('#unsubscribe_btn_' + id).addClass('d-none');
                            $('#subscribe_btn_' + id).removeClass('d-none');
                            
                        }
                    });
            }
            return false;
        });
    }
</script>