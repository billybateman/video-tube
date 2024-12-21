<?php

require_once('scandir.class.php');

class autoLoader {

    public static $instance;
    
    /* put the custom functions in the autoload register when the class is initialized */

    private function __construct() {
        
    }

    /* initialize the autoloader class */

    public static function init() {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /* throw error if the class cannot be found */

    public static function load() {
        $_src = array(ROOT.'/system/core/', ROOT.'/system/helpers/', ROOT.'/system/library/', __APP_PATH . '/models', __APP_PATH . '/libraries');
        $_ext = array('php', 'class.php', 'model.php', 'driver.php', 'helper.php', 'controller.php');

        $files = scanDir::scan($_src, $_ext, true);
        
        foreach ($files as $file) {
            if (file_exists($file)) {
                require_once($file);
            }
        }
    }

}

?>