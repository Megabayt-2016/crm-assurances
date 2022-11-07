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
                                <h3 class="m-b-10 text-white">Nos Factures</h3>
                                <p class="text-white">Vous trouvez ici les données de touts les factures dans CRM Assurances.</p>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/Admin/factures')}}">Les Fatctures</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end --> 
            @if (session('message'))
                <div class="alert alert-success">
                    <strong> {{ session('message') }}</strong>
                </div>
            @endif

                <livewire:project.facture />

                <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nouvelle Facture</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{url('/Admin/factures')}}" method="POST" class="signin-form">
            @csrf
            <input class="form-control form-control-lg" type="text" name="gestionnaire_id" value="{{auth()->user()->id}}" hidden/> 
            <label >Numéro de Facture</label>
            <input class="form-control form-control-lg" type="text"  name="N_Facture" value="{{$numFacture}}" placeholder="N° Facture">
    <br>
    <label >Numéro de Contrat (Client)</label>
    <select class="form-control form-control-lg" id="client" name="contrat_id">
        @foreach ($contratAP as $contratAP)
            <option value="{{$contratAP->id}}" > {{$contratAP->N_Contrat}} ({{$contratAP->client->nom}} {{$contratAP->client->prenom}})</option>
            @endforeach
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
        </select><br>
    
    <select class="form-control form-control-lg" name="statut">
        
            <option >Non payée</option>
            <option >payée</option>
            
        </select> <br>
    
<input class="form-control form-control-lg" type="number" name="Montant" placeholder="Montant" step="any"/><br>

<div style="text-align: center;">
    <button  class="btn btn-primary rounded  px-3">Ajouter</button>
</div>
</form>
</div>
        
    </div>
</div>
</div>
                
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


@endsection