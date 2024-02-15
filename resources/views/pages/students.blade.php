@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col">
        <h1 class="h3 mb-3">Students</h1>
    </div>
    <div class="col text-end">
        <button class="btn btn-success" data-toggle="modal" data-target="#addStudentModal">
            <i class="align-middle" data-feather="plus"></i>
            Register Student
        </button>
    </div>
    
</div>

    <div class="row card w-100">
        <div class="card-body">
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No. of Cases</th>
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
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Register New Student</h5>
          <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('students.store')}}" method="POST">
            @csrf
        <div class="modal-body">
            <div class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  <div class="col-12">
                    <label for="reg-num" class="form-label">Registration Number</label>
                    <input type="text" class="form-control" id="reg_num" name="reg_num" placeholder="UG17/SCCS/0001">
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="col-12">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                  </div>
            </div>
                
              
        </div>
        <div class="modal-footer">
            <button type="submit" id="addStudentBtn" class="btn btn-success">Submit</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>          
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection