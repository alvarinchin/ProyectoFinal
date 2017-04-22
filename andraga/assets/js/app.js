//Raiz de la app de administración

var app = angular.module('administracion',[]);

// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    
    });

app.controller('clubCtrl', function($scope,$http) {
   
   $scope.club= {
       "codClub":0,
       "nombre":"",
       "origen":"",
       "comunidad":""
   }
   
   $http.get("http://localhost/ProyectoFinal/andraga/assets/jsons/clubes.json").then(function(response){
      $scope.clubes=response.data; 
   });
    
    
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

