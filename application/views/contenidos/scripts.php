<script src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>/assets/dropzone/dropzone.js"></script>


<script>
    /*
comprobar checkbox
*/

$(document).ready(function() {

comprobarcheckbox();


});

function comprobarcheckbox() {
     if($('#customSwitches').prop('checked')){ 
    $('#Regate').show();
    $('#basic-addon1-Regate').show();
}else{
     $('#Regate').hide();
     $('#basic-addon1-Regate').hide();
}
}

function selectCategoria(){
    var redireccion='<?php echo base_url(); ?>Producto/llenarCategoria';  
    $.ajax({
        url:redireccion,
        type:'post',
        success: function (respuesta){
            $('#select').html(respuesta);
        }
    });
}
function selectCategoriaVenta(){
    var redireccion='<?php echo base_url(); ?>Producto/llenarCategoria';  
    $.ajax({
        url:redireccion,
        type:'post',
        success: function (respuesta){
            $('#CategoriaVenta').html(respuesta);
        }
    });
}
function tablaProduc(){
    $.ajax({
        type:'POST',
        url: '<?=base_url();?>Producto/mostrarProduct',
        success: function (data){ 
            $('#ver_product').html(data);
        }
    });
}
function extraerCampos(id){
    $.ajax({
        type: 'POST',
        url: '<?=base_url();?>Producto/extraerProduct?id='+id,
        success: function(data){
            $('#mostrar_campos').html(data);
        }
        
    });
}
function updateProduct(){


    $.ajax({
        type : 'POST',
        url : '<?=base_url();?>Producto/editarProduct',
        data : $('#editar').serialize(),
        success: function (data){
            if(data == 'Exito'){  
                $('#modal').hide();
                
                tablaProduc();
                
                
            }else{
                alert('Registro Actualizado');
            }
        }
        
        
    });
    
}
function deleteProduct(id){
    $.ajax({
        type : 'POST',
        url : '<?=base_url();?>Producto/borrarProduct?id='+id,
        data : $('#delete').serialize(),
        success: function (data){
            tablaProduc()
            if(data == 'exito'){
                alert('Registro eliminado');
            }
            ;
        }
    });
}

</script>

<script>
    selectCategoria();
    tablaProduc();
    extraerCampos();
    selectCategoriaVenta();
</script>
<!--FIN DE CRUD DE PRODUCTOS-->

<!--INICIO DE CRUD DE USUARIOS-->
<script>
    function tablaUser(){
        $.ajax({
            type: 'POST',
            url: '<?=base_url();?>Usuario/mostrarUser',
            success: function(data){
                $('#usuarios').html(data);
            }


        });
    }
    function llamarCampos(id){
        $.ajax({
            type: 'POST',
            url: '<?=base_url();?>Usuario/extraerUser?id='+id,
            success: function(data){
                $('#ver').html(data);
            }

        });
    }
    function selectRol(){
        var redireccion='<?php echo base_url(); ?>Usuario/extraerUser';  
        $.ajax({
            url:redireccion,
            type:'post',
            success: function (respuesta){
                $('#select').html(respuesta);
            }
        });
    }
   function updateUser(){


        $.ajax({
            type : 'POST',
            url : '<?=base_url();?>Usuario/actualizarUser',
            data : $('#formulario').serialize(),
            success: function (data){
                if(data == 'Exito'){  
                    $('#formulario').hide();

                    tablaUser();


                }else{
                    alert('Registro actualizado');
                }
            }


        });

    }
    function deleteUser(id){
        $.ajax({
            type : 'POST',
            url : '<?=base_url();?>Usuario/borrarUser?id='+id,
            success: function (data){
                tablaUser()
                if(data == 'Exito'){
                    alert('Registro eliminado');
                }

            }
        });
    }
    function Rol(){
        var redireccion='<?php echo base_url(); ?>Usuario/SelectRol';  
        $.ajax({
            url:redireccion,
            type:'post',
            success: function (dato){
                $('#rol').html(dato);
            }
        });
    }

</script>
<script>
    tablaUser();
    llamarCampos()
    selectRol();
    Rol();

     
</script>






