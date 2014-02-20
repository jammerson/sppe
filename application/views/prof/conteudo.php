<script type="text/javascript" src="<?php echo base_url() . 'assets/facebox/lib/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/facebox/src/facebox.js'; ?>"></script>
<?php echo link_tag(array('href' => 'assets/facebox/src/facebox.css', 'rel' => 'stylesheet', 'type' => 'text/css')); ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage : '<?php echo base_url('assets/facebox/src/loading.gif');?>',
            closeImage   : '<?php echo base_url('assets/facebox/src/closelabel.png');?>'
        })
    })
</script>
<?php
if(!empty($conteudos)):
    $array_conteudos = array();
    foreach($conteudos as $c){
        $push = array(
            $c->numero,
            $c->titulo,
            $c->numAulas,
            $c->semanaDatas,
            anchor(
                "/prof/ensino/alteraEspecificas/".$c->idconteudos , img("assets/imgs/altera.png"), 'rel="facebox"'
            ),
            anchor(
                base_url("/prof/ensino/excluir/".$c->idconteudos."/".$c->turma."/".$c->numero), img("assets/imgs/exclui.png"),
                array('onclick' => "return confirm('Confirma a exclusão desse conteúdo?');")
            )
        );
        array_push($array_conteudos, $push);
    }
    echo "<div class='wraper_table'>";
    $this->table->set_heading('Nº', 'Conteúdo', 'Nº de aulas', 'Semana/Data', 'Alterar', 'Excluir');
    $template = array('table_open'=> '<table>');
    $this->table->set_template($template);
    echo $this->table->generate($array_conteudos);
    echo "</div>";
endif;
echo anchor(base_url('/prof/ensino/especificas/'.$turma), 'Novo', 'rel="facebox"');
echo anchor(base_url('/prof/ensino/'), 'Concluir', array('onclick' => "return confirm('Plano enviado com sucesso, deseja continuar?');"));



