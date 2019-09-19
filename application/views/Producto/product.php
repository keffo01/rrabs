 <!DOCTYPE html>
 <html lang="es">
 <?=$Navbar?>
 <?=$head?>
 <head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Productos</title>


</head>
<style >
.modal-header
{
 padding:7px;

 background-color:  #BBC4D2

}
.modal-footer
{
 padding:9px;

 background-color:  #BBC4D2

}


</style>
<body style="background-color: #EBEDEF;"><br><br><br>

    <div class="container-fluid" align="center">

        <div class="card">
            <div class="card-header">
                <strong><h4>Productos</h4></strong> 
            </div> 
            <div class="card-body">
                <table   width="100%" class="table table-bordered table-striped table-hover">
                   <thead class="thead-dark">
                    <ul>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Regate</th>
                        <th>Categoria</th>
                        <th>Borrar</th>
                        <th>Editar</th>

                    </ul>
                </thead>
                <tbody id="ver_product" >

                </tbody> 

            </table>
        </div>
        <div class="card-footer" >
         <button type="button" class="btn btn-primary btn-lg  " data-toggle="modal" data-target="#myModal">Nuevo producto</button>
     </div>
 </div> 
</div>



<form action="<?php echo base_url(); ?>Producto/guardarProduct" method="post" id="editar">




    <!-- Modal Guardar producto -->
    <div id="myModal" class="modal fade" role="dialog">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Guardar producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">

            <div class="col md-5">
                <label>Nombre del producto</label>
                <input type="text" name="name" placeholder="Producto" class="form-control" required pattern="[A-Za-z]+">
            </div>

            <div class="col md-5">
                <label>Descripcion</label>
                <input type="text" name="descrip" placeholder="Descripcion" class="form-control" required pattern="[A-Za-z]+">
            </div>
            <div class="col md-5">


                <label>Precio</label> 
                <input type="text" name="precio" placeholder="$0.00" class="form-control" required pattern="[0-9$.]+">
            </div>
            <div class="col md-5">

                <label>Regate</label>
                <input type="text" name="regate" placeholder="Regate" class="form-control" required pattern="[0-9$.]+">
            </div>
            <div class="col md-5">

                <label>Categoria</label>
                <select name="categoria" id="select" class="form-control">       
                </select>
            </div><br>


            <div class="modal-footer">
                <button type="reset" class="btn btn-default">Reiniciar</button>
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
                <input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
            </div>
        </div>


    </div>
</div>
</div>

<!--Final de modar de guardar producto-->



<!--MODAL PARA ACTUALIZAR-->


<div class="modal fade" id="modal"  >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Actualizar producto</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="mostrar_campos">

        </div> 
        <div class="modal-footer">
            <button type="reset" class="btn btn-default" >Reiniciar</button>
            <button type="button" class="btn btn-primary waves-effect waves-light " id="enviar" onclick="updateProduct();">Guardar cambios</button>
        </div>
    </div>
</div>
</div>
<!-- Fin modal update -->

<!--Modal para Eliminar datos-->

<!--<button type="button" class="close" data-dismiss="modal">&times;</button>
<span class="glyphicon glyphicon-trash"></span>

</div>
<div class="modal-body">
 <span>Estas seguro de eliminarlo?</span>
</div>
<div class="modal-footer">

  <button type="button" class="btn btn-primary" onclick="deleteProduct();">Aceptar</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Rechazar</button>
</div>
</div>

</div>
</div>

FIN DEL MODAL DE ELIMINAR-->

</form>
<div id="delete" class="modal fade" role="dialog">

    <div class="container" >

      <div class="alert alert-success alert-dismissible" id="myalert">

        <strong>EL REGISTRO FUE ELIMINADO.!</strong>
        <a href="#" class="close">&times;</a>

    </div>
</div>
</div>


</body>


<script type="text/javascript"></script>
 
<?=$scripts;?>

</html>

 