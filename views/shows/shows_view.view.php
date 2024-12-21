 <!-- Single-tv-Shows -->
  <?php 

//var_dump($shows_data);

?>
 <section class=" gen-section-padding-3">
        <div class="tv-single-background">
            <img src="<?php if($data['cover'] == ""){ $data['cover'] = $data['thumbnail']; } echo $data['cover']; ?>" alt="stream-lab-image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-tv-show-wrapper style-1">
                        <div class="gen-tv-show-top">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="gentech-tv-show-img-holder">
                                        <img src="<?php echo $data['thumbnail']; ?>" alt="stream-lab-image">
                                    </div>
                                </div>
                                <div class="col-sm-8 align-self-center">
                                    <div class="gen-single-tv-show-info">
                                        <h2 class="gen-title"><?php echo $data['name']; ?></h2>
                                        <div class="gen-single-meta-holder">
                                            <ul>
                                                <li><?php echo $data['seasons']; ?> Seasons</li>
                                                <li><?php echo $data['episodes']; ?>  Episodes</li>
                                                <li><?php echo $data['years']; ?> </li>
                                                <li>
                                                    <a href="#"><span><?php echo $data['categories_name']; ?> </span></a>
                                                </li>
                                                <li>
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    <span><?php echo $data['views']; ?> Views</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <p><?php echo $data['description']; ?> </p>
                                        <div class="gen-socail-share mt-0">
                                            <h4 class="align-self-center">Social Share :</h4>
                                            <ul class="social-inner">
                                                <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                                </li>
                                                <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gen-season-holder">
                            <ul class="nav">
                              <?php $first = true;
                                 foreach( $shows_data as $season){ 
                                    if(isset($season[0]->season)){
                                    $season = $season[0]->season; ?>
                                 <li class="nav-item">
                                    <a class="nav-link <?php if($first){ ?>active show<?php } $first = false;?>" data-toggle="tab" href="#season_<?php echo $season; ?>">Season <?php echo $season; ?></a>
                                </li>
                              <?php } } ?>
                                 
                            </ul>
                            <div class="tab-content">
                            <?php $first = true;
                                 foreach( $shows_data as $seasons){ 
                                    if(isset($seasons[0]->season)){
                                    $season = $seasons[0]->season;
                                     ?>
                                          <div id="season_<?php echo $season; ?>" class="tab-pane  <?php if($first){ ?>active show<?php } $first = false;?>">
                                                <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true"
                                                   data-desk_num="4" data-lap_num="3" data-tab_num="2" data-mob_num="1"
                                                   data-mob_sm="1" data-autoplay="false" data-loop="false" data-margin="30">
                                                   
                                                  <?php  foreach($seasons as $episode){ ?>
                                                   <div class="item">
                                                      <div class="gen-episode-contain">
                                                            <div class="gen-episode-img">
                                                               <img src="<?php echo $episode->thumbnail; ?>" alt=" <?php echo $episode->title; ?>">
                                                               <div class="gen-movie-action">
                                                                  <a href="/video/watch/<?php echo $episode->slug; ?>" class="gen-button">
                                                                        <i class="fa fa-play"></i>
                                                                  </a>
                                                               </div>
                                                            </div>
                                                            <div class="gen-info-contain">
                                                               <div class="gen-episode-info">
                                                                  <h3>
                                                                        S<?php echo $episode->season; ?>E<?php echo $episode->episode; ?> <span>-</span>
                                                                        <a href="/video/watch/<?php echo $episode->slug; ?>">
                                                                        <?php echo $episode->title; ?>
                                                                        </a>
                                                                  </h3>
                                                               </div>
                                                               <div class="gen-single-meta-holder">
                                                                  <ul>
                                                                        <li class="run-time d-none">40min</li>
                                                                        <li class="release-date">
                                                                        <?php echo $episode->releaseDate; ?>
                                                                        </li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <?php } ?>
                                                </div>
                                          </div>
                                <?php } } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="pm-inner">
                        <div class="gen-more-like">
                            <h5 class="gen-more-title">More Like This</h5>
                            <div class="row post-loadmore-wrapper">
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-14.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Ghost of Sky</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-15.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Love In 21st</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-16.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Family Love</a></h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                    <ul>
                                                        <li>0 Seasons</li>
                                                        <li>
                                                            <a href="action.html"><span>Action</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-17.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Dance nation Dance</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-18.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Vacation Life</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-19.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Dream Of Dargons</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-20.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Command In Your Hand</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-21.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Stories Of the Dark</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-13.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">Friend Of Jin</a></h3>
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
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                        <div class="gen-movie-contain">
                                            <div class="gen-movie-img">
                                                <img src="assets/images/background/asset-22.jpeg" alt="streamlab-image">
                                                <div class="gen-movie-add">
                                                    <div class="wpulike wpulike-heart">
                                                        <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                            <button type="button"
                                                                class="wp_ulike_btn wp_ulike_put_image"></button>
                                                        </div>
                                                    </div>
                                                    <ul class="menu bottomRight">
                                                        <li class="share top">
                                                            <i class="fa fa-share-alt"></i>
                                                            <ul class="submenu">
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-instagram"></i></a>
                                                                </li>
                                                                <li><a href="single-tv-shows.html#" class="facebook"><i
                                                                            class="fab fa-twitter"></i></a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                                        <a class="dropdown-toggle" href="single-tv-shows.html#" data-toggle="dropdown"><i
                                                                class="fa fa-plus"></i></a>
                                                        <div class="dropdown-menu mCustomScrollbar">
                                                            <div class="mCustomScrollBox">
                                                                <div class="mCSB_container">
                                                                    <a class="login-link" href="single-tv-shows.html#">Sign in to add this
                                                                        movie to a
                                                                        playlist.</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gen-movie-action">
                                                    <a href="tv-shows-home.html" class="gen-button">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gen-info-contain">
                                                <div class="gen-movie-info">
                                                    <h3><a href="tv-shows-home.html">3 Hacker:TBG</a></h3>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="gen-movie-action">
                        <div class="gen-btn-container">
                            <a href="single-tv-shows.html#" class="gen-button">
                                <span class="text">Load More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single-tv-Shows -->

    <script type="text/javascript">
   var addFavorite = function(id, slug){
        swal({
            title: "Add Favorite?",
            text: "This will add video to  your favorites!",
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
                        url: '/users/add_favorite/video/' + slug,
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

    var unFavorite = function(id, slug){
        swal({
            title: "Remove Favorite?",
            text: "This will remove this video from your favorites!",
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
                        url: '/users/un_favorite/video/' + slug,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Removed',
                                text: 'The video has been removed from favorites!',
                                type: 'success'
                            });
                            
                            $('#unfavorite_btn_' + id).addClass('d-none');
                            $('#favorite_btn_' + id).removeClass('d-none');
                            
                        }
                    });
            }
            return false;
        });
    }
</script>