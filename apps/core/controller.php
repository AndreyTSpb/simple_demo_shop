<?php
/**
 * Created by PhpStorm.
 * User: atynyanygmail.com
 * Date: 02/05/2019
 * Time: 14:11
 */

class Controller {

    public $model;
    public $view;



    public function __construct()
    {
        $this->view = new View();
    }

    // действие (action), вызываемое по умолчанию
    public function action_index()
    {
        // todo
    }
}
