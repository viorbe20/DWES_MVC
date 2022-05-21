<?php

namespace App\Models;

require_once("DBAbstractModel.php");

class Word extends DBAbstractModel
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

    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    //Propiedades del objeto
    private $id;
    private $word;

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getWord()
    {
        return $this->word;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    //Objetos
    public function setEntity()
    {
        $this->query = "INSERT INTO words(word)
        VALUES(:word)";
        $this->parametros['word'] = $this->word;
        $this->get_results_from_query();
        //Devuelve el ID de la última fila insertada, o el último valor de una secuencia de objetos
        //$this->id = $this->lastInsert();
    }

    public function getEntity($id)
    {
        $this->query = "SELECT word FROM words WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function editEntity()
    {
        $this->query = "UPDATE words SET word=:word WHERE id=:id";
        $this->parametros['word'] = $this->word;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function deleteEntity($id)
    {
        $this->query = "DELETE FROM words
            WHERE id = :id";
        $this->parameters['id'] = $id;
        $this->get_results_from_query();
    }

    //Otros métodos

    public function getByName($name)
    {
        $name = "%" . $name . "%";

        $this->query = "SELECT name, id FROM words WHERE name LIKE :name";
        $this->parameters['name'] = $name;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getAll()
    {
        $this->query = "SELECT word, id FROM words";
        $this->get_results_from_query();
        //Muestra los 4 últimos registros
        $last = array_slice(array_reverse($this->rows), 0, 4);
        return $last;
    }

    //Métodos que pide la clase para no dar error
    public function get()
    {
    }
    public function set()
    {
    }
    public function edit()
    {
    }
    public function delete($user_data = array())
    {
    }
}
