<!-- Navigation Bar -->
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <span>[PHOTO]</span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="menu">
            <ul class="nav navbar-nav">
                <li class="<?= esOpcionMenuActiva('index') ? 'active' : '' ?> lien">
                    <a href="<?= esOpcionMenuActiva('index') ? '#' : '/controlador/index.php' ?>">
                        <i class="fa fa-home sr-icons"></i> Home</a>
                </li>
                <li class="<?= esOpcionMenuActiva('about') ? 'active' : '' ?> lien">
                    <a href="<?= esOpcionMenuActiva('about') ? '#' : '/controlador/about.php' ?>">
                        </i> About</a>
                </li>
                <li class="<?= existeOpcionMenuActivaEnArray(['blog', 'single_post']) ? 'active' : '' ?> lien">
                    <a href="<?= esOpcionMenuActiva('blog') ? '#' : '/controlador/blog.php' ?>">
                        <i class="fa fa-file-text sr-icons"></i> Blog</a>
                </li>
                <li class="<?= esOpcionMenuActiva('contact') ? 'active' : '' ?> lien">
                    <a href="<?= esOpcionMenuActiva('contact') ? '#' : '/controlador/contact.php' ?>">
                        <i class="fa fa-phone-square sr-icons"></i> Contact</a>
                </li>
                <li class="<?= esOpcionMenuActiva('galeria') ? 'active' : '' ?>">
                    <a href="<?= esOpcionMenuActiva('galeria') ? '#' : '/controlador/galeria.php' ?>">
                        <i class="fa fa-image"></i> Galeria</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navigation Bar -->