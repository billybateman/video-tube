<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-mobile-search">
                  <div class="row">
                     <div class="col-md-12">
                        <form class="mobile-search">
                           <div class="input-group">
                              <input type="text" placeholder="Search for..." class="form-control">
                              <div class="input-group-append">
                                 <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="top-category section-padding mb-4 d-none">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div>
                           <h6>Channels Categories</h6>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="owl-carousel owl-carousel-category owl-loaded owl-drag">
                           <div class="owl-stage-outer">
                              <div class="owl-stage" style="transform: translate3d(-1277px, 0px, 0px); transition: 1s; width: 3577px;">
                                 <?php foreach($categories_data as $category){ ?>
                                 <div class="owl-item cloned" style="width: 127.75px;">
                                    <div class="item">
                                       <div class="category-item">
                                          <a href="#">
                                             <div class="img-fluid">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 16 16" fill="#fff"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.04 10h2.58l.65 1H2.54l-.5-.5v-9l.5-.5h12l.5.5v4.77l-1-1.75V2h-11v8zm5.54 1l-1.41 3.47h2.2L15 8.7 14.27 7h-1.63l.82-1.46L12.63 4H9.76l-.92.59-2.28 5L7.47 11h1.11zm1.18-6h2.87l-1.87 3h3.51l-5.76 5.84L10.2 10H7.47l2.29-5zM6.95 7H4.04V6H7.4l-.45 1zm-.9 2H4.04V8H6.5l-.45 1z"/></svg>
                                             <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Icons" width="50px" height="50px" fill="#fff" viewBox="0 0 32 32" xml:space="preserve">
                  <style type="text/css">
                     .st0{fill:none;stroke:#fff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                  </style>
                  <circle class="st0" cx="16" cy="16" r="13"/>
                  <line class="st0" x1="20" y1="12" x2="20" y2="16"/>
                  <path class="st0" d="M15,23c0,1.1-0.9,2-2,2h0c-1.1,0-2-0.9-2-2v-4c1.4,1.1,3.1,2,5,2c2,0,3.9-0.8,5.3-2"/>
                  <path class="st0" d="M10,17c0-1.1,0.9-2,2-2s2,0.9,2,2"/>
                  </svg>  
                                          </div>
                                             <h6><?php echo $category->categories_name; ?></h6>
                                             <p>74,853 views</p>
                                             <i class="nf-cod-github_action"></i>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <?php } ?>
                                 
                              </div>
                           </div>
                           <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                           <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                        </div>
                     </div>
                  </div>
               </div>
              
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div>
                           <h6>Featured Videos</h6>
                        </div>
                     </div>
                     <?php foreach($videos_featured_data as $data){ 
                        $thumbnail = $data->thumbnail;
                        if($data->images_file){
                              $thumbnail = $data->images_file;
                        }
                 
                  ?>
                     <div class="col-xl-2 col-sm-3 mb-3">
                        <div class="video-card history-video">

                           <div class="video-card-image">
                              <?php if(isset($user)){ ?>
                                 <a class="video-close" href="#" onclick="addPlaylist('<?php echo $data->videos_id; ?>');"><i  class="fa fa-plus"></i></a>
                                 <a class="video-heart <?php if(isset($data->favorites_id)){ ?><?php } ?>" id="favorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="addFavorite('<?php echo $data->videos_id; ?>');"><i style="color:grey;" class="fa fa-heart"></i></a>
                                 <a class="video-heart <?php if(!isset($data->favorites_id)){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="unFavorite('<?php echo $data->videos_id; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                               <?php } else { ?> 
                                 <a class="video-close" href="#"><i  class="fa fa-plus"></i></a>
                              <?php } ?>
                              
                                <a class="play-icon" href="/videos/view/<?php echo $data->slug; ?>"><i class="fas fa-play-circle"></i></a>
                                <a href="/videos/view/<?php echo $data->slug; ?>"><img class="img-fluid" src="<?php echo $thumbnail; ?>" alt=""></a>
                                <div class="time"><?php echo $data->duration; ?></div>
                            </div>
                            <div class="progress d-none">
                              <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">1:40</div>
                           </div>
                            <div class="video-card-body">
                                <div class="video-title">
                                    <a href="/videos/view/<?php echo $data->slug; ?>"><?php echo $data->title; ?></a>
                                </div>
                                <div class="video-page text-success">
                                <?php echo $data->videos_users_info->users_first_name; ?> <?php echo $data->videos_users_info->users_last_name; ?><a title="" data-placement="top" data-toggle="tooltip" href="/users/view/<?php echo $data->users_id; ?>" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                </div>
                                <div class="video-view">
                                <?php echo $data->views; ?> views &nbsp;<i class="fas fa-calendar-alt"></i><?php echo date( "m/d/Y", strtotime($data->uploadDate)); ?>
                                </div>
                            </div>
                        </div>
                     </div>
            <?php } ?>
                    
                  </div>
               </div>
               <hr class="mt-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div>
                           <h6>Popular Channels</h6>
                        </div>
                     </div>
                     <?php foreach($channels_featured_data as $channel){ 
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
        