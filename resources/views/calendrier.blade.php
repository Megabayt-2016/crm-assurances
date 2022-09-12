<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Calendrier | Carrez Conseil Assurances</title>
      
      <!-- Custom styles for this template-->
      <link href="{{('css/sb-admin-2.min.css')}}" rel="stylesheet">
	  <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	  <link rel="stylesheet" href="{{('css/tailwind.min.css')}}">
	 <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
		  <style>
			  [x-cloak] {
				  display: none;
			  }
		  </style>
     
   </head>
   <body id="page-top">
      <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/index')}}">
            <div class="sidebar-brand-icon ">
               <i>
               <img src="img/CCA-removebg-preview.png" style="margin-top: 15%; width:65%; margin-left:15%"/>
               </i>
            </div>
         </a>
         <div class="sidebar-brand-text mx-3" style="margin-top: 15%;">Carrez Conseil Assurances</div>
         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
            <a class="nav-link" href="{{url('/index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            Gestion
         </div>
         <!-- Nav Item - Nouveau Projet Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjet"
               aria-expanded="true" aria-controls="collapseTwo">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                  <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                  <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
               </svg>
               <i class="bi bi-folder-plus"></i>
               <span>Nouveau Projet</span>
            </a>
            <div id="collapseProjet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Components:</h6>
                  <a class="collapse-item" href="{{url('/assurancePersonne')}}">Assurance Personnes</a>
                  <a class="collapse-item" href="{{url('/assuranceAnimaux')}}">Assurance Animaux</a>
                  <a class="collapse-item" href="{{url('/emprunteur')}}">Emprunteurs</a>
               </div>
            </div>
         </li>
         <!-- Nav Item - Projets Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselisteProjet"
               aria-expanded="true" aria-controls="collapseTwo">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
               </svg>
               <i class="bi bi-folder"></i>
               <span>Nos Projets</span>
            </a>
            <div id="collapselisteProjet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">liste des projets:</h6>
                  <a class="collapse-item" href="{{url('/listeProjetAP')}}">Assurance Personnes</a>
                  <a class="collapse-item" href="{{url('/listeProjetAA')}}">Assurance Animaux</a>
                  <a class="collapse-item" href="{{url('/listeProjetE')}}">Emprunteurs</a>
               </div>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselisteContrat"
               aria-expanded="true" aria-controls="collapseTwo">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                  <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"/>
                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
               </svg>
               <i class="bi bi-file-text"></i>
               <span>Nos Contrats</span>
            </a>
            <div id="collapselisteContrat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">liste des Contrats:</h6>
                  <a class="collapse-item" href="{{url('/listeContratAP')}}">Assurance Personnes</a>
                  <a class="collapse-item" href="{{url('/listeContratAA')}}">Assurance Animaux</a>
                  <a class="collapse-item" href="{{url('/listeContratE')}}">Emprunteurs</a>
               </div>
            </div>
         </li>
         <!-- Nav Item - clients Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
               </svg>
               <i class="bi bi-people"></i>
               <span>Nos Clients</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Custom Components:</h6>
                  <a class="collapse-item" href="{{url('/listeClients')}}">Lister les clients</a>
                  <a class="collapse-item" href="{{url('/ajouter')}}">Ajouter des clients</a>
                  <a class="collapse-item" href="{{url('/importer')}}">Importer des clients</a>
                  <a class="collapse-item" href="{{url('/contacterClients')}}">Contacter les Clients</a>
               </div>
            </div>
         </li>
         <!-- Nav Item - Notifications Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link" href="{{url('/notification')}}">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
               </svg>
               <i class="bi bi-bell"></i>
               <span>Notifications</span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading- Profile -->
         <div class="sidebar-heading">
            Profile
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
               </svg>
               <i class="bi bi-person-circle"></i>
               <span>Mon Profile</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Mes Informations </h6>
                  <a class="collapse-item" href="{{url('/profile')}}">Modifier mon Profile</a>
               </div>
            </div>
         </li>
         <!-- Nav Item - Charts -->
         <li class="nav-item">
            <a class="nav-link" href="{{url('/calendrier')}}">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date" viewBox="0 0 16 16">
                  <path d="M6.445 12.688V7.354h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
                  <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
               </svg>
               <i class="bi bi-calendar2-date"></i>
               <span>Calendrier</span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
               <i class="fa fa-bars"></i>
               </button>
               <!-- Topbar Search -->
               <form
                  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                  <div class="input-group">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                     </div>
                  </div>
               </form>
               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                     aria-labelledby="searchDropdown">
                     <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                           <input type="text" class="form-control bg-light border-0 small"
                              placeholder="Search for..." aria-label="Search"
                              aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  </li>
                  <!-- Nav Item - Alerts -->
                  <li class="nav-item dropdown no-arrow mx-1">
                     <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">+{{$countCalendar}}</span>
                     </a>
                     <!-- Dropdown - Alerts -->
                     <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                           Notifications
                        </h6>
                        @foreach($eventCalendar1 as $eventCalendar1)
                        <a class="dropdown-item d-flex align-items-center" href="#">
                           <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                 <i class="fas fa-file-alt text-white"></i>
                              </div>
                           </div>
                           <div>
                              <div class="small text-gray-500">{{$dateCalendar}}</div>
                              <span class="font-weight-bold">Vous avez un évenement à ne pas rater le {{$eventCalendar1->dateEvent}}</span>
                           </div>
                        </a>
                        @endforeach
                        <a class="dropdown-item text-center small text-gray-500" href="{{url('/notification')}}">Afficher toutes les notifications</a>
                     </div>
                  </li>
                  <div class="topbar-divider d-none d-sm-block"></div>
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->nom}} {{auth()->user()->prenom}}</span>
                     <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Déconnecter
                        </a>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- End of Topbar -->

                   <!-- Begin Page Content -->
                   <div class="container-fluid">
                     @if (session('message'))
                                    <div class="alert alert-danger">
                                       
                                             <strong> {{ session('message') }}</strong>
                                   </div><br />
                                @endif

                     <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                   <div class="container mx-auto px-4 py-2 md:py-24">
                        
                      <!-- <div class="font-bold text-gray-800 text-xl mb-4">
                         Schedule Tasks
                      </div> -->
             
                      <div class="bg-white rounded-lg shadow overflow-hidden">
             
                         <div class="flex items-center justify-between py-2 px-6">
                            <div>
                               <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                               <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                               <button 
                                  type="button"
                                  class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" 
                                  :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                  :disabled="month == 0 ? true : false"
                                  @click="month--; getNoOfDays()">
                                  <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                  </svg>  
                               </button>
                               <div class="border-r inline-flex h-6"></div>		
                               <button 
                                  type="button"
                                  class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" 
                                  :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                  :disabled="month == 11 ? true : false"
                                  @click="month++; getNoOfDays()">
                                  <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                  </svg>									  
                               </button>
                            </div>
                         </div>	
             
                         <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                               <template x-for="(day, index) in DAYS" :key="index">	
                                  <div style="width: 14.26%" class="px-2 py-2">
                                     <div
                                        x-text="day" 
                                        class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                  </div>
                               </template>
                            </div>
             
                            <div class="flex flex-wrap border-t border-l">
                               <template x-for="blankday in blankdays">
                                  <div 
                                     style="width: 14.28%; height: 120px"
                                     class="text-center border-r border-b px-4 pt-2"	
                                  ></div>
                               </template>	
                               <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                  <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                     <div
                                        @click="showEventModal(date)"
                                        x-text="date"
                                        class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                        :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                     ></div>
                                     <div style="height: 80px;" class="overflow-y-auto mt-1">
                                        <!-- <div 
                                           class="absolute top-0 right-0 mt-2 mr-2 inline-flex items-center justify-center rounded-full text-sm w-6 h-6 bg-gray-700 text-white leading-none"
                                           x-show="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"
                                           x-text="events.filter(e => e.event_date === new Date(year, month, date).toDateString()).length"></div> -->
             
                                        <template x-for="event in events.filter(e => new Date(e.event_date).toDateString() ===  new Date(year, month, date).toDateString() )">	
                                           <div
                                              class="px-2 py-1 rounded-lg mt-1 overflow-hidden border"
                                              :class="{
                                                 'border-blue-200 text-blue-800 bg-blue-100': event.event_theme === 'blue',
                                                 'border-red-200 text-red-800 bg-red-100': event.event_theme === 'red',
                                                 'border-yellow-200 text-yellow-800 bg-yellow-100': event.event_theme === 'yellow',
                                                 'border-green-200 text-green-800 bg-green-100': event.event_theme === 'green',
                                                 'border-purple-200 text-purple-800 bg-purple-100': event.event_theme === 'purple'
                                              }"
                                           >
                                              <p x-text="event.event_title" class="text-sm truncate leading-tight"></p>
                                           </div>
                                        </template>
                                     </div>
                                  </div>
                               </template>
                            </div>
                         </div>
                      </div>
                   </div>
             
                   <!-- Modal -->
                   <div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed z-40 top-0 right-0 left-0 bottom-0 h-full w-full" x-show.transition.opacity="openEventModal">
                      <div class="p-4 max-w-xl mx-auto relative absolute left-0 right-0 overflow-hidden mt-24">
                         <div class="shadow absolute right-0 top-0 w-10 h-10 rounded-full bg-white text-gray-500 hover:text-gray-800 inline-flex items-center justify-center cursor-pointer"
                            x-on:click="openEventModal = !openEventModal">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                               <path
                                  d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                            </svg>
                         </div>
             
                         <div class="shadow w-full rounded-lg bg-white overflow-hidden w-full block p-8">
                            
                            <h2 class="font-bold text-2xl mb-6 text-gray-800 border-b pb-2">Add Event Details</h2>
 
                         <form class="form" id="form" action="{{url('/calendrier')}}" method="POST">
                               @csrf
                            <div class="mb-4">
                               <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Event title</label>
                               <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_title" name="titreEvent">
                            </div>
                            
             
                            <div class="mb-4">
                               <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Event date</label>
                               <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_date" name="dateEvent" readonly>
                            </div>

                            <div class="mb-4">
                              <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Event time</label>
                              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="time" x-model="event_time" name="timeEvent">
                           </div>
                            
                            
                            <div class="inline-block w-64 mb-4">
                               <label class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Select a theme</label>
                               <div class="relative">
                                  <select @change="event_theme = $event.target.value;" x-model="event_theme" class="block appearance-none w-full bg-gray-200 border-2 border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-blue-500 text-gray-700" name="theme">
                                        <template x-for="(theme, index) in themes">
                                           <option :value="theme.value" x-text="theme.label"></option>
                                        </template>
                                     
                                  </select>
                                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                  </div>
                               </div>
                            </div>
              
                            <div class="mt-8 text-right">
                               <button type="button" class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 border border-gray-700 rounded-lg shadow-sm" @click="addEvent()">
                                  Save Event
                               </button>	
                                         <button type="button" class="bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 border border-gray-300 rounded-lg shadow-sm mr-2" @click="openEventModal = !openEventModal">
                                  Cancel
                               </button>
                                     {{-- <button  class="button px-3">Ajouter</button> --}}
 
                                     </div>
                            
                         </form>
                         </div>
                      </div>
                   </div>
                   <!-- /Modal -->
                </div>
 
             </div>
                 <!-- /.container-fluid -->
 
             </div>
             <!-- End of Main Content -->
 
            
 
         </div>
         <!-- End of Content Wrapper -->
 
     </div>
     <!-- End of Page Wrapper -->
 
     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
         <i class="fas fa-angle-up"></i>
     </a>
 
     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se déconnecter!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Est-ce que vous êtes sûr de vouloir se déconnecter? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-primary">Se Déconnecter</button>
           </form>
            </div>
            </div>
       </div>
   </div>
 
     <script>
       const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
       const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
 
       function app() {
          return {
             month: '',
             year: '',
             no_of_days: [],
             blankdays: [],
             days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
 
             events: [
                {
                   event_date: new Date(2020, 3, 1),
                   event_title: "April Fool's Day",
                   event_theme: 'blue'
                },
 
                {
                   event_date: new Date(2020, 3, 10),
                   event_title: "Birthday",
                   event_theme: 'red'
                },
 
                {
                   event_date: new Date(2022, 8, 19),
                   event_title: "Upcoming Event",
                   event_theme: 'green'
                }
             ],
             event_title: '',
             event_date: '',
             event_time: '',
             event_theme: 'blue',
 
             themes: [
                {
                   value: "blue",
                   label: "Blue Theme"
                },
                {
                   value: "red",
                   label: "Red Theme"
                },
                {
                   value: "yellow",
                   label: "Yellow Theme"
                },
                {
                   value: "green",
                   label: "Green Theme"
                },
                {
                   value: "purple",
                   label: "Purple Theme"
                }
             ],
 
             openEventModal: false,
 
             async initDate() {
                console.log('Init date');
                // calendrier.show
                let today = new Date();
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
 
                try{
                   const fetchRes = await fetch("{{ route('calendrier.show') }}", {
                      method: 'GET', 
                      headers: {
                         'Content-Type': 'application/json',
                         'Accept': 'application/json',
                         "X-CSRF-Token": document.querySelector('input[name=_token]').value
                      },
                   });
    
                   const res = await fetchRes.json();
 
                   res.forEach(event => {
                      this.events.push({
                         event_date: event.dateEvent,
                         event_title: event.titreEvent,
                         event_theme: event.theme
                      });
                   });
                   
                }catch(err){
                   console.log(err.message);
                }
             },
 
             isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);
 
                return today.toDateString() === d.toDateString() ? true : false;
             },
 
             showEventModal(date) {
                // open the modal
                this.openEventModal = true;
                this.event_date = new Date(this.year, this.month, date).toDateString();
             },
 
             async addEvent()  {
                console.log('Add event')
                if (this.event_title == '') {
                   return;
                }
 
                this.events.push({
                   event_date: this.event_date,
                   event_title: this.event_title,
                   event_theme: this.event_theme
                });
 
                try{
                   const fetchRes = await fetch("{{ route('calendrier.store') }}", {
                      method: 'POST', 
                      headers: {
                         'Content-Type': 'application/json',
                         'Accept': 'application/json',
                         "X-CSRF-Token": document.querySelector('input[name=_token]').value
                      },
                      body: JSON.stringify({
                         titreEvent: this.event_title,
                         timeEvent: this.event_time,
                         dateEvent: (new Date(this.event_date)).toDateString(),
                         theme: this.event_theme,
                      })
                   });
    
                   const res = await fetchRes.json();
                   
                }catch(err){
                   console.log(err.message);
                }
 
                // fetch("{{ route('calendrier.store') }}", {
                //    method: 
                // })
 
                console.log(this.events);
 
                // clear the form data
                this.event_title = '';
                this.event_date = '';
                this.event_theme = 'blue';
 
                //close the modal
                this.openEventModal = false;
             },
 
             getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
 
                // find where to start calendar day of week
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for ( var i=1; i <= dayOfWeek; i++) {
                   blankdaysArray.push(i);
                }
 
                let daysArray = [];
                for ( var i=1; i <= daysInMonth; i++) {
                   daysArray.push(i);
                }
                
                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
             }
          }
       }
    </script>
     <!-- Bootstrap core JavaScript-->
     <script src="{{asset('../vendor/jquery/jquery.min.js')}}"></script>
     <script src="{{asset('../vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 
     <!-- Core plugin JavaScript-->
     <script src="{{asset('../vendor/jquery-easing/jquery.easing.min.js')}}"></script>
 
     <!-- Custom scripts for all pages-->
     <script src="{{asset('../js/sb-admin-2.min.js')}}"></script>
 
    
 
 </body>
 
 </html>