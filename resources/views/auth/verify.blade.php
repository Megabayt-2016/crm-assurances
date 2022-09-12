@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="background-color:white;"><center><img src="{{asset('../img/Favicons/favicon-120x120.png')}}"></center></div>
                <div class="card-header">{{ __('Vérifier votre adresse email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('un lien de vérification est envoyé à votre adresse email') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre email pour un lien de vérification.') }}
                    {{ __('si vous n'avez pas reçu l'email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
