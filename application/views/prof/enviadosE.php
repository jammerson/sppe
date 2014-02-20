<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 03/01/14
 * Time: 15:13
 */
$array_turmas = array();
foreach($turma as $t){
    $push = array(
        $t->nome_curso,
        $t->periodo,
        $t->nome,
        $t->turno,
        anchor(
            "/prof/ensino/enviar/".$t->idturma , img("assets/imgs/encon.png")
        )
    );
    array_push($array_turmas, $push);
}
echo "<div class='wraper_table'>";
$this->table->set_heading('Curso', 'Período', 'Base', 'Turno', 'Enviar');
$template = array('table_open'=> '<table>');
$this->table->set_template($template);
echo $this->table->generate($array_turmas);
echo "</div>";