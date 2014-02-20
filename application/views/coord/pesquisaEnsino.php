<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 17/01/14
 * Time: 12:07
 */
$array_planos = array();
foreach($plano as $p){
    $push = array(
        $p->nome,
        $p->nome_base,
        $p->data_plano,
        anchor(
            "/coord/home/verPlanoE/".$p->turma, img("assets/imgs/detalhes.png")
        )
    );
    array_push($array_planos, $push);
}
echo "<div class='wraper_table'>";
$this->table->set_heading('Professor', 'Base', 'Data', 'Detalhes');
$template = array('table_open'=> '<table>');
$this->table->set_template($template);
echo $this->table->generate($array_planos);
echo "</div>";