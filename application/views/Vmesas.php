  <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix" id="listCiudades">
   
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->

<button id="btnGrabarMesa" class="btn btn-primary">Grabar</button>

</div>

<!--BUSQUEDa personalizada con like-->

<div class="col-md-6">
  <h3>Busqueda Personalizada</h3>

  <h6>Lista de ciudades</h6>
   
        <div class="col-sm-12 box-primary">
          <div class="col-sm-12 input-group">
            <input id="txtBuscarCiudad" type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
          </div>   
        </div>
        <div class="col-sm-12">
          <div class="box">
            <table id="exampleTableLike" class="table table-bordered table-striped">
              <tr>
                <th style="width: 10%">#</th>
                <th style="width: 30%">Ciudad</th>
                <th style="width: 30%">Habitantes</th>
                <th style="width: 30%">Accion</th>
              </tr>
            </table>
          </div>
        </div>
       
</div>

<script type="text/javascript">
var baseurl="<?php echo base_url();?>";
</script>