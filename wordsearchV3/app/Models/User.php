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

    private $id;
    private $user;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getByLogin($username = '', $passwrd = '')
    {
        if ($username != '' && $passwrd == '') {
            $this->query = "SELECT * FROM users WHERE username = :username AND passwrd = :passwrd";

            //Cargamos los parámetros.
            $this->parametros['username'] = $username;
            $this->parametros['passwrd'] = $passwrd;
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'Encontrado';
        } else {
            $this->mensaje = 'No encontrado';
        }
        return $this->rows;
    }

    public function getByName($filtro = '')
    {
        if ($filtro != '') {
            $username = "%" . $filtro . "%";
            $this->query = "SELECT * FROM users WHERE (username LIKE :username)";
            // Cargamos los parámetros
            $this->parametros['username'] = $username;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        // if (count($this->rows) == 1) {
        //     foreach ($this->rows[0] as $propiedad => $valor) {
        //         $this->$propiedad = $valor;
        //     }
        // }
        return $this->rows;
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
