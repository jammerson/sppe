<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 17/12/13
 * Time: 21:51
 */

class Aula extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Aula_model', 'aulas');
        $this->load->model('Usuario_model', 'usuarios');
        $this->load->model('Turma_model', 'turmas');

    }

    public function index(){
        $periodo = $this->turmas->getUltPeriodo();
        $enviado = $this->aulas->getByUsu($periodo);
        if(empty($enviado)){
            $this->aula();
        }else{
            $data['aula'] = $enviado;
            $this->template->load('prof/templateP', 'prof/enviadosA', $data);
        }

    }

    public function aula(){
        $periodo = $this->turmas->getUltPeriodo();
        $data['turma'] = $this->turmas->getByUsu($periodo);
        $this->template->load('prof/templateP', 'prof/aula', $data);
    }

    function cadAula(){
        $this->form_validation->set_rules('competencias', 'Competências', 'required');
        $this->form_validation->set_rules('conteudo', 'Conteúdo', 'required');
        $this->form_validation->set_rules('metodologia', 'Metodologia', 'required');
        $this->form_validation->set_rules('recursos', 'Recursos', 'required');
        $this->form_validation->set_rules('ambientes', 'avaliacao', 'required');
        $this->form_validation->set_rules('tema_central', 'Tema central', 'required');
        $this->form_validation->set_rules('turma', 'Turma', 'required');

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $competencias   = $this->input->post('competencias');
            $conteudo   = $this->input->post('conteudo');
            $metodologia= $this->input->post('metodologia');
            $recursos   = $this->input->post('recursos');
            $ambientes  = $this->input->post('ambientes');
            $avaliacao  = $this->input->post('avaliacao');
            $turma      = $this->input->post('turma');
            $tema       = $this->input->post('tema_central');
            if($this->aulas->cadAula($competencias, $conteudo, $metodologia, $recursos, $ambientes, $avaliacao, $turma, $tema)){
                redirect(base_url('prof/'));
            }else{
                echo "veio até aqui :P";
            }
        }
    }

}