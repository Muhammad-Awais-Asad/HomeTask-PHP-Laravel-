@extends('layouts.app')
@section('content')
@include('inc.sidebar')
<br><br><br>
<div class="container">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="">Personal Biodata:</h3>
                </div>
                <div class="col-md-6">
                    @if(!Auth::guest())
                        @if(Auth::user()->user_type == "Tasker")
                            <a href="/tasker/{{$users->id}}/edit" class="btn btn-outline-success float-right">Edit Profile</a>
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
                    <td><p><strong>Email:</strong></p></td>
                    <td><p>{{auth()->user()->email}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Address:</strong></p></td>
                    <td><p>{{$users->user_street}} {{$users->user_tehseel}} {{$users->user_city}} {{$users->user_district}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Date of Birth:</strong></p></td>
                    <td><p>{{$users->user_date}}-{{$users->user_month}}-{{$users->user_year}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Vehicle Type:</strong></p></td>
                    <td><p>{{$users->user_vehicle}}</p></td>
                </tr>
                <tr>
                    <td><p><strong>Ph#:</strong></p></td>
                    <td><p>+{{$users->user_phno}}</p></td>
                </tr>
            </table>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <img src="/storage/cover_images/{{$users->user_photo}}" alt="Image" style="vertical-align: middle; width: 200px; height: 200px; border-radius: 100%; float: right;">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <h3 > {{auth()->user()->fname}} {{auth()->user()->lname}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection