<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 23:54
 */

class Widget_Featurette
{
    static function widget($side){
        switch ($side){
            case "left":
                $file = "tp/left.php";
                break;
            case "right":
                $file = "tp/right.php";
                break;
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }
}