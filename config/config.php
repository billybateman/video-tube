<?php

ini_set('error_reporting', E_STRICT);

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

if(DEVELOPMENT_ENVIRONMENT){
    define('DB_NAME', 'yourowntv');
    define('DB_USER', 'yourowntv');
    define('DB_PASSWORD', 'phZ964jk!2024');
    define('DB_HOST', 'localhost');
    define('DS', '/');
} else {
    define('DB_NAME', 'yourowntv');
    define('DB_USER', 'yourowntv');
    define('DB_PASSWORD', 'phZ964jk!2024');
    define('DB_HOST', 'localhost');
    define('DS', '/');
}
define('BASEPATH', __APP_PATH);
define('CDN_FOLDER', __APP_PATH."/cdn");
define('CDN_URL', "/cdn");
define('_NO_REPLY_EMAIL', 'no-reply@yourowntv.com');
define('_NO_REPLY_NAME', 'YourOwnTV');


$config['libraries'] =  array('session');
$config['models'] =  array(
    'usersmodel', 
    'users_types_model',
    'videos_model',
    'videoProgress_model',
    'channels_model', 
    'categories_model', 
    'entities_model',
    'notifications_model',
    'images_model',
    'sites_model',
    'shows_model',
    'movies_model',
    'users_online_model',
    'files_model',
    'favorites_model',
    'subscriptions_model',
    'videoProgress_model',
    'playlists_model'

);
$config['helpers'] =  array('urlhelper');

?>
