<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 15/01/14
 * Time: 16:05
 */
foreach($professor as $prof){
    $array_prof[$prof->login] = $prof->nome;
}
array_unshift($array_prof, 'Selecione um professor');

foreach($periodo as $peri){
    $array_peri[$peri->periodo] = $peri->periodo;
}
array_unshift($array_peri, 'Selecione um período');

echo "<div div='conteudo'>";
echo heading('Pesquisa de Planos de Aula', 2);
echo form_open(base_url('coord/home/pesquisaAula'));
echo "<span class='validacoes'>".validation_errors()."</span>";
echo form_label('Professor: ', 'professor');
echo form_dropdown('professor', $array_prof, '', 'id="formulario-text"');
echo "<br />";
echo form_label('Período: ', 'periodo');
echo form_dropdown('periodo', $array_peri, '', 'id="formulario-text"');
echo "<br />";
echo form_label('Base Tecnológia', 'base');
$data = array('name' => 'base', 'id' => 'formulario-text');
echo form_input($data);
echo "<br />";
echo form_submit("btn_cadastro", "Buscar");
echo form_close();
echo "</div>";