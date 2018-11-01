<?php
include_once 'builder_factory.php';
include "openprgs.conf";


	// Validamos que la peticion GET no este vacia
	if (empty($_GET["p"])) {
		echo "Program is required ";
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