  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Happybooks</a>.</strong> All rights
    reserved.
  </footer>

  </div>

  <!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<!--Librerias Datatable-->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<?php
if($this->uri->segment(1)=='cpersonas'){?>
  <script src="<?php echo base_url()?>/js/persona.js"></script>
  <script src="<?php echo base_url()?>/js/listarPersonas.js"></script>
<?php
}
  if($this->uri->segment(1)=='Cnotas'){?>
  <script src="<?php echo base_url()?>/js/notas.js"></script>
<?php }; ?>


<?php
 if($this->uri->segment(1)=='Cmesas'){?>
   <script src="<?php echo base_url()?>/js/mesa.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='CdataTables'){?>
   <script src="<?php echo base_url()?>/js/dataTables.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cusuarios' && $this->uri->segment(2)==''){?>
   <script src="<?php echo base_url()?>/js/usuarios.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cusuarios' && $this->uri->segment(2)=='verPerfil'){?>
   <script src="<?php echo base_url()?>/js/usuarios_perfil.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Clibros'){?>
   <script src="<?php echo base_url()?>js/libros_panel.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='pais'){?>
   <script src="<?php echo base_url()?>js/config/config_paises.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='ciudades'){?>
   <script src="<?php echo base_url()?>js/config/config_ciudades.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='autores'){?>
   <script src="<?php echo base_url()?>js/config/config_autores.js"></script>
<?php
}
?>

<?php
 if($this->uri->segment(1)=='Cconfig' && $this->uri->segment(2)=='genero'){?>
   <script src="<?php echo base_url()?>js/config/config_genero.js"></script>
<?php
}
?>

</body>
</html>