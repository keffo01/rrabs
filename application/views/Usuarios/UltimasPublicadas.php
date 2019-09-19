<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin: 12px;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class=" row">
          <?php foreach ($ver as $v): ?>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-tittle"><?php echo $v->Producto?></div>
                </div>
                <div class="card-content">
                  <?php echo $v->Descripcion?>
                  <div class="card-body" style=" height: 260px; width: 350px;">
                      <img class="d-block w-100" style="margin: 19px; margin-top: 2px;" src="<?=base_url();?>upload/<?=$v->Imagen1?>" alt="card 2">
                    </div>
                </div>
                <div class="card-footer">
                    <?php echo "Vendedor: ".$v->Nombre_usuario;?>
                    <a href="<?=base_url()?>Post/publicacion?post=<?=$v->Id_post?>" class="btn btn-success">Ver publicación</a>
                  </div>     
              </div>
              </div>
            <?php endforeach ?>
            </div> 
          </div>
          <div class="carousel-item">
            <div class=" row">
              <?php foreach($cel as $c):?>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tittle"><?=$c->Producto?></div>
                  </div>
                  <div class="card-content">
                    <?php echo $c->Descripcion?>
                    <div class="card-body" style=" height: 260px; width: 350px;">
                      <img class="d-block w-100" style="margin: 19px; margin-top: 2px;" src="<?=base_url();?>upload/<?=$c->Imagen1?>" alt="card 2">
                    </div>
                  </div>
                  <div class="card-footer">
                     <?="Vendedor: ".$c->Nombre_usuario?>
                     <a href="<?=base_url()?>Post/publicacion?post=<?=$c->Id_post?>" class="btn btn-success">Ver publicación</a>
                  </div>
                </div>
              </div>
              <?php endforeach;?>
            </div>
          </div>
          <div class="carousel-item">
            <div class=" row">
              <?php foreach($car as $ve):?>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tittle"><?=$ve->Producto?></div>
                  </div>
                  <div class="card-content"><?=$ve->Descripcion?>
                    <div class="card-body" style=" height: 260px; width: 350px;">
                      <img class="d-block w-100" style="margin: 19px; margin-top: 2px;" src="<?=base_url();?>upload/<?=$ve->Imagen1?>" alt="card 2">
                    </div>
                     <div class="card-footer">
                    <?="Vendedor: ".$ve->Nombre_usuario?>
                    <a href="<?=base_url()?>Post/publicacion?post=<?=$ve->Id_post?>" class="btn btn-success">Ver publicación</a>
                  </div>
                  </div>
                 
                </div>
              </div>
              <?php endforeach; ?> 
          </div>
        </div>
      </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


