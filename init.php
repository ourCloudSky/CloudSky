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

    require_once("vendor/autoload.php");

    use \League\Event\Emitter;
    use \League\Container\Container;

    require_once("Library/Core.php");
    Core::_event(new Emitter); Core::_container(new Container);

    require_once("Library/autoload.php");

    Core::$package['CloudSky'] =
        new Package('CloudSky', true, json_decode(Core::base('/etc/CloudSky/packages/CloudSky.json')));
    foreach(Core::package('CloudSky')->config('packages')->enabled as $v){
        Package::factory($v);
    }

    Core::_method(new Method);

    Core::event()->emit("system.core.startup");
    Core::event()->emit("system.method.register");

    //echo Core::method()->get("version")['callback'](1, 2);
