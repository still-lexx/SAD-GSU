@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h3">Record A New Case</h1>

    <div class="card flex-fill w-100 p-4">
        <form action="{{route('cases.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 pb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control bg-light">
                        </div>
                        <div class="col-sm-6 pb-3">
                            <label for="Registration" >Registration Number</label>
                            <input type="text" name="reg" class="form-control bg-light">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 pb-3">
                            <label for="department" >Department</label>
                            <select type="text" name="dept" class="form-control bg-light">
                                <option value="Mathematics">Mathematics</option>
                                <option value="Computer Science">Computer science</option>
                                <option value="English Language">English Language</option>
                                <option value="History">History</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Biology">Biology</option>
                                <option value="Geography">Geography</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="level" >Level</label>
                            <select type="select" name="level" class="form-control bg-light">
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                                <option value="500">500</option>
                                <option value="600">600</option>
                                <option value="Remedial">Remedial</option>
                                <option value="Diploma">Diploma</option>
                            </select>
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="desc" >Case Description</label>
                            <input type="text" name="description" class="form-control bg-light">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="statement">Statement</label>
                            <textarea type="text" name="statement" class="form-control bg-light h-100" required></textarea>
                        </div>
                    </div>

                    <div class="row pt-4 text-right">
                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                    </div>
                </form>
    </div>
        
</div>
@endsection