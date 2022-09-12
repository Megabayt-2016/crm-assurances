@extends('layouts.app')

@section('content')

    <div class="container mb-5 mt-3">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1">Finalisez votre dossier</h1>
                <p class="lead">Envoyez dès maintenant les documents ci-dessous :</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 mx-auto">
                <img class="img-fluid" src="{{URL::asset('/images/banner.png')}}" alt="" width="200">
            </div>
        </div>
    </div>
    <div class="b-example-divider"></div>
    <div class="container">
        <div class="card-body bg-white p-2 mt-4">
            <div class="card mb-4">
                <div class="card-body text-center bg-info">Bonjour
                    <strong>{{ \App\Models\Client::find(decrypt($client_id))->nom}} {{ \App\Models\Client::find(decrypt($client_id))->prenom}}</strong><span
                        class="text-end">(Santé. Mutuel)</span></div>
            </div>
            <b><span
                    style="color: red">Assurez-vous que tous les documents indéxés soient clairs et lisibles.</span></b>
            <form method="post"
                  action="{{ route('uploadingmutuel', ['client_id' => request()->segment(count(request()->segments()))]) }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4 mb-4">
                        <label for="carteIdentiteRecto" class="form-label">Carte d'identité (recto) <b style="color: red;">*</b></label>
                        <input class="form-control @error('carteIdentiteRecto') is-invalid @enderror" type="file"
                               id="carteIdentiteRecto" name="carteIdentiteRecto">
                        @error("carteIdentiteRecto")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="carteIdentiteVerso" class="form-label">Carte d'identité (verso) <b style="color: red;">*</b></label>
                        <input class="form-control @error('carteIdentiteVerso') is-invalid @enderror" type="file"
                               name="carteIdentiteVerso" id="carteIdentiteVerso"/>

                        @error("carteIdentiteVerso")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="rib" class="form-label">RIB <b style="color: red;">*</b></label>
                        <input class="form-control @error('rib') is-invalid @enderror" type="file"
                               name="rib" id="rib"/>
                        @error("rib")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="mutuelRecto" class="form-label">Carte mutuel (recto)</label>
                        <input class="form-control @error('mutuelRecto') is-invalid @enderror" type="file"
                               name="mutuelRecto" id="mutuelRecto"/>
                        @error("mutuelRecto")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="mutuelVerso" class="form-label">Carte mutuel (verso)</label>
                        <input class="form-control @error('mutuelVerso') is-invalid @enderror" type="file"
                               name="mutuelVerso" id="mutuelVerso"/>
                        @error("mutuelVerso")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="attestationSecuriteSociale" class="form-label">Attestation de Sécurité Sociale</label>
                        <input class="form-control @error('attestationSecuriteSociale') is-invalid @enderror" type="file"
                               name="attestationSecuriteSociale" id="attestationSecuriteSociale"/>
                        @error("attestationSecuriteSociale")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="carteVitale" class="form-label">Carte Vitale</label>
                        <input class="form-control @error('carteVitale') is-invalid @enderror" type="file"
                               name="carteVitale" id="carteVitale"/>
                        @error("carteVitale")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="text" value="{{$situation_id}}" name="situation_id" id="situation_id" hidden>
                    <input type="text" value="{{$client_id}}" name="guest" id="guest" hidden>

                    <div class="row mb-0">
                        <div class="d-grid gap-2 col-4 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Envoyer') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
