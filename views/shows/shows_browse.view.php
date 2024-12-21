 <!-- breadcrumb -->
 <div class="gen-breadcrumb" style="background-image: url('/assets/images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                TV Shows
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">TV Show</li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- Section-1 Start -->
    <section class="gen-section-padding-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gen-style-1">
                        <div class="row">

                             <?php foreach($shows_data as $show){
                                $show = (array) $show;
                                ?> 
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="<?php echo $show['thumbnail']; ?>" alt="<?php echo $show['name']; ?>">
                                            <div class="gen-movie-add">
                                                <div class="wpulike wpulike-heart d-none">
                                                    <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                        <button type="button"
                                                            class="wp_ulike_btn wp_ulike_put_image"></button>
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
                                                <div class="movie-actions--link_add-to-playlist dropdown">
                                                    <?php if(isset($user)){ ?>
                                                        <a class="dropdown-toggle <?php if(isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="favorite_btn_<?php echo $show['id']; ?>" href="#" onclick="addFavorite('<?php echo $show['id']; ?>', '<?php echo $show['slug']; ?>');"><i  class="fa fa-plus"></i></a>
                                                        <a class="dropdown-toggle <?php if(!isset($show['favorites_id'])){ ?>d-none<?php } ?>" id="unfavorite_btn_<?php echo $show['id']; ?>" href="#" onclick="unFavorite('<?php echo $show['id']; ?>', '<?php echo $show['slug']; ?>');"><i style="color:red;" class="fa fa-heart"></i></a>
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
                                                <h3><a href="/shows/watch/<?php echo $show['slug']; ?>"><?php echo $show['name']; ?></a></h3>
                                            </div>
                                            <div class="gen-movie-meta-holder">
                                                <ul>
                                                    <li><?php echo $show['seasons']; ?> Season<?php if($show['seasons'] > 1){ echo "s"; } ?></li>
                                                    <li>
                                                        <a href="/shows/category/<?php echo $show['categories_slug']; ?>"><span><?php echo $show['categories_name']; ?></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                <div class="gen-pagination">
                        <?php
                            $totalPages = $total_rows / $per_page;
                            $current = ($start / $per_page) + 1;
                            
                            if($totalPages > 1){
                        ?>
                        <nav aria-label="Page navigation">
                            
                            <ul class="page-numbers">
                                <?php
                                for($i = 1; $i < $totalPages; $i++){
                                ?>
                                <li><a <?php if($current == $i){ ?>aria-current="page" class="page-numbers current"
                                    <?php } else { ?>
                                        class="page-numbers"
                                        <?php } ?> 
                                        href="/shows/browse/<?php echo ($i - 1) * $per_page; ?>/"><?php echo $i; ?></a></li>
                                <?php
                                }
                                ?>
                                <li><a class="next page-numbers" href="/shows/browse/<?php echo ($current) * $per_page; ?>/">Next page</a></li>
                            </ul>
                        </nav>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section-1 End -->


    <script type="text/javascript">
   var addFavorite = function(id, slug){
        swal({
            title: "Add Favorite?",
            text: "This will add show to  your favorites!",
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
                        url: '/users/add_favorite/shows/' + slug,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                           // $('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Show Favorited',
                                text: 'The show has been added to favorites!',
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
            text: "This will remove this show from your favorites!",
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
                        url: '/users/un_favorite/shows/' + slug,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Show Removed',
                                text: 'The item has been removed from favorites!',
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