
<?php
    $array_turma = array('' => 'Selecione uma turma');
    foreach($turma as $t){
        $array_turma[$t->idturma] = $t->nome_curso .' / '. $t->nome_base .' / '. $t->periodo .' / '. $t->turno;
    }

echo "<div div='conteudo'>";
echo heading('Cadastro de Planos de Aula', 2);
    echo form_open(base_url('prof/aula/cadAula'));
        echo form_fieldset("Cadastro");
        echo "<span class='validacoes'>".validation_errors()."</span>";
        echo form_label('Turma: ', 'turma');
        echo form_dropdown('turma', $array_turma, '', 'id="formulario-maior"');
        echo "<br />";
        echo form_label('Tema central: ', 'tema_central');
        $data = array('name' => 'tema_central', 'id' => 'formulario-maior');
        echo form_input($data);
        echo "<br />";
        echo form_label('Competências e habilidades: ', 'competencias');
        $data = array('name' => 'competencias', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo form_label('Conteudo Programático: ', 'conteudo');
        $data = array('name' => 'conteudo', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo "<br />";
        echo form_label('Metodologia: ', 'metodologia');
        $data = array('name' => 'metodologia', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo form_label('Recursos: ', 'recursos');
        $data = array('name' => 'recursos', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo "<br />";
        echo form_label('Ambientes: ', 'ambientes');
        $data = array('name' => 'ambientes', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo form_label('Avaliação: ', 'avaliacao');
        $data = array('name' => 'avaliacao', 'id' => 'formulario-text');
        echo form_textarea($data);
        echo "<br />";
        echo form_submit("btn_cadastro", "Cadastrar");
        echo form_fieldset_close();
    echo form_close();
echo "</div>";