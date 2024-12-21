
<div class="gen-breadcrumb" style="background-image: url('/assets/images/background/asset-25.jpeg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                Favorites
                            </h1>
                        </div>
                        <div class="gen-breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"><i
                                            class="fas fa-home mr-2"></i>Home</a></li>
                                <li class="breadcrumb-item active">Favorites</li>
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
                            <?php if(count($favorites) == 0){ ?> <div class="col-xl-3 col-lg-4 col-md-6">You have not added any favorites!</div><?php } ?>
                             <?php foreach($favorites as $favorite){
                                $favorite = (array) $favorite;
                                ?> 
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="gen-carousel-movies-style-1 movie-grid style-1">
                                    <div class="gen-movie-contain">
                                        <div class="gen-movie-img">
                                            <img src="<?php echo $favorite['thumbnail']; ?>" alt="<?php echo $favorite['name']; ?>">
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
                                                    <a class="dropdown-toggle" onclick="unFavorite('<?php echo $favorite['favorites_type']; ?>', '<?php echo $favorite['favorites_media_id']; ?>');" href="#"><i
                                                            class="fa fa-minus"></i></a>
                                                </div>
                                            </div>
                                            <div class="gen-movie-action">
                                                <a href="/<?php echo $favorite['favorites_type']; ?>/watch/<?php echo $favorite['favorites_media_id']; ?>" class="gen-button">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="gen-info-contain">
                                            <div class="gen-movie-info">
                                                <h3><a href="/<?php echo $favorite['favorites_type']; ?>/watch/<?php echo $favorite['favorites_media_id']; ?>"><?php echo $favorite['name']; ?></a></h3>
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

<script type="text/javascript">
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