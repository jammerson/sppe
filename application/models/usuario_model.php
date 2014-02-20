<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 05/12/13
 * Time: 17:49
 */
class Usuario_model extends CI_Model{

    var $idusuario;
    var $nome;
    var $email;
    var $telefone;
    var $login;
    var $senha;
    var $perfil;
    var $data_cadastro;

    public function __construct(){
        parent::__construct();
    }

    public function login($login, $senha){
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        return $this->db->get('usuario')->result();
    }

    public function cadUsu($nome, $email, $telefone, $login, $senha, $perfil){
        $this->nome      = $nome;
        $this->email     = $email;
        $this->telefone  = $telefone;
        $this->login     = $login;
        $this->senha     = $senha;
        $this->perfil    = $perfil;
        $this->data_cadastro= date("Y-m-d h:i:s");
        return $this->db->insert('usuario', $this);
    }

    public function editUsu($nome, $email, $telefone, $login, $senha){
        $data = array(
            'nome'  => $nome,
            'email' => $email,
            'telefone'=> $telefone,
            'login' => $login,
            'senha' => $senha
        );
        $this->db->where('idusuario', $this->session->userdata('idusuario'));
        return $this->db->update('usuario', $data);
    }

    public function getUsu(){
        return $this->db->get('usuario')->result();
    }

    public function getProfessor(){
        $this->db->where('perfil', 'professor');
        return $this->db->get('usuario')->result();
    }

    public function getByID(){
        $this->db->where('idusuario', $this->session->userdata('idusuario'));
        return $this->db->get('usuario')->result();
    }
}