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

    namespace Packages\CloudSky;

    use \CloudSky\Core;
    use \CloudSky\Method;

    Core::event()->addListener("system.core.startup", function($event){
        Core::event()->emit("cloudsky.daemon.startup");

        Core::event()->emit("cloudsky.daemon.ready");
    });

    Core::event()->addListener("system.core.shutdown", function($event){
        Core::event()->emit("cloudsky.daemon.shutdown");
    });

    Core::event()->addListener("system.core.autoload", function($event, $name){

        if(substr($name, 0, 8) == "CloudSky"){
            if(\CloudSky\Autoload::lib('CloudSky', substr($name, 9))){
                $event->stopPropagation();
                return true;
            }else{
                return false;
            }
        }

    });

    Core::event()->addListener("system.method.register", function($event){

        Core::method()->register('version', [], Method::fromFile('CloudSky/version.php'));
        Core::method()->register('hello', [], Method::fromClosure(function($root, $args){
            return 'world';
        }));

    });
