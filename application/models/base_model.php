<?php if(!defined('BASEPATH')) EXIT ('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 13/12/13
 * Time: 21:48
 */

class Base_model extends CI_Model{

    var $idbase;
    var $modulo;
    var $duracao;
    var $semana;
    var $curso;
    var $nome_base;

    public function __construct(){
        parent::__construct();
    }

    public function cadBase($modulo, $duracao, $semana, $curso, $nome){
        $this->modulo   = $modulo;
        $this->duracao  = $duracao;
        $this->semana   = $semana;
        $this->curso    = $curso;
        $this->nome_base= $nome;
        return $this->db->insert('base', $this);
    }

    public function getBase(){
        return $this->db->get('base')->result();
    }

    public function getByCurso($curso){
        if(!is_null($curso))
            $this->db->where( array('base.curso' => $curso) );
        return $this->db->select('base.idbase, base.nome_base')
            ->from('base')
            ->join('curso', 'curso.idcurso = base.idbase')
            ->get()->result();
    }
}