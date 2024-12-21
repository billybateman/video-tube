<?php 

$channels_id = $data->channels_id;

$cover_image = $data->images_file; 
if($cover_image == ""){
   $cover_image = "/assets/frontend/images/channel-banner.png";
} 

?>

<div class="single-channel-page" id="content-wrapper">
   <div class="single-channel-image">
      <img class="img-fluid" alt="" src="<?php echo $cover_image; ?>">
      <div class="channel-profile">
         <img class="channel-profile-img" alt="" src="<?php echo $channels_user_data['images_file']; ?>">
         <div class="social hidden-xs d-none">
            Social &nbsp;
            <a class="fb" href="#">Facebook</a>
            <a class="tw" href="#">Twitter</a>
            <a class="gp" href="#">Google</a>
         </div>
      </div>
   </div>
   <?php //var_dump($data);  var_dump($channels_user_data);?>
   <div class="single-channel-nav">
      <nav class="navbar navbar-expand-lg navbar-light">
         <a class="channel-brand" href="#"><?php echo $data->channels_name; ?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active" onclick="$('.nav-item').removeClass('active'); $(this).addClass('active');">
                  <a class="nav-link" onclick="$('.tab-pane').removeClass('active'); $('.tab-pane').addClass('fade'); $('#nav-home').addClass('show active');" href="#">Videos <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item" onclick="$('.nav-item').removeClass('active'); $(this).addClass('active');">
                  <a class="nav-link" onclick="$('.tab-pane').removeClass('active'); $('.tab-pane').addClass('fade'); $('#nav-comments').addClass('show active');" href="#">Discussion</a>
               </li>
               
            </ul>
            <form class="form-inline my-2 my-lg-0 d-none">
               <input class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; 
            </form>   
               
            <?php //if(count($subscription_data) == 0){ ?>
            <?php if(isset($subscription_data)){ 
                     if(count($subscription_data) == 0){  ?>
                     <button id="subscribe_btn_<?php echo $data->channels_id; ?>" onclick="addSubscribe('<?php echo $data->channels_id; ?>');" class="btn btn-outline-success btn-sm" type="button">Subscribe <strong>1.4M</strong></button>
                     <button id="unsubscribe_btn_<?php echo $data->channels_id; ?>" onclick="unSubscribe('<?php echo $data->channels_id; ?>');" class="btn btn-outline-danger btn-sm d-none" type="button">Un-Subscribe <strong>1.4M</strong></button>
               
                     <?php } else { ?>
                        <button id="subscribe_btn_<?php echo $data->channels_id; ?>" onclick="addSubscribe('<?php echo $data->channels_id; ?>');" class="btn btn-outline-success btn-sm d-none" type="button">Subscribe <strong>1.4M</strong></button>
                        <button id="unsubscribe_btn_<?php echo $data->channels_id; ?>" onclick="unSubscribe('<?php echo $data->channels_id; ?>');" class="btn btn-outline-danger btn-sm" type="button">Un-Subscribe <strong>1.4M</strong></button>
                     <?php } 
                  } else {
                     ?>
                     <button id="subscribe_btn_<?php echo $data->channels_id; ?>" onclick="addSubscribe('<?php echo $data->channels_id; ?>');" class="btn btn-outline-success btn-sm" type="button">Subscribe <strong>1.4M</strong></button>
                     <?php
                  }

                  if(isset($user)){ 

                     if($channels_user_data['users_id'] == $user['users_id']){
                        ?>
                         <a href="/channels/update/<?php echo $data->channels_id; ?>" class="ml-2 btn btn-info btn-sm">Update</a>                   
                        <?php
                     }
                  }
            ?>
           
         </div>
      </nav>
   </div>
   <div class="container-fluid">

      <div class="tab-content" id="nav-tabContent">
         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                        <h6>Videos</h6>
                     </div>
                  </div>
                  <?php foreach($videos_data as $data){ 
                        $thumbnail = $data->thumbnail;
                        if($data->images_file){
                              $thumbnail = $data->images_file;
                        }
                     
                        ?>
                           <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3" id="video_<?php echo $data->videos_id; ?>">
                              <div class="video-card history-video">

                                 <div class="video-card-image">
                                    <?php 
                                 
                                       if(isset($user)){ 

                                          if($data->videos_users_info->users_id == $user['users_id']){
                                          ?>
                                             <a class="video-close" href="#" onclick="removePlaylist('<?php echo $data->videos_id; ?>', '<?php echo $channels_id; ?>');"><i  class="fa fa-close"></i></a>
                                          <?php
                                          } else { 
                                          ?>
                                          <a class="video-close" href="#" onclick="addPlaylist('<?php echo $data->videos_id; ?>');"><i  class="fa fa-plus"></i></a>
                                          <a class="video-heart <?php if(isset($data->favorites_id)){ ?><?php } ?>" id="favorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="addFavorite('<?php echo $data->videos_id; ?>');"><i style="color:grey;" class="fa fa-heart"></i></a>
                                          <a class="video-heart <?php if(!isset($data->favorites_id)){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="unFavorite('<?php echo $data->videos_id; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                                          <?php 
                                          }
                                    } else { ?> 
                                             <a class="video-close" href="#"><i  class="fa fa-plus"></i></a>
                                    <?php
                                    }      
                                    ?>
                                    
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
         </div>
         <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
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
                        <h6>Discussions</h6>
                        <div class="container">
                           <div class="row">
                              <div class="col-12s">
                                 <div class="post-content">
                                    
                                    <div class="post-container">
                                       <div class="post-detail">
                                          
                                          <div class="post-comment">
                                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="profile-photo-sm">
                                          <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                          </div>
                                          <div class="post-comment">
                                          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
                                          <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                          </div>
                                          <div class="post-comment">
                                          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="profile-photo-sm">
                                          <input type="text" class="form-control" placeholder="Post a comment">
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


    var removePlaylist = function(videos_id, playlists_id){
        swal({
            title: "Remove Video?",
            text: "This will remove video from this channel!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Remove",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/users/remove_playlist/' + videos_id + '/' + playlists_id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Removed',
                                text: 'You have removed video from this channel!',
                                type: 'success'
                            });
                            
                            $('#video_' + videos_id).addClass('d-none');
                            
                        }
                    });
            }
            return false;
        });
    }
</script>