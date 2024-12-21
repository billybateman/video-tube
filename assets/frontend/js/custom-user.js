(function($) {
    "use strict";
    $(document).on('click', '#sidebarToggle', function(e) {
        e.preventDefault();
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
    });
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
        if ($window.width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });
    const objowlcarousel = $('.owl-carousel-category');
    if (objowlcarousel.length > 0) {
        objowlcarousel.owlCarousel({
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                },
                1200: {
                    items: 8,
                },
            },
            loop: true,
            lazyLoad: true,
            autoplay: false,
            autoplaySpeed: 1000,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            nav: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        });
    }
    const mainslider = $('.owl-carousel-login');
    if (mainslider.length > 0) {
        mainslider.owlCarousel({
            items: 1,
            lazyLoad: true,
            loop: true,
            autoplay: false,
            autoplaySpeed: 1000,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
        });
    }
    $('[data-toggle="tooltip"]').tooltip()
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });



    
})(jQuery);



var addFavorite = function(id){
        swal({
            title: "Add Favorite?",
            text: "This will add video to your favorites!",
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
                        url: '/users/add_favorite/videos/' + id,
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

    var unFavorite = function(id){
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
                        url: '/users/un_favorite/videos/' + id,
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

    var addPlaylist = function(id){

        getPlaylists(id);

    }

    var getPlaylists = function(id){
        $.ajax({ // create an AJAX call...
            type: 'GET',
            url: '/users/get_playlists/' + id,
            processData: false,
            contentType: false,
            success: function(response) { // on success..
                
                $("body").append(response);
            }
        });

    }
    
    
    var addSubscribe = function(id){
       
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

    var removeHistory = function(id){
        swal({
            title: "Remove History?",
            text: "This will remove this video from your history!",
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
                        url: '/users/remove_history/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Removed',
                                text: 'The video has been removed from history!',
                                type: 'success'
                            });
                            
                           window.location.reload();
                            
                        }
                    });
            }
            return false;
        });
    }


    var addHistory = function(id){
        
        $.ajax({ // create an AJAX call...
            type: 'GET',
            url: '/users/add_history/' + id,
            processData: false,
            contentType: false,
            success: function(response) { // on success..
                
            }
        });
            
    }


    var deleteVideo = function(id){
        swal({
            title: "Delete Video?",
            text: "This will delete this video and all associated data!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/videos/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Video Deleted',
                                text: 'The video has been deleted!',
                                type: 'success'
                            });
                            
                           window.location.reload();
                            
                        }
                    });
            }
            return false;
        });
    }


    var deleteChannel = function(id){
        swal({
            title: "Delete Channel?",
            text: "This will delete this channel!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel"
        }).then((value) => {
            
            if (value .value) {
            // Add Your Custom Code for CRUD
                    $.ajax({ // create an AJAX call...
                        type: 'GET',
                        url: '/channels/delete/' + id,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                            //$('#main-content').html(response); // update the DIV
                            swal({
                                title: 'Channel Deleted',
                                text: 'The channel has been deleted!',
                                type: 'success'
                            });
                            
                           window.location.reload();
                            
                        }
                    });
            }
            return false;
        });
    }