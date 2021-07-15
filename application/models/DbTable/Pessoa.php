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
    public function alteraPessoa(int $id, array $data)
    {
        if (!$id) {
            throw new \Exception('Registro não encontrados');
        }

        $data =
            [
                'nome'              => $data['nome'],
                'sexo'              => $data['sexo'],
                'data_nascimento'   => $data['nascimento'],
                'convenio'          => $data['convenio'],
            ];
        $this->update($data, 'id = '. $id);
    }

    /**
     * @param int $id
     */
    public function removePessoa(int $id)
    {
        $this->delete('id ='. $id);
    }
}
