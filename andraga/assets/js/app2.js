
var app = angular.module('gestion', []);
var url = (window.location.host + window.location.pathname).split("/").splice(
        0, 3).join("/");
var base_url = "http://" + url;
// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
    $scope.cargar= function(){
        //con esto cargamos todos los datos de los select
        
        
    }
});
app.controller('inscripcionesCtrl', function($scope, $http) {
   
    $scope.cargar = function() {
        $http.get(base_url + "/club/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.clubes = response.data["data"];
        });
        $http.get(base_url + "/categoria/listar").then(
                function(response) {
                    
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.categorias = response.data["data"];
            
        });
        $http.get(base_url + "/deportista/listar").then(
                function(response) {
                    $scope.deportistas = [];
            console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            
            for (x in response.data["data"]) {
                $scope.deportistas.push(response.data["data"][x]);
            }
            
        });
        $http.get(base_url + "/competicion/listar").then(
                function(response) {
                    $scope.competiciones = [];
            console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            
            for (x in response.data["data"]) {
                $scope.competiciones.push(response.data["data"][x]);
            }
            
        });
        $http.get(base_url + "/especialidad/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.especialidades = response.data["data"];
            
        });
        
        
        
        
        
        
        
        
    }
    
    
    
    
    $scope.cargar();
});
app.controller('rotacionCtrl', function($scope, $http) {
    
});