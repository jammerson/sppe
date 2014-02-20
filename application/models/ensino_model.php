<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 03/01/14
 * Time: 21:01
 */
class Ensino_model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('Turma_model', 'turmas');
    }

    public function cadEnsino($turma, $competencias, $recursos, $avaliacao, $instrumentos, $acompanhamento, $referencias){
        $data = array(
            'turma'         => $turma,
            'competencias'  => $competencias,
            'recursos'      => $recursos,
            'avaliacao'     => $avaliacao,
            'instrumentos'  => $instrumentos,
            'acompanhamento'=> $acompanhamento,
            'referencias'   => $referencias,
            'data_plano'    => date("Y-m-d h:i:s")
        );
        return $this->db->insert('planos_ensino', $data);
    }

    public function upEnsino($turma, $competencias, $recursos, $avaliacao, $instrumentos, $acompanhamento, $referencias){
        $data = array(
            'competencias'  => $competencias,
            'recursos'      => $recursos,
            'avaliacao'     => $avaliacao,
            'instrumentos'  => $instrumentos,
            'acompanhamento'=> $acompanhamento,
            'referencias'   => $referencias
        );
        $this->db->where('turma', $turma);
        return $this->db->update('planos_ensino', $data);
    }

    public function numero($turma){
        $this->db->select_max('numero');
        $this->db->where('turma', $turma);
        $data = $this->db->get('conteudos')->result();
        return $data[0]->numero;
    }

    public function getConteudos($conteudo){
        $this->db->select('*');
        $this->db->join('c_especificas', 'c_especificas.conteudos = conteudos.idconteudos', 'inner');
        $this->db->where('idconteudos', $conteudo);
        return $this->db->get('conteudos')->result();
    }

    public function getContByTurma($turma){
        $this->db->select('*');
        $this->db->join('c_especificas', 'c_especificas.conteudos = conteudos.idconteudos', 'inner');
        $this->db->where('turma', $turma);
        return $this->db->get('conteudos')->result();
    }

    public function getPlanoByTurma($turma){
        $this->db->select('*');
        $this->db->where('turma', $turma);
        return $this->db->get('planos_ensino')->result();
    }

    public function cadConteudo($titulo, $turma, $conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana){

        $this->db->trans_begin();
        $conteudos = array(
            'titulo'    => $titulo,
            'numero'    => $this->numero($turma)+1,
            'turma'     => $turma
        );
        $this->db->insert('conteudos', $conteudos);

        $especificas = array(
            'conteudos'     => $this->db->insert_id(),
            'conhecimento'  => $conhecimento,
            'fazer'         => $fazer,
            'agir'          => $agir,
            'ser'           => $ser,
            'estrategiasEnsino' => $estrategias,
            'numAulas'      => $num,
            'semanaDatas'   => $semana
        );
        $this->db->insert('c_especificas', $especificas);
        if ($this->db->trans_status() === FALSE)
        {
            return $this->db->trans_rollback();
        }else{
            return $this->db->trans_commit();
        }
    }

    public function upConteudo($conteudo, $ide, $numero, $titulo, $turma, $conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana){

        $this->db->trans_begin();
        $conteudos = array(
            'titulo'    => $titulo,
            'numero'    => $numero,
            'turma'     => $turma
        );
        $this->db->where('idconteudos', $conteudo);
        $this->db->update('conteudos', $conteudos);

        $especificas = array(
            'conteudos'     => $conteudo,
            'conhecimento'  => $conhecimento,
            'fazer'         => $fazer,
            'agir'          => $agir,
            'ser'           => $ser,
            'estrategiasEnsino' => $estrategias,
            'numAulas'      => $num,
            'semanaDatas'   => $semana
        );
        $this->db->where('idc_especificas', $ide);
        $this->db->update('c_especificas', $especificas);
        if ($this->db->trans_status() === FALSE)
        {
            return $this->db->trans_rollback();
        }else{
            return $this->db->trans_commit();
        }
    }

    public function delConteudo($conteudo, $turma, $numero){
        $this->db->trans_begin();

        $this->db->delete('conteudos', array('idconteudos' => $conteudo));
        $this->db->delete('c_especificas', array('conteudos' => $conteudo));

        if ($this->db->trans_status() === FALSE)
        {
            return $this->db->trans_rollback();
        }else{
            $this->upNum($turma, $numero);
            return $this->db->trans_commit();
        }
    }

    public function upNum($turma, $numero){
        $update = "update conteudos set numero = numero-1 where turma = $turma and numero > $numero";
        $this->db->query($update);
    }

    public function buscaEnsino($professor, $periodo, $base){
        $data = array(
            'plano.turma',
            'plano.data_plano',
            'usuario.nome',
            'usuario.login',
            'base.nome_base',
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
}