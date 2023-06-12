@extends('layouts.app')

@section('content')
<div class="container">
    <div class="right pb-2">
        <a class="" href="{{route('case')}}">
            <i class="align-middle" data-feather="file"></i> <span class="align-middle">Cases > </span>
        </a>
        <a class="" href="#">
        view
        </a>
    </div>
    <div class="row card flex-fill w-100 p-3">
        
        <h1 class="lead pb-4">{{$case -> name}}'s Case</h1>
        <div class="row">
            <div class="col-4 rightMost">
                <p class="bg-light">Registration Number:</p>
            </div>
            <div class="col-4">
                <strong class="strong text-uppercase">{{$case -> reg_num}}</strong>
            </div>
        </div> 
        <div class="row">
            <div class="col-4">
                <p class="bg-light">Department:</p>
            </div>  
            <div class="col-8">
                <strong class="strong">{{$case -> department}}</strong>
            </div>  
        </div>
        <div class="row">
            <div class="col-4">
                <p class="bg-light">Level:</p>
            </div>
            <div class="col-8">
                <strong class="strong">{{$case -> level}} Level</strong>
            </div>
        </div> 
        <div class="row">
            <div class="col-4">
                <p class="bg-light">Case subject:</p>
            </div>  
            <div class="col-8">
                <strong class="strong">{{$case -> caseDesc}}</strong>
            </div>  
        </div>
        <div class="row">
            <div class="col-4">
                <p class="bg-light">Statement:</p>
            </div>  
            <div class="col-8">
                <strong class="strong">{{$case -> statement}}</strong>
            </div>  
        </div>
        <div class="row">
            <div class="col-4">
                <p class="bg-light">Date:</p>
            </div>
            <div class="col-8">
                <strong class="strong">{{$case -> created_at}}</strong>
            </div>
        </div> 
             
            
        
                <?php
                $n=1; 
                ?>
        <h1 class="lead pt-2">Previous Cases </h1>
                @if ($message)
                    <p class="text-danger">{{ $message }}</p>
                @else
                <div class="row card flex-fill w-100">
                    <div class="col-12">
                        
                        
                        <table class="table my-0">
                            <thead>
                                <tr>
                                    
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Case subject</th>
                                </tr>
                            </thead>
            
                            

                            <tbody>
                                @foreach ($previous as $prev)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$prev -> created_at}}</td>
                                        <td>{{$prev -> caseDesc}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>          
    </div>

    @can('admin')
    <div class="container">
    <div class="row card flex-fill w-100 p-3">
        <h1 class="lead"> Admin Judgement </h1>
        @if (is_null($case->stutus))
            <form action="{{ route('casesUpdate') }}" method="post">
                @csrf              
                    <div class="card flex-fill w-100">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" id="id" value="{{$case -> id}}">
                                <label for="status">Feedback</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="cleared">Clear</option> 
                                        <option value="invite">Send invitation</option> 
                                        <option value="expel">Expel</option> 
                                        <option value="suspension">1 year suspension</option> 
                                    </select>  
                            </div>
                        </div>
                        <div class="row pt-2">
                                <div class="col-12">
                                    <label for="statement">Statement (optional)</label>
                                    <textarea type="text" id="statement" name="statement" class="form-control bg-light h-100">{{$case -> note}}</textarea>
                                </div>
                        </div>
                    </div> 
                <button type="submit" class="btn btn-danger text-sm-right btnSend">Send</button>
                </form>
                    @else
                        <p class="text-danger">Already Cleared</p>
                    @endif
    </div>     
</div>
@endcan

    @cannot('admin')
    <div class="container">
        <div class="row card flex-fill w-100 p-3">
            
                    <h1 class="lead"> Admin Judgement: <span class="text-sm badge text-success">{{$case -> status}}</span></h1>
                    
                        <div class="card flex-fill w-100">
                            <hr class="">
                            <div class="row pt-1">
                                <div class="col-12">
                                        <p class="lead">{{$case -> note}}</p>
                                </div>
                            </div>
                        </div>
        </div>     
    </div>
    @endcannot
</div>
@endsection