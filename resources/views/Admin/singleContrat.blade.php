@extends('layouts.app')
    
@extends('layouts.nav')

@section('content')


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h3 class="text-white text-center mb-4">{{$contrat->projet->typeassurance->nom}}</h3>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('/Admin/listeProjet')}}">Les Projets Assurance</a></li>
                            <li class="breadcrumb-item"><a >Contrat N° : {{$contrat->N_Contrat}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
            
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                  @if (session('message'))
                  <div class="col-12">
                     <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     </div>
                  </div>
                  @endif

                    <div class="p-3">
                        <h3>Contrat pour <b>{{$contrat->client->nom}} {{$contrat->client->prenom}}</b></h3>
                        @foreach($contrat->factures as $facture)
                           <a href="{{url('/Admin/singleFactureAP/'.$facture->id)}}">{{$facture->N_Facture}}</a><br>
                        @endforeach
                        <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Nouvelle Facture</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 </div>
                                 <div class="modal-body">
                                    <form action="{{url('/Admin/factureAP')}}" method="POST" class="signin-form">
                                       @csrf
                                       <input class="form-control form-control-lg" type="text" name="gestionnaire_id" value="{{auth()->user()->id}}" hidden/> 
                                       <label >Numéro de Facture</label>
                                       <input class="form-control form-control-lg" type="text"  name="N_Facture" value="{{$numFacture}}" placeholder="N° Facture">
                                       <br>
                                       <label >Numéro de Contrat (Client)</label>
                                       <select class="form-control form-control-lg" id="client" name="contrat_id">
                                          <option value="{{$contrat->id}}" > {{$contrat->N_Contrat}} ({{$contrat->client->nom}} {{$contrat->client->prenom}})</option>
                                       </select>
                                       <br>
                                       <input class="form-control form-control-lg" type="text" name="Designation" placeholder="Designation" /><br>
                                       <label >Date d'émission</label>
                                       <input class="form-control form-control-lg" type="date"  name="Date_emission" placeholder="Date d'émission">
                                       <br>
                                       <input class="form-control form-control-lg" type="text" name="Reglement" placeholder="Règlement" /><br>
                                       <label>Taux de TVA:</label>
                                       <select class="form-control form-control-lg" id="tva" name="tva">
                                          <option value='0'>0%</option>
                                          <option value='10'>10%</option>
                                          <option value='20'>20%</option>
                                          <option value='30'>30%</option>
                                       </select>
                                       <br>
                                       <select class="form-control form-control-lg" name="statut">
                                          <option >Non payée</option>
                                          <option >payée</option>
                                       </select>
                                       <br>
                                       <input class="form-control form-control-lg" type="number" name="Montant" placeholder="Montant" step="any"/><br>
                                       <div style="text-align: center;">
                                          <button  class="form-control btn btn-primary rounded  px-3">Ajouter</button>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn  btn-primary">Save changes</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Ajouter Facture</button>
                     </div>
                     <div class="px-2">
                        <form action="{{url('Admin/telechargerContratAP')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$contrat->id}}">
                            <button class="btn btn-info btn-sm">Telecharger Contrat PDF</button>
                        </form>
                        <form action="{{url('Admin/listeContratAP/'.$contrat->id)}}" method="post" style='display: inline-block'>
                            {{csrf_field() }}
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"> Delete Contrat</button> 
                         </form>
                     </div>
                  </div>
               </div>
            <div class="card-body">
                <div class="container">
                    <nav>
                       <ul class="list-group">
                          <li>
                             <b>Votre contrat d'{{$contrat->projet->typeassurance->nom}}</b>
                          </li>
                          <li>
                             Contrat N° : <b>{{$contrat->N_Contrat}}</b>
                          </li>
                          <li>
                             Date d'effet : <b>{{$contrat->debutEffet}}</b> 
                          </li>
                          <li>
                             Date d'échéance principale : <b>{{$contrat->dateEcheance}}</b> 
                          </li>
                       </ul>
                       <hr>
                       <ul class="mt-5 list-group">
                          <li>
                             <b>Contrat réalisé par votre conseiller </b>
                          </li>
                          <li>
                             <b>CARREZ CONSEIL ASSURANCES</b>
                          </li>
                          <li>
                             Numéro ORIAS : <b>17005138 www.orias.fr</b>
                          </li>
                          <li>
                             N° TELEPHONE : <b>05 19 79 97 69</b>
                          </li>
                          <li>
                             MAIL : <b>contact@carrezconseil.fr</b>
                          </li>
                          <li>
                             COURRIER : <b>CARREZ CONSEIL ASSURANCES,<br>
                                3 rue du pré d aubiat,<br>
                                19200 USSEL</b>
                          </li>
           
                          
                       </ul>
           
                       <ul class="float-right ">
                           <li>
                              NOM ET PRENOM : <b>{{$contrat->client->nom}} {{$contrat->client->prenom}}</b>
                           </li>
                           <li>
                              N° TELEPHONE :  <b> {{$contrat->client->tele}}</b> 
                           </li>
                           <li>
                              Adresse :<b>{{$contrat->client->adresse}}, {{$contrat->client->codePostal}}</b> 
                           </li>
                        </ul>
                    </nav>
                    <br><br><br><br><br><br>
                    <div>
                       <p>
                          
                          {{$contrat->client->civilite}},<br>
                          Nous vous remercions d'avoir choisi {{$contrat->compagnie}} comme compagnie d'assurance. <br><br>
                          Nous vous remercions de nous renvoyer un exemplaire des présentes Dispositions Particulières ainsi que le mandat de
                          prélèvement SEPA signé dans vos meilleurs délais, à l'adresse ci-dessus afin de ne pas risquer l'interruption de vos garanties
                          d'assurance.<br><br>
           
                          Vous disposez d’un délai de 30 jours pour nous faire parvenir les pièces justificatives listées à la fin de votre contrat, dès leur
                          réception et leur validation, nous vous adresserons une carte verte définitive. <br><br>
                          Nous vous rappelons que si l'une des informations déclarées lors de la souscription de votre contrat Auto évolue dans le temps,
                          vous devez nous en informer afin de modifier votre contrat en conséquence.<br><br>
                          Nous vous remercions de votre confiance et vous prions d'agréer, Madame, l'expression de notre considération distinguée.
                          Votre chargé de clientèle.<br> <br>
                     </div>
                 </div> <br><br><br>    
                 </div>
                 <center>
                    <footer>
                       <p>CARREZ CONSEIL ASSURANCES &copy; 2022 | All Rights Reserved</p>
                    </footer>
                 </center>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection