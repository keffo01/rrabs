<!DOCTYPE html>
<html>
<?=$Navbar?>
<?=$CarA?>
<?=$head?>
<head>

  <title>Registrarse</title>

</head>
<style type="text/css">


.card-header { 

  background-color: #225673;

}
.card-footer{
 background-color: #225673;
}
.modal-header { 

  background-color: #A6B3C9;

}
.modal-footer{
 background-color: #A6B3C9;
}

 

</style>
 
  <body style="background-color: #EBEDEF;">




    <!--MODAL ACTUALIZAR-->
    <form id="formulario">
      <div class="modal fade" id="cambiar" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h4 class="modal-title">Actualizar registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body" id="ver">

       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Volver</button>
        <button type="button" class="btn btn-primary" onclick="updateUser();">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>

</form>
<!-- Fin modal update -->
<!--MODAL PARA REGISTRARSE-->

<div class="modal fade" id="Registrarse" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body" id="RegistroDePersona">
        <form method="POST" action="<?=base_url()?>Usuario/guardarUser">
          <!--CONTENIDO DEL MODAL-->
          <div class="card-header"><strong style="color:white " >Registrar...</strong></div>

          <div class="row margen-divs">
            <div class="col-md-5">
              <label>Nombre</label>
              <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="form-control" required="">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
              <label>Apellido</label>
              <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" class="form-control" required="">
            </div>
          </div>
          <div class="row margen-divs">
            <div class="col-md-5">
              <label>Usuario</label>
              <input type="text" name="Nombre_usuario" id="Nombre_usuario" placeholder="Usuario" class="form-control" required="">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">

              <label>Email</label>
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="Email" name="Email" id="Email" placeholder="Email" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="row margen-divs">
            <div class="col-md-5">
              <label>Contraseña</label>
              <input type="Password" name="Password" id="Password" placeholder="Contraseña" class="form-control">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
              <label>Tipo de usuario</label>
              <select class="form-control" id="rol">

              </select>
            </div>
          </div>
          
          <div class="card-footer">
            <div class="col-md-4"></div>

            <input type="submit" name="Guardar" class="btn btn-default" value="Agregar usuario">
          </div>
        </div>
      </form>
    </div>




  </div>
</div>
</div>

<!--final de modal registrarse-->
<div class="container" >

 <div class="card" >
  <div class="card-header"><h3 align="center" style="color: white" >Gestión de Usuarios</h3></div>
  <div class="card-body">
    <table width="100%" class="table table-bordered table-striped table-hover"> 
      <thead class="thead-light">
        <ul>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Email</th>
          <th>Contraseña</th>
          <th>Rol</th>
          <th>Actualizar</th>
          <th>Eliminar</th>

        </ul>


      </thead>
      <tbody id="usuarios" >

      </tbody> 

    </table>
  </div>
  <div class="card-footer">
   <button type="button" class="btn btn-light" data-toggle="modal" data-target="#Registrarse">Agregar usuario</button>
 </div>
</div>

</div><br> 

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg">Ventas</button>

      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg">Compradores</button>

      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-primary btn-lg">Productos</button>

      </div>
      <div class="col-md-3">
       <button type="button" class="btn btn-primary btn-lg">Mensajeria</button>

     </div>
   </div>
 </div>
</div><br><br><br>


</font>
</body>


<?=$scripts;?>
<?=$Footer?>
</html>
