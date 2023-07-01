@extends('client_layout.app')

@section('title')
    A propos
@endsection

@section('content')
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>A propos de nous!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<img src="{{asset('client/images/about-img.jpg')}}" alt="" class="img-fluid">
				</div>
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1> <span>E-blood Bank Makila</span></h1>
						<h4></h4>
						<p>E-blood bank Makila est une application mobile qui interconnecte les banques du sang sur une plateforme numérique pour permettre aux hôpitaux de géo localiser la poche du sang, acheter par téléphone via la monnaie électronique et se faire livrer rapidement par drone autonome dans moins d’une heure pour une prise en charge rapide des malades en besoin de sang.</p>
						<p>Avec 64.871 malades aux hôpitaux en besoin de sang : femmes enceintes qui accouche, enfants anémiques, patients au bloc opératoire et victimes d’accidents et 81.000.000 habitants en RDC, </p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
					</div>
				</div>
				<div class="col-md-12">
					<div class="inner-pt">
						<h1> <span>Historique</span></h1>
						<p>C’est depuis fin 2021 que nous avons procéder au test de notre solution. Nous avons juste donnée un numéro de téléphone aux hôpitaux et banque du sang pour nous appeler en cas de besoin du sang, et depuis lors on reçois en moyenne 180 appels par jour et les nombres des commandes sont supérieur à notre capacité de livraison du sang voilà  pourquoi nous faisons appel pour trouver un financement, lever un fond ou une subvention pour nous permettre de renforcer notre float des drones et motos de livraison ainsi que d’étendre nos services dans toutes les 24 communes de Kinshasa en particulier et les 26 provinces de la RD CONGO en général. </p>
						<p>. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Évènements</h2>
						<p>Récompenses</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">All</button>
							<button data-filter=".drinks">Vivatech</button>
							<button data-filter=".lunch">Ministère numrique & Santé </button>
							<button data-filter=".dinner">Partenaires médicales</button>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row special-list">
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-01.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Centre Hospitalier MONKOLE</h4>
							<p>Partenaire médical .</p>
							<h5>Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-02.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>NEW DEAL</h4>
							<p>Partenaire médical.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid drinks">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-03.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>VIVATECH</h4>
							<p>Partenaire évènementiel.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-04.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Ministère du Numérique</h4>
							<p>Parténaire Gouvernemental.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-05.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Ministère de la santé</h4>
							<p>Parténaire Gouvernemental.</p>
							<h5> $18.79</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid lunch">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-06.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>HDRONES</h4>
							<p>Parténaire Technique.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-07.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Centre Médical Diamant</h4>
							<p>Parténaire médical.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-08.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>Centre Médical de Kinshasa</h4>
							<p>Parténaire médical.</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
				<div class="col-lg-4 col-md-6 special-grid dinner">
					<div class="gallery-single fix">
						<img src="{{asset('client/images/img-09.jpg')}}" class="img-fluid" alt="Image">
						<div class="why-text">
							<h4>MaishaPay</h4>
							<p>Parténaire Technique .</p>
							<h5> Certifié</h5>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Reviver nos expériences et évènements</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-01.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-01.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-02.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-02.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-03.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-03.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-04.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-04.jpg')}}" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-05.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-05.jpg')}}" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="{{asset('client/images/gallery-img-06.jpg')}}">
							<img class="img-fluid" src="{{asset('client/images/gallery-img-06.jpg')}}" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+243896600919 / +33758489244
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							info@ebloodmakila.com / nlemvomike1@gmail.com 
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Adresse</h4>
						<p class="lead">
							Avenue de la paix, immeuble Ancienne Galerie Presidentielle 6ème niveau local B1-29 KINSHASA-RDC
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
@endsection