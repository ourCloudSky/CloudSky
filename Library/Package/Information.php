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

    namespace CloudSky\Package;

    class Information {

        public $info = array();
        public function __construct($json){
            $this->info = json_decode($json);
        }

    }
