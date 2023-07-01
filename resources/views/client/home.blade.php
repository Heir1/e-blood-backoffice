@extends('client_layout.app')

@section('title')
    Accueil
@endsection

@section('content') 

    <!-- Start slides -->
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="client/images/slider-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"> <strong>Certifié par  <br> le ministère du numérique de la RDCONGO</strong></h1>
                            <p class="m-b-40">La plate-forme qui vous met en relation avec les banques du sang plus proches de votre localisation.</p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Commencer</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="client/images/slider-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Drone E-Blood<br>Assurance dans la livraison </strong></h1>
                            <p class="m-b-40">
                                Grâce à nos drones nous réalisons des livraisons de bout en bout.  
                                {{-- <br>  téchnologie blockchaine. --}}
                            </p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Commander maintenant</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="client/images/slider-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>E-Blood Bank <br>l'innovation à votre portée</strong></h1>
                            <p class="m-b-40">Il permet de géolocaliser et d'acheter la poche du sang ou </br>le médicament grâce à une application web et se faire livrer dans moins d'une heure</br> par drone ou moto selon la localisation.</p>
                            <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="client/images/about-img.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <div class="inner-column">
                        <h1>E-blood Bank <span>Makila SARL</span></h1>
                        <h4>RDCONGO</h4>
                        <p>E-blood bank Makila est une application numérique qui interconnecte les banques du sang sur une plateforme pour permettre aux hôpitaux de géolocaliser la poche du sang, d’acheter via la monnaie électronique et se faire livrer rapidement par drone autonome dans moins d’une heure pour une prise en charge rapide des malades en besoins de sang. </p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-left">
                    <p class="lead ">
                        "E-blood bank est une application web qui interconnecte les banques du sang et pharmacies pour permettre aux hôpitaux de géolocaliser et acheter la poche du sang ou médicaments et se faire livrer par drone ou moto."
                    </p>
                    <span class="lead">MIKE NLENVO</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->

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
                        <img src="client/images/img-01.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>Centre Hospitalier MONKOLE</h4>
                            <p>Partenaire médical .</p>
                            <h5>Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid drinks">
                    <div class="gallery-single fix">
                        <img src="client/images/img-02.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>NEW DEAL</h4>
                            <p>Partenaire médical.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid drinks">
                    <div class="gallery-single fix">
                        <img src="client/images/img-03.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>VIVATECH</h4>
                            <p>Partenaire évènementiel.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid lunch">
                    <div class="gallery-single fix">
                        <img src="client/images/img-04.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>Ministère du Numérique</h4>
                            <p>Parténaire Gouvernemental.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid lunch">
                    <div class="gallery-single fix">
                        <img src="client/images/img-05.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>Ministère de la santé</h4>
                            <p>Parténaire Gouvernemental.</p>
                            <h5> $18.79</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid lunch">
                    <div class="gallery-single fix">
                        <img src="client/images/img-06.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>HDRONES</h4>
                            <p>Parténaire Technique.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid dinner">
                    <div class="gallery-single fix">
                        <img src="client/images/img-07.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>Centre Médical Diamant</h4>
                            <p>Parténaire médical.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid dinner">
                    <div class="gallery-single fix">
                        <img src="client/images/img-08.jpg" class="img-fluid" alt="Image">
                        <div class="why-text">
                            <h4>Centre Médical de Kinshasa</h4>
                            <p>Parténaire médical.</p>
                            <h5> Certifié</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 special-grid dinner">
                    <div class="gallery-single fix">
                        <img src="client/images/img-09.jpg" class="img-fluid" alt="Image">
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
                        <a class="lightbox" href="client/images/gallery-img-01.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-01.jpg" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="client/images/gallery-img-02.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-02.jpg" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="client/images/gallery-img-03.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-03.jpg" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a class="lightbox" href="client/images/gallery-img-04.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-04.jpg" alt="Gallery Images">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="client/images/gallery-img-05.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-05.jpg" alt="Gallery Images">
                        </a>
                    </div> 
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <a class="lightbox" href="client/images/gallery-img-06.jpg">
                            <img class="img-fluid" src="client/images/gallery-img-06.jpg" alt="Gallery Images">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start Customer Review -->
    <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>La team E-blood bank Makila </h2>
                        <p>L'équipe extra-ordinaire</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div id="reviews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mt-4">
                            <div class="carousel-item text-center active">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="client/images/profile-1.jpg" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Gabriel Eric NTUMBA</strong></h5>
                                <h6 class="text-dark m-0"> Chief of Quality Departement</h6>
                                <p class="m-0 pt-3">la solution qui rapproche la population au corps médical</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="client/images/profile-3.jpg" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">EDEN ILENDA</strong></h5>
                                <h6 class="text-dark m-0">Chief R&D</h6>
                                <p class="m-0 pt-3">Le numérique au service de la santé.</p>
                            </div>
                            <div class="carousel-item text-center">
                                <div class="img-box p-1 border rounded-circle m-auto">
                                    <img class="d-block w-100 rounded-circle" src="client/images/profile-7.jpg" alt="">
                                </div>
                                <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">MIKE NLEMVO</strong></h5>
                                <h6 class="text-dark m-0">CEO AND FOUNDER</h6>
                                <p class="m-0 pt-3">Redonner la vie en un clic!.</p>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Customer Reviews -->

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
                            info@ebloodmakila.com
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
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
