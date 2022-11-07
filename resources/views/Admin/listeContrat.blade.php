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
                            <h3 class="m-b-10 text-white">Nos Contrats</h3>
                            <p class="text-white">Vous trouvez ici les données de touts les contrats de Carrez Conseil Assurances.</p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a >Nos Contratss</a></li>
                        </ul>
                    </div>
                    @if (session('message'))
                    <div class="col-12">
                        <div class="alert alert-success">
                            <strong> {{ session('message') }}</strong>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="container py-3">
            <div class="card shadow mb-4">
                <livewire:project.contrat />
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>


@endsection