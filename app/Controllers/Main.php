<?php

namespace App\Controllers;

use App\Models\CrudModel;
use App\Models\MahasiswaModel;

class Main extends BaseController
{
    // Session
    protected $session;
    // Data
    protected $data;
    // Model
    protected $crud_model;

    protected $mhs_model;

    // Initialize Objects
    public function __construct(){
        $this->crud_model = new CrudModel();
        $this->mhs_model = new MahasiswaModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    // Home Page
    public function index(){
        $this->data['page_title'] = "Home Page";
        echo view('home', $this->data);
    }

    // Create Form Page
    public function create(){
        $this->data['page_title'] = "Add New";
        $this->data['request'] = $this->request;
        echo view('templates/header', $this->data);
        echo view('crud/create', $this->data);
        echo view('templates/footer');
    }

    // Insert And Update Function
    public function save(){
        $this->data['request'] = $this->request;
        $post = [
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'lastname' => $this->request->getPost('lastname'),
            'gender' => $this->request->getPost('gender'),
            'contact' => $this->request->getPost('contact'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->crud_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->crud_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/main/view_details/'.$id);
        }else{
            echo view('templates/header', $this->data);
            echo view('crud/create', $this->data);
            echo view('templates/footer');
        }
    }

    // List Page
    public function list(){
        $this->data['page_title'] = "List of Contacts";
        $this->data['list'] = $this->crud_model->orderBy('date(date_created) ASC')->select('*')->get()->getResult();
        echo view('templates/header', $this->data);
        echo view('crud/list', $this->data);
        echo view('templates/footer');
    }

    // Edit Form Page
    public function edit($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/list');
        }
        $this->data['page_title'] = "Edit Contact Details";
        $qry= $this->crud_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('crud/edit', $this->data);
        echo view('templates/footer');
    }

    // Delete Data
    public function delete($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/list');
        }
        $delete = $this->crud_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Contact Details has been deleted successfully.') ;
            return redirect()->to('/main/list');
        }
    }

    // View Data
    public function view_details($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/list');
        }
        $this->data['page_title'] = "View Contact Details";
        $qry= $this->crud_model->select("*, CONCAT(lastname,', ',firstname,COALESCE(concat(' ', middlename), '')) as `name`")->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/header', $this->data);
        echo view('crud/view', $this->data);
        echo view('templates/footer');
    }
    
    public function mhs(){
        $this->data['page_title'] = "List of Mahasiswa";
        $this->data['list'] = $this->mhs_model->orderBy('date(date_created) ASC')->select('*')->get()->getResult();
        echo view('templates/mhs_header', $this->data);
        echo view('mahasiswa/list', $this->data);
        echo view('templates/footer');
    }

    public function mhs_create(){
        $this->data['page_title'] = "Add New Mahasiswa";
        $this->data['request'] = $this->request;
        echo view('templates/mhs_header', $this->data);
        echo view('mahasiswa/create', $this->data);
        echo view('templates/footer');
    }

    public function mhs_save(){
        $this->data['request'] = $this->request;
        $post = [
            'firstname' => $this->request->getPost('nim'),
            'middlename' => $this->request->getPost('nama'),
            'lastname' => $this->request->getPost('jk'),
            'gender' => $this->request->getPost('tempat_lahir'),
            'contact' => $this->request->getPost('tanggal_lahir'),
            'email' => $this->request->getPost('alamat'),
            'address' => $this->request->getPost('no_telp')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->mhs_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->mhs_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/main/mhs_view_details/'.$id);
        }else{
            echo view('templates/mhs_header', $this->data);
            echo view('mahasiswa/create', $this->data);
            echo view('templates/footer');
        }
    }

    // Edit Form Page
    public function mhs_edit($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/list');
        }
        $this->data['page_title'] = "Edit Contact Details";
        $qry= $this->mhs_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/mhs_header', $this->data);
        echo view('mahasiswa/edit', $this->data);
        echo view('templates/footer');
    }

    // Delete Data
    public function mhs_delete($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/mhs');
        }
        $delete = $this->mhs_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Contact Details has been deleted successfully.') ;
            return redirect()->to('/main/mhs');
        }
    }

    // View Data
    public function mhs_view_details($id=''){
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/main/mhs');
        }
        $this->data['page_title'] = "View Contact Details";
        $qry= $this->mhs_model->select("*, CONCAT(lastname,', ',firstname,COALESCE(concat(' ', middlename), '')) as `name`")->where(['id'=>$id]);
        $this->data['data'] = $qry->first();
        echo view('templates/mhs_header', $this->data);
        echo view('mahasiswa/view', $this->data);
        echo view('templates/footer');
    }
}
