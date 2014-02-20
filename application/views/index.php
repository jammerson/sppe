<?php
echo "<div div='conteudo'>";
echo form_open(base_url('home/login'));
echo form_fieldset("Fazer login");
echo "<span class='validacoes'>".validation_errors()."</span>";
echo form_label('Login', 'login');
$data = array('name' => 'login', 'id' => 'formulario-text');
echo form_input($data);
echo form_label('Senha', 'senha');
$data = array('name' => 'senha', 'id' => 'formulario-text');
echo form_password($data);
echo form_submit("btn_cadastro", "Entrar");
echo form_fieldset_close();
echo form_close();
echo "</div>";
?>