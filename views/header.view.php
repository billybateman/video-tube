<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="YourOwnTV">
      <meta name="author" content="YourOwnTV">
      <title>YourOwnTV</title>
      <link rel="icon" type="image/png" href="/assets/frontend/images/favicon.png">
      <link href="/assets/frontend/css/bootstrap.min.css" rel="stylesheet">
      <link href="/assets/frontend/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="/assets/frontend/css/osahan.css" rel="stylesheet">
      <link rel="stylesheet" href="/assets/frontend/css/owl.carousel.css">
      <link rel="stylesheet" href="/assets/frontend/css/owl.theme.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="/assets/frontend/js/jquery.min.js" type="text/javascript"></script>
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
         &nbsp;&nbsp;
         <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
         <i class="fas fa-bars"></i>
         </button> &nbsp;&nbsp;
         <a class="navbar-brand mr-1" href="/"><img class="img-fluid" alt="" src="/assets/images/logo-1.png"></a>
         <form class="d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="button">
                  <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            
            <li class="nav-item dropdown no-arrow mx-1 d-none">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger">9+</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1 d-none">
               <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-envelope fa-fw"></i>
               <span class="badge badge-success">7</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li>

                        <?php
                        if(!isset($user)){
                        ?>
               <li class="nav-item mx-1 ">
                  <a href="/login" class="btn btn-sm btn-success" style="margin-top:10px;">Login</a>
               </li>         
                        <?php } else { ?>
                            <?php
                           $profile_image = "";
                           if(isset($user['images_file'])){
                              $profile_image = $user['images_file'];
                           }
                        ?>
                       <li class="nav-item mx-1 dropdown no-arrow">
               <a class="nav-link dropdown-toggle" id="createDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-plus-circle fa-fw"></i>
               Create
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="createDropdown">
                  <a class="dropdown-item" href="/upload"><i class="fas fa-fw fa-user-circle"></i> &nbsp; upload</a>
                <a class="dropdown-item " href="/create_channel"><i class="fas fa-fw fa-video"></i> &nbsp; channel</a>
                             
               </div>
            </li>
                        <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
                           <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img alt="Avatar" src="<?php echo $profile_image; ?>">
                          <?php echo  $user['users_first_name']; ?> <?php echo  $user['users_last_name']; ?> 
                           </a>
                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                              <?php
                                 if($user['users_types_id'] == 1 || $user['users_types_id'] == 2){
                                    ?>
                                     <a class="dropdown-item" href="/admin"> <i class="fa fa-plus"></i> Admin </a>
                                    <?php
                                 }
                              ?>
                              <a class="dropdown-item" href="/profile"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
                              <a class="dropdown-item " href="/subscriptions"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>
                              <a class="dropdown-item " href="/history"><i class="fas fa-fw fa-history"></i> &nbsp; History</a>
                              <a class="dropdown-item " href="/content"><i class="fas fa-fw fa-file"></i> &nbsp; Content</a>
                              <a class="dropdown-item d-none" href="/settings"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
                           </div>
                        </li>
                        <?php } ?>
            
         </ul>
      </nav>
      <div id="wrapper">
         <ul class="sidebar navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="/">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/channels">
               <i class="fas fa-fw fa-users"></i>
               <span>Channels</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/videos">
               <i class="fas fa-fw fa-video"></i>
               <span>Videos</span>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="/categories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <?php foreach($categories_data as $category){ ?>
                     <a class="dropdown-item" href="/videos/category/<?php echo $category->categories_slug; ?>"><?php echo $category->categories_name; ?></a>
                  <?php } ?>
               </div>
            </li>
            <?php
               if(isset($user)){
               ?>
            <li class="nav-item">
               <a class="nav-link" href="/history">
               <i class="fas fa-fw fa-history"></i>
               <span>History Page</span>
               </a>
            </li>
            <li class="nav-item channel-sidebar-list">
               <h6>SUBSCRIPTIONS</h6>
               <ul>
                  <?php foreach($subscriptions_data as $subscription){ 
                     //var_dump($subscription->channels_users_info);
                     $thumbnail = $subscription->channels_users_info->images_file; 
                  ?>
                  <li>
                     <a href="/channels/view/<?php echo $subscription->channels_slug; ?>">
                     <img class="img-fluid" alt="" src="<?php echo $thumbnail; ?>"> <span><?php echo  $subscription->channels_name; ?></span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
         </ul>