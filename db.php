<?php
  //Realiza conexión con BDD
  class db
  {
    //$conexion recibirá la instancia de la BDD
    public static $conexion;

    private function __construct(){}

      //Función para conectar con la BDD e introducir esta conexión en $conexion
      public static function getInstance()
      {
        //Verifica que la conexión esté introducida en $conexion
        if (!isset(self::$conexion))
        {
          //Crea un objeto PDO y realiza la conexión con la BDD
          self::$conexion = new PDO('mysql:host=localhost;dbname=nba', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$conexion->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        //Devuelve $conexion relleno
        return self::$conexion;
      }
    }
?>
