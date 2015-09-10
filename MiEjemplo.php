<?php

//Patron Singleton
class ClassBaseDatos{

private static $_instancia; //Nuestra variable se crea solo una vez por cada clase y solo puede ser usada en esta funcion

private function __clone() { }//Con este metodo como private se evita la creacion del objeto desde el exterior de la clase
private function __construc() { }//Con este metodo como private se evita la creacion del objeto desde el exterior de la clase

public static function create()// El procedimiento habitual de crear un objeto ya no es posible, por lo que definimos una funcion donde instanciar
{//Con el static llamamos a la funcion sin la necesidad de instanciar la clase
  if (!self::$_instancia instanceof self)
    self::$_instancia=new self();

  return self::$_instancia;
}

public $usuario = 'no definido';
}

$conexion1 = ClassBaseDatos::create();//se crea la conexion
$conexion1->usuario = 'User X';

//procedemos a hacer el acceso global mediante otra variable
$conexion2 = ClassBaseDatos::create();

//comprobamos si realmente esta funcionando
echo $conexion2->usuario; // imprime 'Usuario 1'

//realizamos otra prueba
$conexion2->usuario = ' User Update';
echo $conexion1->usuario; // imprime 'Usuario Actualizado'
?>
