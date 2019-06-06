<?php
    define("_DEV_", false);
    if(_DEV_){
        //define("_DIR_", "http://localhost/dragon/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragon/Dragon');
        define("_DIR_", "http://localhost/dragoneye/Dragon");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragoneye/Dragon');
        //define("_DIR_", "http://localhost/Drag/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/Drag/Dragon');
    }else{
        define("_DIR_", "http://dragon-eye.mediadev.info");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT']);
    }