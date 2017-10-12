<?php echo "Usuario: ".$this->session->userdata('s_usuario');
?>

<h1>Actualiza tus datos</h1>

<div class="col-md-10">
         <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Actualizar Tus Datos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="<?php echo base_url()?>cpersonas/actualizarUsuarios">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingresa tu nombre" name="nombre">
                  </div>
                </div>
                    <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Apellido paterno</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingresa tu apellido paterno" name="appaterno">
                  </div>
                </div>

                    <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Apellido Materno</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingresa tu apellido materno" name="apmaterno">
                  </div>
                </div>

                    <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingresa tu correo" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Actualizar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>


</div>
