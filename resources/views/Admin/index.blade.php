@extends('layouts.app')

@extends('layouts.nav')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            @if (session('status'))
                <div class="alert alert-success">
                    <strong> {{ session('status') }}</strong>
                </div>
                <br/>
            @endif
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Tableau de bord</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/')}}"><i class="feather icon-home"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5><a href="{{ url('/show')}}">Dossiers</a></h5>
                            <div class="card-header-right">
                                <div class="btn-group card-option">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-more-horizontal"></i>
                                    </button>
                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                        <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nom Client</th>
                                            <th>N° Dossier</th>
                                            <th>Date dépôt</th>
                                            <th class="text-right">Etat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($folders as $folder)
                                        <tr>
                                            <td>
                                                <div class="d-inline-block align-middle">
                                                    <div class="d-inline-block">
                                                        <h6>{{ $folder->guest->nom}} {{ $folder->guest->prenom}}</h6>
                                                        <p class="text-muted m-b-0">{{ $folder->situation->nom}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ route('details', ['folder_id' => $folder->id, 'client_id' => $folder->guest->id]) }}">CCA22{{ $folder->id}}</a></td>
                                            <td>{{ $folder->created_at->format('d-m-Y') }}</td>
                                            @if (( $folder->status->id ) === 1)
                                                <td class="text-right"><label class="badge badge-light-danger">{{ $folder->status->nom }} </label></td>
                                            @elseif (( $folder->status->id ) === 2)
                                                <td class="text-right"><label class="badge badge-light-warning">En cours</label></td>
                                            @else
                                                <td class="text-right"><label class="badge badge-light-success">{{ $folder->status->nom }} </label></td> 
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <!-- page statustic card start -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card support-bar overflow-hidden">
                                <div class="card-body pb-0">
                                    <h2 class="m-0">{{$client}}</h2>
                                    <span class="text-c-blue">Clients </span>
                                    <p class="mb-3 mt-3">Score total </p>
                                </div>
                                <div id="support-chart"></div>
                                <div class="card-footer bg-primary text-white">
                                    <div class="row text-center">
                                        <div class="col">
                                            <h4 class="m-0 text-white">{{$projects->count()}}</h4>
                                            <span>Projects</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0 text-white">{{$contrats->contrats }}</h4>
                                            <span>Contrats</span>
                                        </div>
                                        <div class="col">
                                            <h4 class="m-0 text-white">{{$facturs->count() }}</h4>
                                            <span>Factures</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page statustic card end -->
                </div>

            </div>
                      <!-- Content Row -->
                      <div class="row">
                          <!-- Nombre de gestionnaire -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-primary shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                  Gestionnaires</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$gest}}</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Nombre de clients -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-info shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Clients
                                              </div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$client}}</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
              
                          <!-- Nombre d'agents -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-warning shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                  Agents</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$agent}}</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                           <!-- Nombre de gestionnaire -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-primary shadow h-100 py-2">
                                  <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                 Date</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$date}}</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
              
              
              
                      <!-- Content Row -->
              
                      <div class="row">
              
                          <div class="col-12">
                              
                              <div class="card shadow mb-4">
                                  <!-- Card Header - Dropdown -->
                                  <div
                                      class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                      <h6 class="m-0 font-weight-bold text-primary">Les Factures</h6>
                                      <div class="dropdown no-arrow">
                                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                          </a>
                                          
                                      </div>
                                  </div>
                                  <!-- Card Body -->
                                  <div class="card-body">
                                      <div class="chart-area">
                                          <canvas id="myAreaChart"></canvas>
                                      </div>
                                  </div>
                              </div>
                              
                  
                          </div>
                             
                      </div>


    <!-- Page level plugins -->
    <script src="{{asset('../vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        var _ydata =JSON.parse('{!! json_encode($months)!!}');
        var _xdata =JSON.parse('{!! json_encode($monthCount)!!}');

        var barChartData = {
        labels: _ydata,
        datasets: [{
            label: 'Total Factures',
            backgroundColor: "blue",
            data: _xdata
        }]
    };
    window.onload = function() {
        var ctx = document.getElementById("myAreaChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'blue',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Monthly Facture Joined'
                }
            }
        });
    };



    </script>

@endsection