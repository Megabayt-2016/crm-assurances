<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title> Assurance de personnes | Carrez Conseil Assurances</title>
      <!-- Custom fonts for this template-->
      <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- jQuery-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <!-- Custom styles for this template-->
      <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
      <!-- Ajouter Style CSS -->
      <link rel="stylesheet" href="{{asset('css/ajouter.css')}}" />
      <script src="{{asset('js/ajouter.js')}}" defer></script>
      <script src="{{asset('js/ajouter-jquery.min.js')}}" defer></script>
      <script src="{{asset('js/ajouter-jquery.easing.min.js')}}" defer></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" defer></script>
      <style>
          table {
         width: 100%;
         border-collapse: collapse;
         border: 1;
         margin: auto;
         }
         td {
         
         text-align: center;
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/index')}}">
   <div class="sidebar-brand-icon ">
       <i>
           <img src="img/CCA-removebg-preview.png" style="margin-top: 15%; width:65%"/>
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
                     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                     <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                        </a>
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
                                    <span class="font-weight-bold">Vous avez un ??venement ?? ne pas rater le {{$eventCalendar1->dateEvent}}</span>
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
                           src="{{asset('../img/user.png')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                           aria-labelledby="userDropdown">
                           <a class="dropdown-item" href="{{url('/profile')}}">
                           <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                           Profile
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           se d??connecter
                           </a>
                        </div>
                     </li>
                  </ul>
               </nav>
               <!-- End of Topbar -->
               <!-- Begin Page Content -->
               <div class="container-fluid">
                  <!-- Page Heading -->
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  <br />
                  @endif
                  @if (session('message'))
                                    <div class="alert alert-success">
                                       
                                             <strong> {{ session('message') }}</strong>
                                   </div><br />
                                @endif
                  <div class="container rounded bg-white mt-5 mb-5">
                     <br>
                     <form action="{{url('/assuranceAnimaux')}}" method="POST" >
                        @csrf
                        <div class="row">
                           <div class="col">
                              <div class="card">
                                 <div class="card-header">
                                    Contact:
                                 </div>
                                 <div class="card-body">
                                    <select class="form-control form-control-lg" id="client" name="client_id">
                                       @foreach ($client as $client)
                                       <option value="{{$client->id}}" >{{$client->nom}} {{$client->prenom}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <br>
                              <div class="card">
                                 <div class="card-header">
                                    Projet
                                 </div>
                                 <div class="card-body">
                                    <label for="Type">Type de projet :</label>
                                    <select class="form-control form-control-lg" id="type" name="type">
                                       <option >Compl??mentaire sant??</option>
                                       <option >responsabilit?? civile</option>
                                       <option >Assurance d??c??s</option>
                                    </select>
                                    <br>
                                    <label for="origine">Origine :</label>
                                    <select class="form-control form-control-lg" name="origine"><option>Site web</option>
                                                <option>Site Web</option>
                                                <option>Fiche</option>
                                                <option>Lead</option>
                                                <option>Appel Entrant</option>
                                                <option>Ancien Client</option>
                                                <option>Remplacement</option>
                                                <option >Renouvellement</option>
                                                <option>Parrainage</option>
                                                <option>Avenant</option>

                                    </select>
                                    <br>
                                    <label for="ProjetPrioritaire">Projet prioritaire :</label>
                                    <select class="form-control form-control-lg" name="projetPrioritaire">
                                       <option >Oui</option>
                                       <option >Non</option>
                                    </select>
                                    <br>
                                    <label for="Statut">Statut :</label>
                                    <select class="form-control form-control-lg" name="statut">
                                                <optgroup label="Opportunit??">
                                                    <option >Projet ?? traiter</option>
                                                </optgroup>
                                                <optgroup label="Prospection">
                                                    <option>Devis envoy??</option>
                                                    <option>Pr??-adh??sion</option>
                                                    <option>Ne r??pond pas</option>
                                                    <option>A relancer</option>
                                                </optgroup>
                                                <optgroup label="Perdu">
                                                    <option >Perdu (Sans motif)</option>
                                                    <option >Perdu (Mutuelle groupe)</option>
                                                    <option >Perdu (ACS)</option>
                                                    <option >Perdu (Tarif trop ??lev??)</option>
                                                    <option >Perdu (Souscription ?? la concurrence)</option>
                                                </optgroup>
                                                <optgroup label="Inexploitable">
                                                    <option >Inexploitable (Faux num??ro)</option>
                                                    <option >Inexploitable (Num??ro non attribu??)</option>
                                                    <option >Inexploitable (Injoignable)</option>
                                                    <option >Inexploitable (Autre cause)</option>
                                                </optgroup>
                                                <optgroup label="Souscription">
                                                    <option >Souscription ?? traiter</option>
                                                    <option >Dossier incomplet</option>
                                                    <option >Dossier complet</option>
                                                    <option >En cours</option>
                                                    <option >Annul??</option>
                                                    <option >Echec</option>
                                                    <option >En attente de la compagnie</option>
                                                    <option >Rejet compagnie</option>
                                                </optgroup>
                                                <optgroup label="Contrat">
                                                    <option>Contrat ?? enregistrer</option>
                                                    <option >Contrat enregistr??</option>
                                                    <option>Impay??</option>
                                                    <option >Contentieux</option>
                                                    <option >En cours de r??siliation</option>
                                                </optgroup>
                                                <optgroup label="Contrat cl??tur??">
                                                    <option >R??tract??</option>
                                                    <option>R??sili??</option>
                                                    <option >Echu</option>
                                                </optgroup>
                                    </select>
                                    <br>
                                    <label for="DateSouscription">Date de souscription:</label>
                                    <input class="form-control form-control-lg" type="date" id="PdateS" name="dateSouscription"><br>
                                    <label for="DateEffet">Date d'effet:</label>
                                    <input class="form-control form-control-lg" type="date" id="PdateEffet" name="dateEffet">
                                 </div>
                              </div>
                              <br>
                              <div class="card">
                                 <div class="card-header">
                                    Attribution
                                 </div>
                                 <div class="card-body">
                                    <label for="Auteur">Auteur :</label>
                                    <select class="form-control form-control-lg" name = "agent_id">
                                       <option value="{{auth()->user()->id}}">{{auth()->user()->nom}} {{auth()->user()->prenom}}</option>
                                    </select>
                                    <br>
                                    <label for="Auteur">Gestionnaire:</label>
                                    <select class="form-control form-control-lg" name ="user_id">
                                       @foreach ($gestionnaire as $user) 
                                       <option value="{{$user->id}}"> {{ $user -> nom}} {{ $user -> prenom}}</option>
                                       @endforeach 
                                    </select>
                                 </div>
                              </div>
                              <br>
                              <div class="card">
                                 <div class="card-header">
                                    Assur??s :
                                 </div>
                                 <div class="card-body">
                                     
                                    {{-- <input type ="number" name="Nombre_Assure" class="form-control form-control-lg"  id="repeater" placeholder="Nombre d'assur??s"><br>
                                    <input class="form-control btn btn-primary rounded  px-3" id="btn" value="G??rener">
                                    <br><br>
                                    <table id="tbl" class="table table-bordered">
                                    </table> --}}
                                    <div class="repeater">
                                       <table>
                                       <div class="row g-2">
                                           <div class="col mb-0">
                                               <label>Nom</label>
                                               <input class="form-control form-control-lg" type="text" name="nom[]"  required>
                                           </div>
                                           <div class="col mb-0">
                                             <label>Race</label>
                                             <input class="form-control form-control-lg" type="text" name="race[]" required>
                                         </div>
                                           <div class="col mb-0">
                                               <label>Date Naissance</label>
                                               <input class="form-control form-control-lg" type="date"  name="dateNaissance[]" required>
                                           </div>
                                           <div class="col mb-0">
                                             <label>Type</label>
                                             <select class="form-control form-control-lg" name="typeA[]" required>
                                                <option value="" selected="selected">- Choisir -</option>
                                                <option>Chien</option>
                                                <option>Chat</option>
                                                </select>
                                           </div>
                                           <div class="col mb-0">
                                             <label>Sexe</label>
                                             <select class="form-control form-control-lg" name="sexe[]" required>
                                                <option>M??le</option>
                                                <option>Femelle</option>
                                                </select>
                                           </div>
                                           <div class="col mb-0">
                                             <label></label>
                                             <a href="javascript:void(0)" class="btn btn-success addRow form-control" style="margin-top: 9px;
                                             height: calc(1.5em + 1rem + 2px);
                                             padding: 0.5rem 1rem;
                                             font-size: 1.2rem;
                                             line-height: 1.5;
                                             border-radius: 0.3rem">+</a>
                                           </div>
                                       </div>
                                       </table>
                                   </div>
                                    
                                 </div>
                              </div>
                              <br> 

                              <div class="card">
                                 <div class="card-header">
                                    Votre Commentaire :
                                 </div>
                                 <div class="card-body">
                                    <textarea class="form-control form-control-lg" name="commentaire" rows="6" cols="40">Vous pouvez saisir votre commentaire.</textarea>
                                 </div>
                              </div>
                              <br>
                              <div class="card"> 
                                 <button  class="form-control btn btn-primary rounded  px-3">Ajouter</button>
                              </div>
                           </div>
                        </div>
                  </div>
                  </form> 
               </div>
            </div>
            <!--end of formulaire-->
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
                  <h5 class="modal-title" id="exampleModalLabel">Se d??connecter!</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
                  </button>
               </div>
               <div class="modal-body">Est-ce que vous ??tes s??r de vouloir se d??connecter? </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button type="submit" class="btn btn-primary">Se D??connecter</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
      <!-- Page level plugins -->
      <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
      <!-- Page level custom scripts -->
      <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
      <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>
      
      <script>
         //  const btn=document.getElementById("btn");
         //  const tbl=document.getElementById("tbl");
          
         //  btn.addEventListener('click', function(){
         //      let inp = document.getElementById("repeater").value;
         //      let html1;
         //      let html;
         //      html1 = document.createElement("tr");
         //      html1.innerHTML = '<thead><tr><th>Nom</th><th>Type</th><th>Race</th><th>Date Naissance</th><th>Sexe</th></tr></thead>';
         //      tbl.appendChild(html1);

         //      for(let i=0; i<inp; i++){
         //          html = document.createElement("tr");
         //          html.innerHTML = '<tr>
         //    <td><input class="form-control form-control-lg" type="text" name="nom[]" style="border-style:none" ></td>
         //    <td><select class="form-control form-control-lg" name="typeA[]">
         //       <option value="" selected="selected">- Choisir -</option>
         //       <option>Chien</option>
         //       <option>Chat</option>
         //       </select>
         //       </td>
         //       <td><input class="form-control form-control-lg" type="text" name="race[]" style="border-style:none"></td>
         //       <td><input class="form-control form-control-lg" type="date"  name="dateNaissance[]" style="border-style:none"></td>
         //       <td>
         //          <select class="form-control form-control-lg" name="sexe[]">
         //             <option>M??le</option>
         //             <option>Femelle</option>
         //             </select>
         //             </td>
         //             </tr>';
         //          tbl.appendChild(html);
         //      }
         //  });
         $('.repeater').on('click','.addRow',function (){
    let html=`<br><div class="row g-2">
                                           <div class="col mb-0">
                                               <input class="form-control form-control-lg" type="text" name="nom[]"  required>
                                           </div>
                                           <div class="col mb-0">
                                             <input class="form-control form-control-lg" type="text" name="race[]" required>
                                         </div>
                                           <div class="col mb-0">
                                               <input class="form-control form-control-lg" type="date"  name="dateNaissance[]" required>
                                           </div>
                                           <div class="col mb-0">
                                             <select class="form-control form-control-lg" name="typeA[]">
                                                <option value="" selected="selected">- Choisir -</option>
                                                <option>Chien</option>
                                                <option>Chat</option>
                                                </select>
                                           </div>
                                           <div class="col mb-0">
                                             <select class="form-control form-control-lg" name="sexe[]">
                                                <option>M??le</option>
                                                <option>Femelle</option>
                                                </select>
                                           </div>
                                           <div class="col mb-0">
                    <a href="javascript:void(0)" class="btn btn-danger deleteRow form-control" style="margin-top: 2px;
                                             height: calc(1.5em + 1rem + 2px);
                                             padding: 0.5rem 1rem;
                                             font-size: 1.2rem;
                                             line-height: 1.5;
                                             border-radius: 0.3rem">-</a>
                </div>
                                       </div>`;
    $('.repeater').append(html);
})
$('.repeater').on('click','.deleteRow',function (){
    $(this).parent().parent().remove();
})

      </script>
   </body>
</html>