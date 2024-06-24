<?php

class Controller {
    public function model($model) {
        if(file_exists(_DIR_ROOT_.'/app/Models/'. $model .'.php')) {
            require_once _DIR_ROOT_.'/app/Models/'. $model .'.php';
            if(class_exists($model)) {
                $model = new $model();
                return $model;
            }
        } 
        return false;
    }

    public function render($view, $data = []) {
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        extract($data); // chuyển key => variable
        // var_dump($view);
        if(file_exists(_DIR_ROOT_ . '/app/Views'. '/' . $view . '.php')) {
            require_once _DIR_ROOT_ . '/app/Views'. '/' . $view . '.php'; 
        } 
    }
}