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
                                <h3 class="m-b-10 text-white">Nos Projects</h3>
                                <p class="mb-4 text-white"> Vous trouvez ici les données de touts les projets de CRM Assurances.</p>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/Admin/listeProjet')}}">Les Project Assurance</a></li>
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

            <livewire:project.show />



        </div>
    </div>

@endsection