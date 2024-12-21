<?php
$video = $data;
$data = (array) $data;

?>
<div id="content-wrapper">
    <div class="container-fluid pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-8">
                <div class="single-video-left">
                    <div class="single-video">
                        <link rel="stylesheet" href="https://cdn.vidstack.io/player/theme.css" />
                        <link rel="stylesheet" href="https://cdn.vidstack.io/player/video.css" />
                        <script type="module">
                            import { VidstackPlayer, VidstackPlayerLayout } from 'https://cdn.vidstack.io/player';

                            const player = await VidstackPlayer.create({
                                target: '#video-tag',
                                title: '<?php echo $data['title']; ?>',
                                src: '<?php echo $data['filePath']; ?>',
                                poster: '<?php echo $data['thumbnail']; ?>',
                                layout: new VidstackPlayerLayout({
                                thumbnails: 'https://files.vidstack.io/sprite-fight/thumbnails.vtt',
                                }),
                            });


                            </script>
                        <video id="video-tag" src="<?php echo $data['filePath']; ?>" autoplay onended="showUpNext()"></video>
                    </div>
                    <div class="single-video-title box mb-3">
                        <h2><?php echo $data['title']; ?></h2>
                        <p class="mb-0"><i class="fas fa-eye"></i> <?php echo $data['views']; ?> views</p>
                    </div>
                    <div class="single-video-author box mb-3">
                        <div class="float-right d-none">
                            <button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong></button> 
                            <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button>
                        </div>
                        <img class="img-fluid" src="<?php echo $video->videos_users_info->images_file; ?>" alt="">
                        <p><a href="/users/view/<?php echo $video->videos_users_info->users_id; ?>"><strong> <?php echo $video->videos_users_info->users_first_name; ?> <?php echo $video->videos_users_info->users_last_name; ?></strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                        <small>Published on <?php echo date( "m/d/Y", strtotime($data['uploadDate'])); ?></small>
                    </div>
                    <div class="single-video-info-content box mb-3">
                        <h6>Category :</h6>
                        <p><?php echo $data['categories_name']; ?></p>
                        <h6>About :</h6>
                        <p><?php echo $data['description']; ?> </p>
                        
                        <p class="tags mb-0 d-none">
                            <h6>Tags :</h6>
                            <span><a href="/videos/view/slug#">Uncharted 4</a></span>
                            <span><a href="/videos/view/slug#">Playstation 4</a></span>
                            <span><a href="/videos/view/slug#">Gameplay</a></span>
                            <span><a href="/videos/view/slug#">1080P</a></span>
                            <span><a href="/videos/view/slug#">ps4Share</a></span>
                            <span><a href="/videos/view/slug#">+ 6</a></span>
                        </p>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="single-video-right">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="adblock">
                                <div class="img">
                                    Google AdSense<br>
                                    336 x 280
                                </div>
                                </div>
                                <div class="main-title">
                                <div class="btn-group float-right right-action">
                                    <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                        <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                        <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                    </div>
                                </div>
                                <h6>Up Next</h6>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v1.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Here are many variati of passages of Lorem</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v2.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Duis aute irure dolor in reprehenderit in.</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v3.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Culpa qui officia deserunt mollit anim</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v4.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Deserunt mollit anim id est laborum.</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v5.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Exercitation ullamco laboris nisi ut.</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v6.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">There are many variations of passages of Lorem</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Education <a title="" data-placement="top" data-toggle="tooltip" href="/videos/view/slug#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
                                    </div>
                                </div>
                                </div>
                                <div class="adblock mt-0">
                                <div class="img">
                                    Google AdSense<br>
                                    336 x 280
                                </div>
                                </div>
                                <div class="video-card video-card-list">
                                <div class="video-card-image">
                                    <a class="play-icon" href="/videos/view/slug#"><i class="fas fa-play-circle"></i></a>
                                    <a href="/videos/view/slug#"><img class="img-fluid" src="/assets/frontend/images/v2.png" alt=""></a>
                                    <div class="time">3:50</div>
                                </div>
                                <div class="video-card-body">
                                    <div class="btn-group float-right right-action">
                                        <a href="/videos/view/slug#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                            <a class="dropdown-item" href="/videos/view/slug#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                        </div>
                                    </div>
                                    <div class="video-title">
                                        <a href="/videos/view/slug#">Duis aute irure dolor in reprehenderit in.</a>
                                    </div>
                                    <div class="video-page text-success">
                                        Channel <a title="" data-placement="top" data-toggle="tooltip" href="/channels/view/slug" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                    </div>
                                    <div class="video-view">
                                        1.8M views &nbsp;<i class="fas fa-calendar-alt"></i> 11 Months ago
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
<script>
    $( document ).ready(function() {
        addHistory('<?php echo $data['videos_id']; ?>');
    });
</script>