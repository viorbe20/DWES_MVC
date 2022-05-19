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

    private $id;
    private $name;

    //Entity functions
    public function setEntity()
    {
        $this->query = "INSERT INTO words(word)
                             VALUES(:word)";
        $this->parametros['word'] = $this->word;
        $this->get_results_from_query();
        //Devuelve el ID de la última fila insertada, o el último valor de una secuencia de objetos
        $this->id = $this->lastInsert();
    }

    public function getEntity($id)
    {
    }

    public function editEntity()
    {

        $this->query = "
        UPDATE words
        SET name=:name,
        WHERE id = :id
        ";
        $this->parameters['word'] = $this->word;
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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($word)
    {
        $this->word = $word;
    }

    public function getAll($user_data = array())
    {
        foreach ($user_data as $key => $value) {
            $$key = $value;
        }
        $this->query = "SELECT id, word FROM words";
        $this->get_results_from_query();
        $result = $this->rows;
        //Muestra los 4 primeros registros
        $last = array_slice($result, 0, 4);
        return $last;
    }

    public function getByName($word)
    {
        $word = "%" . $word . "%";

        $this->query = "SELECT word, id FROM words WHERE word LIKE :word";
        $this->parametros['word'] = $word;
        $this->get_results_from_query();
        return $this->rows;
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
