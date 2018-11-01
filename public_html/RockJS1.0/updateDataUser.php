<?php

/**
 * @copyright (c) 2017, RockJS Framework by Focus On Serivices
 * @version 1.0
 * @requires OpenEdge 102b or 91d
 * @author RockJS Framework by Focus On Serivices
 * @license http://focusonservices.com/rockjs FOCUS ON SERVICES
 * @throws Windows Server Version
 * 
 */
/*
  |--------------------------------------------------------------------------
  | Service Web
  |--------------------------------------------------------------------------
  | Debe especificar el nombre del programa .P Transformado por RockJS  definida en $_GET["p"]
  | La funcion setProgram hace el llamado al programa .P y lleva a cabo su ejecucion
  | Mostrando el setResult con el atributo $Rockobj
  | Puede modificar el llamado con variables estaticas o como mejor convenga
 */

/** Incluimos el openrocks*/
include_once "rockjs/openrockjs.php";
/** agregamos el script de configuracion RockJS a nuestro proyecto*/
include_once "rockjs/RockJSconf.php";
/**
 * @var String = Variable que guarda los errores que puedan existir al ejecutar
 */
$errorMSG = "";
/** @var Bolean = Constante de seguridad del RockJSconf*/
$secure = constant("secure");
/**
 * @abstract getSession
 * @static funcion que evalua var: secure para definir seguridad por SESSION 
 * @param type $secure Description  El valor determina si usara seguridad mediante SESSION
 */
switch ($secure) {
    case true:
        //Si $secure es verdadero incluimos las autenticacion de session
        include 'config/session.php';
        break;
    case false:
        break;
    default:
        $errorMSG = "<pre>Error in Default Session Settings value:  $secure <br>check the <strong>configuration file</strong><pre>";
}

// EMAIL
if   (empty($_POST["nombre"])
  ||empty($_POST["idCliente"])
  ||empty($_POST["email"])
  ||empty($_POST["phone"])
  ||empty($_POST["idContrato"])
  ||empty($_POST["FechaApertura"])
  ||empty($_POST["Vehiculo"])
  ||empty($_POST["Navigate"])
) {
    echo $errorMSG .= "Datos Erroneos";
} else {
      $nombre = $_POST["nombre"];
      $idCliente = $_POST["idCliente"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $idContrato = $_POST["idContrato"];
    $FechaApertura = $_POST["FechaApertura"];
    $Vehiculo = $_POST["Vehiculo"];
    $Navigate = $_POST["Navigate"];
    setProgram("pruebaphp");
}
/**
 * 
 * @param type $prog Description:
 * Define el objeto programa Progress concatenando los elementos necesarios 
 * para la ejecucion en RockJS
 */
function setProgram($prog) {
    /* Creación del objeto RockJS */
    $Rockobj = new RockJS;
    /**
     * <b>_openrockjs:</b>
     * @method type _openrockjs(type $Programa) Description:
     * Crea una instancia de la clase RockJS y retorna una valor Boleano
     * False: Error
     * True: Muestra el resultado de la ejecucion
     */
    if ($Rockobj->_openrockjs($prog) == false) {
        echo 'Something went wrong please try again';
    } else {
        echo $Rockobj->setResult;
    }
}

?>