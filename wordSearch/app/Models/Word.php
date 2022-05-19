<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class word extends DBAbstractModel
{
    /*MODELO SINGLETON. Si hay instancia, la devuelve. Si no, la crea y la devuelve*/
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
    private $word;

    public function setNombre($word)
    {
        $this->word = $word;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function set($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "INSERT INTO words(word)
                        VALUES(:word)";
        $this->parametros['word'] = $word;
        $this->get_results_from_query();
        //$lastId = $this->lastInsert();
        //echo $lastId;
    }

    //MOstrar primeras cinco
    public function get($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "SELECT id, word FROM words";
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    /**
     * Busca una palabra dada
     */
    public function getByName($filtro = '')
    {
        if ($filtro != '') {
            $palabra = "%" . $filtro . "%";
            $this->query = "SELECT * FROM words WHERE (word LIKE :word)";
            // Cargamos los parámetros
            $this->parametros['word'] = $palabra;

            // Ejecutamos consulta que devuelve registros
            $this->get_results_from_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
        return $this->rows;
    }

    public function delete($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "DELETE FROM words WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }

    public function edit($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE words SET word=:word WHERE id=:id";
        $this->parametros['word'] = $word;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }


    public function setEntity()
    {
    }
    public function getEntity($id)
    {
    }
    public function deleteEntity($id)
    {
    }
    public function editEntity()
    {
    }
}
