<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 06/12/13
 * Time: 20:28
 */

class Cadastro extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Usuario_model', 'usuarios');
        $this->load->model('Curso_model', 'cursos');
        $this->load->model('Base_model', 'bases');
        $this->load->model('Turma_model', 'turmas');
    }

    public function index(){
        $this->template->load('coord/templateC', 'coord/cadastro');
    }

    public function usuario(){
        $this->template->load('coord/templateC', 'coord/usuario');
    }

    public function curso(){
        $this->template->load('coord/templateC', 'coord/curso');
    }

    public function base(){
        $data['curso']  = $this->cursos->getCurso();
        $this->template->load('coord/templateC', 'coord/base', $data);
    }

    public function turma(){
        $data['curso']  = $this->cursos->getCurso();
        $data['usuario']= $this->usuarios->getProfessor();
        $data['base']   = $this->bases->getBase();
        $this->template->load('coord/templateC', 'coord/turma', $data);
    }

    public function perfil(){
        $data['usuario'] = $this->usuarios->getByID();
        $this->template->load('coord/templateC', 'coord/perfil', $data);
    }

    public function cadUsu(){
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
        $nome       = $this->input->post('nome');
        $email      = $this->input->post('email');
        $telefone   = $this->input->post('telefone');
        $login      = $this->input->post('login');
        $senha      = $this->input->post('senha');
        $perfil     = $this->input->post('perfil');
        if($this->usuarios->cadUsu($nome, $email, $telefone, $login, $senha, $perfil)){
            redirect(base_url('coord/'));
        }else{
            echo "veio até aqui :P";
        }
        }
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

    public function cadCurso(){
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('eixo', 'Eixo', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $nome   = $this->input->post('nome');
            $eixo   = $this->input->post('eixo');
            if($this->cursos->cadCurso($nome, $eixo)){
                redirect(base_url('coord/'));
            }else{
                echo "veio até aqui :P";
            }
        }
    }

    public function cadBase(){
        $this->form_validation->set_rules('duracao', 'Duração', 'required');
        $this->form_validation->set_rules('semana', 'Semana', 'required');
        $this->form_validation->set_rules('nome_curso', 'Nome', 'required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $modulo     = $this->input->post('modulo');
            $duracao    = $this->input->post('duracao');
            $semana     = $this->input->post('semana');
            $curso      = $this->input->post('curso');
            $nome       = $this->input->post('nome_curso');
            if($this->bases->cadBase($modulo, $duracao, $semana, $curso, $nome)){
                redirect(base_url('coord/'));
            }else{
                echo "veio até aqui";
            }
        }
    }

    public function cadTurma(){
        $curso      = $this->input->post('curso');
        $usuario    = $this->input->post('usuario');
        $periodo    = $this->input->post('periodo');
        $base       = $this->input->post('base');
        $turno      = $this->input->post('turno');
        if($this->turmas->cadTurma($curso, $usuario, $periodo, $base, $turno)){
            redirect(base_url('coord'));
        }else{
            echo "veio até aqui";
        }
    }

    function getBases($curso) {

        $cursos = $this->bases->getByCurso($curso);
        if( empty ( $cursos ) )
            return '{ "nome": "Nenhuma base encontrada" }';

        $arr_cursos = array();

        foreach ($cursos as $c) {
            $arr_cursos[] = '{"id":' . $c->idbase . ',"nome":"' . $c->nome_base. '"}';
        }
        echo '[ ' . implode(",",$arr_cursos) . ']';

        return;

    }

}