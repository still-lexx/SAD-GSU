@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <h1 class="h3 mb-3">Users</h1>
</div>
    <div class="row card w-100">
        <div class="col-12 card-body">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                    $n = 1;
                ?>

                <tbody>
                    @foreach ($users as $user)
                <tr>
                    <td>{{$n++}}</td>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> email}}</td>
                    <td>
                        <button class="btn btn-danger btnDeleteUser" data-id="{{$user -> id}}" data-toggle="modal" data-target="#deleteUserModal"><i class="mdi mdi-trash" data-feather="trash"></i> Remove</button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete User</h5>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Proceed to delete?</p>
        </div>
        <div class="modal-footer">
            <button type="button" id="deleteUserBtn" class="btn btn-danger">Yes</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>          
        </div>
      </div>
    </div>
  </div>
@endsection