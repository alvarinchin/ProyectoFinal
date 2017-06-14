
var app = angular.module('pantalla', []);
var url = (window.location.host + window.location.pathname).split("/").splice(
        0, 3).join("/");
var base_url = "http://" + url;
// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    $scope.cargar= function(){
        //con esto cargamos todos los datos de los select
        
        
    }
});
app.controller('pantallaCtrl', function($scope, $http) {
     console.log(base_url+"/rotacion/listar");
    $scope.cargar = function() {
        
        $http.get(base_url+"/rotacion/listar").then(function(response){
            console.log(response);
            $scope.rotaciones= response.data["data"];
        })
        
    }
    $scope.cargar();
});
