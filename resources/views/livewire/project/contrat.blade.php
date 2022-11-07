<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Filter du Contrats</h6>

    <div class="col-lg-12 mx-auto">
        <div class="career-search mb-60">
            <div class="filter-result">
                <div class="row my-2">
                    <div class="col-12 job-box d-md-flex align-items-center justify-content-between mb-30">
                        <div class="col-12 job-left my-2 d-md-flex align-items-center flex-wrap">
                            <div class="row center m-auto" style="width: 100%">
                                <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                    <select class="form-control" name="gestionnaireFiltre"
                                            id="gestionnaireFiltre"
                                            wire:model="gestionnaireFiltre">
                                        <option value="">Gestionnaires</option>
                                        @foreach($gestionnaires as $gestionnaire)
                                        <option value="{{$gestionnaire->id}}">{{$gestionnaire->nom}} {{$gestionnaire->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-md col pr-0" style="min-width: 120px">
                                    <select class="form-control" name="compagnieFiltre"
                                            id="compagnieFiltre"
                                            wire:model="compagnieFiltre">
                                        <option value="">Companige</option>
                                        <option >assuréa</option>
                                        <option >Spring (simple et efficace)</option>
                                        <option >SOS MALUS</option>
                                        <option >Wazari Assurances</option>
                                        <option >ENTORIA</option>
                                        <option >MFA (Mutuelle Fraternelle d'Assurances)</option>
                                        <option >Groupe zéphir</option>
                                        <option >april</option>
                                        <option >Néoliane (Santé & Prévoyance)</option>
                                        <option >Solly Azar</option>
                                        <option >Coverity</option>
                                        <option >Aviva</option>
                                        <option >maxance</option>
                                        <option >netvox</option>
                                        <option >Generali</option>
                                        <option >Xenassur</option>
                                        <option >Novelia</option>
                                        <option >EURO Dommages</option>
                                        <option >Raecon</option>
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

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                <th></th>
                <th>N° contrat</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Début d'effet</th>
                <th>Date d'échéance</th>
                <th>Fin de contrat</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($contrats as $contratAP)
                <tr >
                    <td><a data-toggle="collapse" data-target="#demo{{$contratAP->id}}" class="accordion-toggle" class="btn btn-primary"><i class="feather icon-eye text-success"></i></a></td>
                    <td><a href="{{url('Admin/singleContrat/' .$contratAP->id)}}" >{{$contratAP->N_Contrat}}</a></td>
                    <td>{{$contratAP->client->nom}} {{$contratAP->client->prenom}}</td>
                    <td>{{$contratAP->client->adresse}}</td>
                    <td>{{$contratAP->debutEffet}}</td>
                    <td>{{$contratAP->dateEcheance}}</td>
                    <td>{{$contratAP->finContrat}}</td>
                </tr>

                <tr>
                    <td colspan="12" class="p-0">
                        <div class="accordian-body collapse" id="demo{{$contratAP->id}}"> 
                            <table class="table table-dark">
                                <thead>
                                    <tr class="info">
                                        <th>Compagnie</th>
                                        <th>Cotisations</th>
                                        <th>Statut</th>
                                        <th>Attribution</th>
                                        <th>Commentaire</th> 
                                        <th>Gestion</th>
                                    </tr>
                                </thead>	
                                                
                                <tbody>                 
                                    <tr >
                                        <td>{{$contratAP->compagnie}}</td>
                                        <td>{{$contratAP->Frais_Honoraires}}</td>
                                        <td>{{ $contratAP->projet->statut }}</td>
                                        <td>{{$contratAP->gestionnaire->nom }} {{$contratAP->gestionnaire->prenom }}</td>
                                        
                                        <td>{{$contratAP ->commentaire}}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="button groups sm">
                                                <a href="{{url('Admin/singleContrat/' .$contratAP->id)}}" ><button class="btn btn-sm btn-info"><i class="feather icon-eye"></i></button></a>
                                                
                                                <form action="{{url('Admin/telechargerContratAP')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$contratAP->id}}">
                                                    <button class="btn btn-sm btn-success "><i class="feather icon-download"></i></button>
                                                </form>

                                                <form action="{{url('Admin/listeContratAP/'.$contratAP->id)}}" method="post">
                                                    {{csrf_field() }}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger "><i class="feather icon-trash"></i></button> 
                                                </form>
                                            </div>
                                        </td>
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
        {{ $contrats->links() }}
    </div>
</div>
