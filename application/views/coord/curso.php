<?php
echo "<div div='conteudo'>";
echo heading('Cadastro de Curso', 2);
echo form_open(base_url('coord/cadastro/cadCurso'));
echo form_fieldset("Cadastro");
echo "<span class='validacoes'>".validation_errors()."</span>";
echo form_label('Nome', 'nome');
$data = array('name' => 'nome', 'id' => 'formulario-text');
echo form_input($data);
echo "<br />";
echo form_label('Eixo', 'eixo');
$data = array('name' => 'eixo', 'id' => 'formulario-text');
echo form_input($data);
echo "<br />";
echo form_submit("btn_cadastro", "Cadastrar");
echo form_fieldset_close();
echo form_close();
echo "</div>";
?>