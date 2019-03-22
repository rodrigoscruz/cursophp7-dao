<?php



require_once("config.php");

/*
$root = new Usuario();

$root-> loadbyId(1);

echo $root;


$lista = Usuario::getlist();

echo json_encode($lista);*/

$log = $_GET["persona"];
$senh = $_GET["senha"];


$aluno = new Usuario();

$aluno->setLogin("$log");
$aluno->setSenha("$senh");

$aluno->insert();

echo $aluno;

?>