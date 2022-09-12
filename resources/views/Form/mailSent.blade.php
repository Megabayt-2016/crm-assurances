@extends('layouts/app')

@section('content')
<div class="container my-5">
    <div class="card-body bg-white p-5">
        <div class="jumbotron text-center">
            <h1 class="display-3">Un mail vous a été envoyé!</h1>
            <p class="lead">Nous vous invitons à vérifier votre boite mail afin de finaliser votre demande.</p>
            <hr>
            <p>
                Vous avez des Problemes? <a href="mailto:contact@carrezconseil.fr">Contactez-Nous</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="https://carrezconseil.com" role="button">Page d'accueil</a>
            </p>
        </div>
    </div>
</div>
@endsection
