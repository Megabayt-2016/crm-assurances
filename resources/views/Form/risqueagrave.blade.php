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
                        class="text-end">(Auto. Risque agravé)</span></div>
            </div>

            <form method="post"
                  action="{{ route('uploadingrisqueagrave', ['client_id' => request()->segment(count(request()->segments()))]) }}"
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
                        <label for="permisRecto" class="form-label">Permis ou permis probatoire (recto) <b style="color: red;">*</b></label>
                        <input class="form-control @error('permisRecto') is-invalid @enderror" type="file"
                               name="permisRecto" id="permisRecto"/>
                        @error("permisRecto")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="permisVerso" class="form-label">Permis ou permis probatoire (verso) <b style="color: red;">*</b></label>
                        <input class="form-control @error('permisVerso') is-invalid @enderror" type="file"
                               name="permisVerso" id="permisVerso"/>
                        @error("permisVerso")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="carteGriseRecto" class="form-label">Carte grise (recto) <b style="color: red;">*</b></label>
                        <input class="form-control @error('carteGriseRecto') is-invalid @enderror" type="file"
                               name="carteGriseRecto" id="carteGriseRecto"/>
                        @error("carteGriseRecto")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="carteGriseVerso" class="form-label">Carte grise (verso) <b style="color: red;">*</b></label>
                        <input class="form-control @error('carteGriseVerso') is-invalid @enderror" type="file"
                               name="carteGriseVerso" id="carteGriseVerso"/>
                        @error("carteGriseVerso")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="rib" class="form-label">RIB <b style="color: red;">*</b></label>
                        <input class="form-control @error('rib') is-invalid @enderror" type="file" name="rib" id="rib"/>
                        @error("rib")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="releveInformation" class="form-label">Relevé d'information</label>
                        <input class="form-control @error('releveInformation') is-invalid @enderror" type="file"
                               name="releveInformation" id="releveInformation"/>
                        @error("releveInformation")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="visiteMedicale" class="form-label">Visite Medicale</label>
                        <input class="form-control @error('visiteMedicale') is-invalid @enderror" type="file"
                               name="visiteMedicale" id="visiteMedicale"/>
                        @error("visiteMedicale")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="pv" class="form-label">PV (procès verbal)</label>
                        <input class="form-control @error('pv') is-invalid @enderror" type="file" name="pv" id="pv"/>
                        @error("pv")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="certificatCession" class="form-label">Certificat de Cession (ou Bon de Commande)</label>
                        <input class="form-control @error('certificatCession') is-invalid @enderror" type="file" name="certificatCession" id="certificatCession"/>
                        @error("certificatCession")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="copieJugement" class="form-label">Copie de jugement</label>
                        <input class="form-control @error('copieJugement') is-invalid @enderror" type="file"
                               name="copieJugement" id="copieJugement"/>
                        @error("copieJugement")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <b><span style="color: red">* Assurez-vous que tous les documents indéxés soient clairs et lisibles. <br>
                NB : Passé ce delai, votre voiture ne sera plus assurée au bout de 30 jours. <u>L'assurance cessera automatiquement sans autre avis de notre part.</u></span></b>
                    <input type="text" value="{{$situation_id}}" name="situation_id" id="situation_id" hidden>
                    <input type="text" value="{{$client_id}}" name="guest" id="guest" hidden>

                    <div class="row mb-0 mt-4">
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
