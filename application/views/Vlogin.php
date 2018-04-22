<?php if($this->session->userdata('s_idUsuario')){
redirect(base_url());
}
?>

<link rel="icon" type="image/png" href="<?php echo base_url();?>imagenes/favicon.ico"/>
<link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.css'?>" rel="stylesheet">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">

<script src='https://www.google.com/recaptcha/api.js'></script>

<script src='js/script.js'></script>

<body id="panelPrincipal" style="margin-top:20px">

   <div id="principal" class="container">
     
       <h2 class="tituloPanel form-signin-heading text-center">Panel de configuración</h2>

     <form id="cosa" class="form-signin col-md-6 col-centrar" method="POST" action="<?php echo base_url()?>Clogin/ingresar" onsubmit="return get_action(this)">
            
          <legend>Iniciar sesión Veda C</legend>
    
       <div class="form-group"> 
        <input name="user" type="email" id="inputEmail" class="form-control" placeholder="Ingresa tu Correo" required="required" autofocus>
      </div>
       
        <div class="form-group">
        <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Ingresa tu contraseña" required="required">
          </div>
        
        <div class="checkbox">
          <label>
            <input type="checkbox" value="Recordar"> Recordar
          </label>
        </div>

    
        <button class="btn btn-lg btn-default btn-block" type="submit">Ingresar</button>

     <a id="link-control" class="pull-right" href="<?php echo base_url()?>">Regresar</a>

<?php
if(($this->session->userdata('s_capcha')==1)){?>
<div class="g-recaptcha" style="margin: 0 auto;display: table;margin-top: 25px;" data-sitekey="6Le47DMUAAAAAOmEiFqWYTdvSLmEHBrs6RH9tLVA"></div>
<?php } ?>


    </form>
    </div>
<br><br>
    <?php if(isset($_GET['e']) && $_GET['e']=='cD6r7gZp0XU'){?>
  <div class="alert alert-danger col-sm-4 col-centrar" style="margin-top: 0px;" role="alert"><?php echo "El elemento No Existe";?></div>
<?php };?>

   <h5 class="marca"> © 2017 Online Login Form. All rights reserved | Design by HappyReads </h5>
  <br><br>
  

  </body>