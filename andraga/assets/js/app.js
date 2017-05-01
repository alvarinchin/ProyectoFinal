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
            url : base_url+"/club/modificar",
            params : {nombre : $scope.nombreE , id : $scope.idE ,  origen : $scope.origenE ,comunidad : $scope.comunidadE}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.idE=""; 
            $scope.nombreE="";
            $scope.origenE="";
            $scope.comunidadE="";
            $scope.cargar();
        });
    }
    
    $scope.borrar=function(club){
  
        config= {
            method : "POST",
            url : base_url+"/club/borrar",
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
        "nombre":"",
        "autonom":false
      
    }
    $scope.nombreE="";
      $scope.autonomE=false;
    $scope.idE=""
    
    $scope.campos=[
        "descripcion",
        "autonom"
       ];
 
    $scope.descripcion;
   
    $scope.cargar= function(){
        $http.get(base_url+"/categoria/listar").then(function(response){
         
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.categorias=response.data["data"]; 
            
        });
    }

    $scope.cargar();
    
    $scope.insertar=function(){
        if($scope.autonom==null)$scope.autonom=false;
        config= {
            method : "POST",
            url : base_url+"/categoria/insertar",
            params : {nombre : $scope.nombre,autonom : $scope.autonom}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
             
            $scope.nombre="";
            $scope.autonom="";
            $scope.cargar();
        });
    }
    
    $scope.datos=function(categoria){
           
            $scope.nombreE=categoria.nombre;
              $scope.checkE=categoria.autonom;
            $scope.idE=categoria.id;
    }
    
    
     $scope.modificar=function(){
       
        if($scope.autonomE===null)$scope.autonomE=false;
        config= {
            method : "POST",
            url : base_url+"/categoria/modificar",
            params : {nombre : $scope.nombreE, autonom:$scope.autonomE ,id : $scope.idE}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.idE=""; 
            $scope.nombreE="";
            $scope.autonomE="";
        
            $scope.cargar();
        });
    }
    
    $scope.borrar=function(categoria){
  
        config= {
            method : "POST",
            url : base_url+"/categoria/borrar",
            params : {id : categoria.id}
        };
       
        $http(config).then(function (response){
       
            console.log(response.data["status"]+" : "+response.data["msg"]);
        
            $scope.cargar();
        });
    }
    
  
    
});


app.controller('tipoCtrl', function($scope,$http) {
   
   $scope.tipo= {
        "descripcion":"",
        
      
    }
    $scope.descripcionE="";
    
    $scope.idE=""
    
    $scope.campos=[
        "descripcion"
       ];
 
   
    $scope.cargar= function(){
        $http.get(base_url+"/tipoejercicio/listar").then(function(response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.tipos=response.data["data"]; 
            
        });
    }

    $scope.cargar();
    
    $scope.insertar=function(){
        if($scope.autonom==null)$scope.autonom=false;
        config= {
            method : "POST",
            url : base_url+"/tipoejercicio/insertar",
            params : {descripcion : $scope.descripcion}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
             
            $scope.descripcion="";
          
            $scope.cargar();
        });
    }
    
    $scope.datos=function(tipo){
           
            $scope.descripcionE=tipo.descripcion;
              
            $scope.idE=tipo.id;
    }
    
    
     $scope.modificar=function(){
       
     
        config= {
            method : "POST",
            url : base_url+"/tipoejercicio/modificar",
            params : {descripcion : $scope.descripcionE,id : $scope.idE}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.idE=""; 
            $scope.descripcionE="";
        
            $scope.cargar();
        });
    }
    
    $scope.borrar=function(tipo){
  
        config= {
            method : "POST",
            url : base_url+"/tipoejercicio/borrar",
            params : {id : tipo.id}
        };
       
        $http(config).then(function (response){
       
            console.log(response.data["status"]+" : "+response.data["msg"]);
        
            $scope.cargar();
        });
    }
    
  
    
});

    



app.controller('especCtrl', function($scope,$http) {
   
   $scope.especialidad= {
        "descripcion":"",
        "num":0
    
    }
    $scope.descripcionE="";
     $scope.numE="";
    
    $scope.idE=""
    
    $scope.campos=[
        "descripcion",
        "num"
       ];
 
   
    $scope.cargar= function(){
        $http.get(base_url+"/especialidad/listar").then(function(response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.especialidades=response.data["data"]; 
            
        });
    }

    $scope.cargar();
    
    $scope.insertar=function(){
      
        config= {
            method : "POST",
            url : base_url+"/especialidad/insertar",
            params : {descripcion : $scope.descripcion,num : $scope.num}
        };
       
        $http(config).then(function (response){
            console.log(response.data["status"]+" : "+response.data["msg"]);
             
            $scope.descripcion="";
              $scope.num=0;
          
            $scope.cargar();
        });
    }
    
    $scope.datos=function(especialidad){
           
            $scope.descripcionE=especialidad.descripcion;
                $scope.numE=parseInt(especialidad.num);
            $scope.idE=especialidad.id;
    }
    
    
     $scope.modificar=function(){
       
        config= {
            method : "POST",
            url : base_url+"/especialidad/modificar",
            params : {descripcion : $scope.descripcionE, num:$scope.numE ,id : $scope.idE}
        };
       
        $http(config).then(function (response){
            
            console.log(response.data["status"]+" : "+response.data["msg"]);
            $scope.idE=""; 
            $scope.descripcionE="";
            $scope.numE=0;
        
            $scope.cargar();
        });
    }
    
    $scope.borrar=function(especialidad){
  
        config= {
            method : "POST",
            url : base_url+"/especialidad/borrar",
            params : {id : especialidad.id}
        };
       
        $http(config).then(function (response){
       
            console.log(response.data["status"]+" : "+response.data["msg"]);
        
            $scope.cargar();
        });
    }
    
  
    
    
});


