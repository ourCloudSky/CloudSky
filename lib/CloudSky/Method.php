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

    class Method {

        protected $methods = [];

        public function register($name, $args, Callable $callback){
            $this->methods[$name]['args'] = $args;
            $this->methods[$name]['callback'] = $callback;
            return $this->methods[$name];
        }

        public function get($name){
            return $this->methods[$name];
        }

        public static function fromFile($file){
            return @include(Core::base('/bin/') . $file);
        }
        public static function fromClosure($callback){
            return $callback;
        }

    }
