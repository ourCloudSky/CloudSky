<?php
    /**
     * THIS FILE IS A PART OF
     * *** CloudSky ***.
     * Licensed under MIT.
     *
     * @author xtl<xtl@xtlsoft.top>
     * @package cloudsky
     * @license MIT
     *
     */

    namespace CloudSky;

    /** System Library Loader **/
    Core::event()->addListener('system.core.autoload', function($event, $name){
        //echo Core::base('/Library/') . substr($name, 8) . PHP_EOL;
        if(Autoload::safeRequire(Core::base('/Library/') . substr($name, 9) . '.php')){
            $event->stopPropagation();
            return true;
        }else{
            return false;
        }
    });

    class Autoload{

        public static function load($name){

            $name = str_replace("\\", "/", $name);
            //$namea = explode("/", $name);
            //if($namea[0] == "CloudSky"){
            return Core::event()->emit('system.core.autoload', $name);
            //}else{
            //    return false;
            //}

        }

        public static function safeRequire($name){
            return (is_file($name) ? require_once($name) : false);
        }

        public static function lib($pkg, $name){

            return self::safeRequire(Core::base("/lib/") . $pkg . '/' . $name . '.php');

        }

    }

    spl_autoload_register("\\CloudSky\\Autoload::load");
