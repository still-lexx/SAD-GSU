@extends('layouts.app')

@section('content')
<div class="container">
<h1> Contact Page</h1>
<button id="btn_info" class="btn btn-success">Modal</button>
<div class="modal fade" id="info" data-backdrop="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content container-fuid">
            <div class="modal-header">
                <h3 class="modal-title">Add user</h3>
                <button type="button" class="close" data-dismiss="modal" arias-label="close">
                    <span arias-hidden="true" style="font-size:30px;">&times;</span>
                </button>
            </div>

            <form action="/userinfo" method="POST">
                @csrf
                <div class="modal-body">
                    <h3>Our Modal</h3>
                    <div class="row">
                        <div class="col-12 pb-4">
                            <label for="name" >Name</label>
                            <input type="text" name="name" class="form-control bg-light" required>
                        </div>
                        <div class="col-6 pb-4">
                            <label for="name">Email Address</label>
                            <input type="text" name="email" class="form-control bg-light" required>
                        </div>
                        <div class="col-6 pb-4">
                            <label for="phone number">Phone Number</label>
                            <input type="text" name="phone" class="form-control bg-light" required>
                        </div>
                        <div class="col-12 pb-4">
                            <label for="address">Address</label>
                            <textarea type="text" name="address" class="form-control bg-light" required></textarea>
                        </div>
                        <div class="col-6 pb-4">
                            <label for="state">State</label>
                            <select type="text" name="state" class="form-control bg-light">
                                <option value="Gombe">Gombe</option>
                                <option value="Plateau">Plateau</option>
                                <option value="Jigawa">Jigawa</option>
                                <option value="Kogi">Kogi</option>
                                <option value="Adamawa">Adamawa</option>
                                <option value="Kano">Kano</option>
                                <option value="Kaduna">Kaduna</option>
                                <option value="Borno">Borno</option>
                            </select>
                        </div>
                        <div class="col-6 pb-4">
                            <label for="LGA">LGA</label>
                            <select type="text" name="LGA" class="form-control bg-light">
                                <option value="Kaltungo">Kaltungo</option>
                                <option value="Billiri">Billiri</option>
                                <option value="Akko">Akko</option>
                                <option value="Y/Deba">Y/Deba</option>
                            </select>
                        </div>
                    </div>
                </div>
           
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
         </form>
        </div>
    </div>
</div>
<?php
 $n =1;
?>

    <div class="row pt-5">
        <div class="col-12">
    <table class="table">
        <thead>
            <tr>
            <th>S/n</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone</th>
            <th>Address</th>
            <th>State</th>
            <th>LGA</th>
            <th>Image</th>
            <th>Actions</th>
            </tr>
        </thead>
     
        <tbody>
            @foreach ($users as $user)                
        <tr>
            <td>{{$n++}}</td>
            <td>{{$user -> name}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> phone}}</td>
            <td>{{$user -> address}}</td>
            <td>{{$user -> State}}</td>
            <td>{{$user -> LGA}}</td>
            <td>uploads/users/{{$user -> imagename}}</td>
            <td>
                <button type="button" class="btn btn-warning" data-id="{{$user->id}}><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-userinfodelete" data-id="{{$user->id}}"><i class="fa fa-trash"></i></button>
                </td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>
</div>



</div>

<div class="modal fade" id="deleteuserinfo"  data-backdrop="static" >
    <div class="modal-dialog modal-md">
        <div class="modal-content container-fluid">
            <div class="modal-header">
                <h3 class="modal-title">Delete</h3>
                <button class="close" data-dismiss="modal">
                    <span>&times</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete user</p>
            </div>
            <div class="modal-footer">
                <button id="userinfodeletelink" class="btn btn-success" >Ok</button>
                <button class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content container-fluid">
            <div class="modal-header">
                <h3 class="modal-tile">Edit</h3>
            </div>
        </div>
    </div>

</div>
@endsection