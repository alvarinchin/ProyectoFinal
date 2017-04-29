<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog model-sm">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">{{titulo}}</h4>
            </div>
                
            <div class="modal-body">
                <div  ng-repeat="campo in campos">
                    <div class="form-group">
                        <label>{{campo}}</label>
                        <input type="text" ng-model="campo">
                    </div>
                </div>
                <button class="btn btn-primary" ng-click="">enviar</button>
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
                
        </div>
            
            
    </div>
</div>