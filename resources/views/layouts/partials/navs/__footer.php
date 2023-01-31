<div class="container">
	
	<!-- NewsLetter -->
	<div class="row pb-5 justify-content-center">
		<div class="col-md-7">
			<h3 class="text-white text-center">Inscrivez-vous à notre newsletter</h3>
			<form class="p-0 px-xl-8 my-4">
				<div class="input-group">
					<input class="form-control border-0 h-auto" type="email" placeholder="Votre adresse e-mail">
					<button type="button" class="btn btn-white btn-lg mb-0">S'inscrire</button>
				</div>
				<div class="text-center mt-3"><span class="text-danger">*</span> Nous ne partagerons avec personne vos données personnelles.</div>
			</form>
		</div>
	</div>


	<!-- Divider -->
	<div class="divider-light opacity-1"></div>


	<!-- Clients -->
	<div class="row py-4 justify-content-center">
		<div class="col-12">
			<div class="tiny-slider">
				<div class="tiny-slider-inner" data-arrow="false" data-dots="false" data-gutter="80" data-items-xl="6" data-items-lg="5" data-items-md="5" data-items-sm="4" data-items-xs="2" data-autoplay="3800">
					<!-- Slide items START -->
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/1.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/2.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/3.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/4.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/5.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/6.svg" alt=""> </div>
					<div class="item"> <img class="opacity-5" src="<?= $MEDIA ?>/uses/clients/light/SVGs/7.svg" alt=""> </div>
					<!-- Slide items END -->
				</div>
			</div>
		</div>
	</div>


	<!-- Divider -->
	<div class="divider-light opacity-1"></div>


	<!-- Main Footer -->
	<div class="row pb-4 pt-6">
		<!-- Footer widget item -->
		<div class="col-md-4 mb-4">
			<h5 class="mb-4 text-white">A-propos de DEV<span class="text-primary">-</span>AFRIKA</h5>
			<p>DEV AFRIKA est une Société à Responsabilité Limité exerçant dans l'affichage publicitaire. Agrément du Conseil Supérieur de la Publicité : ER-479/CSP</p>
			<!-- Social icons -->
			<ul class="list-unstyled list-group-inline display-9">
				<li> <a class="text-facebook me-2" href="#"><i class="fab fa-facebook-square"></i></a> </li>
			</ul>
			<div class="my-4">©<?= date('Y'); ?> <a href="<?= $router->generate("accueil"); ?>" target="_blank"><?= WEBSITE_NAME; ?></a>. Tous droits reservés.
			</div>
		</div>
		<!-- Footer widget item -->
		<div class="col-sm-6 col-md-2 offset-lg-1 mb-5">
			<h5 class="mb-4 text-white">Nos services</h5>
			<ul class="nav flex-column text-primary-hover">
				<li class="nav-item"><a class="nav-link pt-0" href="<?= $router->generate("nos services"); ?>#regie-pub">Régie Publicitaire</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>#import-export">Import - Export</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>#formations">Formations</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>#audiovisuelle">Audiovisuelle</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>#evenementiel">Evénementiel</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>#autres-services">Multi-services</a></li>
			</ul>
		</div>
		<!-- Footer widget item -->
		<div class="col-sm-6 col-md-2 mb-5">
			<h5 class="mb-4 text-white">Découvrir</h5>
			<ul class="nav flex-column text-primary-hover">
				<li class="nav-item"><a class="nav-link pt-0" href="<?= $router->generate("accueil"); ?>">Accueil</a></li>
				<li class="nav-item"><a class="nav-link pt-0" href="<?= $router->generate("à propos"); ?>">A-propos</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("nos services"); ?>">Services</a></li>
				<li class="nav-item"><a class="nav-link" href="<?= $router->generate("contact"); ?>">Contact</a></li>
			</ul>
		</div>
		<!-- Footer widget item -->
		<div class="col-md-3">
			<h5 class="mb-4 text-white">Ou sommes-nous</h5>
			<address>Cocody Angré 7ème Tranche, dans l'immeuble de la Pharmacie Des Nations (QG).</address>
			<p><a class="text-primary-hover" href="mailto:<?= NOREPLY_MAIL; ?>?subject=INFORMATIONS%20DEV-AFRIKA"><?= NOREPLY_MAIL; ?></a></p>
			<p><a class="text-primary-hover" href="tel:+225-<?= WEBSITE_PHONE; ?>">+(225) <?= WEBSITE_PHONE; ?></a></p>
			<p><a class="text-primary-hover" href="tel:+225-<?= WEBSITE_CEL; ?>">+(225) <?= WEBSITE_CEL; ?></a></p>
		</div>
	</div>

</div>