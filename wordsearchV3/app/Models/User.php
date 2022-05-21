<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class User extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;

    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $user;
    private $password;

    public function setUsername($user)
    {
        $this->user = $user;
    }

    public function setUserPsw($password)
    {
        $this->password = $password;
    }

    public function getByName($filtro = '')
    {
        if ($filtro != '') {
            $user = '%' . $filtro . '%';
            $this->query = 'SELECT * FROM users WHERE (user LIKE :user)';
            if (count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad => $valor) {
                    $this->propiedad = $valor;
                }
            }
            return $this->rows;
        }
    }


    public function getEntity($id)
    {
    }
    public function setEntity()
    {
    }
    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
    public function set()
    {
    }
    public function get()
    {
    }
    public function delete($id)
    {
    }
    public function edit()
    {
    }
}
