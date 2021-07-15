<?php

class PessoaController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function adicionarAction()
    {
        // action body
    }

    public function listarAction()
    {
        $pessoas = new Application_Model_DbTable_Pessoa();
        $this->view->pacientes = $pessoas->fetchAll();
    }

    public function alterarAction()
    {
        // action body
    }

    public function removerAction()
    {
        // action body
    }


}









