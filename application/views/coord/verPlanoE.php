<meta charset="utf-8" />

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr align="center">
        <td>
                <p><strong> PLANEJAMENTO DE ENSINO</strong><br />
                </p>
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p>
                                EIXO:  <?php echo $turma[0]->eixo; ?><br />
                                CURSO:  <?php echo $turma[0]->nome_curso; ?><br />
                                BASE:   <?php echo $turma[0]->nome_base; ?> <br />
                                M&Oacute;DULO: <?php echo $turma[0]->modulo; ?><br />
                                CARGA HOR&Aacute;RIA: <?php echo $turma[0]->duracao; ?> Horas/aula<br />
                                DISTRIBUI&Ccedil;&Atilde;O DE TURMAS: <?php $turma[0]->turno; ?><br />
                                PROFESSOR(A): <?php echo $turma[0]->nome; ?></p></td>

                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>CONTE&Uacute;DOS:</strong></p>
                            <?php
                            foreach($conteudos as $c){
                                echo $c->numero." - ".$c->titulo."<br/>";
                            }
                            ?>
                        <br /></td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>Compet&ecirc;ncias Gerais para a forma&ccedil;&atilde;o do perfil no M&oacute;dulo:</strong></p>
                            <?php echo $plano[0]->competencias; ?>
                            <br /></td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
                    <tr align="center">
                        <td height="32" colspan="5"> <strong>Compet&ecirc;ncias Espec&iacute;ficas</strong></td>
                        <td width="145" rowspan="2">Estrat&eacute;gias<br />
                            de<br />
                            Ensino/Aprendizagem</td>
                        <td width="49" rowspan="2">N&#176;<br />
                            de<br />
                            Aulas</td>
                        <td width="101" rowspan="2">Semana Data</td>
                    </tr>
                    <tr align="center">
                        <td width="54">Cont.</td>
                        <td width="164">Conhecimento</td>
                        <td width="159">Saber Fazer</td>
                        <td width="155">Saber Ser</td>
                        <td width="155">Saber Agir</td>
                    </tr>
                    <tr>
                        <?php foreach($conteudos as $c){ 	?>
                        <td><?php echo $c->numero ; ?></td>
                        <td><?php echo $c->conhecimento; ?></td>
                        <td><?php echo $c->fazer; ?></td>
                        <td><?php echo $c->ser; ?></td>
                        <td><?php echo $c->agir; ?></td>
                        <td><?php echo $c->estrategiasEnsino; ?></td>
                        <td><?php echo $c->numAulas; ?></td>
                        <td><?php echo $c->semanaDatas; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>Recursos Did&aacute;ticos  Utilizados:</strong></p>
                            <?php echo $plano[0]->recursos; ?><br /></td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>Avalia&ccedil;&atilde;o da  Aprendizagem do Aluno (crit&eacute;rios e instrumentos):</strong><br />
                                <strong>Crit&eacute;rios de avalia&ccedil;&atilde;o:<br /></strong>
                                <?php echo $plano[0]->avaliacao; ?><br/>
                                <strong>Instrumentos:</strong><br/>
                                <?php echo $plano[0]->instrumentos; ?><br /></td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>Acompanhamento da  execu&ccedil;&atilde;o da Base (auto-avalia&ccedil;&atilde;o):</strong></p>
                            <?php echo $plano[0]->acompanhamento; ?><br />
                        </td>
                    </tr>
                </table>
                <br />
                <table width="1000" border="1" cellspacing="0" cellpadding="0"  bordercolor="#000000">
                    <tr>
                        <td><p><strong>Refer&ecirc;ncias  Bibliogr&aacute;ficas (Bibliografia B&aacute;sica):</strong></p>
                            <p><?php echo $plano[0]->referencias; ?></p></td>
                    </tr>
                </table>
                <br />
            </td>
    </tr>
</table>
<script>window.print()</script>

