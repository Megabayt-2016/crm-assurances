@extends('layouts/app')

@section('content')

    <div class="container">
        <form method="post" action="{{ route('store') }}">
        @csrf
        <!-- Sign up card -->
            <div class="card person-card text-center mt-5">
                <div class="card-body">
                    <!-- Sex image -->
                    <img id="img_sex" class="person-img" style="width: 150px; height: 150px"
                         src="https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg">
                    <h2 id="who_message" class="card-title mb-5">Qui êtes vous ?</h2>

                    <!-- First row (on medium screen) -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-2 mb-4">
                            <select name="civilite" id="civilite"
                                        class="form-control @error('civilite') is-invalid @enderror" required
                                        autocomplete="civilite" autofocus>
                                <option value="Mr.">Mr.</option>
                                <option value="Mme.">Mme.</option>
                                <option value="Mme">Mme</option>
                                <option value="Mlle">Mlle</option>
                                <option value="Mr">Mr</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                   placeholder="Nom" name="nom" value="{{ old('nom') }}" required autocomplete="nom"
                                   autofocus>
                            @error('nom')
                            <span id="first_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" col-md-4 mb-4">
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"
                                   placeholder="Prénom" name="prenom" value="{{ old('prenom') }}" required
                                   autocomplete="prenom" autofocus>
                            @error('prenom')
                            <span id="last_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" col-md-2 mb-4">
                            <input id="raisonSociale" type="text" class="form-control @error('raisonSociale') is-invalid @enderror"
                                   placeholder="raison Sociale" name="raisonSociale" value="{{ old('raisonSociale') }}" required
                                   autocomplete="raisonSociale" autofocus>
                            @error('prenom')
                            <span id="last_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" col-md-4 mb-4">
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror"
                                   placeholder="Adress" name="adresse" value="{{ old('adresse') }}" required
                                   autocomplete="adresse" autofocus>
                            @error('prenom')
                            <span id="last_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" col-md-4 mb-4">
                            <input id="complementAdresse" type="text" class="form-control @error('complementAdresse') is-invalid @enderror"
                                   placeholder="complement Adresse" name="complementAdresse" value="{{ old('complementAdresse') }}" required
                                   autocomplete="complementAdresse" autofocus>
                            @error('prenom')
                            <span id="last_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class=" col-md-2 mb-4">
                            <input id="codePostal" type="text" class="form-control @error('codePostal') is-invalid @enderror"
                                   placeholder="Code Postal" name="codePostal" value="{{ old('codePostal') }}" required
                                   autocomplete="codePostal" autofocus>
                            @error('prenom')
                            <span id="last_name_feedback" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-2 mb-4">
                            <input id="ville" type="ville" class="form-control @error('ville') is-invalid @enderror"
                                   placeholder="ville" name="ville" value="{{ old('ville') }}" required
                                   autocomplete="ville">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        <div class="row">
                        
                        <div class="col-md-4 mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="E-mail" name="email" value="{{ old('email') }}" required
                                   autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                            <input id="tele" type="text"
                                   class="form-control @error('tele') is-invalid @enderror" placeholder="Téléphone"
                                   name="tele" value="{{ old('tele') }}" required autocomplete="tele">
                            @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-4">
                                <select name="situation_id" id="situation_id"
                                        class="form-control @error('situation_id') is-invalid @enderror" required
                                        autocomplete="situation_id" autofocus>
                                    <option value="">Situation</option>
                                    <optgroup label="Auto.">
                                        <option value="1">Risque simple</option>
                                        <option value="2">Risque agravé</option>
                                        <option value="3">Jeune conducteur</option>
                                        <option value="4">VTC (Risque professionnel)</option>
                                    </optgroup>
                                    <optgroup label="Santé">
                                        <option value="5">Mutuel</option>
                                    </optgroup>
                                </select>
                            </select>

                            @error('situation_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Suivant') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection