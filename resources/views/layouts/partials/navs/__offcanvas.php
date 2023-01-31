<div class="offcanvas-header">
    <a class="ms-auto btn btn-primary btn-round zoom-hover" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="fas fa-times p-0"></i>
    </a>
</div>

<div class="offcanvas-body vh-lg-100 d-flex align-items-start flex-column px-5 px-md-6">

    <!-- Offcanvas inner START -->
    <ul class="nav dropdown-toggle-start-icon d-block flex-column mb-5">
       
        <li class="nav-item display-6 h5"><a href="<?= $router->generate("accueil"); ?>" class="nav-link text-white-stroke">Accueil</a></li>
        <li class="nav-item display-6 h5"><a href="<?= $router->generate("à propos"); ?>" class="nav-link text-white-stroke">A-Propos</a></li>
        
        <li class="nav-item display-6 h5 position-relative">
            <a href="<?= $router->generate("nos services"); ?>" class="nav-link text-white-stroke d-block">Services</a>
            <!-- Offcanvas dropdown START -->
            <a class="dropdown-toggle collapsed" data-bs-toggle="collapse" href="#services-dropdown-collapse" role="button" aria-expanded="false" aria-controls="services-dropdown-collapse"></a>
            <li class="collapse" id="services-dropdown-collapse">
                <ul class="nav flex-column w-100 pb-4 pe-0 pe-lg-5">
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#regie-pub">Régie publicitaire</a></li>
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#import-export">Import-Export</a></li>
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#formations">Formation - Etude - Conseil<!--<span class="badge bg-danger ms-2">Hot</span> --></a></li>
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#audiovisuelle">Production Audiovisuelle & Artistique</a></li>
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#evenementiel">Evénementiel & Agence d'Hotesse</a></li>
                    <li class="nav-item"> <a class="nav-link text-body" href="<?= $router->generate("nos services"); ?>#autres-services">Multi-Services</a></li>
                </ul>
            </li>
            <!-- Offcanvas dropdown END -->
        </li>

        <li class="nav-item display-6 h5"><a href="<?= $router->generate("contact"); ?>" class="nav-link text-white-stroke">Contact</a></li>
    
    </ul>

    <div class="mt-auto mb-5">
        <a href="mailto:<?= NOREPLY_MAIL; ?>?subject=INFORMATIONS%20DEV-AFRIKA" class="font-heading text-white text-primary-hover d-block mb-3"><?= NOREPLY_MAIL; ?></a>
        <a href="tel:+225-<?= WEBSITE_PHONE; ?>" class="font-heading text-white text-primary-hover d-block mb-3">+(225) <?= WEBSITE_PHONE; ?></a>
        <a href="tel:+225-<?= WEBSITE_CEL; ?>" class="font-heading text-white text-primary-hover">+(225) <?= WEBSITE_CEL; ?></a>
    </div>
    <!-- Offcanvas inner END -->

</div>