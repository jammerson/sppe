<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 03/01/14
 * Time: 19:06
 */
if(empty($especificas)){
    $especificas = null;
}
echo "Escola Técnica Redentorista"."<br />";
echo "Planejamento de Ensino"."<br /> <br />";
echo "Eixo                  : ".$turma[0]->eixo. "<br />";
echo "Curso                 : ".$turma[0]->nome_curso. "<br />";
echo "Semestre              : ".$turma[0]->periodo. "<br />";
echo "Módulo                : ".$turma[0]->modulo. "<br />";
echo "Base tecnológica      : ".$turma[0]->nome_base. "<br />";
echo "Carga horária         : ".$turma[0]->duracao. " horas aula<br />";
echo "Distribuiçao de turmas: ".$turma[0]->turno. "<br />";
echo "Professor(a)          : ".$turma[0]->nome. "<br />";
$turma_hidden = array('turma' => $turma[0]->idturma, 'esp' => $especificas[0]->competencias);
echo form_open(base_url('prof/ensino/cadEnsino'), '', $turma_hidden);
    echo "<span class='validacoes'>".validation_errors()."</span>";
    echo form_label('Competências Gerais para a formação do perfil no Módulo:', 'competencias')."<br />";
    $data = array('name' => 'competencias', 'id' => 'form-area-maior', 'value' => $especificas[0]->competencias);
    echo form_textarea($data);
    echo "<br />";
    echo form_label('Recursos Didáticos Utilizados:', 'recursos')."<br />";
    $data = array('name' => 'recursos', 'id' => 'form-area-maior', 'value' => $especificas[0]->recursos);
    echo form_textarea($data);
    echo "<br />";
    echo form_fieldset('Avaliação da Aprendizagem do Aluno (critérios e instrumentos)');
        echo form_label('Critérios de avaliação:', 'avaliacao')."<br />";
        $data = array('name' => 'avaliacao', 'id' => 'form-area-maior', 'value' => $especificas[0]->recursos);
        echo form_textarea($data);
        echo "<br />";
        echo form_label('Instrumentos de avaliação:', 'instrumentos')."<br />";
        $data = array('name' => 'instrumentos', 'id' => 'form-area-maior', 'value' => $especificas[0]->avaliacao);
        echo form_textarea($data);
        echo "<br />";
    echo form_fieldset_close();
    echo form_label('Acompanhamento da execução da Base (auto-avaliação):', 'acompanhamento')."<br />";
    $data = array('name' => 'acompanhamento', 'id' => 'form-area-maior', 'value' => $especificas[0]->acompanhamento);
    echo form_textarea($data);
    echo "<br />";
    echo form_label('Referências Bibliográficas (Bibliografia Básica):', 'referenvcias')."<br />";
    $data = array('name' => 'referencias', 'id' => 'form-area-maior', 'value' => $especificas[0]->referencias);
    echo form_textarea($data);
    echo "<br />";
    echo form_submit("btn_cadastro", "Cadastrar e ir para conteúdos");
echo form_close();