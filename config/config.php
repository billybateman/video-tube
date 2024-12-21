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

define('YOUTUBE_API', 'AIzaSyBm67L-QZEOUr4WPMfo0-72c9a8siNc6v0');
define('TMDB_API', '466bc453a3183a37632fcc3b0356d04a');
define('TMDB_API_READ_ACCESS', 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0NjZiYzQ1M2EzMTgzYTM3NjMyZmNjM2IwMzU2ZDA0YSIsIm5iZiI6MTcyNzA3NDc3Ni42NjQzMzgsInN1YiI6IjY2ZjExMDc1MDMxNWI5MWY0NjNhZjUwMyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.01sZCe4QyltwIX_8Y60LMbus2mpDLlZ771ed25kWAic');

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