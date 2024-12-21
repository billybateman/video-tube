<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="row">
         <div class="col-xl-2. col-sm-3 mb-3">
            <div class="card text-white bg-primary o-hidden h-100 border-none">
               <div class="card-body">
                  <div class="card-body-icon">
                     <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5"><b><?php echo count($channels_data); ?></b> Channels</div>
               </div>
               <a class="card-footer text-white clearfix small z-1" href="#channels">
               <span class="float-left">View Details</span>
               <span class="float-right">
               <i class="fas fa-angle-right"></i>
               </span>
               </a>
            </div>
         </div>
         <div class="col-xl-2. col-sm-3 mb-3">
            <div class="card text-white bg-warning o-hidden h-100 border-none">
               <div class="card-body">
                  <div class="card-body-icon">
                     <i class="fas fa-fw fa-video"></i>
                  </div>
                  <div class="mr-5"><b><?php echo count($videos_data); ?></b> Videos</div>
               </div>
               <a class="card-footer text-white clearfix small z-1" href="#videos">
               <span class="float-left">View Details</span>
               <span class="float-right">
               <i class="fas fa-angle-right"></i>
               </span>
               </a>
            </div>
         </div>
         <?php
         $categories = array();
         foreach($videos_data as $video){
            $categories[] = $video->categoryId;
         }
         $categories = array_unique($categories);
         ?>
         <div class="col-xl-2. col-sm-3 mb-3">
            <div class="card text-white bg-success o-hidden h-100 border-none">
               <div class="card-body">
                  <div class="card-body-icon">
                     <i class="fas fa-fw fa-list-alt"></i>
                  </div>
                  <div class="mr-5"><b><?php echo count($categories); ?></b> Categories</div>
               </div>
               <a class="card-footer text-white clearfix small z-1" href="/videos">
               <span class="float-left">View Details</span>
               <span class="float-right">
               <i class="fas fa-angle-right"></i>
               </span>
               </a>
            </div>
         </div>
         <div class="col-xl-2. col-sm-3 mb-3">
            <div class="card text-white bg-danger o-hidden h-100 border-none">
               <div class="card-body">
                  <div class="card-body-icon">
                     <i class="fas fa-fw fa-cloud-upload-alt"></i>
                  </div>
                  <div class="mr-5"><b><?php echo count($new_videos_data); ?></b> New Videos</div>
               </div>
               <a class="card-footer text-white clearfix small z-1" href="#videos">
               <span class="float-left">View Details</span>
               <span class="float-right">
               <i class="fas fa-angle-right"></i>
               </span>
               </a>
            </div>
         </div>
      </div>
      <hr id="videos">
      <div class="video-block section-padding">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <div class="btn-group float-right right-action">
                     <a href="/account.html#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                     </div>
                  </div>
                  <h6>My Videos</h6>
               </div>
            </div>
            <?php foreach($videos_data as $data){ 
                  $thumbnail = $data->thumbnail;
                  if($data->images_file){
                        $thumbnail = $data->images_file;
                  }
                  //if(check_image($thumbnail)){
                  //      $thumbnail =  "/assets/admin/images/upload-image.png";
                  //}
                  
                  if($thumbnail == ""){
                        $thumbnail =  "/assets/admin/images/upload-image.png";

                  }
                  ?>
                     <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3">
                        <div class="video-card history-video">

                           <div class="video-card-image">
                             
                                 <a class="video-close" href="#" onclick="addPlaylist('<?php echo $data->videos_id; ?>');"><i  class="fa fa-plus"></i></a>
                                 <a class="video-heart <?php if(isset($data->favorites_id)){ ?><?php } ?>" id="favorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="addFavorite('<?php echo $data->videos_id; ?>');"><i style="color:grey;" class="fa fa-heart"></i></a>
                                 <a class="video-heart <?php if(!isset($data->favorites_id)){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="unFavorite('<?php echo $data->videos_id; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                              
                                <a class="video-edit2" href="/videos/update/<?php echo $data->videos_id; ?>"><i class="fa fa-pencil"></i></a>
                                <a class="video-delete" href="#" onclick="deleteVideo('<?php echo $data->videos_id; ?>');"><i  class="fa fa-close"></i></a>
                              
                              
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
      <hr class="mt-0" id="channels">
      <div class="video-block section-padding">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <div class="btn-group float-right right-action">
                     <a href="/account.html#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                        <a class="dropdown-item" href="/account.html#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                     </div>
                  </div>
                  <h6>My Channels</h6>
               </div>
            </div>
            <?php foreach($channels_data as $channel){
                     $thumbnail = $channel->channels_users_info->images_file; 
                ?>
                  <div class="col-xl-2 col-sm-3 mb-3">
                     <div class="channels-card">
                        <div class="channels-card-image">
                              <a class="video-edit" href="/channels/update/<?php echo $data->videos_id; ?>"><i class="fa fa-pencil"></i></a>
                              <a class="video-delete" href="#" onclick="deleteChannel('<?php echo $channel->channels_id; ?>');"><i  class="fa fa-close"></i></a>
                                 
                              <a href="/channels/view/<?php echo $channel->channels_slug; ?>"><img class="img-fluid" src="<?php echo $thumbnail; ?>" alt=""></a>
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
                  <a href="/account.html#"><img alt="" src="/assets/frontend/images/google.png"></a>
                  <a href="/account.html#"><img alt="" src="/assets/frontend/images/apple.png"></a>
               </div>
            </div>
         </div>
      </div>
   </footer>
</div>