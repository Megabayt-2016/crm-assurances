


    <div class="container">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="recherche" id="recherche"
                                    class="form-control"
                                    placeholder="Recherche Client/email/Telephone"
                                    wire:model.debounce.250ms="recherche">
                            </div>
                        </div>
                        <div>
                            @if (Request::is('clients/*'))
                            <a href="{{ url('/clients/ajouter')}}" class="btn  btn-success btn-sm float-right mx-2"><i class="feather icon-plus"></i> Nouveau</a>
                            <a href="{{ url('/Admin/importer')}}" class="btn  btn-info btn-sm float-right"><i class="feather icon-upload"></i> Importer</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                <th></th>
                                <th>Nom Complete</th>
                                <th>Téléphone</th>
                                <th>E-mail</th>
                                <th>Ville</th>
                                <th>Action</th>
                                </tr>
                            </thead>
    
                            <tbody>
                            
                            @foreach ($clients as $client)
                                <tr >
                                    <td><a data-toggle="collapse" data-target="#demo{{$client->id}}" class="accordion-toggle" class="btn btn-default"><i class="feather icon-eye text-success"></i></a></td>
                                    @if (Request::is('projets/*'))
                                    <td><a href="{{ url('/projets/ajouter/' .$client->id) }}"  >{{$client->civilite}} <b>{{$client->prenom}} {{$client->nom}}</b></a></td>
                                    @else
                                    <td><a href="{{ url('/clients/profile/' .$client->id) }}"  >{{$client->civilite}} <b>{{$client->prenom}} {{$client->nom}}</b></a></td>
                                    @endif
                                    <td>{{$client->tele}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->ville}}</td>
                                    <td>
                                        <a href="{{ url('Admin/edit/editClient/' .$client->id) }}"><i class="feather icon-edit text-warning mx-2"></i></a> 
                                        <button type="button" class="btn btn-sm btn-xs" wire:click="confirmDelete({{$client->id}})"><i class="feather icon-trash text-danger"></i></button>
                                    </td>
                                </tr>
                
                                <tr>
                                    <td colspan="12" class="p-0">
                                        <div class="accordian-body collapse" id="demo{{$client->id}}"> 
                                            <table class="table table-dark">
                                                <thead>
                                                    <tr class="info">
                                                        <th>Raison Social</th>
                                                        <th>Adress</th>
                                                        <th>Code Postal</th>		
                                                        <th>Date Creation</th>	
                                                        <th>Les Dossiers</th>	
                                                        <th>Les Projects</th>	
                                                    </tr>
                                                </thead>	
                                                                
                                                <tbody>                 
                                                    <tr>
                                                        <td>{{$client->raisonSociale}}</td>
                                                        <td>{{$client->adresse}} <br> {{$client->complementAdresse}}</td>
                                                        <td>{{$client->codePostal}}</td>
                                                        <td>{{ $client->created_at->format('d-m-Y') }}</td>
                                                        <td>
                                                            @foreach($client->folder as $folder)
                                                                @if (( $folder->status_id ) == 1)
                                                                    <a class="text-danger"
                                                                    href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a><br>
                                                                @elseif (( $folder->status_id ) == 2)
                                                                    <a class="text-warning"
                                                                    href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a><br>
                                                                @else
                                                                    <a class="text-success"
                                                                    href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id }}</a><br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td> 
                                                            @foreach($client->project as $project)
                                                            <a href="#">{{$project->typeassurance->nom}}</a><br>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </td>
                                </tr>
                            </tbody>
                            
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div> 
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