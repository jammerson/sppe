<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 05/12/13
 * Time: 20:38
 */
class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
            redirect(base_url());
        }
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->model('Usuario_model', 'usuarios');
        $this->load->model('Turma_model', 'turmas');
        $this->load->model('Aula_model', 'aulas');
        $this->load->model('Ensino_model', 'ensinos');
    }

    public function index(){
        $this->template->load('coord/templateC', 'coord/index');
    }

    public function aula(){
        $data['professor']  = $this->usuarios->getProfessor();
        $data['periodo']    = $this->turmas->getPeriodo();
        $this->template->load('coord/templateC', 'coord/aula', $data);
    }

    public function ensino(){
        $data['professor']  = $this->usuarios->getProfessor();
        $data['periodo']    = $this->turmas->getPeriodo();
        $this->template->load('coord/templateC', 'coord/ensino', $data);
    }

    public function verPlanoA($id){
        $data['plano'] = $this->aulas->verPlanoA($id);
        $data['turma']      = $this->turmas->getById($id);
        $this->load->view('coord/verPlanoA', $data);
    }

    public function verPlanoE($id){
        $data['plano']      = $this->aulas->verPlanoE($id);
        $data['turma']      = $this->turmas->getById($id);
        $data['conteudos']  = $this->ensinos->getContByTurma($id);
        $this->load->view('coord/verPlanoE', $data);
    }

    public function pesquisaAula(){
        $professor  = $this->input->post('professor');
        $periodo    = $this->input->post('periodo');
        $base       = $this->input->post('base');

        $pesquisa = $this->aulas->buscaAula($professor, $periodo, $base);

        if($pesquisa){
            $data['plano'] = $pesquisa;
            $this->template->load('coord/templateC', 'coord/pesquisaAula', $data);
        }else{
            echo "veio até aqui :P";
        }
    }

    public function pesquisaEnsino(){
        $professor  = $this->input->post('professor');
        $periodo    = $this->input->post('periodo');
        $base       = $this->input->post('base');

        $pesquisa = $this->ensinos->buscaEnsino($professor, $periodo, $base);

        if($pesquisa){
            $data['plano'] = $pesquisa;
            $this->template->load('coord/templateC', 'coord/pesquisaEnsino', $data);
        }else{
            echo "Sem resultados para sua pesquisa";
        }
    }

}