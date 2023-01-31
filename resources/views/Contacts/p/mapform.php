<!-- ======================= Contact form START -->
<section class="pt-0">
	<div class="container">
		<div class="row justify-content-lg-between">
			<div class="col-md-5">
                <iframe class="w-100 h-400 grayscale" 
                        src="https://maps.google.com/maps?width=612&amp;height=481.78&amp;hl=en&amp;q=Pharmacie des Nations&amp;t=p&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>	
			</div>
			<!-- Title -->
			<div class="col-md-6 mt-5 mt-md-0">
				<h3 class="mb-4 display-6">Contactez<span class="text-dark-stroke">-nous</span></h3>
				<p>Contactez-nous pour voir comment nous pouvons vous aider dans votre projet</p>
				<!-- Form START -->
				<form class="contact-form form-line mt-5" id="contact-form" name="contactform" method="POST" action="assets/include/contact-action.php">
					<div>
						<!-- name -->
						Hey, mon nom est
						<span class="mb-3 d-inline-block">
							<input required id="con-name" name="name" type="text" class="form-control mb-0 pb-0" placeholder="">
						</span>
						<!-- email -->
						, mon e-mail est
						<span class="mb-3 d-inline-block">
							<input required id="con-email" name="email" type="email" class="form-control mb-0 pb-0" placeholder="">
						</span>,
						<!-- Subject --><br>
						je vous contacte concernant
						<span class="mb-3 d-inline-block">
							<input required size="40"  id="con-subject" name="subject" type="text" class="form-control mb-0 pb-0" placeholder="">
						</span>.
						<br>
						<!-- Message -->
						Je cherche:
						<span class="mb-3 d-block">
							<textarea required id="con-message" name="message" cols="40" rows="3" class="form-control" placeholder=""></textarea>
						</span>
						<!-- submit button -->
						<div class="text-start">
							<button class="btn btn-primary btn-line" type="submit">La boîte de réception</button>
						</div>
					</div>
				</form>
			</div> 
		</div><!-- Row END -->
	</div>
</section>
<!-- ======================= Contact form END -->