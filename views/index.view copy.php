<!-- owl-carousel Banner Start -->
<section class="pt-0 pb-0">
      <div class="container-fluid px-0">
         <div class="row no-gutters">
            <div class="col-12">
               <div class="gen-banner-movies banner-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                     data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                     data-loop="true" data-margin="0">
                     
                     <?php foreach($featured_data as $featured){ ?>
                     <div class="item" style="background: url('<?php echo $featured->cover; ?>')">
                        <div class="gen-movie-contain-style-2 h-100">
                           <div class="container h-100">
                              <div class="row flex-row-reverse align-items-center h-100">
                                 <div class="col-md-6">
                                    <div class="gen-front-image">
                                       <img src="<?php echo $featured->thumbnail; ?>" alt="owl-carousel-banner-image">
                                       <a href="/movies/watch/<?php echo $featured->slug; ?>" class="playBut">
                                          <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                             <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                cx="106.8" cy="106.8" r="103.3">
                                             </circle>
                                          </svg>
                                          <span>Watch Now</span>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="gen-tag-line"><span>Most Viewed</span></div>
                                    <div class="gen-movie-info">
                                       <h3><?php echo $featured->name; ?> </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul class="gen-meta-after-title">
                                          <li class="gen-sen-rating">
                                             <span>
                                             <?php echo $featured->rating; ?></span>
                                          </li>
                                          <li> <img src="/assets/images/asset-2.png" alt="rating-image">
                                             <span>
                                                 </span>
                                          </li>
                                       </ul>
                                       <p><?php echo $featured->description; ?>
                                       </p>
                                       <div class="gen-meta-info d-none">
                                          <ul class="gen-meta-after-excerpt">
                                             <li>
                                                <strong>Cast :</strong>
                                                Anna Romanson,Robert Romanson
                                             </li>
                                             <li>
                                                <strong>Genre :</strong>
                                                <span>
                                                   <a href="action.html">
                                                      Action, </a>
                                                </span>
                                                <span>
                                                   <a href="animation.html">
                                                      Annimation, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      Family </a>
                                                </span>
                                             </li>
                                             <li>
                                                <strong>Tag :</strong>
                                                <span>
                                                   <a href="index.html#">
                                                      4K Ultra, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      Brother, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      Dubbing, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      Premieres </a>
                                                </span>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="/movies/watch/<?php echo $featured->slug; ?>" class="gen-button .gen-button-dark">
                                             <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>

                     <?php foreach($featured_shows_data as $featured){ ?>
                     <div class="item" style="background: url('<?php echo $featured->cover; ?>')">
                        <div class="gen-movie-contain-style-2 h-100">
                           <div class="container h-100">
                              <div class="row flex-row-reverse align-items-center h-100">
                                 <div class="col-md-6">
                                    <div class="gen-front-image ">
                                       <img src="<?php echo $featured->thumbnail; ?>" alt="owl-carousel-banner-image">
                                       <a href="/shows/watch/<?php echo $featured->slug; ?>" class="playBut">
                                          <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_19_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                             <circle class="circle" id="XMLID_20_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                cx="106.8" cy="106.8" r="103.3">
                                             </circle>
                                          </svg>
                                       <span>Watch Series</span>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="gen-tag-line"><span>Best Of 2024</span></div>
                                    <div class="gen-movie-info">
                                       <h3><?php echo $featured->name; ?></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul class="gen-meta-after-title">
                                          <li class="gen-sen-rating">
                                             <span>
                                             <?php echo $featured->rating; ?></span>
                                          </li>
                                          <li> <img src="assets/images/asset-2.png" alt="rating-image">
                                             <span>
                                                8.5 </span>
                                          </li>
                                       </ul>
                                       <p><?php echo $featured->description; ?>
                                       </p>
                                       <div class="gen-meta-info d-none">
                                          <ul class="gen-meta-after-excerpt">
                                             <li>
                                                <strong>Cast :</strong>
                                                Robert Romanson,Anne Good
                                             </li>
                                             <li>
                                                <strong>Genre :</strong>
                                                <span>
                                                   <a href="action.html">
                                                      Action, </a>
                                                </span>
                                                <span>
                                                   <a href="adventure.html">
                                                      Adventure, </a>
                                                </span>
                                                <span>
                                                   <a href="biography.html">
                                                      Biography </a>
                                                </span>
                                             </li>
                                             <li>
                                                <strong>Tag :</strong>
                                                <span>
                                                   <a href="index.html#">
                                                      4K Ultra, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      King, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      Premieres, </a>
                                                </span>
                                                <span>
                                                   <a href="index.html#">
                                                      viking </a>
                                                </span>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="/shows/watch/<?php echo $featured->slug; ?>" class="gen-button gen-button-dark">
                                             <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                    
                    
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Banner End -->
            

   <section class="gen-section-padding-2">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6">
                        <h4 class="gen-heading-title">Orson Welles</h4>
                     </div>
                    
                  </div>
                  <div class="row mt-3">
                     <div class="col-12">
                        <div class="gen-style-2">
                           <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                              data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                              data-loop="false" data-margin="30">
                              <?php foreach($orsen_data  as $show){ 
                                 $show = (array) $show;
                                
                                 ?>
                              <div class="item">
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                          <div class="gen-movie-img">
                                             <img src="<?php echo $show['thumbnail']; ?>" alt="owl-carousel-video-image">
                                             <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart d-none">
                                                        <div class="wp_ulike_general_class">
                                                            <a href="#" class="sl-button text-white"><i
                                                                    class="far fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="video-actions--link_add-to-playlist dropdown">
                                                        <?php if(isset($user)){ ?>
                                                            <a class="dropdown-toggle <?php if(isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="favorite_btn_<?php echo $show['movies_id']; ?>" href="#" onclick="addFavorite('<?php echo $show['movies_id']; ?>', 'movies', '<?php echo $show['slug']; ?>');"><i  class="fa fa-plus"></i></a>
                                                            <a class="dropdown-toggle <?php if(!isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $show['movies_id']; ?>" href="#" onclick="unFavorite('movies', '<?php echo $show['slug']; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                                                        <?php } else { ?> 
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i  class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="/login">Sign in to add this movie to favorites.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                             <div class="gen-movie-action">
                                                <a href="/movies/watch/<?php echo $show['slug']; ?>" class="gen-button">
                                                   <i class="fa fa-play"></i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="gen-info-contain">
                                             <div class="gen-movie-info">
                                                <h3><a href="/movies/watch/<?php echo $show['slug']; ?>"><?php echo $show['name']; ?></a>
                                                </h3>
                                             </div>
                                             <div class="gen-movie-meta-holder">
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- #post-## -->
                              </div>
                              <?php } ?>
                             

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
  
            <section class="gen-section-padding-2">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6">
                        <h4 class="gen-heading-title">Ed Wood</h4>
                     </div>
                    
                  </div>
                  <div class="row mt-3">
                     <div class="col-12">
                        <div class="gen-style-2">
                           <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                              data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                              data-loop="false" data-margin="30">
                              <?php foreach($ed_wood_data  as $show){
                                 $show = (array) $show; ?>
                              <div class="item">
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                          <div class="gen-movie-img">
                                             <img src="<?php echo $show['thumbnail']; ?>" alt="owl-carousel-video-image">
                                             <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart d-none">
                                                        <div class="wp_ulike_general_class">
                                                            <a href="#" class="sl-button text-white"><i
                                                                    class="far fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="video-actions--link_add-to-playlist dropdown">
                                                        <?php if(isset($user)){ ?>
                                                            <a class="dropdown-toggle <?php if(isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="favorite_btn_<?php echo $show['movies_id']; ?>" href="#" onclick="addFavorite('<?php echo $show['movies_id']; ?>', 'movies', '<?php echo $show['slug']; ?>');"><i  class="fa fa-plus"></i></a>
                                                            <a class="dropdown-toggle <?php if(!isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $show['movies_id']; ?>" href="#" onclick="unFavorite('shows', '<?php echo $show['slug']; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                                                        <?php } else { ?> 
                                                            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i  class="fa fa-plus"></i></a>
                                                            <div class="dropdown-menu mCustomScrollbar">
                                                                <div class="mCustomScrollBox">
                                                                    <div class="mCSB_container">
                                                                        <a class="login-link" href="/login">Sign in to add this movie to favorites.</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                             <div class="gen-movie-action">
                                                <a href="/movies/watch/<?php echo $show['slug']; ?>" class="gen-button">
                                                   <i class="fa fa-play"></i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="gen-info-contain">
                                             <div class="gen-movie-info">
                                                <h3><a href="/movies/watch/<?php echo $show['slug']; ?>"><?php echo $show['name']; ?></a>
                                                </h3>
                                             </div>
                                             <div class="gen-movie-meta-holder">
                                                
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- #post-## -->
                              </div>
                              <?php } ?>
                             

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
        


   <!-- owl-carousel Videos Section-1 Start -->
    <?php 
    foreach($categories_data as $category){
      
         if(count($category->shows) > 3){
         ?>
            <section class="gen-section-padding-2">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-6">
                        <h4 class="gen-heading-title"><?php echo $category->categories_name; ?></h4>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
                        <div class="gen-movie-action">
                           <div class="gen-btn-container text-right">
                              <a href="/shows" class="gen-button gen-button-flat">
                                 <span class="text">More Videos</span>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-3">
                     <div class="col-12">
                        <div class="gen-style-2">
                           <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                              data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                              data-loop="false" data-margin="30">
                              <?php foreach($category->shows as $show){ 
                                 
                                 $show = (array) $show;
                                 ?>
                              <div class="item">
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                          <div class="gen-movie-img">
                                             <img src="<?php echo $show['thumbnail']; ?>" alt="owl-carousel-video-image">
                                            
                                             <div class="gen-movie-add">
                                                <div class="wpulike wpulike-heart d-none">
                                                   <div class="wp_ulike_general_class">
                                                      <a href="#" class="sl-button text-white"><i
                                                               class="far fa-heart"></i></a>
                                                   </div>
                                                </div>
                                                <ul class="menu bottomRight">
                                                   <li class="share top">
                                                      <i class="fa fa-share-alt"></i>
                                                      <ul class="submenu">
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-facebook-f"></i></a>
                                                            </li>
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-instagram"></i></a>
                                                            </li>
                                                            <li><a href="#" class="facebook"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                      </ul>
                                                   </li>
                                                </ul>
                                                <div class="video-actions--link_add-to-playlist dropdown">
                                                   <?php if(isset($user)){ ?>
                                                      <a class="dropdown-toggle <?php if(isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="favorite_btn_<?php echo $show['id']; ?>" href="#" onclick="addFavorite('<?php echo $show['id']; ?>', 'shows', '<?php echo $show['slug']; ?>');"><i  class="fa fa-plus"></i></a>
                                                      <a class="dropdown-toggle <?php if(!isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $show['id']; ?>" href="#" onclick="unFavorite('shows', '<?php echo $show['slug']; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
                                                   <?php } else { ?> 
                                                      <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i  class="fa fa-plus"></i></a>
                                                      <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                               <div class="mCSB_container">
                                                                  <a class="login-link" href="/login">Sign in to add this show to favorites.</a>
                                                               </div>
                                                            </div>
                                                      </div>
                                                   <?php } ?>
                                                </div>
                                          </div>
                                             <div class="gen-movie-action">
                                                <a href="/shows/watch/<?php echo $show['slug']; ?>" class="gen-button">
                                                   <i class="fa fa-play"></i>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="gen-info-contain">
                                             <div class="gen-movie-info">
                                                <h3><a href="/shows/watch/<?php echo $show['slug']; ?>"><?php echo $show['name']; ?></a>
                                                </h3>
                                             </div>
                                             <div class="gen-movie-meta-holder">
                                                <ul>
                                                   <li><?php echo $show['seasons']; ?> Season<?php if($show['seasons'] > 1){ echo "s"; } ?></li>
                                                   <li>
                                                      <a href="/shows/watch/<?php echo $show['slug']; ?>"><span><?php echo $show['episodes']; ?> Episode<?php if($show['episodes'] > 1){ echo "s"; } ?></span></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- #post-## -->
                              </div>
                              <?php } ?>
                             

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         <?php
          } 
      } 
   ?>
   <!-- owl-carousel Videos Section-1 End -->

   <!-- owl-carousel Videos Section-2 Start -->
   <section class="pt-0 gen-section-padding-2 d-none">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <h4 class="gen-heading-title">Top Regional Shows</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
               <div class="gen-movie-action">
                  <div class="gen-btn-container text-right">
                     <a href="tv-shows-pagination.html" class="gen-button gen-button-flat">
                        <span class="text">More Videos</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="gen-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                     data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                     data-loop="false" data-margin="30">
                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-14.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">ghost of sky</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="adventure.html"><span>Adventure</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>

                     <div class="item">
                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-15.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">love in 21st</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2 Seasons</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-drama movie_tag-4k-ultra movie_tag-brother movie_tag-king movie_tag-premieres">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-16.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">family love</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>0 Seasons</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-comedy movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-17.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">dance nation dance</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>0 Seasons</li>
                                          <li>
                                             <a href="comedy.html"><span>Comedy</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_tag-brother movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-18.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">vacation life</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-mystery movie_tag-brother movie_tag-hero movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-19.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">dream of dragons</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-romance movie_tag-4k-ultra movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-20.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">command in your hand</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="comedy.html"><span>Comedy</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-documentary movie_tag-4k-ultra movie_tag-brother movie_tag-king movie_tag-premieres">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-21.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">stories of the dark</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="biography.html"><span>Biography</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-sci-fi movie_tag-brother movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-22.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">3 Hackers:TBG</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-sport movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-13.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">friend of jin</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Videos Section-2 End -->

   <!-- Slick Slider start -->
   <section class="gen-section-padding-2 pt-0 pb-0 d-none">
      <div class="container">
         <div class="home-singal-silder">
            <div class="gen-nav-movies gen-banner-movies">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="slider slider-for">
                        <!-- Slider Items -->
                        <div class="slider-item" style="background: url('assets/images/background/asset-4.jpeg')">
                           <div class="gen-slick-slider h-100">
                              <div class="gen-movie-contain h-100">
                                 <div class="container h-100">
                                    <div class="row align-items-center h-100">
                                       <div class="col-lg-6">
                                          <div class="gen-movie-info">
                                             <h3>thieve the bank</h3>
                                             <p>Streamlab is a long established fact that a reader will be distracted by
                                                the readable content of a page when Streamlab at its layout Streamlab.
                                             </p>

                                          </div>
                                          <div class="gen-movie-action">
                                             <div class="gen-btn-container button-1">
                                                <a class="gen-button" href="index.html#" tabindex="0">
                                                   <i aria-hidden="true" class="ion ion-play"></i>
                                                   <span class="text">Play Now</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="slider-item" style="background: url('assets/images/background/asset-23.jpeg')">
                           <div class="gen-slick-slider h-100">
                              <div class="gen-movie-contain h-100">
                                 <div class="container h-100">
                                    <div class="row align-items-center h-100">
                                       <div class="col-lg-6">
                                          <div class="gen-movie-info">
                                             <h3>Love your life</h3>
                                             <p>Streamlab is a long established fact that a reader will be distracted by
                                                the readable content of a page when Streamlab at its layout Streamlab.
                                             </p>

                                          </div>
                                          <div class="gen-movie-action">
                                             <div class="gen-btn-container button-1">
                                                <a class="gen-button" href="index.html#" tabindex="0">
                                                   <i aria-hidden="true" class="ion ion-play"></i>
                                                   <span class="text">Play Now</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="slider-item" style="background: url('assets/images/background/asset-24.jpeg')">
                           <div class="gen-slick-slider h-100">
                              <div class="gen-movie-contain h-100">
                                 <div class="container h-100">
                                    <div class="row align-items-center h-100">
                                       <div class="col-lg-6">
                                          <div class="gen-movie-info">
                                             <h3>The Last Witness</h3>
                                             <p>Streamlab is a long established fact that a reader will be distracted by
                                                the readable content of a page when Streamlab at its layout Streamlab.
                                             </p>

                                          </div>
                                          <div class="gen-movie-action">
                                             <div class="gen-btn-container button-1">
                                                <a class="gen-button" href="index.html#" tabindex="0">
                                                   <i aria-hidden="true" class="ion ion-play"></i>
                                                   <span class="text">Play Now</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="slider-item" style="background: url('assets/images/background/asset-25.jpeg')">
                           <div class="gen-slick-slider h-100">
                              <div class="gen-movie-contain h-100">
                                 <div class="container h-100">
                                    <div class="row align-items-center h-100">
                                       <div class="col-lg-6">
                                          <div class="gen-movie-info">
                                             <h3>Fight For Life</h3>
                                             <p>Streamlab is a long established fact that a reader will be distracted by
                                                the readable content of a page when Streamlab at its layout Streamlab.
                                             </p>

                                          </div>
                                          <div class="gen-movie-action">
                                             <div class="gen-btn-container button-1">
                                                <a class="gen-button" href="index.html#" tabindex="0">
                                                   <i aria-hidden="true" class="ion ion-play"></i>
                                                   <span class="text">Play Now</span>
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Slider Items -->
                     </div>
                     <div class="slider slider-nav">
                        <div class="slider-nav-contain">
                           <div class="gen-nav-img">
                              <img src="assets/images/background/asset-4.jpeg" alt="steamlab-image">
                           </div>
                           <div class="movie-info">
                              <h3>thieve the bank</h3>
                              <div class="gen-movie-meta-holder">
                                 <ul>
                                    <li>30mins</li>
                                    <li>
                                       <a href="action.html">
                                          Action </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="slider-nav-contain">
                           <div class="gen-nav-img">
                              <img src="assets/images/background/asset-23.jpeg" alt="streamlab-image">
                           </div>
                           <div class="movie-info">
                              <h3>Love your life</h3>
                              <div class="gen-movie-meta-holder">
                                 <ul>
                                    <li>1hr 46mins</li>
                                    <li>
                                       <a href="action.html">
                                          Action </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="slider-nav-contain">
                           <div class="gen-nav-img">
                              <img src="assets/images/background/asset-24.jpeg" alt="streamlab-image">
                           </div>
                           <div class="movie-info">
                              <h3>The Last Witness</h3>
                              <div class="gen-movie-meta-holder">
                                 <ul>
                                    <li>1hr 37 mins</li>
                                    <li>
                                       <a href="action.html">
                                          Action </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="slider-nav-contain">
                           <div class="gen-nav-img">
                              <img src="assets/images/background/asset-25.jpeg" alt="streamlab-image">
                           </div>
                           <div class="movie-info">
                              <h3>Fight For Life</h3>
                              <div class="gen-movie-meta-holder">
                                 <ul>
                                    <li>2hr 25 mins</li>
                                    <li>
                                       <a href="action.html">
                                          Action </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Slick Slider End -->

   <!-- owl-carousel Videos Section-3 Start -->
   <section class="gen-section-padding-2 d-none">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <h4 class="gen-heading-title">Watch For Free: Movie Mania</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
               <div class="gen-movie-action">
                  <div class="gen-btn-container text-right">
                     <a href="tv-shows-pagination.html" class="gen-button gen-button-flat">
                        <span class="text">More Videos</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="gen-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                     data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                     data-loop="false" data-margin="30">


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-1.jpeg" alt="owl-carousel-video-images">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">FINDING THE ZODIAC KILLER </a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2hr 13mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-26.jpeg" alt="owl-carousel-video-images">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">Spaceman The Voyager</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1h 32mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-drama movie_tag-4k-ultra movie_tag-brother movie_tag-king movie_tag-premieres">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-27.jpeg" alt="owl-carousel-video-images">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">I Can Only Imagine</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 50mins</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-comedy movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-3.jpeg" alt="owl-carousel-video-images">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">The Express</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2hr 00mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_tag-brother movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-28.jpeg" alt="owl-carousel-video-images">
                                    <div class="gen-movie-add">
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#"><i class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu">
                                             <a class="login-link" href="register.html">Sign
                                                in to add this movie to a playlist.</a>
                                          </div>
                                       </div>
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" aria-label="Like Button"
                                                class="wp_ulike_btn wp_ulike_put_image">
                                             </button>
                                          </div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">Chapter & Verse</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 37 mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Videos Section-3 End -->

   <!-- owl-carousel images Start -->
   <section class="pt-0 gen-section-padding-2 home-singal-silder d-none">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="gen-banner-movies">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="true" data-nav="false" data-desk_num="1"
                     data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                     data-loop="true" data-margin="30">
                     <div class="item" style="background: url('assets/images/background/asset-20.jpeg')">
                        <div class="gen-movie-contain h-100">
                           <div class="container h-100">
                              <div class="row align-items-center h-100">
                                 <div class="col-xl-6">
                                    <div class="gen-movie-info">
                                       <h3>Command in your hand</h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>3 Episode</li>
                                          <li>2013</li>
                                          <li>
                                             <a href="index.html#"><span>Comedy</span></a>
                                          </li>
                                       </ul>
                                       <p>Streamlab is a long established fact that a reader will be distracted by the
                                          readable content of a page when Streamlab at its layout Streamlab.</p>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="single-episode.html" class="gen-button gen-button-dark">
                                             <span class="text">Play now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="item" style="background: url('assets/images/background/asset-21.jpeg')">
                        <div class="gen-movie-contain h-100">
                           <div class="container  h-100">
                              <div class="row align-items-center h-100">
                                 <div class="col-xl-6">
                                    <div class="gen-movie-info">
                                       <h3>stories of the dark</h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>5 Episode</li>
                                          <li>2015 to 2016</li>
                                          <li>
                                             <a href="index.html#"><span>Biography</span></a>
                                          </li>
                                       </ul>
                                       <p>Streamlab is a long established fact that a reader will be distracted by the
                                          readable content of a page when Streamlab at its layout Streamlab.</p>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container button-1">
                                          <a href="single-episode.html" class="gen-button gen-button-dark">
                                             <span class="text">Play now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="item" style="background: url('assets/images/background/asset-37.jpeg')">
                        <div class="gen-movie-contain h-100">
                           <div class="container  h-100">
                              <div class="row align-items-center h-100">
                                 <div class="col-xl-6">
                                    <div class="gen-movie-info">
                                       <h3>Against Beast</h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1 Season</li>
                                          <li>1 Episode</li>
                                          <li>2017 to 2018</li>
                                          <li>
                                             <a href="index.html#"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                       <p>Streamlab is a long established fact that a reader will be distracted by the
                                          readable content of a page when Streamlab at its layout Streamlab.</p>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container button-1">
                                          <a href="single-episode.html" class="gen-button gen-button-dark">
                                             <span class="text">Play now</span>
                                          </a>
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
   </section>
   <!-- owl-carousel images End -->

   <!-- owl-carousel Videos Section-4 Start -->
   <section class="pt-0 gen-section-padding-2 d-none">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
               <h4 class="gen-heading-title">All Time Hits</h4>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
               <div class="gen-movie-action">
                  <div class="gen-btn-container text-right">
                     <a href="tv-shows-pagination.html" class="gen-button gen-button-flat">
                        <span class="text">More Videos</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-12">
               <div class="gen-style-2">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                     data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                     data-loop="false" data-margin="30">
                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-10.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">skull of myths</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 24mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>

                     <div class="item">
                        <div class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-12.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">common man's idea</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 51mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-drama movie_tag-4k-ultra movie_tag-brother movie_tag-king movie_tag-premieres">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-29.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">shimu the elephant</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 54mins</li>
                                          <li>
                                             <a href="drama.html"><span>Drama</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-comedy movie_tag-4k-ultra movie_tag-brother movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-30.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">war of rejonse</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2hr 20mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_tag-brother movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-31.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">the big sick</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2hr 00mins</li>
                                          <li>
                                             <a href="horror.html"><span>Horror</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-mystery movie_tag-brother movie_tag-hero movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-24.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">the last witness</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 37mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-romance movie_tag-4k-ultra movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-32.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">love, simon</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1hr 50mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-romance movie_tag-4k-ultra movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-33.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">black water</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>1h 44mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>


                     <div class="item">
                        <div
                           class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-sci-fi movie_tag-brother movie_tag-king movie_tag-premieres movie_tag-viking">
                           <div class="gen-carousel-movies-style-2 movie-grid style-2">
                              <div class="gen-movie-contain">
                                 <div class="gen-movie-img">
                                    <img src="assets/images/background/asset-34.jpeg" alt="owl-carousel-video-image">
                                    <div class="gen-movie-add">
                                       <div class="wpulike wpulike-heart">
                                          <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                                type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                       </div>
                                       <ul class="menu bottomRight">
                                          <li class="share top">
                                             <i class="fa fa-share-alt"></i>
                                             <ul class="submenu">
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="index.html#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                             </ul>
                                          </li>
                                       </ul>
                                       <div class="movie-actions--link_add-to-playlist dropdown">
                                          <a class="dropdown-toggle" href="index.html#" data-toggle="dropdown"><i
                                                class="fa fa-plus"></i></a>
                                          <div class="dropdown-menu mCustomScrollbar">
                                             <div class="mCustomScrollBox">
                                                <div class="mCSB_container">
                                                   <a class="login-link" href="register.html">Sign in to add this movie
                                                      to a
                                                      playlist.</a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <a href="single-movie.html" class="gen-button">
                                          <i class="fa fa-play"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                       <h3><a href="single-movie.html">bad genius</a>
                                       </h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul>
                                          <li>2hr 10mins</li>
                                          <li>
                                             <a href="action.html"><span>Action</span></a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- #post-## -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Videos Section-4 End -->



   <script type="text/javascript">
   var addFavorite = function(id, type, slug){
        swal({
            title: "Add Favorite?",
            text: "This will add item to  your favorites!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Favorite",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/users/add_favorite/' +  type + '/' + slug,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                           // $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Favorited',
                                text: 'The video has been added to favorites!',
                                type: 'success'
                            });

                            $('#favorite_btn_' + id).addClass('d-none');
                            $('#unfavorite_btn_' + id).removeClass('d-none');
                        }
                    });
            }
            return false;
        });
    }

    var unFavorite = function(type, id){
        swal({
            title: "Remove Favorite?",
            text: "This will remove this item from your favorites!",
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
                        url: '/users/un_favorite/' + type + '/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Item Removed',
                                text: 'The item has been removed from favorites!',
                                type: 'success'
                            });
                            window.location = "/favorites";
                        }
                    });
            }
            return false;
        });
    }
</script>