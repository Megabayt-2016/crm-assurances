
<div class="container bg-white p-3 my-4">
    @if($errors->any()) 
        <div class="alert alert-success" role="alert">
            <h4 class="text-center mt-2">{{$errors->first()}}</h4>
        </div>
    @endif
    <div class="card-tools d-flex align-items-center col-lg-12 mx-auto mb-0">
        <div class="col-lg-12 mx-auto">
            <div class="career-search mb-60">
                <div class="filter-result">
                    <div class="row my-2">
                        <div class="col-12 job-box d-md-flex align-items-center justify-content-between mb-30">
                            <div class="col-12 job-left my-2 d-md-flex align-items-center flex-wrap">
                                <div class="row center m-auto" style="width: 100%">
                                    <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                        <select class="form-control" name="situationFiltre"
                                                id="situationFiltre"
                                                wire:model="situationFiltre">
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
                                    </div>
                                    <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                        <select class="form-control" name="statusFiltre"
                                                id="statusFiltre"
                                                wire:model="statusFiltre">
                                            <option value="">Status</option>
                                            <option value="1">Non traité</option>
                                            <option value="2">En cours</option>
                                            <option value="3">Traité</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                        <select class="form-control" name="dureeFiltre" id="dureeFiltre"
                                                wire:model="dureeFiltre">
                                            <option value="">Date de publication</option>
                                            <option value="1">Dernière 24 heures
                                            </option>
                                            <option value="7">Cette semaine
                                            </option>
                                            <option value="15">15 derniers jours
                                            </option>
                                            <option value="30">Ce mois-ci
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col pr-0" style="min-width: 120px">
                                        <div class="input-group input-group-md flex-grow-1">
                                            <input type="text" name="recherche" id="recherche"
                                                   class="form-control float-right"
                                                   placeholder="Rechercher"
                                                   wire:model.debounce.250ms="recherche">
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
    <div>
        <div class="card">
            <div class="card-header" style="background-color: #003d72">

            </div>
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Nom et prénom
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Téléphone
                        </th>
                        <th>
                            Documents
                        </th>
                        <th>
                            Dossiers
                        </th>
                        <th>
                            Nouveau Dossier
                        </th>
                        <th>

                        </th>
                    </tr>

                    </thead>

                    <tbody>
                    @foreach($guests as $guest)
                        <tr>
                            <td>{{ $guest->nom }} {{ $guest->prenom }}</td>
                            <td>{{ $guest->email }}</td>
                            <td>{{ $guest->telephone }}</td>
                            <td>{{ $guest->created_at->format('d-m-Y') }}</td>
                            @if(isset($guest->folder))
                                <td>
                                    @foreach($guest->folder as $folder)
                                        @if (( $folder->status_id ) == 1)
                                            <a class="btn btn-sm btn-danger"
                                               href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a>
                                        @elseif (( $folder->status_id ) == 2)
                                            <a class="btn btn-sm btn-warning"
                                               href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a>
                                        @else
                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a>
                                        @endif
                                    @endforeach
                                </td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        Nouveau
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($situations as $situation)
                                            {{--                                        {{dd($guest->id)}}--}}
                                            <li><a class="dropdown-item"
                                                   href="{{route('sendmail', ['situation_id' => $situation->id, 'client_id' => encrypt($guest->id)])}}">{{ $situation->nom }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger center" wire:click="confirmDelete({{$guest->id}})">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $guests->links() }}
    </div>
</div>

<script>
    window.addEventListener("showConfirmMessage", event => {
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: '#DC3545',
            cancelButtonColor: '#198754',
            confirmButtonText: 'Continuer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                if (event.detail.message.data) {
                @this.deleteGuest(event.detail.message.data.client_id)
                }
            }
        })

        window.addEventListener("showSuccessMessage", event => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: event.detail.message || "Opération efféctuée avec succès!",
                showConfirmButton: false,
                timer: 3000
            })
        })
    })
</script>
