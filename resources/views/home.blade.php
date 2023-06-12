@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Total Cases</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{$allCase}}</h1>
                                <div class="mb-0">
                                    <span class="text-muted">All available cases</span>
                                </div>
                            </div>
                        </div>
                        <div class="card box1">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Resolved Cases</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{$resolved}}</h1>
                                <div class="mb-0">
                                    <span class="text-muted">For All cases</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card box1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Pending Cases</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{$pending}}</h1>
                                <div class="mb-0">
                                    <span class="text-muted">For all cases</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Recents cases</h5>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{$recent}}</h1>
                                <div class="mb-0">
                                    <span class="text-muted">Today</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-xxl-7">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Movement</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-sm">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Latest Cases</h5>
                </div>
                <div class="card-body"> 
                @if ($message)                
                    <p class="text-danger">{{ $message }}</p>
                @else
                <table class="table table-hover my-0">
                    <thead>                        
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Reg. No.</th>
                            <th class="d-none d-xl-table-cell">Level</th>
                            <th>Date</th>
                            <th class="d-none d-md-table-cell"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latest as $latests)
                        <tr>
                            <td>{{$latests -> name}}</td>
                            <td class="d-none d-xl-table-cell">{{$latests -> reg_num}}</td>
                            <td class="d-none d-xl-table-cell">{{$latests -> level}}</td>
                            <td class="d-none d-md-table-cell">{{$latests -> created_at}}</td>
                            <td><a type="button" href="{{ route('view.viewCase', ['id' => $latests->id]) }}" class="btn btn-success" data-id=""><i class="" data-feather="edit"></i> view</a></td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>           
                @endif
             </div>
            </div>
        </div>

        {{-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">

                    <h5 class="card-title mb-0">Monthly Sales</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart chart-lg">
                        <canvas id="chartjs-dashboard-bar"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

</div>
@endsection
