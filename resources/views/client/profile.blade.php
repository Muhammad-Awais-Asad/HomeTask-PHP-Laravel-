@extends('layouts.app')
@section('content')
@if(!Auth::guest())
    @if(Auth::user()->user_type == "Client")
        @include('inc.clientsidebar')
    @elseif(Auth::user()->user_type == "Tasker")
        @include('inc.sidebar')
    @endif
@endif
<br><br><br>
<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-8">
            @if(session('success'))
                <br>
                <h4 class="alert alert-success text-center">{{session('success')}}</h4>
                <br>
            @elseif(session('error'))
                <br>
                <h4 class="alert alert-danger text-center">{{session('error')}}</h4>
                <br>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <h3 class="">Personal Biodata:</h3>
                </div>
                <div class="col-md-6">
                    @if(!Auth::guest())
                        @if(Auth::user()->user_type == "Client")
                            <a href="/client/{{$us->id}}/edit" class="btn btn-outline-success float-right">Edit Profile</a>
                        @endif
                    @endif
                </div>
            </div>
            <table class="table table-striped">
                <tr style="background: darkgrey;">
                    <th>Title</th>
                    <th>Information</th>
                </tr>
                <tr>
                    <td><p><strong>Name:</strong></p></td>
                    <td><p>{{auth()->user()->fname}} {{auth()->user()->lname}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Email:</strong></p></td>
                    <td><p>{{auth()->user()->email}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Address:</strong></p></td>
                    <td><p>{{$us->client_address}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Date of Birth:</strong></p></td>
                    <td><p>{{$us->client_day}}-{{$us->client_month}}-{{$us->client_year}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Ph#:</strong></p></td>
                    <td><p>+{{$us->client_ph}}</p></td>
                </tr>
            </table>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <img src="/storage/client_images/{{$us->client_photo}}" alt="Image" style="vertical-align: middle; width: 200px; height: 200px; border-radius: 100%; float: right;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <h3> {{auth()->user()->fname}} {{auth()->user()->lname}}</h3>
                    <br>
                    <a href="/client/taskdetail" class="btn btn-success text-center btn-lg float-right">Create Your Next Task</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection