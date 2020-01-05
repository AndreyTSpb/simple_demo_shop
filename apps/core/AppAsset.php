<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 02/01/2020
 * Time: 19:43
 */
/**
 * Connect style css and js scripts files
 */

/**
 * css files, ROOT/FOLDER/FILE
 */
class AppAsset{
    private static $css = [
        'css/bootstrap.min.css',
        'css/carousel.css',
        'css/pricing.css',
        'css/font-awesome.css'
    ];

    /**
     * js files, ROOT/FOLDER/FILE
     */
    private static $js = [
        'js/jquery-3.4.1.min.js',
        'js/jquery-slim.min.js',
        'js/bootstrap.min.js',
        'js/popper.min.js',
        'js/holder.min.js',
        'js/custom/add_product_to_cart.js',
        'js/custom/view_cart.js'

    ];

    /**
     * @return bool|string
     * Формируем строчки с сылкой на файлы стилей для подключения в теле шаблона
     */
    public static function css(){
        if(empty(self::$css)) return false;
        $str = "";
        foreach (self::$css as $file_name){
            $str .= "<link href=\"".DOCUMENT_STATIC.DS.$file_name."\" rel=\"stylesheet\"/>\n";
        }
        return $str;
    }

    /**
     * @return bool|string
     * Формируем строчки с сылкой на файлы JS
     */
    public static function js(){
        if(empty(self::$js)) return false;
        $str = "";
        foreach (self::$js as $file_name){
            $str .= "<script src=\"".DOCUMENT_STATIC.DS.$file_name."\"></script>\n";
        }
        return $str;
    }

}