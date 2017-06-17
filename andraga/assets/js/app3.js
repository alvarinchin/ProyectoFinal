
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
app.controller('pantallaCtrl', function($scope, $http ,$interval) {
    //console.log(base_url+"/rotacion/listar");
    $scope.longitud=0;
    
    
    
    
    
    $scope.cargar = function() {
        
        $http.get(base_url+"/rotacion/listar").then(function(response){
            
            if( $scope.longitud==0){
                $scope.rotaciones= response.data["data"];
                $scope.longitud = response.data["size"];
                $scope.nueva=response.data["data"][(Object.keys(response.data["data"]).length)-1];
            }
            
            //nueva entrada
            else if( $scope.longitud<response.data["size"]){
                $scope.rotaciones= response.data["data"];
                $scope.longitud = response.data["size"];
                $scope.nueva=response.data["data"][(Object.keys(response.data["data"]).length)-1];
                $scope.mostrarPuntuacion();
                
                
                
            } else if( $scope.longitud>response.data["size"]){
                $scope.rotaciones= response.data["data"];
                $scope.longitud = response.data["size"];
                
            }
            
        });
        
    }
    
    $scope.mostrarPuntuacion=function(){
        $( "#dialog" ).dialog( "open" );
        puntuacion= $interval(function(){
            $( "#dialog" ).dialog( "close" );
        },5000,1);
        
    }
    
    
    
    marcador=$interval(function(){
        $scope.cargar();
        
    },1000);
    $scope.cargar();
    
    
    
    
    
    
    
});

    
    
    
    
$( function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        },
        height: 600,
        width: 800,
        dialogClass: "no-close"
        
    });
    
} );

