<?php
use MyApp\Core\BaseController;
use MyApp\Core\Message;

class BarangController extends BaseController{

    private $BarangModel;
    public function __construct(){
        $this->BarangModel = $this->model('BarangModel');
    }

    public function index(){
        $data=[
            'title' => 'Barang',
            'AllBarang' => $this->BarangModel->getAll()
        ];
        $this->view('template/header', $data);
        $this->view('barang/index', $data);
        $this->view('template/footer');
    }

    public function insert(){
        $data=[
            'title' => 'Barang'
        ];
        $this->view('template/header', $data);
        $this->view('barang/insert', $data);
        $this->view('template/footer');
    }

    public function insert_barang(){
        $fields=[
        'nama_barang' => 'string | required ',
        'jumlah' => 'int | required',
        'harga_satuan' => 'float | required',
        'kadaluarsa' => 'string'            
        ];
        $message=[
            'nama_barang' => [
            'required' => 'Nama barang harus diisi!',
            'alphanumeric' => 'masukan huruf dan angka',
            'between' => 'nama barang harus diantara 3 dan 25',
            ],
            'jumlah' => [
                'required' => 'Jumlah harus diisi',
            ],
            'harga_satuan' => [
                'required' => 'harga satuan harus diisi',
            ]
        ];
        [$inputs, $errors] =$this->filter($_POST, $fields, $message);

        if($inputs['kadaluarsa'] ==""){
            $inputs['kadaluarsa'] = null;
        }



        if($errors){
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('barang/insert');
        }

        $proc= $this->BarangModel->insert($inputs);
        if($proc) {
            Message::setFlash('success', 'Berhasil !', 'Barang berhasil ditambahkan');
            $this->redirect('barang');
        }
    }

    public function edit($id){
        $data =[
            'title' => 'barang',
            'barang' => $this->BarangModel->getById($id)
        ];
        $this->view('template/header', $data);
        $this->view('barang/edit', $data);
        $this->view('template/footer');
    }

    public function edit_barang(){
        $fields=[
        'nama_barang' => 'string | required ',
        'jumlah' => 'int | required',
        'harga_satuan' => 'float | required',
        'kadaluarsa' => 'string',
        'mode' => 'string',
        'id' => 'int',
        ];
        $message=[
            'nama_barang' => [
            'required' => 'Nama barang harus diisi!',
            'alphanumeric' => 'masukan huruf dan angka',
            'between' => 'nama barang harus diantara 3 dan 25',
            ],
            'jumlah' => [
                'required' => 'Jumlah harus diisi',
            ],
            'harga_satuan' => [
                'required' => 'harga satuan harus diisi',
            ]
        ];
        [$inputs, $errors] =$this->filter($_POST, $fields, $message);

        if($inputs['kadaluarsa'] == ""){
            $inputs['kadaluarsa'] = null;
        }



        if($errors){
            Message::setFlash('error', 'Gagal !', $errors[0], $inputs);
            $this->redirect('barang/edit/' . $inputs['id']);
        }

        if($inputs['mode'] == 'update'){
            $proc = $this->BarangModel->update($inputs);
            if($proc){
                Message::setFlash('success', 'Berhasil !', 'Barang berhasil diubah');
                $this->redirect('barang');
            }
        }else{
            $proc = $this->BarangModel->delete($inputs['id']);
            if($proc){
                Message::setFlash('success', 'Berhasil !', 'Barang berhasil dihapus');
                $this->redirect('barang');
            }
        }
    }
}
