<?php
include_once 'builder_factory.php';
include "openprgs.conf";
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    echo $errorMSG = "Name is required ";
} else {
    echo $name = $_POST["name"]."<br>";
}

// EMAIL
if (empty($_POST["email"])) {
    echo $errorMSG .= "Email is required ";
} else {
    echo $email = $_POST["email"]."<br>";
}

// phone
if (empty($_POST["phone"])) {
    echo $errorMSG .= "Email is required ";
} else {
    echo $phone = $_POST["phone"]."<br>";
}


// Validamos que la peticion GET no este vacia
	if (empty($_GET["p"])) {
		setProgram("suauto");
	} else {
		$prog = $_GET["p"];
		setProgram($prog);
	}

	function setProgram($prog){
		$Programa = builder_factory::create($prog);
		//echo $Programa->getType() . " " . $Programa->prog ;
		$myDLC=new DLC;
		if ($myDLC->Execute("$Programa->prog") == false)
		{
			print "(" . $myDLC->sysErrNo . ") " . $myDLC->sysErrDesc;
		} 
		else 
		{
			echo $myDLC->dlcData;
		}
	}




?>