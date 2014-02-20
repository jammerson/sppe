<?php
if(!empty($usuario)){
echo "<div div='conteudo'>";
echo heading('Cadastro de Usuário', 2);
echo form_open(base_url('coord/cadastro/editUsu'));
    echo form_fieldset("Cadastro");
        echo "<span class='validacoes'>".validation_errors()."</span>";
        echo form_hidden('perfil', 'coordenador');
        echo form_label('Nome', 'nome');
        $data = array('name' => 'nome', 'id' => 'formulario-text', 'value' => $usuario[0]->nome);
        echo form_input($data);
        echo "<br />";
        echo form_label('Email', 'email');
        $data = array('name' => 'email', 'id' => 'formulario-text', 'value' => $usuario[0]->email);
        echo form_input($data);
        echo "<br />";
        echo form_label('Telefone', 'telefone');
        $data = array('name' => 'telefone', 'id' => 'formulario-text', 'value' => $usuario[0]->telefone);
        echo form_input($data);
        echo "<br />";
        echo form_label('Login', 'login');
        $data = array('name' => 'login', 'id' => 'formulario-text', 'value' => $usuario[0]->login);
        echo form_input($data);
        echo "<br />";
        echo form_label('Senha', 'senha');
        $data = array('name' => 'senha', 'id' => 'formulario-text', 'value' => $usuario[0]->senha);
        echo form_input($data);
        echo "<br />";
        echo form_submit("btn_cadastro", "Alterar");
    echo form_fieldset_close();
echo form_close();
echo "</div>";
}else{
    "Não foi encontrado nenhuma ocorrência";
}
?>