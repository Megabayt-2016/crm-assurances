<div class="container">
    
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <div class="row justify-content-end">
                    
                    <div class="col-md-4">
                        <a href="{{ url('/projets/ajouter')}}" class="btn  btn-success btn-sm float-right mx-2"><i class="feather icon-plus"></i> Nouveau Projet</a>
                    </div>
                    <div class="col-lg-12 mx-auto">
                        <div class="career-search mb-60">
                            <div class="filter-result">
                                <div class="row my-2">
                                    <div class="col-12 job-box d-md-flex align-items-center justify-content-between mb-30">
                                        <div class="col-12 job-left my-2 d-md-flex align-items-center flex-wrap">
                                            <div class="row center m-auto" style="width: 100%">
                                                <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                                    <select class="form-control" name="typeFiltre"
                                                            id="typeFiltre"
                                                            wire:model="typeFiltre">
                                                        <option value="">Type d'Assurances</option>
                                                        @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                                    <select class="form-control" name="origineFiltre"
                                                            id="origineFiltre"
                                                            wire:model="origineFiltre">
                                                        <option value="">Origine</option>
                                                        <option>Site Web</option>
                                                        <option>Fiche / Lead</option>
                                                        <option>Appel Entrant</option>
                                                        <option>Ancien Client</option>
                                                        <option>Remplacement</option>
                                                        <option >Renouvellement</option>
                                                        <option>Parrainage</option>
                                                        <option>Avenant</option>
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
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                            <th></th>
                            <th>Type Project</th>
                            <th>Contrats</th>		
                            <th>Nom prenom</th>
                            <th>ATTRIBUTION</th>
                            <th>DATE creation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($projets as $projet)
                            <tr >
                                <td><a data-toggle="collapse" data-target="#demo{{$projet->id}}" class="accordion-toggle" class="btn btn-primary"><i class="feather icon-eye text-success"></i></a></td>
                                <td><b>{{$projet->typeassurance->nom}}</b></td>
                                <td>
                                    {{-- {{dd($projet->contrats)}} --}}
                                    @if($projet->contrats->count() > 0)
                                        @foreach($projet->contrats as $contrat)
                                        <a class="btn btn-success btn-sm" href="{{url('Admin/singleContrat/' .$contrat->id)}}">{{$contrat->compagnie}}</a>
                                        @endforeach   
                                    @else
                                    <a class="btn btn-danger btn-sm" href="{{url('Admin/AjouterContratsAP/' .$projet->id)}}"><i class="feather icon-plus"></i>Ajouter Contrat</a>                                                         
                                    @endif
                                </td>
                                <td>{{$projet->client->nom}} {{$projet->client->prenom}}</td>
                                <td>{{$projet->user->nom}} {{$projet->user->prenom}}</td>
                                <td>{{$projet->created_at->format('d-m-Y') }}</td>
                            </tr>
            
                            <tr>
                                <td colspan="12" class="p-0">
                                    <div class="accordian-body collapse" id="demo{{$projet->id}}"> 
                                        <table class="table table-dark">
                                            <thead>
                                                <tr class="info">
                                                    <th>DATE SOUSCRIPTION</th>
                                                    <th>Origine</th>
                                                    <th>STATUT</th>
                                                    <th>COMMENTAIRE</th>                                                    	
                                                </tr>
                                            </thead>	
                                                            
                                            <tbody>                 
                                                <tr >
                                                    <td>{{$projet->dateSouscription}}</td>
                                                    <td>{{$projet->origine}}</td>                 
                                                    <td>{{$projet->statut}}</td>
                                                    <td>{{$projet->commentaire}}</td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="mt-4 d-flex justify-content-center">
                    {{ $projets->links() }}
                </div>
            </div>
        </div> 
    </div>
</div>  
