<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 26/09/2019
 * Time: 09:54
 */

Class Controller_Main extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function action_index()
    {
        $data['title']         = "Home";
        $this->view->generate('', 'index.php', $data);
    }
}