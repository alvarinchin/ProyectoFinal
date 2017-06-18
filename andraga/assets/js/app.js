//Raiz de la app de administración

var app = angular.module('administracion', []);
var url = (window.location.host + window.location.pathname).split("/").splice(
        0, 3).join("/");
var base_url = "http://" + url;
// cada controller se encargará de gestionar uno de los cuadros de
// administracion
app.controller('mainCtrl', function($scope) {

});

app.controller('clubCtrl', function($scope, $http, $window) {

    $scope.club = {
        "codClub" : 0,
        "nombre" : "",
        "origen" : "",
        "comunidad" : ""
    }
    $scope.nombreE = "";
    $scope.origenE = "";
    $scope.comunidadE = ""
    $scope.idE = ""

    $scope.campos = [ "nombre", "origen", "comunidad" ];
    $scope.nombre;
    $scope.origen;
    $scope.comunidad;

    $scope.cargar = function() {
        $http.get(base_url + "/club/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.clubes = response.data["data"];

        });
    }

    $scope.cargar();
    $scope.insertar = function() {

        config = {
            method : "POST",
            url : base_url + "/club/insertar",
            params : {
                nombre : $scope.nombre,
                origen : $scope.origen,
                comunidad : $scope.comunidad
            }
        };

        $http(config).then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            if (response.data["status"] == "error") {
                alert(response.data["msg"]);
                $scope.nombre = $scope.nombre ? $scope.nombre : "";
                $scope.origen = $scope.origen ? $scope.origen : "";
                $scope.comunidad = $scope.comunidad ? $scope.comunidad
                : "";
                $scope.cargar();
            } else {
                $scope.nombre = "";
                $scope.origen = "";
                $scope.comunidad = "";
                $scope.cargar();
            }

        });
    }

    $scope.datos = function(club) {
        $scope.nombreE = club.nombre;
        $scope.origenE = club.origen;
        $scope.comunidadE = club.comunidad;
        $scope.idE = club.id;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/club/modificar",
            params : {
                nombre : $scope.nombreE,
                id : $scope.idE,
                origen : $scope.origenE,
                comunidad : $scope.comunidadE
            }
        };

        $http(config).then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.idE = "";
            $scope.nombreE = $scope.nombreE ? $scope.nombreE : "";
            $scope.origenE = $scope.origenE ? $scope.origenE : "";
            $scope.comunidadE = $scope.comunidadE ? $scope.comunidadE
            : "";
            $scope.cargar();
        });
    }

    $scope.borrar = function(club) {
        if (confirm("¿Desea borrar el club " + club.nombre + "?")) {
            config = {
                method : "POST",
                url : base_url + "/club/borrar",
                params : {
                    id : club.id
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

app.controller('categoriaCtrl', function($scope, $http) {

    $scope.categoria = {
        "nombre" : "",
        "autonom" : false

    }
    $scope.nombreE = "";
    $scope.autonomE = false;
    $scope.idE = ""

    $scope.campos = [ "descripcion", "autonom" ];

    $scope.descripcion;

    $scope.cargar = function() {
        $http.get(base_url + "/categoria/listar").then(
                function(response) {

                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.categorias = response.data["data"];

        });
    }

    $scope.cargar();

    $scope.insertar = function() {
        if ($scope.autonom == null)
            $scope.autonom = false;
        config = {
            method : "POST",
            url : base_url + "/categoria/insertar",
            params : {
                nombre : $scope.nombre,
                autonom : $scope.autonom
            }
        };

        $http(config).then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            if (response.data["status"] == "error") {
                alert(response.data["msg"]);
                $scope.nombre = $scope.nombre ? $scope.nombre : "";
                $scope.autonom = "";
                $scope.cargar();
            } else {
                $scope.nombre = "";
                $scope.autonom = "";
                $scope.cargar();
            }

        });
    }

    $scope.datos = function(categoria) {

        $scope.nombreE = categoria.nombre;
        $scope.checkE = categoria.autonom;
        $scope.idE = categoria.id;
    }

    $scope.modificar = function() {

        if ($scope.autonomE === null)
            $scope.autonomE = false;
        config = {
            method : "POST",
            url : base_url + "/categoria/modificar",
            params : {
                nombre : $scope.nombreE,
                autonom : $scope.autonomE,
                id : $scope.idE
            }
        };

        $http(config).then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.idE = "";
            $scope.nombreE = $scope.nombreE ? $scope.nombreE : "";
            $scope.autonomE = "";

            $scope.cargar();
        });
    }

    $scope.borrar = function(categoria) {
        if (confirm("¿Desea borrar la categoría " + categoria.nombre + "?")) {
            config = {
                method : "POST",
                url : base_url + "/categoria/borrar",
                params : {
                    id : categoria.id
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

app
        .controller(
        'tipoCtrl',
function($scope, $http) {

    $scope.tipo = {
        "descripcion" : "",

    }
    $scope.descripcionE = "";

    $scope.idE = ""

    $scope.campos = [ "descripcion" ];

    $scope.cargar = function() {
        $http.get(base_url + "/tipoejercicio/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.tipos = response.data["data"];

        });
    }

    $scope.cargar();

    $scope.insertar = function() {
        if ($scope.autonom == null)
            $scope.autonom = false;
        config = {
            method : "POST",
            url : base_url + "/tipoejercicio/insertar",
            params : {
                descripcion : $scope.descripcion
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            if (response.data["status"] == "error") {
                alert(response.data["msg"]);
                $scope.descripcion = $scope.descripcion ? $scope.descripcion
                : "";

                $scope.cargar();
            } else {
                $scope.descripcion = "";

                $scope.cargar();
            }

        });
    }

    $scope.datos = function(tipo) {

        $scope.descripcionE = tipo.descripcion;

        $scope.idE = tipo.id;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/tipoejercicio/modificar",
            params : {
                descripcion : $scope.descripcionE,
                id : $scope.idE
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            $scope.idE = "";
            $scope.descripcionE = $scope.descripcionE ? $scope.descripcionE
            : "";

            $scope.cargar();
        });
    }

    $scope.borrar = function(tipo) {
        if (confirm("¿Desea borrar el tipo de ejercicio "
                + tipo.descripcion + "?")) {
            config = {
                method : "POST",
                url : base_url + "/tipoejercicio/borrar",
                params : {
                    id : tipo.id
                }
            };

            $http(config)
                    .then(
                    function(response) {

                        console
                        .log(response.data["status"]
                        + " : "
                        + response.data["msg"]);

                $scope.cargar();
            });
        }
    }

});

app
        .controller(
        'especCtrl',
function($scope, $http) {

    $scope.especialidad = {
        "descripcion" : "",
        "num" : 0

    }
    $scope.descripcionE = "";
    $scope.numE = "";

    $scope.idE = ""

    $scope.campos = [ "descripcion", "num" ];

    $scope.cargar = function() {
        $http
                .get(base_url + "/especialidad/listar")
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            $scope.especialidades = response.data["data"];

        });
    }

    $scope.cargar();

    $scope.insertar = function() {

        config = {
            method : "POST",
            url : base_url + "/especialidad/insertar",
            params : {
                descripcion : $scope.descripcion,
                num : $scope.num
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            if (response.data["status"] == "error") {
                alert(response.data["msg"]);
                $scope.descripcion = $scope.descripcion ? $scope.descripcion
                : "";
                $scope.num = $scope.num ? $scope.num
                : 0;

                $scope.cargar();
            } else {
                $scope.descripcion = "";
                $scope.num = 0;

                $scope.cargar();
            }

        });
    }

    $scope.datos = function(especialidad) {

        $scope.descripcionE = especialidad.descripcion;
        $scope.numE = parseInt(especialidad.num);
        $scope.idE = especialidad.id;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/especialidad/modificar",
            params : {
                descripcion : $scope.descripcionE,
                num : $scope.numE,
                id : $scope.idE
            }
        };

        $http(config)
                .then(
                function(response) {

                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            $scope.idE = "";
            $scope.descripcionE = $scope.descripcionE ? $scope.descripcionE
            : "";
            $scope.numE = $scope.numE ? $scope.numE
            : 0;

            $scope.cargar();
        });
    }

    $scope.borrar = function(especialidad) {
        if (confirm("¿Desea borrar la especialidad "
                + especialidad.descripcion + "?")) {
            config = {
                method : "POST",
                url : base_url + "/especialidad/borrar",
                params : {
                    id : especialidad.id
                }
            };

            $http(config)
                    .then(
                    function(response) {

                        console
                        .log(response.data["status"]
                        + " : "
                        + response.data["msg"]);

                $scope.cargar();
            });
        }
    }

});

app
        .controller(
        'usuarioCtrl',
function($scope, $http, $window) {

    $scope.usuario = {
        "id" : 0,
        "login" : "",
        "password" : "",
        "rol" : ""
    }
    $scope.loginE = "";
    $scope.passwordE = "";
    $scope.rolE = ""
    $scope.idE = ""

    $scope.campos = [ "login", "password", "rol" ];
    $scope.login;
    $scope.password;
    $scope.rol;

    $scope.cargar = function() {
        $http.get(base_url + "/Usuario/listar").then(
                function(response) {
                    console.log(response.data["status"] + " : "
                    + response.data["msg"]);
            $scope.usuarios = response.data["data"];

        });
    }

    $scope.cargar();
    $scope.insertar = function() {

        config = {
            method : "POST",
            url : base_url + "/Usuario/crearPost",
            params : {
                login : $scope.login,
                password : $scope.password,
                rol : $scope.rol
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);
            if (response.data["status"] == "error") {
                alert(response.data["msg"]);
                $scope.login = $scope.login ? $scope.login
                : "";
                $scope.password = $scope.password ? $scope.password
                : "";
                $scope.rol = $scope.rol ? $scope.rol
                : "";

                $scope.cargar();
            } else {
                $scope.login = "";
                $scope.password = "";
                $scope.rol = "";

                $scope.cargar();
            }

        });
    }

    $scope.datos = function(usuario) {
        $scope.loginE = usuario.login;
        $scope.passwordE = usuario.password;
        $scope.rolE = usuario.rol;
        $scope.idE = usuario.id;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/Usuario/modificarPost",
            params : {
                login : $scope.loginE,
                id : $scope.idE,
                password : $scope.passwordE,
                rol : $scope.rolE
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);

            $scope.idE = "";
            $scope.loginE = $scope.loginE ? $scope.loginE
            : "";
            $scope.passwordE = $scope.passwordE ? $scope.passwordE
            : "";
            $scope.rolE = $scope.rolE ? $scope.rolE
            : "";
            $scope.cargar();
        });
    }

    $scope.borrar = function(usuario) {
        if (confirm("¿Desea borrar el usuario " + usuario.login
                + "?")) {
            config = {
                method : "POST",
                url : base_url + "/Usuario/borrarPost",
                params : {
                    id : usuario.id
                }
            };

            $http(config)
                    .then(
                    function(response) {

                        console
                        .log(response.data["status"]
                        + " : "
                        + response.data["msg"]);

                $scope.cargar();
            });
        }
    }

});

app
        .controller(
        'deportistaCtrl',
function($scope, $http, $window) {
    $scope.filtrado = "";
    $scope.deportista = {
        "id" : 0,
        "nombre" : "",
        "ape1" : "",
        "ape2" : "",
        "fecha" : "",
        "numerofederacion" : ""
    }
    $scope.deportistas = [];
    $scope.nombreE = "";
    $scope.ape1E = "";
    $scope.ape2E = "";
    $scope.fechaE = "";
    $scope.idE = "";
    $scope.numerofederacionE = "";

    $scope.nombre = "";
    $scope.ape1 = "";
    $scope.ape2 = "";
    $scope.fecha = "";
    $scope.numerofederacion = "";

    $scope.cargar = function() {
        $http
                .get(base_url + "/deportista/listar")
                .then(
                function(response) {
                    $scope.deportistas = [];
            console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);

            for (x in response.data["data"]) {
                $scope.deportistas
                        .push(response.data["data"][x]);
            }

        });
    }

    $scope.cargar();

    $scope.validarFecha = function(dia, mes, anio) {
        var result;
        var elMes = parseInt(mes);
        var laFecha = new Date(anio, mes - 1, dia);
        var hoy = new Date();
        if (laFecha > hoy) {
            result = 1;
        } else {

            if (elMes > 12)
                result = 1;
            // MES FEBRERO
            if (elMes == 2) {
                if ($scope.esBisiesto(anio)
                        && (parseInt(dia) > 29)) {
                    result = 1;
                } else if (!$scope.esBisiesto(anio)
                        && parseInt(dia) > 28) {
                    result = 1;
                } else {
                    result = 0;
                }

            }

            if (elMes == 4 || elMes == 6 || elMes == 9
                    || elMes == 11) {
                if (parseInt(dia) > 30) {
                    result = 1; // ERROR
                } else {
                    result = 0;
                }
            }
            if (elMes == 1 || elMes == 3 || elMes == 5
                    || elMes == 7 || elMes == 8 || elMes == 10
                    || elMes == 12) {
                if (parseInt(dia) > 31) {
                    result = 1;
                } else {
                    result = 0;
                }
            }

        }
        return result;
    }

    $scope.esBisiesto = function(anio) {
        var BISIESTO;
        if (parseInt(anio) % 4 == 0
                && (parseInt(anio) % 100 != 0 || parseInt(anio) % 400 == 0)) {
            BISIESTO = true;
        } else {
            BISIESTO = false;
        }

        return BISIESTO;
    }

    $scope.insertar = function() {
        var formatoFecha = /^(?:(?:(?:0?[1-9]|1\d|2[0-8])[/](?:0?[1-9]|1[0-2])|(?:29|30)[/](?:0?[13-9]|1[0-2])|31[/](?:0?[13578]|1[02]))[/](?:0{2,3}[1-9]|0{1,2}[1-9]\d|0?[1-9]\d{2}|[1-9]\d{3})|29[/]0?2[/](?:\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0?[48]|[13579][26]|[2468][048])00))$/;
        var hoy = new Date();
        diaActual = hoy.getDate();
        mes = hoy.getMonth();
        mesActual = mes + 1;
        anioActual = hoy.getFullYear();

        fecha = $scope.fecha;
        fechaArray = fecha.split("/");
        diaIn = fechaArray[0];
        mesIn = fechaArray[1];
        anioIn = fechaArray[2];

        if (formatoFecha.test($scope.fecha)) {
            console.log("Formato de fecha válido");
            var ok = $scope.validarFecha(diaIn, mesIn, anioIn);
            if (ok == 0) {
                config = {
                    method : "POST",
                    url : base_url + "/deportista/insertar",
                    params : {
                        nombre : $scope.nombre,
                        ape1 : $scope.ape1,
                        ape2 : $scope.ape2,
                        numerofederacion : $scope.numerofederacion,
                        fecha : $scope.fecha
                    }
                };

                $http(config)
                        .then(
                        function(response) {
                            console
                            .log(response.data["data"]);
                    console
                            .log(response.data["status"]
                            + " : "
                            + response.data["msg"]);
                    if (response.data["status"] == "error") {
                        alert(response.data["msg"]);
                        $scope.nombre = $scope.nombre ? $scope.nombre
                        : "";
                        $scope.ape1 = $scope.ape1 ? $scope.ape1
                        : "";
                        $scope.ape2 = $scope.ape2 ? $scope.ape2
                        : "";
                        $scope.fecha = $scope.fecha ? $scope.fecha
                        : "";
                        $scope.numerofederacion = $scope.numerofederacion ? $scope.numerofederacion
                        : "";
                        $scope.cargar();
                    } else {
                        $scope.nombre = "";
                        $scope.ape1 = "";
                        $scope.ape2 = "";
                        $scope.fecha = "";
                        $scope.numerofederacion = "";
                        $scope.cargar();
                    }

                });
            } else {
                alert("La fecha introducida es superior a la actual");
            }
        } else {
            alert("El formato de fecha introducida no es correcto. Ej: 22/03/2007");
        }

    }

    $scope.datos = function(usuario) {
        $scope.nombreE = usuario.nombre;
        $scope.ape1E = usuario.ape1;
        $scope.ape2E = usuario.ape2;
        $scope.fechaE = usuario.fecha;
        $scope.idE = usuario.id;
        $scope.numerofederacionE = usuario.numerofederacion;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/deportista/modificar",
            params : {
                nombre : $scope.nombreE,
                ape1 : $scope.ape1E,
                ape2 : $scope.ape2E,
                numerofederacion : $scope.numerofederacionE,
                fecha : $scope.fechaE,
                id : $scope.idE
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);

            $scope.nombreE = $scope.nombreE ? $scope.nombreE
            : "";
            $scope.ape1E = $scope.ape1E ? $scope.ape1E
            : "";
            $scope.ape2E = $scope.ape2E ? $scope.ape2E
            : "";
            $scope.fechaE = $scope.fechaE ? $scope.fechaE
            : "";
            $scope.numerofederacionE = $scope.numerofederacionE ? $scope.numerofederacionE
            : "";
            $scope.idE = "";
            $scope.cargar();
        });
    }

    $scope.borrar = function(deportista) {
        if (confirm("¿Desea borrar el deportista "
                + deportista.nombre + " " + deportista.ape1
                + " " + deportista.ape2 + "?")) {
            config = {
                method : "POST",
                url : base_url + "/deportista/borrar",
                params : {
                    id : deportista.id
                }
            };

            $http(config)
                    .then(
                    function(response) {

                        console
                        .log(response.data["status"]
                        + " : "
                        + response.data["msg"]);

                $scope.cargar();
            });
        }
    }
});

app

        .controller(
        'competicionCtrl',
function($scope, $http, $window) {
    $scope.filtrado = "";
    $scope.competicion = {
        "id" : 0,
        "nombre" : "",
        "fecha" : ""
    }

    $scope.competiciones = [];
    $scope.nombreE = "";
    $scope.fechaE = "";
    $scope.idE = "";

    $scope.nombre = "";
    $scope.fecha = "";

    $scope.cargar = function() {
        $http
                .get(base_url + "/competicion/listar")
                .then(
                function(response) {
                    $scope.competiciones = [];
            console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);

            for (x in response.data["data"]) {
                $scope.competiciones
                        .push(response.data["data"][x]);
            }

        });
    }

    $scope.cargar();

    $scope.insertar = function() {
        var formatoFecha = /^(?:(?:(?:0?[1-9]|1\d|2[0-8])[/](?:0?[1-9]|1[0-2])|(?:29|30)[/](?:0?[13-9]|1[0-2])|31[/](?:0?[13578]|1[02]))[/](?:0{2,3}[1-9]|0{1,2}[1-9]\d|0?[1-9]\d{2}|[1-9]\d{3})|29[/]0?2[/](?:\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0?[48]|[13579][26]|[2468][048])00))$/;
        var hoy = new Date();
        diaActual = hoy.getDate();
        mes = hoy.getMonth();
        mesActual = mes + 1;
        anioActual = hoy.getFullYear();

        fecha = $scope.fecha;
        fechaArray = fecha.split("/");
        diaIn = fechaArray[0];
        mesIn = fechaArray[1];
        anioIn = fechaArray[2];

        if (formatoFecha.test($scope.fecha)) {
            console.log("Formato de fecha válido");
            if (anioIn != anioActual || mesIn != mesActual
                    || diaIn != diaActual) {
                alert("La fecha introducida no es válida");
            } else {
                config = {
                    method : "POST",
                    url : base_url + "/competicion/insertar",
                    params : {
                        nombre : $scope.nombre,
                        fecha : $scope.fecha
                    }
                };

                $http(config)
                        .then(
                        function(response) {
                            console
                            .log(response.data["data"]);
                    console
                            .log(response.data["status"]
                            + " : "
                            + response.data["msg"]);
                    if (response.data["status"] == "error") {
                        alert(response.data["msg"]);
                        $scope.nombre = $scope.nombre ? $scope.nombre
                        : "";
                        $scope.fecha = $scope.fecha ? $scope.fecha
                        : "";
                        $scope.cargar();
                    } else {
                        $scope.nombre = "";
                        $scope.fecha = "";
                        $scope.cargar();
                    }

                });
            }

        } else {
            alert("El formato de fecha introducida no es correcto. Ej: 22/03/2017");
        }

    }

    $scope.datos = function(usuario) {
        $scope.nombreE = usuario.nombre;
        $scope.fechaE = usuario.fecha;
        $scope.idE = usuario.id;
    }

    $scope.modificar = function() {

        config = {
            method : "POST",
            url : base_url + "/competicion/modificar",
            params : {
                nombre : $scope.nombreE,
                fecha : $scope.fechaE,
                id : $scope.idE
            }
        };

        $http(config)
                .then(
                function(response) {
                    console.log(response.data["status"]
                    + " : "
                    + response.data["msg"]);

            $scope.nombreE = $scope.nombreE ? $scope.nombreE
            : "";
            $scope.fechaE = $scope.fechaE ? $scope.fechaE
            : "";
            $scope.idE = "";
            $scope.cargar();
        });
    }

    $scope.borrar = function(competicion) {
        if (confirm("¿Desea borrar la competición "
                + competicion.nombre + "?")) {
            config = {
                method : "POST",
                url : base_url + "/competicion/borrar",
                params : {
                    id : competicion.id
                }
            };

            $http(config)
                    .then(
                    function(response) {

                        console
                        .log(response.data["status"]
                        + " : "
                        + response.data["msg"]);
                
                
                $scope.cargar();
                if(response.data["status"]=="ok"){
                    location.replace(base_url);
                }

            });
        }
    }
});


