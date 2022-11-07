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
                            <h5 class="m-b-10">List Des Clients</h5>
                            <p class="mb-4 text-white"> Vous trouvez ici les données de touts les Clients Dans CRM Assurances.</p>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a >List Des Clients</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <livewire:client.show />

    </div>
</div>

@endsection