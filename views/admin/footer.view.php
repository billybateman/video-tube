				
                   
                
                </div>
				<!-- end main content-->

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!--**********************************
            Chat box start
        ***********************************-->
        <div class="chatbox" id="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">
                <!--<ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="/assets/admin/index.html#notes">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="/assets/admin/index.html#alerts">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="/assets/admin/index.html#chat">Chat</a>
                    </li>
                </ul>
                -->
                <div id="chat">
                    <div class="mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                        <div class="card-header chat-list-header">
                            <div>
                                <h6 class="mb-1">Chats</h6>
                            </div>
                            <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                        </div>
                        <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                            <ul class="contacts">
                                <?php foreach($users_online as $chat_user){ 
                                    $chat_user = (array) $chat_user;
                                    
                                    
                                    $chat_image = "/assets/admin/images/no-img-avatar.png";

                                    if(isset($chat_user['images_file'])){
                                        $chat_image = $chat_user['images_file'];
                                    }
                                    ?>
                                <li class="active dz-chat-user" onclick="loadChat('<?php echo $chat_user['users_id']; ?>');">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="<?php echo $chat_image; ?>" class="rounded-circle user_img" alt=""/>
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span><?php echo $chat_user['users_first_name']; ?> <?php echo $chat_user['users_last_name']; ?></span>
                                            <p>last message here</p>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="chat dz-chat-history-box d-none">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0)" class="dz-chat-history-back">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
                            </a>
                            <div>
                                <h6 class="mb-1"><div id="chat_user_lbl"></div></h6>
                                <input type="hidden" id="chat_user_id" name="chat_user_id">
                                <p class="mb-0 text-success d-none">Online</p>
                            </div>							
                            <div class="dropdown">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to close friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
                            
                        </div>
                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <textarea id="chat_message" class="form-control" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <button onclick="sendChat();" type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!--**********************************
            Chat box End
        ***********************************-->




        

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto" id="right-bar-toggle">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
            
                    <h6 class="mt-4 mb-3">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fluid" value="fluid" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fluid">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <div id="sidebar-setting">
                    <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>
                </div>

                    <h6 class="mt-4 mb-3">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


       

        <!-- JAVASCRIPT -->


        <!-- Bootstrap JS -->
        <script src="/assets/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Metismenu Js -->
        <script src="/assets/admin/assets/libs/metismenujs/metismenujs.min.js"></script>

        <!-- Simplebar Js -->
        <script src="/assets/admin/assets/libs/simplebar/simplebar.min.js"></script>

        <!-- Feather Js -->
        <script src="/assets/admin/assets/libs/feather-icons/feather.min.js"></script>

        <link href="/assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>	
        <script src="/assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        
        <script src="/assets/admin/plugins/toastr/toastr.min.js"></script>
        <link href="/assets/admin/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

        <script src="/assets/admin/js/pusher.min.js"></script>


        <script src="/assets/admin/assets/js/app.js"></script>

        <script src="/assets/admin/js/custom.js"></script>

		
       

		<script>
			$(document).ready(function(){
			
				loadContent("/admin/shows");

				$('body').on('click', 'a.content-loader', function(event) {
                    $('#main-content').html('');
                    $('#preloader').removeClass('d-none');
					//alert("As you can see, the link no longer took you to jquery.com");
					var href = $(this).attr('href');
					//alert(href);
					loadContent('' + href);
					event.preventDefault();
				});


                Pusher.logToConsole = false;

                var pusher = new Pusher('39a244028797e5d6a10e', {cluster: 'us3'});

                var channel = pusher.subscribe('<?php echo $user['users_id']; ?>-channel');
                channel.bind('message-event', function(data) {
                    console.log(JSON.stringify(data));
                    console.log(data.users_chats_users_id);
                    if(data.users_chats_users_id == $('#chat_user_id').val()){
                        console.log("here");
                        var msg = '<div class="d-flex justify-content-start mb-4">';
                        msg += '<div class="img_cont_msg">';
                        msg += '<img src="' + data.users_chats_users_image + '" class="rounded-circle user_img_msg" alt=""/>';
                        msg += '</div>';
                        msg += '<div class="msg_cotainer">';
                        msg +=  data.users_chats_message;
                        msg += '<span class="msg_time">Now</span>';
                        msg += '</div>';
                        msg += '</div>';
                        console.log(msg);
                        $('#DZ_W_Contacts_Body3').html($('#DZ_W_Contacts_Body3').html() + msg); // update the DIV
                        $("#DZ_W_Contacts_Body3").animate({ scrollTop: $('#DZ_W_Contacts_Body3')[0].scrollHeight}, 1000);
             
                    }

                        
                });


			});

            

			function loadContent(url){
				$('#main-content').delay( 800 ).load(url);
                //$('#preloader').addClass('d-none');
                //$('#main-content').scrollTop(0);
                var body = $("#main-content");
                body.stop().animate({scrollTop:0}, 500, 'swing', function() { 
                
                });

			}

            function loadChat(id){
				$('#DZ_W_Contacts_Body3').load('/admin/chats/get_chats/' + id, function() {
                // Code to execute after content is loaded
                    console.log("Content loaded successfully!");
                    $("#DZ_W_Contacts_Body3").animate({ scrollTop: $('#DZ_W_Contacts_Body3')[0].scrollHeight}, 1000);
         
                });
                //$('#main-content').scrollTop(0);
                 }

            function sendChat(){

                var id = $('#chat_user_id').val();
                var message = $('#chat_message').val();


                var FormValues = new FormData();
                FormValues.append('users_chats_to_users_id', id);
                FormValues.append('users_chats_message', message);

                $.ajax({ // create an AJAX call...
                    type: 'POST',
                    url: '/admin/chats/send_chat/',
                    enctype: 'multipart/form-data',
                    data: FormValues,
                    processData: false,
                    contentType: false,
                    success: function(response) { // on success..
                        $('#chat_message').val('')
                        $('#DZ_W_Contacts_Body3').html(response); // update the DIV
                        $("#DZ_W_Contacts_Body3").animate({ scrollTop: $('#DZ_W_Contacts_Body3')[0].scrollHeight}, 1000);
                    }
                });

			}



			</script>

    </body>
</html>