<?php
use MyApp\Core\BaseController;

class KategoriController extends BaseController{
    public function index(){
        $data=[
            'title' => 'Kategori',
        ];
        $this->view('template/header', $data);
        $this->view('kategori/index', $data);
        $this->view('template/footer');

        // return $this->view('kategori/index');
    }
}