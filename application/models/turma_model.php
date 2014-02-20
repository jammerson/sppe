<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 16/12/13
 * Time: 21:49
 */

class Turma_model extends CI_Model{

    var $idturma;
    var $curso;
    var $usuario;
    var $periodo;
    var $base;
    var $turno;

    public function __construct(){
        parent::__construct();
    }

    public function cadTurma($curso, $usuario, $periodo, $base, $turno){
        $this->curso    = $curso;
        $this->usuario  = $usuario;
        $this->periodo  = $periodo;
        $this->base     = $base;
        $this->turno    = $turno;
        return $this->db->insert('turma', $this);
    }

    public function getById($turma){
        $this->db->where('idturma', $turma);
        $this->db->join('usuario', 'usuario.idusuario = turma.usuario', 'inner');
        $this->db->join('curso', 'curso.idcurso = turma.curso', 'inner');
        $this->db->join('base', 'base.idbase = turma.base', 'inner');
        return $this->db->get('turma')->result();
    }

    public function getUltPeriodo(){
        $this->db->select('periodo');
        $this->db->group_by('periodo');
        $this->db->order_by('periodo', 'desc');
        $data =  $this->db->get('turma')->result();
        return $data[0]->periodo;
    }

    public function getPeriodo(){
        $this->db->select('periodo');
        $this->db->group_by('periodo');
        return $this->db->get('turma')->result();
    }

    public function getByUsu($periodo){
        $this->db->select('*');
        $this->db->from('turma');
        $this->db->join('usuario', 'usuario.idusuario = turma.usuario', 'inner');
        $this->db->join('curso', 'curso.idcurso = turma.curso', 'inner');
        $this->db->join('base', 'base.idbase = turma.base', 'inner');
        $data = array('periodo' => $periodo, 'turma.usuario' => $this->session->userdata('idusuario'));
        $this->db->where($data);
        return $this->db->get()->result();

    }

    public function checkTurmaByUsu($turma){
        $data = array('idturma' => $turma, 'usuario' => $this->session->userdata('idusuario'));
        $this->db->where($data);
        return $this->db->get('turma')->result();
    }
}