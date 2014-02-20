<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/base.js'; ?>"></script>
<script type="text/javascript">
    var path = '<?php echo site_url(); ?>'
</script>
<?php
if(empty($curso) || empty($usuario) || empty($base)){
        echo "favor verificar os outros cadastros para prosseguir";
        echo '<a href="javascript:history.go(-1)">Voltar</a>';
}else{
    foreach($curso as $c){
        $array_curso[$c->idcurso] = $c->nome_curso;
    }
    array_unshift($array_curso, 'Selecione um curso');
    foreach($usuario as $u){
        $array_usuario[$u->idusuario] = $u->nome;
    }
    $array_turno = array(
       'manha'  => 'Manhã',
       'tarde'  => 'Tarde',
       'noite'  => 'Noite'
    );
    echo "<div div='conteudo'>";
    echo heading('Cadastro de Turma', 2);
    echo form_open(base_url('coord/cadastro/cadTurma'));
        echo form_fieldset("Cadastro");
            echo "<span class='validacoes'>".validation_errors()."</span>";
            echo form_label('Curso', 'curso');
            echo form_dropdown('curso', $array_curso, '', 'id="formulario-text"');
            echo "<br />";
            echo form_label('Professor', 'usuario');
            echo form_dropdown('usuario', $array_usuario, '', 'id="formulario-text"');
            echo "<br />";
            echo form_label('Período', 'periodo');
            $data = array('name' => 'periodo', 'id' => 'formulario-text');
            echo form_input($data);
            echo "<br />";
            echo form_label('Base', 'base');
            echo form_dropdown('base', array('' => 'Escolha um Curso'), '','id="formulario-text"' );
            echo "<br />";
            echo form_label('Turno', 'turno');
            echo form_dropdown('turno', $array_turno, '', 'id="formulario-text"');
            echo "<br />";
            echo form_submit("btn_cadastro", "Cadastrar");
        echo form_fieldset_close();
    echo form_close();
    echo "</div>";
}
?>