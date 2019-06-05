<?php
    define("_DEV_", true);
    if(_DEV_){
        //define("_DIR_", "http://localhost/dragon/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragon/Dragon');
        //define("_DIR_", "http://localhost/dragoneye/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragoneye/Dragon');
        //define("_DIR_", "http://localhost/Drag/Dragon");
        //define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/Drag/Dragon');
        define("_DIR_", "http://10.20.20.3/DragonEye/Dragon");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/DragonEye/Dragon');
    }else{
        define("_DIR_", "http://dragon-eye.mediadev.info");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT']);
    }
