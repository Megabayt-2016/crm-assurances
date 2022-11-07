@extends('layouts.app')
    
@extends('layouts.nav')

@section('content')

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h3 class="m-b-10 text-white">Nos Projects</h3>
                                <p class="mb-4 text-white"> Vous trouvez ici les données de touts les projets de CRM Assurances.</p>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/projects')}}">Les Project Assurance</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
                    
                    @if (session('message'))
                    <div class="alert alert-success">
                       
                             <strong> {{ session('message') }}</strong>
                   </div><br />
                @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-5">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Les projets d'Assurances </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Nom Prénom</th>
                                            <th>Origine</th>
                                            <th>Attribution</th>
                                            <th>Statut</th>
                                            <th>Date Création</th>
                                            <th>Dernière Modification</th>
                                            <th>Date Souscription</th>
                                            <th>Date Effet</th>
                                            <th>Commentaire</th>
                                            <th>Gestion</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Type</th>
                                            <th>Nom Prénom</th>
                                            <th>Origine</th>
                                            <th>Attribution</th>
                                            <th>Statut</th>
                                            <th>Date Création</th>
                                            <th>Dernière Modification</th>
                                            <th>Date Souscription</th>
                                            <th>Date Effet</th>
                                            <th>Commentaire</th>
                                            <th>Gestion</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($projetAP as $projetAP)
                                        <tr>
                                            <td>{{$projetAP->typeassurance->nom}}</td>
                                            <td>{{$projetAP->client->nom}} {{$projetAP->client->prenom}}</td>
                                            <td>{{$projetAP->origine}}</td>
                                            <td>{{$projetAP->user->nom}} {{$projetAP->user->prenom}}</td>
                                            <td>{{$projetAP->statut}}</td>
                                            <td>{{$projetAP->created_at}}</td>
                                            <td>{{$projetAP->updated_at}}</td>
                                            <td>{{$projetAP->dateSouscription}}</td>
                                            <td>{{$projetAP->dateEffet}}</td>
                                            <td>{{$projetAP->commentaire}}</td>
                                            <td>
                                                <div style="text-align: center">
                                                  
  
                                                     <a href="{{url('Admin/AjouterContratsAP/' .$projetAP->id)}}" >
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                      <i class="bi bi-eye" style = 'background-color: blue'></i></a>
                                                      <form action="{{url('projects/'.$projetAP->id)}}" method="post" style='display: inline-block'>
                                                      {{csrf_field() }}
                                                      @method('DELETE')
                                                    <button type="submit" style='background-color: white; border: none; color: red'> <i class="fa-solid fa-trash-can"></i></button> 
                                                   </form>
  
                                                    <a style='background-color: white; border: none' href="{{ url('Admin/edit/editProjetAP/'.$projetAP->id) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                              
                                           </div>
                                              </td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <script src="{{asset('../js/demo/datatables-demo.js')}}"></script>

@endsection