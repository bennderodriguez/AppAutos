//<html ng-app="app">
    /**
     * Funcion que captura las variables pasados por GET
     * http://www.lawebdelprogramador.com/pagina.html?id=10&pos=3
     * Devuelve un array de clave=>valor
     */
	 
var misdatos = getGET();
console.log(misdatos);
    function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
 
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }
 
    function setValores()
    {
		
        // Cogemos los valores pasados por get
        var valores=getGET();
        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {
                //document.write("<br>clave: "+index+" - valor: "+valores[index]);
            }
			return valores[index];
			
        }else{
            // no se ha recibido ningun parametro por GET
            //document.write("<br>No se ha recibido ningún parámetro");
        }
    }

var valor =setValores();
console.log("pagina que recibi " +valor);

myUrl = defineURL(valor)


var app= angular.module('MyFirstApp',[])
	.controller("FirstController",function($scope,$http)
	{
		
		
		
		console.log("Hola desde angular");
		$http.get(myUrl)
		.success(function(data)
		{
			//console.log(data);
			$scope.posts= data;
	
		})
		.error(function(err)
		{
			console.log("Servicio no disponible"+err);
		});
		
		
	});


//defineURL retorna la url del servicio con los parametros get que el servidor resolvera
//y se la enviamos omo parapetro a $http.get


function defineURL(renglon) {
	var URL="";
	if(renglon==null){
		URL="http://"+host+"/Autos2BE/php/getUsuario.php?Navigate=anterior&&idcliente=10";
		return URL;
	}else{
		URL="http://"+host+"/Autos2BE/php/getUsuario.php?Navigate=anterior&&idcliente=10&&renglon="+renglon;
		return URL;
	}
}


function nextPage() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        return false;
    }else
	{
		console.log("next"+ x);
		//pag=x;
		console.log("nuevo valor de pag"+ pag);
		var nUrl= defineURL(x);
		console.log("next nURL " + nUrl);
		
		
	}
}

function lastPage() {
    var x = document.forms["myForm2"]["fname"].value;
    if (x == "") {
        return false;
    }else
	{
		//console.log(x);
		var la= defineURL(x);
		//console.log(la);
		pag=x;
		myUrl= defineURL(pag);
	}
}