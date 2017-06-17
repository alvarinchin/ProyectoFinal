var app = angular.module('gestion', []);
var url = (window.location.host + window.location.pathname).split("/").splice(
		0, 3).join("/");
var base_url = "http://" + url;
// cada controller se ecargará de gestionar uno de los cuadros de administracion
app.controller('mainCtrl', function($scope) {
	$scope.cargar = function() {
		// con esto cargamos todos los datos de los select

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
		$http.get(base_url + "/tipoejercicio/listar").then(
				function(response) {
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);
					$scope.tiposejercicio = response.data["data"];

				});
                                
                                $http.get(base_url + "/rotacion/listar").then(
				function(response) {
					$scope.rotaciones = [];
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					for (x in response.data["data"]) {
						$scope.rotaciones.push(response.data["data"][x]);
					}

				});
                                
                                $http.get(base_url + "/inscripcion/listar").then(
				function(response) {
					
					console.log(response.data["status"] + " : "
							+ response.data["msg"]);

					
						$scope.inscripciones=response.data["data"];
					

				});
                                
                                
                          
	}
           $scope.cargar();
        
	$scope.enviarInscripcion = function() {

		$scope.ids = {
			idClub : $scope.club,
			idDeportistas : $scope.deportistasSelect,
			idCompeticion : $scope.competicion,
			idEspecialidad : $scope.especialidad,
			idCategoria : $scope.categoria,
			dorsal : $scope.dorsal,
			idTipoejErcicio : $scope.tipoejercicio
		};
		var config = {
			method : "POST",
			url : base_url + "/inscripcion/insertar",
			params : $scope.ids
		}
             

	$http(config).then(function(response) {
			console.log(response.data["msg"]);
			$scope.cargar();
			
		})

	}

	

	$scope.borrarInscripciones = function(id) {
		//console.log(id);
		var config = {
			url : base_url + "/inscripcion/borrar",
			method : "post",
			params : {
				inscSel : id
			}
		}
		$http(config).then(function(response) {
			console.log(response.data["msg"]);
			$scope.cargar();
			
		})

	}

	$scope.crearRotaciones = function(id) {
		//console.log(id);
		var config = {
			url : base_url + "/rotacion/insertar",
			method : "post",
			params : {
				id : id
			}
		}
		$http(config).then(function(response) {
			console.log(response.data["msg"]);
			$scope.cargar();
			
		})

	}

	$scope.rotacionesSeleccionados = function() {
		var checks = document.getElementsByName("inscripcion");
		var selects = [];
		for (elem in checks) {
			// console.log(checks[elem]);
			// console.log(document.myForm[elem].innerHTML);
			if (checks[elem].checked == true) {
				selects.push(checks[elem].value);

			}
		}

		for (id in selects) {
			// console.log("borrado "+selects[id])
			$scope.crearRotaciones(selects[id]);
		}

	}

	$scope.borrarSeleccionados = function() {
		var checks = document.getElementsByName("inscripcion");
		var selects = [];
		for (elem in checks) {
			// console.log(checks[elem]);
			// console.log(document.myForm[elem].innerHTML);
			if (checks[elem].checked == true) {
				selects.push(checks[elem].value);

			}
		}

		if (confirm("¿Desea borrar " + selects.length + " elemento(s)?")) {
			for (id in selects) {
				// console.log("borrado "+selects[id])
				$scope.borrarInscripciones(selects[id]);
			}

		}
	}

	
	


	$scope.insertarRotacion = function() {

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

	$scope.borrarRotacion = function(id) {
		if (confirm("¿Desea borrar el elemento?")) {
		//	console.log(id);
			config = {
				method : "POST",
				url : base_url + "/rotacion/borrar",
				params : {
					id : id
				}
			};

			$http(config).then(
					function(response) {

						console.log(response.data["status"] + " : "
								+ response.data["msg"]);

						$scope.cargar();
					});

		}

	}
});

app.controller('puntuacionCtrl', function($scope, $http) {

	$scope.activo = {};

	$scope.cargar = function() {

		$http.get(base_url + "/rotacion/listar").then(function(response) {

			console.log(response.data["data"]);
			$scope.rotaciones = response.data["data"];

		});
	}
	$scope.cargar();

	$scope.cargarRotacion = function() {

	}

});