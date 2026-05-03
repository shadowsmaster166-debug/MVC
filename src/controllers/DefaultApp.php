<?php

namespace MyApp\controllers;

use MyApp\Core\BaseController;

class DefaultApp extends BaseController{
    
    public function index() {
        $data=[
            'status' => '404',
            'error' => '404',
            'message' => 'Halaman tidak ditemukan',
            'data' =>null
        ];
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}


?>