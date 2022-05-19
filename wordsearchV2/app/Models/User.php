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

    private $usuario;
    private $contrasena;
    private $perfil;

    public function setNombre($usuario)
    {
        $this->usuario = $usuario;
    }
    
    public function setPassword($contrasena)
    {
        $this->contrasena = $contrasena;
    }


    public function set($user_data = array()){}

    public function get($user_data = array())
    {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        
        $this->query = "SELECT usuario, contrasena, perfil FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena";
        $this->parametros['usuario'] = $user_data[0];
        $this->parametros['contrasena'] = $user_data[1];
        $this->get_results_from_query();
        $resultado = $this->rows;
        return $resultado;
    }

    public function delete($user_data = array()){}

    public function edit($user_data = array()){}

    public function setEntity(){}
    public function getEntity($id){}
    public function deleteEntity($id){}
    public function editEntity(){}
    
}