<?php if(!defined('BASEPATH')) EXIT ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 13/12/13
 * Time: 21:48
 */

class Curso_model extends CI_Model{

    var $idCurso;
    var $nome_curso;
    var $eixo;
    var $idusuario;

    public function __construct(){
        parent::__construct();
    }

    public function cadCurso($nome, $eixo){
        $this->idCurso      = null;
        $this->nome_curso   = $nome;
        $this->eixo         = $eixo;
        $this->idusuario    = $this->session->userdata('idusuario');
        return $this->db->insert('curso', $this);
    }

    public function getCurso(){
        return $this->db->get('curso')->result();
    }
}