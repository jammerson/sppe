<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 05/12/13
 * Time: 20:42
 */
class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Usuario_model', 'usuarios');
    }

    public function index(){
        $this->template->load('prof/templateP', 'prof/home');
    }

    public function perfil(){
        $data['usuario'] = $this->usuarios->getByID();
        $this->template->load('prof/templateP', 'prof/perfil', $data);
    }

    public function editUsu(){
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $nome       = $this->input->post('nome');
            $email      = $this->input->post('email');
            $telefone   = $this->input->post('telefone');
            $login      = $this->input->post('login');
            $senha      = $this->input->post('senha');
            if($this->usuarios->editUsu($nome, $email, $telefone, $login, $senha)){
                redirect(base_url('coord/'));
            }else{
                echo "veio até aqui :P";
            }
        }
    }

}
