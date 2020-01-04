<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 03/01/2020
 * Time: 22:30
 */

class Widget_FourProducts
{
    static function widget($arr){
        $res = "";
        $title = "";
        $price = "";
        $img = "";
        $id = "";
        $i = 1;
        foreach ($arr as $item){
            $title = $item['title'];
            $price = $item['price'];
            $img   = $item['img'];
            $id    = $item['id'];
            ob_start();
            include "tp/index.php";
            $res .= ob_get_clean();
            $i++;
        }
        return $res;
    }
}