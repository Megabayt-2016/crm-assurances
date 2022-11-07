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
                           <h3 class="text-white text-center mb-4">{{$facture->contrat->client->nom}} {{$facture->contrat->client->prenom}}</h3>
                       </div>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="feather icon-home"></i></a></li>
                           <li class="breadcrumb-item"><a href="{{url('/Admin/factures')}}">Les Factures</a></li>
                           <li class="breadcrumb-item"><a >Facture N° : {{$facture->N_Facture}}</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!-- [ breadcrumb ] end -->
      <div class="card">
         <div class="card-header">
            <form action="{{url('Admin/telechargerFacture')}}" method="post">
               @csrf
               <input type="hidden" name="id" value="{{$facture->id}}">
               <button class="btn btn-info btn-sm">Telecharger facture PDF</button>
           </form>
         </div>
         <div class="card-body">


         
         <nav>
            <ul style>
               <li>
                  DATE : <b>{{$facture->created_at}}</b>
               </li>
               <li>
                  NOM ET PRENOM : <b>{{$facture->contrat->client->nom}} {{$facture->contrat->client->prenom}}</b>
               </li>
               <li>
                  N° TELEPHONE :  <b> {{$facture->contrat->client->tele}}</b> 
               </li>
               <li>
                  Adresse :<b>{{$facture->contrat->client->adresse}}, {{$facture->contrat->client->codePostal}}</b> 
               
            </ul>
         </nav>
         <hr>
         <center>
            <p>
               FACTURE N° : <b> {{$facture->N_Facture}}</b>  <br>
               DATE EMISSION: <b> {{$facture->Date_emission}}</b> 
            </p>
         </center>
         REGLEMENT : <b> {{$facture->Reglement}}</b>  <br> <br><br>
         <table>
            <tr>
               <th> DESIGNATION</th>
               <th> MONTANT HT </th>
            </tr>
            <tr>
               <td>
                  {{ $facture->Designation }}
               </td>
               <td>
                  {{ $facture->Montant }} DH 
               </td>
            </tr>
         </table>
         <br>
         <table style="margin-bottom:5%;">
            @php
             $montant = $facture->Montant;
             $tva = $facture->taux_tva;
             $montant_tva = ($montant + $montant * $tva) /100 ;
             $montant_ttc = $montant + $montant_tva;   
            @endphp
            <tr>
               <th><b> TVA ({{$facture->taux_tva}} %) </b></th>
            
               <th>  <b> {{$montant_tva}} DH </b></th>
            </tr>
            <tr>
               <th> <b>  MONTANT TTC</b></th>
               <th><b> {{ $montant_ttc }} DH </b></th>
            </tr>
         </table>
         <br><br><br>
         <div>
            <p>
               En cas de retard de paiement, une pénalité de 3 fois le taux d'intérêt légal sera appliquée, à laquelle s'ajoutera une indemnité forfaitaire
               pour frais de recouvrement de 40€.
               <br>
               Pas d’escompte en cas de paiement anticipé.
               <br><br>
               Les opérations d'assurances sont exonérées de TVA, Article 261 C2° du CG.
               <br> <br>
            <center> 
               CARREZ CONSEIL ASSURANCES – 3 rue du pré d'Aubiat 19200 USSEL –France <br>
               Tél : 05 19 79 97 67 email : contact@carrezconseil.fr <br>
               RCS Brive 830 933 040 – Numéro ORIAS 17005138 – WWW orias .fr
               <br> <br>
               Activité des agents et courtiers d’assurances(6622Z). <br> <br>
               Garantie Financière et Responsabilité Civile Professionnelle conformes aux articles L530.1 et L530.2.
            </center>
            </p>
         </div>
      </div>
      </div> <br><br><br><br> <br><br><br><br><br> <br><br><br>
      <hr>
      </div>
      <center>
         <footer>
            <p>CARREZ CONSEIL ASSURANCES &copy; 2022 | All Rights Reserved</p>
         </footer>
      </center>
   </div>

   </div>
</div>
@endsection
