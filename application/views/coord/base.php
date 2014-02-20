<?php
if(empty($curso)){
        echo "Sem cursos cadastrados, favor verificar ";
        echo '<a href="javascript:history.go(-1)">Voltar</a>';
}else{
    foreach($curso as $c){
        $array_curso[$c->idcurso] = $c->nome_curso;
    }
    echo "<div div='conteudo'>";
    echo heading('Cadastro de Base', 2);
    echo form_open(base_url('coord/cadastro/cadBase'));
        echo form_fieldset("Cadastro");
            echo "<span class='validacoes'>".validation_errors()."</span>";
            echo form_label('Módulo', 'modulo');
            echo form_radio('modulo', '1');
            echo "1 ";
            echo form_radio('modulo', '2');
            echo "2 ";
            echo form_radio('modulo', '3');
            echo "3 <br />";
            echo form_label('Duração', 'duracao');
            $data = array('name' => 'duracao', 'id' => 'formulario-mini');
            echo form_input($data);
            echo " horas aula<br />";
            echo form_label('Semana', 'semana');
            $data = array('name' => 'semana', 'id' => 'formulario-text');
            echo form_input($data);
            echo " <br />";
            echo form_label('Curso', 'curso');
            echo form_dropdown('curso', $array_curso, '', 'id="formulario-text"');
            echo " <br />";
            echo form_label('Nome', 'nome_curso');
            $data = array('name' => 'nome_curso', 'id' => 'formulario-text');
            echo form_input($data);
            echo "<br />";
            echo form_submit("btn_cadastro", "Cadastrar");
        echo form_fieldset_close();
    echo form_close();
    echo "</div>";
}
?>