@extends('layouts.app')

@section('styles')
      <!-- Ajouter Style CSS -->
      <link rel="stylesheet" href="{{asset('../css/ajouter.css')}}" />
      <script src="{{asset('../js/ajouter.js')}}" defer></script>
      <script src="{{asset('../js/ajouter-jquery.min.js')}}" defer></script>
      <script src="{{asset('../js/ajouter-jquery.easing.min.js')}}" defer></script>
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
@stop

@extends('layouts.nav')

@section('content')
<div class="pcoded-main-container">
   <div class="pcoded-content">
       <!-- [ breadcrumb ] start -->
       <div class="page-header">
           <div class="page-block">
               <div class="row align-items-center">
                   <div class="col-md-12">
                       <div class="page-header-title">
                           <h5 class="m-b-10">Ajouter Projet</h5>
                       </div>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                           <li class="breadcrumb-item"><a href="{{ url('/clients')}}">List des Client</a></li>
                           <li class="breadcrumb-item"><a>Ajouter Projet Pour client N° : {{$client->id}}</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
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
                     <form action="{{url('projets/ajouter')}}" method="POST" >
                        @csrf
                        <div class="row">
                           <div class="col">
                              <div class="card">
                                 <div class="card-header d-flex justify-content-between">
                                    <div>
                                       <h4>Client: <a class="text-info" href="{{ url('/clients/profile/' .$client->id) }}">{{$client->civilite}} {{$client->nom}} {{$client->prenom}} </span></h4>
                                    </div>
                                    <div>
                                       <a href="{{url('/projets/ajouter')}}" class="btn btn-success">List Des client</a>
                                    </div>
                                    <input name="client_id" value="{{$client->id}}" hidden/>
                                 </div>
                              </div>
                              <br>
                              <div class="card">
                                 <div class="card-header bg-info ">
                                    <h5 class="text-white">Nouveau Projet</h5> 
                                 </div>
                                 <div class="card-body">
                                    <div class="row">
                                    
                                       <div class="col-md-6 mb-3">
                                          <label for="Type">Type de projet :</label>
                                          <select class="form-control form-control-lg" id="type" name="type">
                                             @foreach ($assurancestypes as $type)
                                             <option value="{{$type->id}}" >{{$type->nom}}</option>
                                             @endforeach
                                          </select>
                                       </div>

                                       <div class="col-md-6 mb-3">
                                          <label for="origine">Origine :</label>
                                          <select class="form-control form-control-lg" name="origine">
                                             <option>Site Web</option>
                                             <option>Fiche / Lead</option>
                                             <option>Appel Entrant</option>
                                             <option>Ancien Client</option>
                                             <option>Remplacement</option>
                                             <option >Renouvellement</option>
                                             <option>Parrainage</option>
                                             <option>Avenant</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6 mb-4">
                                          <label for="Statut">Statut :</label>
                                          <select class="form-control form-control-lg" name="statut">
                                             <optgroup label="Opportunité">
                                                   <option>Projet à traiter</option>
                                             </optgroup>
                                             <optgroup label="Prospection">
                                                   <option>Devis envoyé</option>
                                                   <option>Pré-adhésion</option>
                                                   <option>Ne répond pas</option>
                                                   <option>A relancer</option>
                                             </optgroup>
                                             <optgroup label="Perdu">
                                                   <option >Perdu (Sans motif)</option>
                                                   <option >Perdu (Mutuelle groupe)</option>
                                                   <option >Perdu (ACS)</option>
                                                   <option >Perdu (Tarif trop élevé)</option>
                                                   <option >Perdu (Souscription à la concurrence)</option>
                                             </optgroup>
                                             <optgroup label="Inexploitable">
                                                   <option >Inexploitable (Faux numéro)</option>
                                                   <option >Inexploitable (Numéro non attribué)</option>
                                                   <option>Inexploitable (Injoignable)</option>
                                                   <option >Inexploitable (Autre cause)</option>
                                             </optgroup>
                                             <optgroup label="Souscription">
                                                   <option >Souscription à traiter</option>
                                                   <option>Dossier incomplet</option>
                                                   <option >Dossier complet</option>
                                                   <option >En cours</option>
                                                   <option >Annulé</option>
                                                   <option >Echec</option>
                                                   <option >En attente de la compagnie</option>
                                                   <option >Rejet compagnie</option>
                                             </optgroup>
                                             <optgroup label="Contrat">
                                                   <option >Contrat à enregistrer</option>
                                                   <option >Contrat enregistré</option>
                                                   <option >Impayé</option>
                                                   <option >Contentieux</option>
                                                   <option >En cours de résiliation</option>
                                             </optgroup>
                                             <optgroup label="Contrat clôturé">
                                                   <option >Rétracté</option>
                                                   <option >Résilié</option>
                                                   <option >Echu</option>
                                             </optgroup>
                                          </select>
                                       </div>
                                       <div class="col-md-6 row">
                                          
                                       </div>
                                       <div class="col-md-4 row ">
                                          <label for="ProjetPrioritaire" class="col-sm-6 pt-0 col-form-label">Projet prioritaire :</label>
                                          <div class="col-sm-6 mt-3">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="projetPrioritaire" id="gridRadios1" value="oui" checked>
                                                <label class="form-check-label" for="gridRadios1">Oui</label>
                                             </div>
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="projetPrioritaire" id="gridRadios2" value="non">
                                                <label class="form-check-label" for="gridRadios2">Non</label>
                                             </div>
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                          <label for="DateSouscription">Date de souscription:</label>
                                          <input class="form-control" type="date" id="PdateS" name="dateSouscription"><br>
                                       </div>

                                       <div class="col-md-4">
                                          <label for="DateEffet">Date d'effet:</label>
                                          <input class="form-control" type="date" id="PdateEffet" name="dateEffet">
                                       </div>

                                    </div>
                                 </div>
                              </div>


                              <div class="card">
                                 <div class="card-header bg-info">
                                    <h5 class="text-white">Attribution</h5>
                                 </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label for="Auteur">Auteur :</label>
                                          <select class="form-control form-control-lg" name = "agent_id">
                                             <option value="{{auth()->user()->id}}">{{auth()->user()->nom}} {{auth()->user()->prenom}}</option>
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                          <label for="Auteur">Gestionnaire:</label>
                                          <select class="form-control form-control-lg" name ="user_id">
                                             @foreach ($gestionnaire as $user) 
                                             <option value="{{$user->id}}"> {{ $user -> nom}} {{ $user -> prenom}}</option>
                                             @endforeach 
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>


                              <div class="card">
                                 <div class="card-header bg-info">
                                    <h5 class="text-white">Assurance Accompany</h5>
                                 </div>
                                 <div class="card-body">
                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                       <li class="nav-item">
                                          <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Assurance  Personnes</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Assurances Animals</a>
                                       </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                       <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="repeater">
                                       <table>
                                          <div class="row g-2">
                                       
                                             <div class="col mb-0">
                                                <a href="javascript:void(0)" class="btn btn-success addRow  "><i class="feather icon-plus"></i> Ajouter personne <i class="feather icon-user-plus"></i></a>
                                             </div>
                                          </div>
                                       </table>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                       <div class="repeater2">
                                          <table>
                                             <div class="row g-2 animal">
                                          
                                                <div class="col mb-0">
                                                   <a href="javascript:void(0)" class="btn btn-success addRow2"><i class="feather icon-plus"></i> Ajouter animal  <i class="feather icon-github"></i></a>
                                                </div>
                                             </div>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                              <div class="card">
                                 <div class="card-header bg-info">
                                    <h5 class="text-white">Votre Commentaire :</h5>
                                 </div>
                                 <div class="card-body">
                                    <textarea class="form-control form-control-lg" name="commentaire" rows="2" cols="20" placeholder="Vous pouvez saisir votre commentaire."></textarea>
                                 </div>
                              </div>
                              <br>
                              <div class="card"> 
                                 <button  class="btn btn-primary rounded">Ajouter</button>
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
   </div>
</div>

      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('../vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('../vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('../vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('../js/sb-admin-2.min.js')}}"></script>

      
      <script>
         $('.repeater').on('click','.addRow',function (){
    let html=`<div class="row border-bottom border-warning g-2">
                  
                  <div class="col-md-2 mt-4">
                     <label>Civilite</label>
                     <select class="form-control form-control-lg" name="civilite[]" required>
                        <option >Mme</option>
                        <option >Mlle</option>
                        <option>Mr</option>
                     </select>
                  </div>
                  <div class="col-md-3 mt-4">
                     <label>Nom</label>
                     <input class="form-control form-control-lg" type="text" name="nom[]"  required>
                  </div>
                  <div class="col-md-4 mt-4">
                     <label>Prenom</label>
                     <input class="form-control form-control-lg"  type="text" name="prenom[]" required>
                  </div>
                  <div class="col-md-3 mt-4">
                     <label>date de Naissance</label>
                     <input class="form-control form-control-lg" type="date"  name="dateNaissance[]" required>
                  </div>
                  <div class="col-md-4 mt-4">
                     <label>Status</label>
                     <select class="form-control form-control-lg"  name="typeA[]" required>
                        <option value="" selected="selected">- Choisir -</option>
                        <option >Célibataire</option>
                        <option >Marié(e)</option>
                        <option >Concubinage</option>
                        <option>Pacsé(e)</option>
                        <option >Veuf(ve)</option>
                        <option >Divorcé(e)</option>
                        <option >Séparé(e)</option>
                     </select>
                  </div>
                  <div class="col-md-4 mt-4">
                     <label>Regime</label>
                     <select class="form-control form-control-lg" name="regime[]" required>
                        <option  selected="selected">- Choisir -</option>
                        <option >Salarié</option>
                        <option>Travailleur non salarié (TNS)</option>
                        <option >Exploitant agricole</option>
                        <option >Salarié agricole</option>
                        <option >Alsace-Moselle</option>
                        <option >Fonction publique</option>
                        <option>Retraité salarié</option>
                        <option >Retraité TNS</option>
                        <option >Retraité Alsace-Moselle</option>
                        <option >Etudiant</option>
                     </select>
                  </div>
                  <div class="col-md-4 mt-4">
                     <a href="javascript:void(0)" class="btn btn-danger btn-block my-3 deleteRow"><i class="feather icon-delete"></i></a>
                  </div>
               </div>`;
    $('.repeater').append(html);
})
$('.repeater').on('click','.deleteRow',function (){
    $(this).parent().parent().remove();
})
$('.repeater2').on('click','.addRow2',function (){
   let html=`<div class="row g-2 border-bottom border-warning pb-4">
               <div class="col-md-4 mt-4 ">
                  <label>Nom de Animal</label>
                  <input class="form-control type="text" name="nom[]"  placeholder="Nom"  required>
               </div>
               <div class="col-md-4 mt-4 ">
                  <label>Race de Animal</label>
                  <input class="form-control type="text" name="race[]" placeholder="Race" required>
               </div>
               <div class="col-md-4 mt-4">
                  <label>Date De Naissance</label>
                  <input class="form-control type="date"  name="dateNaissance[]" required>
               </div>
               <div class="col-md-4 mt-4">
                  <label>Type de Animal</label>
                  <select class="form-control name="typeA[]">
                     <option value="" selected="selected">- Choisir -</option>
                     <option>Chien</option>
                     <option>Chat</option>
                  </select>
               </div>
               <div class="col-md-4 mt-4">
                  <label>Genre de Animal</label>
                  <select class="form-control name="sexe[]">
                     <option>Mâle</option>
                     <option>Femelle</option>
                  </select>
               </div>
               <div class="col-md-4 mt-4">
                  <a href="javascript:void(0)" class="btn btn-danger btn-block my-3 deleteRow2 "><i class="feather icon-delete"></i></a>
               </div>
               <hr>
               </div>`;
    $('.repeater2').append(html);
})
$('.repeater2').on('click','.deleteRow2',function (){
    $(this).parent().parent().remove();
})
      </script>
@endsection