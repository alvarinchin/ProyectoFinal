//Raiz de la app de administración

var app = angular.module('administracion',[]);

// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    
    });

app.controller('clubCtrl', function($scope,$http,$window) {
   
    $scope.cargar();
    
   $scope.club= {
       "codClub":0,
       "nombre":"",
       "origen":"",
       "comunidad":""
   }
   
   $scope.cargar= function(){
   $http.get("http://localhost/ProyectoFinal/andraga/assets/jsons/clubes.json").then(function(response){
      $scope.clubes=response.data; 
   });
   }
   
  
   
   $scope.insertar=function(nombre, origen, comunidad){
       $http({
           method : POST,
           url : "http://localhost/ProyectoFinal/andraga/club/insertar"
       }).then(function (response){
           if(response.data["status"]== "ok"){
               cargar();
           }else{
               $window.alert("fallo");
           }
       });
   }
    
    
});
app.controller('categoriaCtrl', function($scope,$http) {
   
   $scope.categoria= {
       "idCategoria":0,
       "NombreCategoria":"",
       "Competicion":0
   }
   
   $http.get("http://localhost/ProyectoFinal/andraga/assets/jsons/clubes.json").then(function(response){
      $scope.clubes=response.data; 
   });
    
    
});

