<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 04/01/14
 * Time: 16:51
 */
echo "<div div='conteudo'>";
    $hidden = array('turma' => $turma);
    echo form_open(base_url('prof/ensino/cadConteudo'),'', $hidden);
        echo form_label('Conteúdo: ', 'titulo');
        $data = array('name' => 'titulo', 'id' => 'formulario-maior');
        echo form_input($data);
        echo "<br />";
        $data   = array('name' => 'conhecimento', 'class' => 'bc', 'cols' => 10);
        $conhecimento   = form_textarea($data);
        $data   = array('name' => 'fazer', 'class' => 'bc', 'cols' => 10);
        $fazer  = form_textarea($data);
        $data   = array('name' => 'ser', 'class' => 'bc', 'cols' => 10);
        $ser    = form_textarea($data);
        $data   = array('name' => 'agir', 'class' => 'bc', 'cols' => 10);
        $agir   = form_textarea($data);
        $data   = array('name' => 'estrategiasEnsino', 'class' => 'bc', 'cols' => 15);
        $estrategias    = form_textarea($data);
        $data   = array('name' => 'numAulas', 'class' => 'bc', 'cols' => 2);
        $num    = form_textarea($data);
        $data   = array('name' => 'semanaDatas', 'class' => 'bc', 'cols' => 3);
        $semana = form_textarea($data);
        $this->table->set_heading('Conhecimento', 'Saber fazer', 'Saber ser', 'Saber agir', 'Estratégias de Ensino/Aprendizagem', 'Nº de aulas', 'Semana Data');
        $this->table->add_row($conhecimento, $fazer, $ser, $agir, $estrategias, $num, $semana);
        $template   = array('table_open'=> '<table>');
        $this->table->set_template($template);
        echo $this->table->generate();
        echo form_submit("btn_cadastro", "Cadastrar");
    echo form_close();
echo "</div>";