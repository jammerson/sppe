<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 17/12/13
 * Time: 21:55
 */

class Aula_model extends CI_Model{

    var $idplanos_aula;
    var $competencias;
    var $conteudo;
    var $metodologia;
    var $recursos;
    var $ambientes;
    var $avaliacao;
    var $turma;
    var $tema_central;
    var $data_plano;

    public function __construct(){
        parent::__construct();
        $this->load->model('Turma_model', 'turmas');
    }
    public function cadAula($competencias, $conteudo, $metodologia, $recursos, $ambientes, $avaliacao, $turma, $tema){
        $this->competencias = $competencias;
        $this->conteudo     = $conteudo;
        $this->metodologia  = $metodologia;
        $this->recursos     = $recursos;
        $this->ambientes    = $ambientes;
        $this->avaliacao    = $avaliacao;
        $this->turma        = $turma;
        $this->tema_central = $tema;
        $this->data_plano   = date("Y-m-d h:i:s");
        return $this->db->insert('planos_aula', $this);
    }

    public function getByUsu($periodo){
        $data = array(
            'plano.idplanos_aula',
            'plano.competencias',
            'plano.conteudo',
            'plano.metodologia',
            'plano.recursos',
            'plano.ambientes',
            'plano.avaliacao',
            'plano.turma',
            'plano.tema_central',
            'plano.data_plano',
            'turma.idturma',
            'turma.curso',
            'turma.usuario',
            'turma.periodo',
            'turma.base',
            'turma.turno',
            'curso.idcurso',
            'curso.nome_curso',
            'curso.eixo',
            'usuario.nome',
            'base.nome_base'
        );
        $this->db->select($data);
        $this->db->from('planos_aula plano');
        $this->db->join('turma', 'turma.idturma = plano.turma', 'inner');
        $this->db->join('usuario', 'usuario.idusuario = turma.usuario', 'inner');
        $this->db->join('curso', 'curso.idcurso = turma.curso', 'inner');
        $this->db->join('base', 'base.idbase = turma.base', 'inner');
        $data = array('periodo' => $periodo, 'turma.usuario' => $this->session->userdata('idusuario'));
        $this->db->where($data);
        $this->db->group_by('turma.idturma');
        return $this->db->get()->result();
    }

    public function buscaAula($professor, $periodo, $base){
        $data = array(
            'plano.idplanos_aula',
            'plano.data_plano',
            'usuario.nome',
            'usuario.login',
            'base.nome_base',
            'turma.idturma'
        );
        $this->db->select($data);
        $this->db->from('planos_aula plano');
        $this->db->join('turma', 'turma.idturma = plano.turma', 'inner');
        $this->db->join('usuario', 'usuario.idusuario = turma.usuario', 'inner');
        $this->db->join('base', 'base.idbase = turma.base', 'inner');
        $like = array();
        if(!empty($professor)){
            $like["usuario.login"] = $professor;
        }
        if(!empty($periodo)){
            $like["turma.periodo"] = $periodo;
        }
        if(!empty($base)){
            $like["base.nome_base"] = $base;
        }
        $this->db->like($like);
        $this->db->group_by('turma.idturma');
        return $this->db->get()->result();
    }

    public function buscaEnsino($professor, $periodo, $base){
        $data = array(
            'plano.idplanos_aula',
            'plano.data_plano',
            'usuario.nome',
            'usuario.login',
            'base.nome_base',
            'turma.idturma'
        );
        $this->db->select($data);
        $this->db->from('planos_ensino plano');
        $this->db->join('turma', 'turma.idturma = plano.turma', 'inner');
        $this->db->join('usuario', 'usuario.idusuario = turma.usuario', 'inner');
        $this->db->join('base', 'base.idbase = turma.base', 'inner');
        $like = array();
        if(!empty($professor)){
            $like["usuario.login"] = $professor;
        }
        if(!empty($periodo)){
            $like["turma.periodo"] = $periodo;
        }
        if(!empty($base)){
            $like["base.nome_base"] = $base;
        }
        $this->db->like($like);
        $this->db->group_by('turma.idturma');
        return $this->db->get()->result();
    }

    public function verPlanoA($plano){
        $this->db->join('turma', 'turma.idturma = planos_aula.turma', 'inner');
        $this->db->where('idplanos_aula', $plano);
        return $this->db->get('planos_aula')->result();
    }

    public function verPlanoE($plano){
        $this->db->where('turma', $plano);
        return $this->db->get('planos_ensino')->result();
    }

}