<head>
  <?=$head?>

</head>
<?=$Navbar?>
   <br><br><br><br><br><br>
     <div class="row">
      <?php foreach ($ver as $v): ?>
      <div class="col-md-4">
        <div class="card" style="margin-top: 12px; padding: 9px; margin: 12px; ">
          <div class="card-content">
            <div class="card-header"><h4 class="card-title"><?php echo $v->Nombre?></h4></div>
            <div class="card-body">
            <p class="card-text"><?php echo $v->Descripcion?></p>
            <img  class="w-100"src="<?=base_url()?>upload/<?php echo $v->Imagen1?>">
          </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary btn-block text-light" href="<?=base_url()?>Post/publicacion?post=<?=$v->Id_post?>">Ver</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
    </div>




<?=$Footer?>
<?=$scripts?>