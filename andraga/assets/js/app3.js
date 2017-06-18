
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
           rotaciones= response.data["data"];
            res=[];
            for( elem in rotaciones){       
                res.push(rotaciones[elem]);
            }
         for (i=0;i<res.length-1;i++){
                if(res[i].orden.posicion>res[i+1].orden.posicion){
                    aux = res[i];
                    res[i]= res[i+1];
                    res[i+1]= aux;
                    i=-1;
                }
                  
            }
           
            if( $scope.longitud==0){
                $scope.rotaciones= res
                $scope.longitud = res.length;
                $scope.buscarUltima();
               
            }
            
            //nueva rotacion
            else if( $scope.longitud!=res.length ){
               
                $scope.rotaciones= res;
                $scope.longitud = res.length;
                 $scope.buscarUltima();
            }
            if($scope.ultima!=null){
                 if(res[$scope.ultima].puntuacion.total!=null){
               $scope.nueva=res[i];
               $scope.rotaciones= res
               $scope.longitud = res.length;
               $scope.mostrarPuntuacion();
               $scope.buscarUltima();
            }
     
            }
           
        });
        
    }
    
    $scope.mostrarPuntuacion=function(){
        
        $( "#dialog" ).dialog( "open" );
        puntuacion= $interval(function(){
            $( "#dialog" ).dialog( "close" );
        },5000,1);
        
    }
    
    $scope.buscarUltima=function(){
        nueva=false;
          for( i=res.length-1;i>0;i--){
                    if(res[i].puntuacion.total==null){
                        nueva=true;
                        $scope.ultima=i;
                  
                        console.log($scope.ultima);
                    }
              
                }
                if(!nueva){
                    $scope.ultima=null;
                }
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

