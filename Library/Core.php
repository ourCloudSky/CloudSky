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

    class Core {

        const VERSION = "0.1.0-alpha";

        public static function base($str = "") { return (dirname(__DIR__) . $str); }

        /**
         * Event Emitter
         */
        public static $event = false;
        public static function event(){ return self::$event; }
        public static function _event($d) { if(self::$event === false) self::$event = $d; }

        /**
         * Container
         */
        public static $container = false;
        public static function container(){ return self::$container; }
        public static function _container($d) { if(self::$container === false) self::$container = $d; }

        /**
         * Method
         */
        public static $method = false;
        public static function method(){ return self::$method; }
        public static function _method($d) { if(self::$method === false) self::$method = $d; }

        /**
         * Package
         */
        public static $package = [];
        public static function package($name) { return (self::$package[$name] ?? false); }

        /**
         * Components
         */
        public static function error($type, $msg) { echo "[$type] $msg \r\n"; }

    }
