//Raiz de la app de administración

var app = angular.module('administracion',[]);
var url=(window.location.host+window.location.pathname).split("/").splice(0,3).join("/");
var base_url="http://"+url;
// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    

    
});

app.controller('clubCtrl', function($scope,$http,$window) {
 
    $scope.club= {
        "codClub":0,
        "nombre":"",
        "origen":"",
        "comunidad":""
    }
    $scope.nombreE="";
    $scope.origenE="";
    $scope.comunidadE=""
    $scope.idE=""
    
    $scope.campos=[
        "nombre",
        "origen",
        "comunidad"];
    $scope.nombre;
    $scope.origen;
    $scope.comunidad;
   
    $scope.cargar= function(){
        $http.get(base_url+"/club/listar").then(function(response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.clubes=response.data["data"]; 
            
        });
    }

    $scope.cargar();
    $scope.insertar=function(){
        
        config= {
            method : "POST",
            url : base_url+"/club/insertar",
            params : {nombre : $scope.nombre ,  origen : $scope.origen ,comunidad : $scope.comunidad}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
             
            $scope.nombre="";
            $scope.origen="";
            $scope.comunidad="";
            $scope.cargar();
        });
    }
    
    $scope.datos=function(club){
        $scope.nombreE=club.nombre;
            $scope.origenE=club.origen;
            $scope.comunidadE=club.comunidad;
            $scope.idE=club.id;
    }
    
    
     $scope.modificar=function(){
        
        config= {
            method : "POST",
            url : base_url+"/club/insertar",
            params : {nombre : $scope.nombreE , id : $scope.idE ,  origen : $scope.origenE ,comunidad : $scope.comunidadE}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
             
            $scope.nombre="";
            $scope.origen="";
            $scope.comunidad="";
            $scope.cargar();
        });
    }
    
    $scope.borrar=function(club){
  
        config= {
            method : "POST",
            url : base_url+"/andraga/club/borrar",
            params : {id : club.id}
        };
       
        $http(config).then(function (response){
       
            console.log(response.data["status"]+" : "+response.data["msg"]);
        
            $scope.cargar();
        });
    }
    
  
});
app.controller('categoriaCtrl', function($scope,$http) {
   
    $scope.categoria= {
        "idCategoria":0,
        "NombreCategoria":"",
        "Competicion":0
    }
 
    
    
});

