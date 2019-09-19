<style >
.avatar {
  /* cambia estos dos valores para definir el tamaño de tu círculo */
  height: 70px;
  width: 80px;
  /* los siguientes valores son independientes del tamaño del círculo */
  background-repeat: no-repeat;
  background-position: 30%;
  border-radius:50%;
  background-size: 100% auto;
}
</style>
<header class="header">
  <nav class="navbar navbar-expand-lg">
    <a href="<?=base_url()?>Login"><img class="avatar" src="<?=base_url()?>/assets/images/Logo3.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link btn-skyblue" href="<?=base_url()?>Post/Vender"><i class="fas fa-store"></i> Publicar</a>
        </li>

        <form method="GET">
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="<?=base_url();?>Post/Categoria?Categoria=3"  class="dropdown-item">Telefonos celulares</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=7" class="dropdown-item">Tablets</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=8" class="dropdown-item">Componentes y accesorios</a>
            <a >__________________________________________________</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=5" class="dropdown-item">Computadoras</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=6" class="dropdown-item">Laptops</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=12" class="dropdown-item">Impresoras - Scanners - Multifuncionales</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=11" class="dropdown-item">Monitores</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=13" class="dropdown-item">Componentes y accesorios</a>
            <a >__________________________________________________</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=4" class="dropdown-item">Carros usados | Nuevos</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=10" class="dropdown-item">Motocicletas</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=14" class="dropdown-item">Accesorios para carros</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=15" class="dropdown-item">Accesorios para motocicletas</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=16" class="dropdown-item">Otros Vehiculos</a>
            <a >__________________________________________________</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=21" class="dropdown-item">Cocina</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=22" class="dropdown-item">Neveras - Congeladores</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=23" class="dropdown-item">Aires acondicionados - Calefacción</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=24" class="dropdown-item">Lavadoras - Secadoras</a>
            <a href="<?=base_url();?>Post/Categoria?Categoria=26" class="dropdown-item">Otros Electrodomesticos</a>
          </div>
        </li>
        </form>

      </ul>
      
      
      
      <div class="col-md-5">
        <form action="<?=base_url()?>Post/Buscar" method="GET">
          <div class="input-group md-form form-sm form-2 pl-0">
            <input class="form-control my-0 py-1 skyblue-border" type="text" name ="Busqueda" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" id="search"><i class="material-icons" aria-hidden="true">search</i></button>
            </div>
          </div>
        </form>
      </div>    

      <?php if($this->session->userdata('Rol_id') ==  FALSE){?>
        <div>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link btn-skyblue" href="#" data-toggle="modal" data-target="#Registrarse"><i class="fas fa-address-card"></i> Registrate  </a>
            </li>

            <ul class="navbar-nav mr-auto">
              <li class="nav-item nav-link btn-skyblue">
               |
             </li>

             <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link btn-skyblue" href="#"data-toggle="modal" data-target="#modalConfirmDelete">Ingresar <i class="far fa-user"></i></a>
              </li>   

            </ul>

          </div>

        <?php }else{ ?>
          <div class="col-md-2">
           <a href="<?=base_url()?>Perfil" class="btn  btn-light "><strong>Mi perfil</strong></a>
         </div>
         <div class="col-md-3">
          <?=$user?>
          <a href="<?=base_url()?>Login/Logout" class="btn btn-danger "><strong>Cerrar Sesion</strong></a>
        </div>
      <?php };?>

    </div>
  </nav>
</header>


<div class="modal fade" id="Registrarse" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body" id="RegistroDePersona">
        <form method="POST" action="<?=base_url()?>Usuario/guardarUser" enctype="multipart/form-data">


          <h2><div class="margen1 ">Registro de usuario  ____________________</div><br></h2>

          <div class="margen2">
            <div class="row">
              <div class="col-md-10">
                <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="form-control" required="">
              </div>
            </div><br> 

            <div class="row"> 
              <div class="col-md-10">
                <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" class="form-control" required="">
              </div>
            </div><br>

            <div class="row">
              <div class="col-md-10">
                <input type="text" name="Nombre_usuario" id="Nombre_usuario" placeholder="usuario" class="form-control" required="">
              </div>
            </div><br> 

            <div class="row">
              <div class="col-md-10">
                <input type="Email" name="Email" id="Email" placeholder="Email" class="form-control" required="">
              </div>
            </div><br>


            <div class="row">
              <div class="col-md-10">
                <input type="Password" name="Password" id="Password" placeholder="Icontraseña" class="form-control">
              </div>
            </div><br> 


            <div class="row">
              <div class="col-md-10">
                <input type="Password" name="confirmarpass" id="confirmarpass" placeholder="Confirmar contraseña" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <fieldset>
              <legend>Subir archivos</legend>

              <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="400000" />

              <div>
                <label for="profile">Seleccionar archivos:</label>
                <input type="file" id="profile" name="profile[]" multiple="multiple" />
                
              </div>

              <div id="submitbutton">
                <button type="submit">Upload Files</button>
              </div>

            </fieldset>
              </div>
            </div><br>

            <div class="row">

              <div class="col-md-10">
                <input type="submit" name="Guardar" class="btn btn-primary margen3" value="Registrarse">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
  <!--Content-->
  <div class="modal-content text-center">

    <div class="modal-header d-flex justify-content-center">
      <h5><p class="heading">Inicio de sesion</p></h5>
    </div>

    <!--Body-->
    <div class="modal-body">

     <form class="form-inline my-2 my-lg-0" method="post" action="<?=base_url()?>Login/IniciarSesion">
      <div class="col-md-5">
        <div class="row">  

          <input type="text" name="N_usuario" id="N_usuario" placeholder="Usuario" class="form-control" required="">
        </div class="margen-divs">
      </div><br><br>

      <div class="row">
       <div class="col-md-5">
        <input type="Password" name="Pass" id="Pass" placeholder="Contraseña" class="form-control" required="">
      </div><br><br>

      <?php if($this->session->userdata('Nombre_usuario') != $this->input->post('Nombre_usuario')){
        echo $Error;
      } ?>
    </div>
    <div class="row">
      <div class="col-md-1">
        <button class="btn  btn-success waves-effect" my-2 my-sm-0" type="submit"><strong>Loguearse</strong></button> </div>
      </div> 
    </form>
  </div>
</div>
<!--/.Content-->
</div>
</div>
<!--Modal: modalConfirmDelete-->