
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
        $scope.enviar=function(){
            
            $scope.ids={
                idClub:$scope.club,
                idDeportistas: $scope.deportistasSelect,
                idCompeticion:$scope.competicion,
                idEspecialidad:$scope.especialidad,
                idCategoria:$scope.categoria,
                dorsal:$scope.dorsal
            };
            var config={
                method:"POST",
                url: base_url+"/inscripcion/insertar",
                params:$scope.ids
            }
            
            $http(config).then(function(response){
                console.log(response.data["status"] + " : "
                        + response.data["msg"]);
                $scope.cargarInscripciones();
            });
            
        }

    $scope.cargarInscripciones=function(){
        $http.get(base_url + "/inscripcion/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]); 
             $scope.inscripciones=response.data["data"];
            
    });
    
    }
    
    $scope.cargarInscripciones();
    $scope.cargar();
});

app.controller('rotacionCtrl', function($scope, $http) {
	$scope.filtrado = "";
	$scope.rotacion = {
		"id" : 0,
		"categoria" : "",
		"especialidad" : "",
		"dorsal" : ""
	}
	$scope.rotaciones = [];
	$scope.categoriaE = "";
	$scope.especialidadE = "";
	$scope.idE = "";

	$scope.categoria = "";
	$scope.especialidad = "";

	$scope.cargar = function() {
		$http.get(base_url + "/rotacion/listar").then(
				function(response) {
					$scope.rotaciones = [];
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					for (x in response.data["data"]) {
						$scope.rotaciones.push(response.data["data"][x]);
					}

				});
	}

	$scope.cargar();

	$scope.insertar = function() {

		config = {
			method : "POST",
			url : base_url + "/rotacion/insertar",
			params : {
				categoria : $scope.categoria,
				especialidad : $scope.especialidad
			}
		};

		$http(config).then(
				function(response) {
					console.log(response.data["data"]);
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					$scope.categoria = "";
					$scope.especialidad = "";
					$scope.cargar();
				});
	}

	$scope.datos = function(usuario) {
		$scope.categoriaE = usuario.categoria;
		$scope.especialidadE = usuario.especialidad;
		$scope.idE = usuario.id;
	}

	$scope.modificar = function() {

		config = {
			method : "POST",
			url : base_url + "/rotacion/modificar",
			params : {
				categoria : $scope.categoriaE,
				especialidad : $scope.especialidadE,
				id : $scope.idE
			}
		};

		$http(config).then(
				function(response) {
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					$scope.categoriaE = "";
					$scope.especialidadE = "";
					$scope.idE = "";
					$scope.cargar();
				});
	}

	$scope.borrar = function(rotacion) {

		config = {
			method : "POST",
			url : base_url + "/rotacion/borrar",
			params : {
				id : rotacion.id
			}
		};

		$http(config).then(
				function(response) {

					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					$scope.cargar();
				});
	}
});