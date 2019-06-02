<?php
    define("_DEV_", true);
    if(_DEV_){
        //define("DIR", "http://localhost/dragon/Dragon%22);
        //define("DIR2", $_SERVER['DOCUMENT_ROOT'].'/dragon/Dragon');
        //define("DIR", "http://localhost/dragoneye/Dragon%22);
        //define("DIR2", $_SERVER['DOCUMENT_ROOT'].'/dragoneye/Dragon');
        define("_DIR_", "http://localhost/dragon_1/DragonEye/Dragon");
        define("_DIR2_", $_SERVER['DOCUMENT_ROOT'].'/dragon_1/DragonEye/Dragon');
    }else{
        define("_DIR_", "http://dragon-eye.mediadev.info");
    }