<?php

namespace core;

/**
 * loading view for requested page.
 *
 * View description.
 *
 * @version 1.0
 * @author konstantin.haendel
 */

class view
{
    public $config;
    public $page;
    public function __construct() {
        $tmp = new config();
        $this->config = $tmp->config;
    }
    public function setView($page, $sub) {
        // preset
        $page_obj = (object) array();
        $page404 = file_get_contents($this->config->maindir . '/public/page/404.html');
        if($sub) {
            $page_content = file_get_contents($this->config->maindir . '/public/page/' . $page . '/' . $sub . '.html');
        }
        else {
            $page_content = file_get_contents($this->config->maindir . '/public/page/' . $page . '.html');
        }
        if(file_exists($this->config->maindir . '/public/menu/' . $page . '.html')) {
            $page_menu = file_get_contents($this->config->maindir . '/public/menu/' . $page . '.html');
        }
        else {
            $page_menu = '';
        }

        // set content
        if($page_content) {
            $page_obj->content = $page_content;
        }
        else {
            $page_obj->content = $page404;
        }
        if($page_menu) $page_obj->menu = $page_menu;

        $this->page = $page_obj;
    }
}