<?php

/**
 * Created by PhpStorm.
 * User: Peace Ngara
 * Date: 25/06/2017
 * Time: 04:34
 * This is the Class that bootstraps the whole application, this is the glue between
 * controllers, views etc.
 *
 */
class Framework

{
    #Init App
    public static function run() {
        //Start the Engine
        self::init();
        self::autoload();
        self::dispatch();

    }

    # Define constants
    public static function init() {
        // Define path constants
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", getcwd() . DS);
        define("APP_PATH", ROOT . 'app' . DS);
        define("FRAMEWORK_PATH", ROOT . "jumocore" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("CLASSES_PATH", APP_PATH . "classes" . DS);
        define("BIN_PATH", CLASSES_PATH . "bin" . DS);
        define("READERS_PATH", CLASSES_PATH . "readers" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);
        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add
        define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
        define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');
        define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');
        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . DS);
        define("CURR_VIEW_PATH", VIEW_PATH . DS);
        // Load core classes
        require FRAMEWORK_PATH . "Controller.php";
        require FRAMEWORK_PATH . "Loader.php";
        // Load configuration file
        $GLOBALS['config'] = include CONFIG_PATH . "config.php";
        // Start session
        session_start();
    }


    public static function autoload() {
        spl_autoload_register(array(__CLASS__,'load'));
    }
    // Define a custom load method

    private static function load($classname)
    {
        if (substr($classname, -10) == "Controller") {
            require_once CURR_CONTROLLER_PATH . "$classname.php";
        }
    }

    // Routing Design
    public static function dispatch() {
        $controller_name = CONTROLLER . "Controller";
        $action_name = ACTION . "Action";
        $controller = new $controller_name;
        $controller->$action_name();
    }

}