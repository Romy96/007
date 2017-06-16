<h1>Creër rol</h1>

<div class="row">
        <form role="form" method="post" action="<?=URL?>backend/insert_role">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="role">Rol:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Vul naam van rol in (in het engels)" required>
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>