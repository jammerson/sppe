<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Usuario_model', 'usuario');
        $this->load->helper('form');
    }

    public function index()
	{
            $this->template->load('template', 'index');
	}

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $login = $this->input->post('login');
            $senha = $this->input->post('senha');
            $dados = $this->usuario->login($login, $senha);
            if($dados){
                $sess  = array('idusuario' => $dados[0]->idusuario, 'usuario' => $dados[0]->login, 'logado' => TRUE);
                $this->session->set_userdata($sess);
                if($dados[0]->perfil == 'professor'){
                    redirect(base_url('prof/'));
                }else if($dados[0]->perfil == 'coordenador'){
                    redirect(base_url('coord/'));
                }
            }else{
                echo "Login ou senha estão incorretos";
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
