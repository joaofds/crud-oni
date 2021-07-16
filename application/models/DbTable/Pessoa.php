<?php

class Application_Model_DbTable_Pessoa extends Zend_Db_Table_Abstract
{

    /**
     * @var string
     */
    protected $_name = 'pessoas';

    /**
     * @param array $data
     */
    public function adicionaPessoa(array $data)
    {
        $nascimento = "{$data['ano']}-{$data['mes']}-{$data['dia']}";
        $data =
            [
                'nome'              => $data['nome'],
                'sexo'              => $data['sexo'],
                'data_nascimento'   => $nascimento,
                'convenio'          => $data['convenio'],
            ];
        $this->insert($data);
    }

    /**
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function pegaPessoa(int $id)
    {
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new \Exception('Registro não encontrados');
        }
        return $row->toArray();
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function alterarPessoa(array $data)
    {
        if (!isset($data['id'])) {
            throw new \Exception('Registro não encontrados');
        }

        $id = (int)$data['id'];
        $nascimento = "{$data['ano']}-{$data['mes']}-{$data['dia']}";
        $data =
            [
                'nome'              => $data['nome'],
                'sexo'              => $data['sexo'],
                'data_nascimento'   => $nascimento,
                'convenio'          => $data['convenio'],
            ];
        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($data, $where);
    }

    /**
     * @param int $id
     */
    public function removePessoa(int $id)
    {
        $this->delete('id ='. $id);
    }
}
