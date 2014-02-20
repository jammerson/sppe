<table width="800" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr align="center" valign="middle">
        <td height="30" colspan="2"><h3><strong>PLANEJAMENTO SEMANAL DE CONTEUDOS - <?php echo $turma[0]->periodo; ?> </strong></h3></td>
    </tr>
    <tr align="left" valign="top">
        <td width="364" height="118"><p><strong>Dados  de Identifica&ccedil;&atilde;o:</strong><br>
                <strong>&Aacute;rea: </strong><?php echo $turma[0]->nome_curso; ?><br>
                <strong>Professor: </strong> <?php echo $turma[0]->nome; ?></p></td>
        <td width="436"><p><strong>Tema Central</strong><strong>: </strong><?php echo $plano[0]->tema_central; ?><br>
                <strong>Semana: </strong><?php echo $turma[0]->semana; ?><br>
                <strong>Dura&ccedil;&atilde;o: </strong><?php echo $turma[0]->duracao; ?>  horas aulas.</p></td>
    </tr>
    <tr align="left" valign="top">
        <td height="74"><p><strong>Compet&ecirc;ncias e habilidades: </strong> <?php echo $plano[0]->competencias; ?></p></td>

        <td><p><strong>Conte&uacute;do: </strong>  <?php echo $plano[0]->conteudo; ?></p></td>
    </tr>
    <tr align="left" valign="top">
        <td height="51"><p><strong>Metodologia: </strong> <?php echo $plano[0]->metodologia; ?></p></td>
        <td><p><strong>Recursos Materiais: </strong><?php echo $plano[0]->recursos; ?><br><br>
                <strong>Ambientes: </strong>    <?php echo $plano[0]->avaliacao; ?></p></td>

    </tr>
    <tr align="left" valign="top">
        <td height="196" colspan="2"><p><strong>Avalia&ccedil;&atilde;o: </strong><?php echo $plano[0]->avaliacao; ?></p></td>
    </tr>
</table>
<script>window.print()</script>
