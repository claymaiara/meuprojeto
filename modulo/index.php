<?php

use system\core\Grid;
use system\model\TbFuncionarios;
use system\core\Painel;
use system\core\GridOption;
use system\core\FormController;

include_once '../bootstrap.php';
include_once '../configGlobal.php';
include '../componente/topo.php';
include '../componente/menuprincipal.php';

$coluns = array('','id','nome', 'email', 'endereço', 'telefone');

$users = new TbFuncionarios();

$grid = new Grid($coluns, $users->findAll());

$gridOption = new GridOption('');
$gridOption->setName('editar')
			->setIco('edit')
			->setUrl('#');
$grid->addOption($gridOption);

$form = new FormController();
$form->setForm('../forms/formDefault')
	 ->getForm();

$painel2 = new Painel();
$painel2->setPainelTitle('Pesquisar')
		->setPainelColor('info')
		->show(!isset($_SESSION['action']));



$painel = new Painel();
$painel->setPainelTitle('Lista de Funcionarios')
		->setPainelColor('info')
		->addGrid($grid)
		->show(!isset($_SESSION['action']));
		

include '../componente/rodape.php';