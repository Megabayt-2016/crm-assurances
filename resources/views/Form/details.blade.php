@extends('layouts/app')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Ajoute Nouveau Client</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/show') }}">Clients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Client : {{ $guest->nom }} {{ $guest->prenom }}</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-info d-flex align-items-center text-center" role="alert">
                    <h3>
                        Dossier N°:<strong> CCA22{{$folder->id}}</strong>
                    </h3>
                </div>
                <div class="card mb-4">
                    @if (( $folder->status->id ) === 1)
                        <div class="card-header bg-danger text-white text-center"> {{ $folder->status->nom }}  </div>
                    @elseif (( $folder->status->id ) === 2)
                        <div class="card-header bg-warning text-center"> {{ $folder->status->nom }} dossier N°:
                            CCA22{{$folder->id}}</div>
                    @else
                        <div class="card-header bg-success text-white text-center"> {{ $folder->status->nom }} dossier
                            N°: CCA22{{$folder->id}}</div>
                    @endif
                    <div class="card-body text-center">
                        <h5 class="text-weight my-3 mb-3"> Situation :</h5>
                        @if (( $folder->situation->id ) === 1)
                            <button type="button" class="btn btn-info mb-3"
                                    disabled>{{ $folder->situation->nom}}</button>
                        @elseif (( $folder->situation->id ) === 2)
                            <button type="button" class="btn btn-danger mb-3"
                                    disabled>{{ $folder->situation->nom}}</button>
                        @else
                            <button type="button" class="btn btn-info mb-3"
                                    disabled>{{ $folder->situation->nom}}</button>
                        @endif
                        <p class=" my-2">Date dépôt</p>
                        <h4 class="text-muted mb-1">{{ $folder->created_at->format('d-m-Y') }}</h4>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $guest->nom }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Prénom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $guest->prenom }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">E-mail</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $guest->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Téléphone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $guest->tele }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Documents Manquants</p>
                            </div>
                            <div class="col-sm-9">
                                @if(empty($folder->carteIdentiteRecto))
                                    Carte Identite R  /
                                @endif

                                @if(empty($folder->carteIdentiteVerso))
                                    Carte Identite V /

                                @endif

                                @if(empty($folder->carteGriseRecto))
                                    Carte Grise R /

                                @endif

                                @if(empty($folder->carteGriseVerso))
                                    Carte Grise V /

                                @endif

                                @if(empty($folder->permisRecto))
                                    Permis R /

                                @endif

                                @if(empty($folder->permisVerso))
                                    Permis V /

                                @endif

                                @if($folder->situation->nom !== 'Jeune conducteur')
                                    @if(empty($folder->releveInformation))
                                        Relevé Information /
                                    @endif
                                @endif

                                @if($folder->situation->nom === 'Risque agravé')
                                    @if(empty($folder->copieJugement))
                                        Copie Jugement /

                                    @endif

                                    @if(empty($folder->visiteMedicale))
                                        Visite Medicale /

                                    @endif

                                    @if(empty($folder->pv))

                                        Procès verbal /
                                    @endif

                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">État du dossier</p>
                            </div>
                            <div class="col-sm-9 d-flex justify-content-between">
                                <form action="{{ route('changerEtat', ['client_id' => $folder->id]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                        <select class="form-control" name="etatDossier" id="etatDossier">
                                            <option
                                                value="{{ $folder->status->id }}">{{ $folder->status->nom }}</option>
                                            @foreach($status as $stat)
                                                @if($stat->id != $folder->status->id)
                                                    <option value="{{ $stat->id }}">{{ $stat->nom }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </div>
                                        <div class="col">
                                        <button type="submit" class="btn btn-round btn-info" style="color: white;">
                                            Confirmer
                                        </button>
                                        </div>
                                    </div>
                                </form>
                                <button class="btn btn-danger  " data-toggle="modal" data-target="#my-modal">Supprimer
                                </button>
                                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content border-0">
                                            <div class="modal-body p-0">
                                                <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                    <div class="card-header pb-0 bg-white border-0 ">
                                                        <div class="row float-right mb-2">
                                                            <div class="col ml-auto">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <p class="font-weight-bold mb-2"> Êtes-vous sûr de vouloir
                                                            supprimer ce dossier ?</p>
                                                        <p class="text-muted "> Ce dossier sera définitivement
                                                            supprimé</p></div>
                                                    <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                        <div class="row justify-content-end no-gutters">
                                                            <div class="col-auto">
                                                                <button type="button" class="btn btn-light text-muted"
                                                                        data-dismiss="modal">Annuler
                                                                </button>
                                                            </div>
                                                            <div class="col-auto">
                                                                <form method="post"
                                                                      action="{{route('delete', $folder->id)}}">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger px-4">
                                                                        supprimer
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @isset($folder->carteIdentiteRecto)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Identite R</p>
                                @if(pathinfo(storage_path($folder->carteIdentiteRecto), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteIdentiteRecto }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteIdentiteRecto }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteIdentiteRecto]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteIdentiteVerso)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Identite V :</p>
                                @if(pathinfo(storage_path($folder->carteIdentiteVerso), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteIdentiteVerso }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteIdentiteVerso }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteIdentiteVerso]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteGriseRecto)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Grise R :</p>
                                @if(pathinfo(storage_path($folder->carteGriseRecto), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteGriseRecto }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteGriseRecto }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteGriseRecto]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteGriseVerso)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Grise V :</p>
                                @if(pathinfo(storage_path($folder->carteGriseVerso), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteGriseVerso }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteGriseVerso }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteGriseVerso]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->permisRecto)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Premis R:</p>
                                @if(pathinfo(storage_path($folder->permisRecto), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="/assets/{{ $folder->permisRecto }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->permisRecto }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->permisRecto]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->permisVerso)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Permis V :</p>
                                @if(pathinfo(storage_path($folder->permisVerso), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="/assets/{{ $folder->permisVerso }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->permisVerso }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->permisVerso]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->releveInformation)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Relevé Information :</p>
                                @if(pathinfo(storage_path($folder->releveInformation), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->releveInformation }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->releveInformation }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->releveInformation]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->copieJugement)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Copier Jugement :</p>
                                @if(pathinfo(storage_path($folder->copieJugement), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="/assets/{{ $folder->copieJugement }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->copieJugement }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->copieJugement]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->visiteMedicale)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">visite Medicale:</p>
                                @if(pathinfo(storage_path($folder->visiteMedicale), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->visiteMedicale }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->visiteMedicale }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->visiteMedicale]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->pv)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Procès verbal:</p>
                                @if(pathinfo(storage_path($folder->pv), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="/assets/{{ $folder->pv }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->pv }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary" href="{{ route('download', ['doc' => $folder->pv]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->certificatCession)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Certificat de Cession:</p>
                                @if(pathinfo(storage_path($folder->certificatCession), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->certificatCession }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->certificatCession }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->certificatCession]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteVitale)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte vitale:</p>
                                @if(pathinfo(storage_path($folder->carteVitale), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteVitale }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteVitale }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteVitale]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteMutuelRecto)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte mutuel (recto):</p>
                                @if(pathinfo(storage_path($folder->carteMutuelRecto), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteMutuelRecto }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteMutuelRecto }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteMutuelRecto]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteMutuelVerso)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte mutuel (verso):</p>
                                @if(pathinfo(storage_path($folder->carteMutuelVerso), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteMutuelVerso }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteMutuelVerso }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteMutuelVerso]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->attestationSecuriteSociale)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Attestation de Sécurité Sociale:</p>
                                @if(pathinfo(storage_path($folder->attestationSecuriteSociale), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->attestationSecuriteSociale }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->attestationSecuriteSociale }}" alt=""
                                         class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->attestationSecuriteSociale]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteProfesionnelleRecto)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Profesionnelle (recto):</p>
                                @if(pathinfo(storage_path($folder->carteProfesionnelleRecto), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteProfesionnelleRecto }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteProfesionnelleRecto }}" alt=""
                                         class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteProfesionnelleRecto]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->carteProfesionnelleVerso)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Carte Profesionnelle (verso):</p>
                                @if(pathinfo(storage_path($folder->carteProfesionnelleVerso), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->carteProfesionnelleVerso }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->carteProfesionnelleVerso }}" alt=""
                                         class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->carteProfesionnelleVerso]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->kBis)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">K-Bis:</p>
                                @if(pathinfo(storage_path($folder->kBis), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="/assets/{{ $folder->kBis }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->kBis }}" alt=""
                                         class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('download', ['doc' => $folder->kBis]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($folder->rib)
                    <div class="col-md-4 mb-3">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4">Rib:</p>
                                @if(pathinfo(storage_path($folder->rib), PATHINFO_EXTENSION) == 'pdf')
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="/assets/{{ $folder->rib }}"
                                                frameborder="0"
                                                style="width: 65%; height: 100%;"></iframe>
                                    </div>
                                @else
                                    <img src="/assets/{{ $folder->rib }}" alt="" class="img-fluid mb-2"/>
                                @endif
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a class="btn btn-primary" href="{{ route('download', ['doc' => $folder->rib]) }}">Télécharger</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

            </div>
        </div>

        <div>


        </div>
@endsection
