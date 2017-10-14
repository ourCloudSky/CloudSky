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

    class Package {

        public $info;
        public $name;
        protected $_config_path;
        protected $_config_cache = [];

        public static function factory($name) {
            $pkg = Core::package($name);
            if(!$pkg){
                $pkg = new Package($name);
                Core::$package[$name] = $pkg;
            }

            return $pkg;
        }

        public function __construct($name, $force = false, $info = false) {

            if(!$force){
                if(!is_dir(Core::base('/etc/') . $name)){
                    Core::error("W", "Creating an instance of an undefined package: $name .");
                    return false;
                }
                $info = Core::package("CloudSky")->config("packages/$name");
            }

            $this->info = $info;
            $this->name = $name;
            $this->_config_path = Core::base('/etc/' . $name . '/');
            $this->_runEvents();

        }

        public function config($name, $refresh = false){
            if(!isset($this->_config_cache[$name]) || $refresh){
                $this->_config_cache[$name] = json_decode(file_get_contents($this->_config_path . $name . '.json'));
            }
            return $this->_config_cache[$name];
        }

        protected function _runEvents(){
            @include_once(Core::base('/bin/') . $this->name . '/_events.php');
        }

    }
