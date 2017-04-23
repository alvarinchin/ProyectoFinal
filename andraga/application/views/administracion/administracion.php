<h1>administración</h1>
<div class="container">
    <div class="row">
        <div ng-controller="clubCtrl" class="col-xs-3">
            <h2>Clubes</h2>
            <table class="table">
                <tr  ng-repeat="club in clubes">
                    <td>{{club.nombre}}</td>
                    <td><button class="btn btn-primary" ng-click="borrar(club)"><span class="glyphicon glyphicon-remove"></span></button></td>
                    <td><button class="btn btn-primary" ng-click="editar(club)"><span class="glyphicon glyphicon-pencil"></span></button></td>
                        
                </tr>
                    
            </table>
            <button class="btn btn-primary" ng-click="nuevo()"><span class="glyphicon glyphicon-plus"></span></button>
                
        </div>
    </div>
</div>
<script>

function nuevo(){
    //abrir un modar que permita añadir un club nuevo y llame a la function de angular "insertar"
}


</script>