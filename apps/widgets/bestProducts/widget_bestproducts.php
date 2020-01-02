<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 23:37
 */

class Widget_BestProducts
{
    static function widget(){
                ob_start();
                include "tp/index.php";
                return ob_get_clean();
    }
}