<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 03/01/2020
 * Time: 18:43
 */

class Widget_TreeNotes
{
    static function widget($title, $text, $img, $link){
        ob_start();
        include "tp/index.php";
        return ob_get_clean();
    }
}