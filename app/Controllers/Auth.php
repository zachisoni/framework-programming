<?php 
namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController{
    protected $session;
    protected $auth_model;
    protected $data;

    public function __construct(){
        $this->auth_model = new AuthModel();
        $this->session = session();
    }

    public function login(){
        $email = $this->request->getPost("email");
        $password = $this->request->getPost("password");
        $this->data = $this->auth_model->where("email", $email)->first();
        $verify = false;
        if($this->data){
            $pass = $this->data['password'];
            $verify = password_verify($password, $pass);
        } else {
            $this->session->setFlashdata('msg', 'E-mail tidak ditemukan');
            return redirect()->to('/main/login');
        }

        if($verify && $this->data['status'] === 'active'){
            $ses_data = [
                'usr_id'  => $this->data['id'],
                'usrname' => $this->data['username'],
                'email' => $this->data['email'],
                'logged_in' => TRUE
            ];
            $this->session->set($ses_data);
            return redirect()->to('/main/mhs');
        } else {
            $this->session->setFlashdata('msg', 'Password Salah');
            return redirect()->to('/main/login');
        }
    }

    public function logout(){
        $this->session = session();
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function save(){
        helper(['form']);

        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confpassword' => 'matches[password]'
        ];

        if($this->validate($rules)){
            $this->data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status' => 'active',
                'level' => 'user'
            ];
            $this->auth_model->save($this->data);
            return redirect()->to('/main/login');
        }else{
            $this->data['validation'] = $this->validator;
            echo view('/mahasiswa/register', $this->data);
        }
    }

}

?>