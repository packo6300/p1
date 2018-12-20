<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 *
 * @author packo
 */

namespace App;

use App\Controller;

class app {

    private $url;

    public function __construct() {
        $this->url = $_SERVER['REQUEST_URI'];
    }

    public function getUrl() {
        return $this->url;
    }

    public function getController() {
        $args = explode("/", $this->url);
        return $args[1];
    }

    public function start() {
        try {
            $controller="";
            $args = explode("/", $this->url);
            if ($args[1] == "") {
                $args[1] = "index";
                $controller = "indexController";
            }
            else{
                $controller=$args[1]."Controller";
            }
            $c = new \Controllers\$controller();
            $smarty = new \SmartyBC();
            $smarty->setCompileDir('./temp/');
            $smarty->display(__DIR__ . "/../app/view/" . $args[1] . ".tpl");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}
