<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>

<?php include __DIR__ . '/partials/nav-doc.part.php'; ?>

    <!-- Principal Content Start -->
    <div id="galeria">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <h1>GALERÍA</h1>
                <hr>
                <?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                    <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php if(empty($errores)) : ?>
                            <p><?= $mensaje ?></p>
                        <?php else : ?>
                            <ul>
                                <?php foreach($errores as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Imagen</label>
                            <input class="form-control-file" type="file" name="imagen">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Descripción</label>
                            <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
                            <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Principal Content Start -->
<hr>
    <div>


        <div class="container">
            <div class="custyle">
                <table class="table table-hover" custab">
                <thead>
                    <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Visualizaciones</th>
                        <th >Likes</th>
                        <th class="text-center">Descargas</th>
                    </tr>
                </thead>
                    <?php if(empty($imagenes)===false) : ?>
                    <?php foreach ($imagenes as $imagen): ?>

                    <tr>
                        <th><p><?= $imagen->getId() ?></p></th>
                        <th><img src="<?= $imagen->getUrlGallery() ?>" alt="<?= $imagen->getDescripcion() ?>" title="<?=$imagen ->getDescripcion() ?>" style="height: 64px;width: 64px;"><br>Descripcion: <br><?= $imagen->getDescripcion() ?></th>
                        <th><?= $imagen->getNumVisualizaciones() ?></th>
                        <th><?= $imagen->getNumLikes() ?></th>
                        <th class="text-center"><?= $imagen->getNumDownloads() ?></th>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </table>
            </div>
        </div>


    </div>


<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>