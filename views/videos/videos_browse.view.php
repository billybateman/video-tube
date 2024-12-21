<div id="content-wrapper">
    <div class="container-fluid pb-0">
     
      <div class="video-block section-padding">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <div class="btn-group float-right right-action">
                     <a href="/videos/view/1" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/videos/view/1"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                        <a class="dropdown-item" href="/videos/view/1"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                        <a class="dropdown-item" href="/videos/view/1"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                     </div>
                  </div>
                  <h6>Videos</h6>
               </div>
            </div>
            <?php
            if(count($videos_data) == 0){
               ?>
               No videos found.
               <?php
            }
            foreach($videos_data as $data){
                
                //$getID3 = new getID3;
                //$file = $getID3->analyze($data->filePath);

                //var_dump($file);

                  $thumbnail = $data->thumbnail;
                  if($data->images_file){
                        $thumbnail = $data->images_file;
                  }
                  if($thumbnail == ""){
                        $thumbnail =  "/assets/admin/images/upload-image.png";

                  }
                    
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3">
                        <div class="video-card">
                        <div class="video-card-image">
                              <?php if(isset($user)){ ?>
                                 <a class="video-close" href="#" onclick="addPlaylist('<?php echo $data->videos_id; ?>');"><i  class="fa fa-plus"></i></a>
                                 <a class="video-heart <?php if(isset($data->favorites_id)){ ?><?php } ?>" id="favorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="addFavorite('<?php echo $data->videos_id; ?>');"><i style="color:grey;" class="fa fa-heart"></i></a>
                                 <a class="video-heart <?php if(!isset($data->favorites_id)){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $data->videos_id; ?>" href="#" onclick="unFavorite('<?php echo $data->videos_id; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                                <?php if($data->videos_users_info->users_id == $user['users_id']){ ?>
                                    <a class="video-edit" href="/videos/update/<?php echo $data->videos_id; ?>"><i class="fa fa-pencil"></i></a>
                                <?php } ?>
                              
                             <?php } else { ?> 
                                 <a class="video-close" href="#"><i  class="fa fa-plus"></i></a>
                              <?php } ?>
                                <a class="play-icon" href="/videos/view/<?php echo $data->slug; ?>"><i class="fas fa-play-circle"></i></a>
                                <a href="/videos/view/<?php echo $data->slug; ?>"><img class="img-fluid" src="<?php echo $thumbnail; ?>" alt=""></a>
                                <div class="time"><?php echo $data->duration; ?></div>
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