<?php if(!defined('BASEPATH'))  exit ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 02/01/14
 * Time: 20:22
 */

class Ensino extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('form_validation');
        $this->load->model('Usuario_model', 'usuarios');
        $this->load->model('Turma_model', 'turmas');
        $this->load->model('Ensino_model', 'ensinos');
    }

    public function index(){
        $periodo = $this->turmas->getUltPeriodo();
        $data['turma'] = $this->turmas->getByUsu($periodo);
        $this->template->load('prof/templateP', 'prof/enviadosE', $data);
    }

    public function enviar($turma){
        $valida = $this->turmas->checkTurmaByUsu($turma);
        if(!empty($valida)){
            $data['turma'] = $this->turmas->getById($turma);
            $especificas = $this->ensinos->getPlanoByTurma($turma);
            if(empty($especificas)){
                $this->template->load('prof/templateP', 'prof/enviar', $data);
            }else{
                $data['especificas'] = $especificas;
                $this->template->load('prof/templateP', 'prof/upEnviar', $data);
            }

        }else{
            echo "não tem autorização para visualizar essa turma - vai pra página de erro";
        }
    }

    public function conteudo($turma){
        $valida = $this->turmas->checkTurmaByUsu($turma);
        if(!empty($valida)){
            $data['turma']  = $turma;
            $data['conteudos'] = $this->ensinos->getContByTurma($turma);
            $this->template->load('prof/templateP', 'prof/conteudo', $data);
        }else{
            echo "não tem autorização para visualizar essa turma - vai pra página de erro";
        }
    }

    public function especificas($turma){
        $valida = $this->turmas->checkTurmaByUsu($turma);
        if(!empty($valida)){
            $data['turma'] = $turma;
            $this->load->view('prof/especificas', $data);
        }else{
            echo "não tem autorização para visualizar essa turma - vai pra página de erro";
        }
    }

    public function alteraEspecificas($conteudo){
        $data['conteudo'] = $this->ensinos->getConteudos($conteudo);
        $this->load->view('prof/alteraEspecificas', $data);
    }

    public function cadEnsino(){
        $this->form_validation->set_rules('competencias', 'Competências', 'required');
        $this->form_validation->set_rules('recursos', 'Recursos', 'required');
        $this->form_validation->set_rules('avaliacao', 'Avaliação', 'required');
        $this->form_validation->set_rules('instrumentos', 'Instrumentos', 'required');
        $this->form_validation->set_rules('acompanhamento', 'Acompanhamento', 'required');
        $this->form_validation->set_rules('referencias', 'Referência', 'required');

        if($this->form_validation->run() == FALSE){
            $this->enviar($this->input->post('turma'));
        }else{
            $turma          = $this->input->post('turma');
            $competencias   = $this->input->post('competencias');
            $recursos       = $this->input->post('recursos');
            $avaliacao      = $this->input->post('avaliacao');
            $instrumentos   = $this->input->post('instrumentos');
            $acompanhamento = $this->input->post('acompanhamento');
            $referencias    = $this->input->post('referencias');
            $esp = $this->input->post('esp');
            if(empty($esp)){
                $acao = $this->ensinos->cadEnsino($turma, $competencias, $recursos, $avaliacao, $instrumentos, $acompanhamento, $referencias);
            }else{
                $acao = $this->ensinos->upEnsino($turma, $competencias, $recursos, $avaliacao, $instrumentos, $acompanhamento, $referencias);
            }
            if($acao){
                redirect(base_url('prof/ensino/conteudo/'.$turma));
            }else{
                echo "veio até aqui :P";
            }
        }
    }

    public function cadConteudo(){
            $turma          = $this->input->post('turma');
            $titulo         = $this->input->post('titulo');
            $conhecimento   = $this->input->post('conhecimento');
            $fazer          = $this->input->post('fazer');
            $ser            = $this->input->post('ser');
            $agir           = $this->input->post('agir');
            $estrategias    = $this->input->post('estrategiasEnsino');
            $num            = $this->input->post('numAulas');
            $semana         = $this->input->post('semanaDatas');
            if($this->ensinos->cadConteudo($titulo, $turma, $conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana)){
                redirect(base_url('prof/ensino/conteudo/'.$turma));
            }else{
                echo "veio até aqui :P";
            }
    }

    public function upConteudo(){
        $numero         = $this->input->post('numero');
        $conteudo       = $this->input->post('conteudo');
        $ide            = $this->input->post('ide');
        $turma          = $this->input->post('turma');
        $titulo         = $this->input->post('titulo');
        $conhecimento   = $this->input->post('conhecimento');
        $fazer          = $this->input->post('fazer');
        $ser            = $this->input->post('ser');
        $agir           = $this->input->post('agir');
        $estrategias    = $this->input->post('estrategiasEnsino');
        $num            = $this->input->post('numAulas');
        $semana         = $this->input->post('semanaDatas');
        if($this->ensinos->upConteudo($conteudo, $ide, $numero, $titulo, $turma, $conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana)){
            redirect(base_url('prof/ensino/conteudo/'.$turma));
        }else{
            echo "veio até aqui :P";
        }
    }

    public function excluir($conteudo, $turma, $numero){
        if($this->ensinos->delConteudo($conteudo, $turma, $numero)){
            redirect(base_url('prof/ensino/conteudo/'.$turma));
        }else{
            echo "veio até aqui :P";
        }
    }
}