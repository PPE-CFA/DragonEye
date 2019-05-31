<?php
    define("_DEV_", true);
    if(_DEV_){
        define("_DIR_", "http://localhost/dragon/Dragon");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragon/Dragon');
        //define("_DIR_", "http://localhost/dragoneye/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragoneye/Dragon');
    }else{
        define("_DIR_", "http://dragon-eye.mediadev.info");
    }