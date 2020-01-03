<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 23:54
 */

class Widget_Featurette
{
    /**
     * @param $side - сторона с которой расположена картинка
     * @param $title - Заголовок
     * @param $text - Текст
     * @param $img -  Картинка
     * @return string - Возвращает  HTML код для вставки
     */
    static function widget($side, $title, $text, $img){
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