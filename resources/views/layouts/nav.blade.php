<!-- [ Pre-loader ] start -->
<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="{{ url('../img/undraw_profile.svg')}}" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">{{auth()->user()->nom}} {{auth()->user()->prenom}}<i class="fa fa-caret-down"></i><br><span>{{auth()->user()->role}}</span></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							
							<li class="list-group-item"><a href="{{url('/Admin/profile')}}"><i class="fa fa-user m-r-5"></i>{{ __('Modifier mon profile')}}</a></li>
							<li class="list-group-item">
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<button type="submit" class="btn btn-primary">Se Déconnecter</button>
								 </form>	
							</li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
					    <label>{{ __("vue d'ensemble")}}</label>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/index')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">{{ __('tableau de bord ')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/calendrier')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-calendar"></i></span><span class="pcoded-mtext">{{ __('Calendrier')}}</span></a>
					</li>

					<li class="nav-item pcoded-menu-caption">
					    <label>{{ __('Projets')}}</label>
					</li>
                    <li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-eye" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Tous Projets')}}</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{url('/Admin/listeProjetAP')}}">{{ __('Assurance Personnes')}}</a></li>
					        <li><a href="{{url('/Admin/listeProjetAA')}}">{{ __('Assurance Animaux')}}</a></li>
					        <li><a href="{{url('/Admin/emprunteur')}}">{{ __('Emprunteurs')}}</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Nouveau Projet')}}</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{url('/Admin/assurancePersonne')}}">{{ __('Assurance Personnes')}}</a></li>
					        <li><a href="{{url('/Admin/assuranceAnimaux')}}">{{ __('Assurance Animaux')}}</a></li>
					        <li><a href="{{url('/Admin/emprunteur')}}">{{ __('Emprunteurs')}}</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Nos Contrats')}}</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{url('/Admin/listeContratAP')}}">{{ __('Assurance Personnes')}}</a></li>
					        <li><a href="{{url('/Admin/listeContratAA')}}">{{ __('Assurance Animaux')}}</a></li>
					        <li><a href="{{url('/Admin/listeContratE')}}">{{ __('Emprunteurs')}}</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
					    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Nos Factures')}}</span></a>
					    <ul class="pcoded-submenu">
					        <li><a href="{{url('/Admin/factureAP')}}">{{ __('Assurance Personnes')}}</a></li>
					        <li><a href="{{url('/Admin/factureAA')}}">{{ __('Assurance Animaux')}}</a></li>
					        <li><a href="{{url('/Admin/factureE')}}">{{ __('Emprunteurs')}}</a></li>
					    </ul>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>{{ __('Nos Clients')}}</label>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/listeClients')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Lister les clients')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/ajouter')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Ajouter des clients')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/importer')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Importer des clients')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/contacterClients')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Contacter les Clients')}}</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>{{ __('Les Agents')}}</label>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/ajouterAgent')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Ajouter Agent')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/listeAgents')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('List Agents')}}</span></a>
					</li>
					<li class="nav-item pcoded-menu-caption">
					    <label>{{ __('Les Gestionner')}}</label>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/ajouterGestionnaire')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-plus" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Ajouter Gestionnaire')}}</span></a>
					</li>
					<li class="nav-item">
					    <a href="{{url('/Admin/listeGestionnaire')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i></span><span class="pcoded-mtext">{{ __('Lister Gestionnaires')}}</span></a>
					</li>
					
				</ul>
				
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
					<a href="{{ url('/')}}" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="{{asset('../img/logo-wh.png')}}" width="70" alt="CRM Assurances" class="logo py-2">
					</a>
					<a href="#" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#" class="pop-search"><i class="fas fa-search fa-fw"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto pt-3">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fas fa-bell fa-fw"></i>
								@if($eventCalendar1->isNotEmpty())
								<span class="badge badge-danger badge-counter">+ {{$countCalendar}}</span>
								@endif
								</a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<!-- <a href="#" class="m-r-10">mark as read</a>
											<a href="#">clear all</a> -->
										</div>
									</div>
									<ul class="noti-body">
										@if($eventCalendar1->isNotEmpty())
										<li class="n-title">
											<p class="m-b-0">{{ __('Nouveau')}}</p>
										</li>
										@foreach($eventCalendar1 as $eventCalendar1)
										<li class="notification">
											<div class="media">
												<div class="media-body">
													<p>Vous avez un évenement à ne pas rater le <br><strong>{{$eventCalendar1->dateEvent}}</strong><span class="n-time text-muted"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$dateCalendar}}</span></p>
												</div>
											</div>
										</li>
										@endforeach
										@else
										<li class="notification">
											<div class="media">
												<div class="media-body">
													<p><strong>No Event</strong></p>
												</div>
											</div>
										</li>
										@endif
										
									</ul>
									<div class="noti-footer">
										<a href="{{url('/Admin/notification')}}">show all</a>
									</div>
								</div>
							</div>
						</li>
						
					</ul>
				</div>
				
			
	</header>	
	<!-- [ Header ] end -->

    