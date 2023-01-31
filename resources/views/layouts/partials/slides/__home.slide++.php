<?php

$slcounter = eaCountall("banners", "WHERE state='1'");
$sls = eaFindall("banners", "WHERE state='1'");
$a = 0;
$b = 0;


?>
<div class="cnc-main-slide w-100">
		
	<div id="cncslidecarousel" class="carousel slide carousel-fade" data-ride="carousel">

		<ol class="carousel-indicators">

			<?php foreach($sls as $a => $ind): ?>
				<li data-target="#cncslidecarousel" data-slide-to="<?= $a; ?>" class="<?= $a === 0 ? 'active' : ''; ?>"></li>
		 	<?php endforeach ?>

		</ol>



		<div class="carousel-inner">

			<?php foreach($sls as $b => $item): ?>

				<div class="carousel-item cnc-carousel-item <?= $b === 0 ? 'active' : ''; ?>">
					<img src="<?= $item->fileroad ?>" class="bg-black" alt="<?= $item->title; ?>">
					<div class="carousel-caption d-none d-md-block">
						<h3 class="ex-display-3"><?= $item->title ?></h3>
						<p class="<?= $item->link !== "" ? 'm-0 p-0' : ''; ?>"><?= $item->texte; ?></p>
						<?php if($item->link !== ""): ?>
							<a href="<?= $item->link; ?>" value="En savoir plus" class="btn btn-lg btn-primary cnc-btn-primary rounded-0 mt-4 mb-4">En savoir plus</a>
						<?php endif; ?>
					</div>
				</div>

		 	<?php endforeach ?>

		</div>



		<a class="carousel-control-prev" href="#cncslidecarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="carousel-control-next" href="#cncslidecarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>

        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#tsaslidecarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#tsaslidecarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button> -->

	</div>

</div>