<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 25/11/13
 * Time: 21:56
 */
echo doctype('html5');
echo "<html>";
echo "<head>";
echo "<title>Sistema Pedagógico de Planejamento Escolar</title>";
echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
$meta = array(
    array('name' => 'robots', 'content' => 'no-cache'),
    array('name' => 'description', 'content' => 'Sistema Pedagógico de Planejamento Escola - SPPE'),
    array('name' => 'keywords', 'content' => ''),
    array('name' => 'robots', 'content' => 'no-cache'),
    array('name' => 'content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
);
echo meta($meta);
echo link_tag(array('href' => 'assets/css/teste.css', 'rel' => 'stylesheet', 'type' => 'text/css'));
echo "</head>";
echo "<body>";

?>
<p><?php echo $contents ?></p>
<div class="rodape">
    <p> <?php echo "Carregado em ".$this->benchmark->elapsed_time()." segundos"; ?> </p>
</div>
</body>
</html>
