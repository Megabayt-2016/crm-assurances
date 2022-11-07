@extends('layouts.app')

@extends('layouts.nav')

@section('content')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        @if (session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
            <br />
        @endif
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Detail Client : {{$client->nom}} {{$client->prenom}}</h5>
                            <p class="mb-4 text-white"> Vous trouvez ici touts les données de  Client .</p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/clients')}}">List Des Clients</a></li>
                            <li class="breadcrumb-item"><a >Client N°: {{$client->id}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success text-white">
                <h4 class="text-white"> <i class="feather icon-user"></i> {{$client->civilite}} {{$client->nom}} {{$client->prenom}} </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="card">
                    <div class="card-header p-1 bg-success"></div>
                        <div class=" col-md-5 mb-3 pr-4"> 
                            <table class="table"> 
                          <tbody>
                            <tr>
                                <td>Raison Social:</td>
                                <td>{{$client->raisonSociale}}</td>
                            </tr>
                            <tr>
                              <td>Adress:</td>
                              <td>{{$client->adresse}}</td>
                            </tr>
                            <tr>
                              <td>Complement Adress:</td>
                              <td>{{ $client->complementAdresse}}</td>
                            </tr>
                            
                            <tr>
                                <td>Code postal</td>
                                <td>{{$client->codePostal}},{{$client->ville}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                            </tr>
                            <td>Téléphone</td>
                              <td>{{$client->tele}}
                              </td>
                                 
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info p-1"></div>
                            <div class="card-body">
                                <h5 class="title mb-3">List statistiques du client:</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Les Nombre de project : {{$projets->count()}}</p>
                                    </div>
                                    <div class="col-6">
                                        @foreach ($projets as $projet)
                                        <a href="" >-  {{$projet->typeassurance->nom}}</a><br>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <p>Les Nombre de project : {{$dossiers->count()}}</p>
                                    </div>
                                    <div class="col-6">
                                        @foreach ($dossiers as $dossier)
                                        <a href="{{ route('details', ['folder_id' => $dossier->id, 'client_id' => $dossier->guest->id]) }}" >-  {{$dossier->situation->nom}}</a><br>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="justify-content-end">

                        <div class="btn-group dropstart mr-2">
                            <button class="btn  btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-file-plus"></i> Nouveau Dossier </button>
                            <ul class="dropdown-menu">
                                @foreach($situations as $situation)
                                <li><a class="dropdown-item" href="{{route('sendmail', ['situation_id' => $situation->id, 'client_id' => encrypt($client->id)])}}">{{ $situation->nom }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('addprojet',  $client->id) }}" class="btn btn-primary">Nouveau Project</a>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

@endsection