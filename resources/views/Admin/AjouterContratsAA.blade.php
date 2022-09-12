<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajouter Contrat | Carrez Conseil Assurances</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('../vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('../css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Ajouter Style CSS -->
    <link rel="stylesheet" href="{{asset('../css/ajouter.css')}}" />
    <script src="{{asset('../js/ajouter.js')}}" defer></script>
    <script src="{{asset('../js/ajouter-jquery.min.js')}}" defer></script>
    <script src="{{asset('../js/ajouter-jquery.easing.min.js')}}" defer></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('Admin/index')}}">
    <div class="sidebar-brand-icon ">
        <i>
            <img src="{{asset('../img/CCA-removebg-preview.png')}}" style="margin-top: 15%; width:65%"/>
        </i>
    </div>
</a>
<div class="sidebar-brand-text mx-3" style="margin-top: 15%;">Carrez Conseil Assurances</div>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{url('Admin/index')}}">
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
          <a class="collapse-item" href="{{url('/Admin/assurancePersonne')}}">Assurance Personnes</a>
          <a class="collapse-item" href="{{url('/Admin/assuranceAnimaux')}}">Assurance Animaux</a>
          <a class="collapse-item" href="{{url('/Admin/emprunteur')}}">Emprunteurs</a>
       </div>
    </div>
 </li>
<!-- Nav Item - Pages agent -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAgent"
        aria-expanded="true" aria-controls="collapseTwo">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
          </svg>
          <i class="bi bi-people"></i>
        <span>Les agents</span>
    </a>
    <div id="collapseAgent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="{{url('/Admin/ajouterAgent')}}">Ajouter Agent</a>
            <a class="collapse-item" href="{{url('/Admin/listeAgents')}}">Lister Agents</a>
        </div>
    </div>
</li>
<!-- Nav Item - Pages gestionnaire -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestio"
        aria-expanded="true" aria-controls="collapseTwo">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
          </svg>
          <i class="bi bi-people"></i>
        <span>Les gestionnaires</span>
    </a>
    <div id="collapseGestio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="{{url('/Admin/ajouterGestionnaire')}}">Ajouter Gestionnaire</a>
            <a class="collapse-item" href="{{url('/Admin/listeGestionnaire')}}">Lister Gestionnaires</a>   
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
            <a class="collapse-item" href="{{url('/Admin/listeProjetAP')}}">Assurance Personnes</a>
            <a class="collapse-item" href="{{url('/Admin/listeProjetAA')}}">Assurance Animaux</a>
            <a class="collapse-item" href="{{url('/Admin/listeProjetE')}}">Emprunteurs</a>
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
            <a class="collapse-item" href="{{url('/Admin/listeContratAP')}}">Assurance Personnes</a>
            <a class="collapse-item" href="{{url('/Admin/listeContratAA')}}">Assurance Animaux</a>
            <a class="collapse-item" href="{{url('/Admin/listeContratE')}}">Emprunteurs</a>
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
          <a class="collapse-item" href="{{url('/Admin/listeClients')}}">Lister les clients</a>
          <a class="collapse-item" href="{{url('/Admin/ajouter')}}">Ajouter des clients</a>
          <a class="collapse-item" href="{{url('/Admin/importer')}}">Importer des clients</a>
          <a class="collapse-item" href="{{url('/Admin/contacterClients')}}">Contacter les Clients</a>
       </div>
    </div>
 </li>
 
 <!-- Nav Item - Factures Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFacture"
        aria-expanded="true" aria-controls="collapseTwo">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
          <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
          <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/>
        </svg>
        <i class="bi bi-receipt-cutoff"></i>
        <span>Nos Factures</span>
    </a>
    <div id="collapseFacture" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="{{url('/Admin/factureAP')}}">Assurance Personnes</a>
            <a class="collapse-item" href="{{url('/Admin/factureAA')}}">Assurance Animaux</a>
            <a class="collapse-item" href="{{url('/Admin/factureE')}}">Emprunteurs</a>
        </div>
    </div>
</li>

<!-- Nav Item - Notifications -->
<li class="nav-item">
    <a class="nav-link " href="{{url('/Admin/notification')}}">
        <i class="bi bi-bell"></i>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
          </svg>
        <span>Notification</span>
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
            <a class="collapse-item" href="{{url('Admin/profile')}}">Modifier mon Profile</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="{{url('Admin/calendrier')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date" viewBox="0 0 16 16">
            <path d="M6.445 12.688V7.354h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
          </svg>
        <i class="bi bi-calendar2-date"></i>
        <span>Calendrier</span></a>
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
                                        <span class="font-weight-bold">Vous avez un évenement à ne pas rater le {{$eventCalendar1->dateEvent}}</span>
                                    </div>
                                </a>
                                @endforeach
                                
                                <a class="dropdown-item text-center small text-gray-500" href="{{url('Admin/notification')}}">Afficher toutes les notifications</a>
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
                                <a class="dropdown-item" href="{{url('Admin/profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    se déconnecter
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
                                   </div><br />
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                       
                                             <strong> {{ session('message') }}</strong>
                                   </div><br />
                                @endif
                     
                    <!--Formulaire-->
                    <form id="msform" action="{{url('Admin/AjouterContratsAA/' .$projetAA->id)}}" method="POST" class="signin-form">
                    @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                          <li class="active">Projet</li>
                          <li>Contrat</li>
                          <li>Documents</li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                          <h2 class="fs-title">Projet </h2>
                                            <label for="client">Client</label>
                                            <select class="form-control form-control-lg" id="client" name="client_id">
                                               
                                                <option value="{{$projetAA->client->id}}">{{$projetAA->client->nom}} {{$projetAA->client->nom}}</option>
                                              
                                            </select> <br>
                          
                                            <label for="Type">Type de projet :</label>
                                            <select class="form-control form-control-lg" id="type" name="type" >
                                                
                                                <option >{{ $projetAA->type }} </option>
                                                
                                            </select><br>

                                            <label for="origine">Origine :</label>
                                            <select class="form-control form-control-lg" name="origine">
                                                <option >{{ $projetAA->origine }}</option>
                                            </select><br>

                                                <label for="ProjetPrioritaire">Projet prioritaire :</label>
                                                <select class="form-control form-control-lg" name="projetPrioritaire">
                                                    <option >{{$projetAA->projetPrioritaire}}</option>
                                                </select><br>
                                                <label for="Statut">Statut :</label>
                                                <select class="form-control form-control-lg" name="statut">
                                                    <option >{{$projetAA->statut}}</option>
                                                    </select><br>
                                                <label for="PDatecreation">Date de création:</label>
                                                <input class="form-control form-control-lg" type="datetime" id="PdateC" value="{{$projetAA -> created_at}}"><br>
                                                <label for="DerniereModification">Dernière modification:</label>
                                                <input class="form-control form-control-lg" type="datetime" id="PdateM" value="{{$projetAA -> updated_at}}"><br>
                                                <label for="DateSouscription">Date de souscription:</label>
                                                <input class="form-control form-control-lg" type="date" id="PdateS" value="{{$projetAA->dateSouscription}}"><br>
                                                <label for="DateEffet">Date d'effet:</label>
                                                <input class="form-control form-control-lg" type="date" id="PdateEffet" value="{{$projetAA->dateEffet}}"><br>
                                                <label for="Statut">Assurés :</label> <br>
                                                <table id="tbl" class="table table-bordered">
                                                    <thead>
                                                      <tr>
                                                          <th>Type</th>
                                                          <th>Nom</th>
                                                          <th>Race</th>
                                                          <th>Date Naissance</th>
                                                          <th>sexe</th>
                                                          
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($assure as $assure)
                                                        <tr>
                                                        <td>{{$assure->type}}</td>
                                                        <td>{{$assure->nom}}</td>
                                                        <td>{{$assure->race}}</td>
                                                        <td>{{$assure->dateNaissance}}</td>
                                                        <td>{{$assure->sexe}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                
                                                <input type="button" name="next" class="next action-button" value="Suivant" /><br>
                        </fieldset>
                        <fieldset>
                          <h2 class="fs-title">Contrat</h2>
                          <br>
                        
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="S1numversion"
                                    placeholder="N° de version (Avenant)" name="N_Version" >
                                </div>
                                <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="S1numversion"
                                    placeholder="N° de Contrat" name="N_Contrat" value="{{$numContrat}}">
                                </div>
                            </div>
                           
                                <label for="Statut">Compagnie :</label>
                                        <select class="form-control form-control-user" name="compagnie">
                                                        <option >assuréa</option>
                                                        <option >Spring (simple et efficace)</option>
                                                        <option >SOS MALUS</option>
                                                        <option >Wazari Assurances</option>
                                                        <option >ENTORIA</option>
                                                        <option >MFA (Mutuelle Fraternelle d'Assurances)</option>
                                                        <option >Groupe zéphir</option>
                                                        <option >april</option>
                                                        <option >Néoliane (Santé & Prévoyance)</option>
                                                        <option >Solly Azar</option>
                                                        <option >Coverity</option>
                                                        <option >Aviva</option>
                                                        <option >maxance</option>
                                                        <option >netvox</option>
                                                        <option >Generali</option>
                                                        <option >Xenassur</option>
                                                        <option >Novelia</option>
                                                        <option >EURO Dommages</option>
                                                        <option >Raecon</option>
                                                        </select><br>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="S1Produit"
                                    placeholder="Produit" name="produit" >
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="S1Formule"
                                    placeholder="Formule" name="formule" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="S1Option"
                                    placeholder="Options / Niveaux de garanties" name="niveau_Garantie" >
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="S1DemandeResiliation"
                                    placeholder="Demande de résiliation" name="Demande_Resiliation" >
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label >Début de signature: </label>
                                    <input type="date" class="form-control form-control-user" id="S1DébutSignature"
                                    placeholder="Début de signature" name="debutSignature" >
                                </div>
                                <div class="col-sm-6">
                                    <label >Début d'effet: </label>
                                    <input type="date" class="form-control form-control-user" id="S1DébutEffet"
                                    placeholder="Début d'effet" name="debutEffet" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label >Date d'échéance: </label>
                                    <input type="date" class="form-control form-control-user" id="S1DateEcheance"
                                    placeholder="Date d'échéance" name="dateEcheance">
                                </div>
                                <div class="col-sm-6">
                                    <label >Date de création: </label>
                                    <input type="date" class="form-control form-control-user" id="S1DateCreation"
                                    placeholder="Date de création" name="dateCreation" >
                                </div>
                                
                            </div>
                            <label >Fin de contrat </label>
                            <input type="date" class="form-control form-control-user" id="S1Fincontrat"
                                    placeholder="Fin de contrat" name="finContrat" > <br>
                               
                            
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="S1PrimebruteM"
                                    placeholder="Prime brute mensuelle" name="Prime_Brute_Mensuelle" step="any">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="S1PrimenetteM"
                                    placeholder="Prime nette mensuelle" name="Prime_Nette_Mensuelle" step="any">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="S1PrimebruteA"
                                    placeholder="Prime brute annuelle" name="Prime_Brute_Anuelle" step="any">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="S1PrimenetteA"
                                    placeholder="Prime nette annuelle" name="Prime_Ntte_Anuelle" step="any">
                                </div>
                            </div>
                            
                            <input type="number" class="form-control form-control-user" id="S1Frais"
                                    placeholder="Frais d'honoraires" name="Frais_Honoraires" > <br>
                               
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Nombre de mois gratuits 1ère année <select class="form-control form-control-user" name="Nbr_Mois_Gratuits_Annee1" >
                                        <option >Aucun(e)</option>
                                        <option >1 mois</option>
                                        <option >2 mois</option>
                                        <option >3 mois</option>
                                        <option >4 mois</option>
                                        </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Nombre de mois gratuits 2ème année <select class="form-control form-control-user" name="Nbr_Mois_Gratuits_Annee2" >
                                        <option >Aucun(e)</option>
                                        <option >1 mois</option>
                                        <option >2 mois</option>
                                        <option >3 mois</option>
                                        <option >4 mois</option>
                                        </select>
                                </div>
                            </div>
                           
                                    Nombre de mois gratuits 3éme année <select class="form-control form-control-user" name="Nbr_Mois_Gratuits_Annee3" >
                                        <option >Aucun(e)</option>
                                        <option >1 mois</option>
                                        <option >2 mois</option>
                                        <option >3 mois</option>
                                        <option >4 mois</option>
                                        </select> <br>
                                
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Fractionnement <select class="form-control form-control-user" name="Fractionnement" >
                                        <option >Sélectionner</option>
                                        <option >Mensuel</option>
                                        <option >Trimestriel</option>
                                        <option >Semestriel</option>
                                        <option >Annuel</option>
                                        </select>
                                </div>
                                <div class="col-sm-6">
                                    Type de commissionnement <select class="form-control form-control-user" name="Type_Commi" >
                                        <option >Sélectionner</option>
                                        <option >Précompte avancé</option>
                                        <option >Linéaire</option>
                                        <option >Escompté</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="S1Commissionnement1"
                                    placeholder="Commissionnement 1ère année (%)" name="Commi_Annee1" step="any">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="S1CommissionnementAnneeSuivante"
                                    placeholder="Commissionnement années suivantes (%)" name="Commi_Annee_Suivantes" step="any">
                                </div>
                            </div>
                            
    
                            
                                        Votre Commentaire <textarea class="form-control form-control-lg" name="commentaire"  rows="6" cols="40" ></textarea>
                                  
                        
                            <input type="button" name="precedent" class="previous action-button" value="Précédent" />
                            <input type="button" name="suivant" class="next action-button" value="Suivant" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Documents</h2>
                          <br>
                          <p>A ajouter plus tard</p>

                          <input type="button" name="precedent" class="previous action-button" value="Précédent" />
                            <button  class="next action-button">Ajouter</button>
                        
                        </fieldset>

               
                        
                        </form>


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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('../vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('../vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('../vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('../js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('../vendor/chart.js/Chart.min.js')}}"></script>

    
</body>

</html>