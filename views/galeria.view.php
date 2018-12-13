<?php include __DIR__ . '/partials/inicio-doc.part.php'; ?>

<?php include __DIR__ . '/partials/nav.part.php'; ?>

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
            <hr class="divider">
            <div class="imagenes_galeria">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Visualizaciones</th>
                        <th scope="col">Likes</th>
                        <th scope="col">Descargas</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($imagenes ?? [] as $imagen) : ?>

                            <tr>
                                <th scope="row"><?= $imagen->getId()?></th>
                                <td>
                                    <img src="<?= $imagen->getUrlGallery() ?>"
                                         alt="<?= $imagen->getDescripcion()?>"
                                         title="<?=$imagen->getDescripcion() ?>"
                                         width="100px"/>

                                </td>
                                <td><?= $imagen->getNumVisualizaciones()?></td>
                                <td><?= $imagen->getNumLikes()?></td>
                                <td><?= $imagen->getNumDownloads()?></td>
                            </tr>
                        <?php  endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Principal Content Start -->

<?php include __DIR__ . '/partials/fin-doc.part.php'; ?>
