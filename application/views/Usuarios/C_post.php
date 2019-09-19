 <?=$Head?>
   <?=$Navbar?> 
   <br><br><br><br><br><br>
   <?php foreach ($ver as $v): ?>



     <div class="margen"> 
      <div class="col-md-3">
        <div class="card mb-5">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
            alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><?php echo $v->Producto?></h4>
            <p class="card-text"><?php echo $v->Descripcion?></p>
            <a class="btn btn-primary">Button</a>
          </div>

        </div>
        <br><br>
      </div>
   
    </div>



<?php endforeach ?>
<?=$scripts?>