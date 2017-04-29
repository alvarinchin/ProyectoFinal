//Raiz de la app de administración

var app = angular.module('administracion',[]);

// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    $scope.campos;
    $scope.nuevo=function(campo){
        $scope.titulo=campo;
        switch(campo){
            case "Club": $scope.campos=[
                    "nombre",
                    "origen",
                    "comunidad"];break;
            case "Categoria": $scope.campos=[
                    "nombre"
                    ];break;
        }
      
    }
    
});

app.controller('clubCtrl', function($scope,$http,$window) {
 
    $scope.club= {
        "codClub":0,
        "nombre":"",
        "origen":"",
        "comunidad":""
    }
    $scope.campos=[
                    "nombre",
                    "origen",
                    "comunidad"];
    $scope.nombre;
    $scope.origen;
    $scope.comunidad;
   
    $scope.cargar= function(){
        $http.get("http://localhost/ProyectoFinal/andraga/club/listar").then(function(response){
            $scope.clubes=response.data["data"]; 
        });
    }
   
  
    $scope.cargar();
    $scope.insertar=function(){
        
        config= {
            method : "POST",
            url : "http://localhost/ProyectoFinal/andraga/club/insertar",
            params : {nombre : $scope.nombre ,  origen : $scope.origen ,comunidad : $scope.comunidad}
        };
       
        $http(config).then(function (response){
             console.log(response.data);
          
            
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
  
  
    $scope.nombre;
  
    $http.get("http://localhost/ProyectoFinal/andraga/assets/jsons/clubes.json").then(function(response){
        $scope.clubes=response.data["data"]; 
    });
    
    
});

