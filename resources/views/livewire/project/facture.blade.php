<div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h6 class="m-2 font-weight-bold text-primary">Les Factures</h6>
                    <a href="#" data-toggle="modal" data-target="#InsertModal" class="mx-2"><button class="btn btn-primary"><i class="feather icon-plus"></i> Ajouter une Facture</button></a>
                </div>
                <div class="row justify-content-between ">
                    <div class="col-md-4">
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

                    <div class="col-sm-4">
                        <select class="form-control" name="statutFiltre" id="statutFiltre"  wire:model="statutFiltre">
                            <option value="">Statut</option>
                            <option value="payée">payée</option>
                            <option value="Non payée">Non payée</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" name="rechercheFacture" id="rechercheFacture"
                                class="form-control"
                                placeholder="Numero Facture"
                                wire:model.debounce.250ms="rechercheFacture">
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
                                 <th>N° Facture</th>
                                 <th>Nom complete</th>
                                 <th>Date Creation</th>
                                 <th>Montant</th>
                                 <th>Statut</th>
                                 <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach ($factures as $facture)
                             <tr>
                                <td><a data-toggle="collapse" data-target="#demo{{$facture->id}}" class="accordion-toggle" class="btn btn-primary"><i class="feather icon-eye text-success"></i></a></td>
                                 <td>{{$facture->N_Facture}}</td>
                                 <td>{{$facture->contrat->client->nom}} {{$facture->contrat->client->prenom}}</td>
                                 <td>{{ $facture->created_at->format('d-m-Y')}}</td>
                                 <td class="text-right">{{ number_format($facture->Montant, 2)}} €</td>
                                 <td>{{$facture->statut}}</td>
                                 <td>
                                    <div class="btn-group" data-toggle="buttons">

                                        <form action="{{url('/Admin/singleFacture/'.$facture->id)}}" method="post">
                                            @csrf {{ method_field('GET') }}
                                            <button class="btn btn-sm btn-primary" ><i class="feather icon-eye"></i></button>
                                        </form>


                                        <form action="{{url('Admin/deletefacture/'.$facture->id)}}" method="post">
                                            {{csrf_field() }}
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger "><i class="feather icon-trash"></i></button> 
                                        </form>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12" class="p-0">
                                    <div class="accordian-body collapse" id="demo{{$facture->id}}"> 
                                        <table class="table table-dark">
                                            <thead>
                                                <tr class="info">
                                                    <th>Adresse</th>
                                                    <th>Désignation</th>
                                                    <th>Date d'émission</th>
                                                    <th>Règlement</th>
                                                </tr>
                                            </thead>	
                                                            
                                            <tbody>                 
                                                <tr >
                                                    <td>{{$facture->contrat->client->adresse}}</td>
                                                    <td>{{$facture->Designation}}</td>
                                                    <td>{{$facture->Date_emission}}</td>
                                                    <td>{{$facture->Reglement}}</td>
                                                    
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
                    {{ $factures->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->




</div>
