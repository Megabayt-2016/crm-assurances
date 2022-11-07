@extends('layouts.app')

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
                            <h5 class="m-b-10">téléchargement de clients</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a>List des Client</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
    <livewire:clientshow /> 
    </div>
</div> 

@endsection
