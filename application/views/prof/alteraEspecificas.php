<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 04/01/14
 * Time: 16:51
 */
echo "<div div='conteudo'>";
    $hidden = array('turma' => $conteudo[0]->turma, 'conteudo' => $conteudo[0]->idconteudos, 'numero' => $conteudo[0]->numero, 'ide' => $conteudo[0]->idc_especificas);
    echo form_open(base_url('prof/ensino/upConteudo'),'', $hidden);
        echo form_label('Conteúdo '. $conteudo[0]->numero.': ', 'titulo');
        $data = array('name' => 'titulo', 'id' => 'formulario-maior', 'value' => $conteudo[0]->titulo);
        echo form_input($data);
        echo "<br />";
        $data   = array('name' => 'conhecimento', 'class' => 'bc', 'cols' => 10, 'value' => $conteudo[0]->conhecimento);
        $conhecimento   = form_textarea($data);
        $data   = array('name' => 'fazer', 'class' => 'bc', 'cols' => 10, 'value' => $conteudo[0]->fazer);
        $fazer  = form_textarea($data);
        $data   = array('name' => 'ser', 'class' => 'bc', 'cols' => 10, 'value' => $conteudo[0]->ser);
        $ser    = form_textarea($data);
        $data   = array('name' => 'agir', 'class' => 'bc', 'cols' => 10, 'value' => $conteudo[0]->agir);
        $agir   = form_textarea($data);
        $data   = array('name' => 'estrategiasEnsino', 'class' => 'bc', 'cols' => 15, 'value' => $conteudo[0]->estrategiasEnsino);
        $estrategias    = form_textarea($data);
        $data   = array('name' => 'numAulas', 'class' => 'bc', 'cols' => 2, 'value' => $conteudo[0]->numAulas);
        $num    = form_textarea($data);
        $data   = array('name' => 'semanaDatas', 'class' => 'bc', 'cols' => 3, 'value' => $conteudo[0]->semanaDatas);
        $semana = form_textarea($data);
        $this->table->set_heading('Conhecimento', 'Saber fazer', 'Saber ser', 'Saber agir', 'Estratégias de Ensino/Aprendizagem', 'Nº de aulas', 'Semana Data');
        $this->table->add_row($conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana);
        $template   = array('table_open'=> '<table>');
        $this->table->set_template($template);
        echo $this->table->generate();
        echo form_submit("btn_cadastro", "Alterar");
    echo form_close();
echo "</div>";