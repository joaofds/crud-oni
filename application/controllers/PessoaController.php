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
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost();
            try {
                $new = new Application_Model_DbTable_Pessoa();
                $new->adicionaPessoa($data);

                return $this->redirect('/pessoa/listar');
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function listarAction()
    {
        $pessoas = new Application_Model_DbTable_Pessoa();
        $this->view->pacientes = $pessoas->fetchAll();
    }

    public function alterarAction()
    {
        $request = $this->getRequest();
        if ($request->isGet()) {
            $id = $request->getParam('id');
            try {
                $pessoa = new Application_Model_DbTable_Pessoa();
                return $this->view->pessoa = $pessoa->pegaPessoa($id);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }

        if ($request->isPost()) {
            $data = $request->getPost();
            try {
                $pessoa = new Application_Model_DbTable_Pessoa();
                $pessoa->alterarPessoa($data);

                return $this->redirect('/pessoa/listar');
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function removerAction()
    {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $pessoa = new Application_Model_DbTable_Pessoa();
        $pessoa->removePessoa($id);

        return $this->redirect('/pessoa/listar');
    }


}









