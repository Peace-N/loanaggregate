<?php

/**
 * Created by PhpStorm.
 * User: GOD IS GREAT
 * Date: 25/06/2017
 * Time: 11:52
 */
class Loader{
    // Load library classes
    public function library($lib){
        include FRAMEWORK_PATH . "$lib.class.php";
    }
    // loader helper functions. Naming conversion is xxx_helper.php;
    public function helper($helper){
        include FRAMEWORK_PATH . "{$helper}_helper.php";
    }

}