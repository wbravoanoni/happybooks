  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('s_usuario');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                 <li class="active"><a href="<?php echo base_url()?>Cusuarios"><i class="fa fa-circle-o"></i>Administrar Usuarios</a></li>
            <li><a href="<?php echo base_url()?>Clibros"><i class="fa fa-circle-o"></i>Administrar Libros</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i>Listar user</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Nuevas Opciones</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>Cnotas"><i class="fa fa-circle-o"></i> Ingresar Notas</a></li>
            <li><a href="<?php echo base_url()?>Cmesas"><i class="fa fa-circle-o"></i>Mesas</a></li>
            <li><a href="<?php echo base_url()?>CrearPdf"><i class="fa fa-circle-o"></i> crear PDF</a></li>
            <li><a href="<?php echo base_url()?>Cexcel/dExcel"><i class="fa fa-circle-o"></i> Exportar a Excel</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>Cupload">
            <i class="fa fa-th"></i> <span>Subir Imagen</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>Cchartjs/index"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Char Edad</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o" disabled="disabled"></i> Flot</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul> 
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> General</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li onclick="alert('Pagina temporalmente desactivada')"><a href="#"><i class="fa fa-circle-o"></i> Data tables 2</a></li>
          </ul>
        </li>
        <li onclick="alert('Pagina temporalmente desactivada')">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li onclick="alert('Pagina temporalmente desactivada')">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url()?>Seo_controller/"><i class="fa fa-book"></i> <span>Configurar SEO</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->