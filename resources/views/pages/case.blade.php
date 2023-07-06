@extends('layouts.app')

@section('content')
<div class="row">
            <h1 class="h3 mb-3">Case Files</h1>
    </div>
<div class="container">
    <div class="row card flex-fill w-100">
        <div class="col-12 table-responsive">
            <table class="table table-hover my-0">
                
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Registration Number</th>
                        <th>Level</th>
                        <th>Case subject</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cases as $case)
                <tr>
                    <td>{{$case -> name}}</td>
                    <td>{{$case -> reg_num}}</td>
                    <td>{{$case -> level}}</td>
                    <td>{{$case -> caseDesc}}</td>
                    <td>{{$case -> status}}</td>
                    <td>                       
                        <a type="button" href="{{ route('view.viewCase', ['id' => $case->id]) }}" class="btn btn-success" data-id=""><i class="" data-feather="edit"></i> view</a>
                        @can('admin')
                            {{-- <button type="button" class="btn btn-danger btn-userinfodelete" data-toggle="modal" data-id="{{$case -> id}}" data-target="#deleteuserinfo"><i class="mdi mdi-trash" data-feather="trash"></i> Delete</button> --}}
                            <button type="button" class="btn btn-danger btnDeleteCase" data-id="{{$case -> id}}" data-toggle="modal" data-target="#deleteCase">
                                <i class="mdi mdi-trash" data-feather="trash"></i> Delete
                              </button>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteCase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete Case</h5>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Proceed to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" id="deleteCaseFile" class="btn btn-danger">Yes</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>          
        </div>
      </div>
    </div>
  </div>
@endsection
