@extends('main')
@section('content')
<div class="row">
    <div class="col-12">
        <h1><p>Motorbikes and owners page</p></h1>
        <div class="alert alert-success" id="sucess-motorbike" style="display: none"></div>
        <div class="alert alert-danger" id="error-motorbike" style="display: none;"></div>
        <div class="alert alert-success" id="sucess-owner" style="display: none"></div>
        <div class="alert alert-danger" id="error-owner" style="display: none;"></div>
    </div>
</div>
<div class="row">
    <div class="col-12  mb-2">
        <button class=" btn btn-primary" id="toggle-new-motorbike">New motorbike</button>         
        <button class=" btn btn-primary" id="toggle-new-owner">New owner</button>
    </div>
</div>
<div class="container bg-light mt-2 mb-2 pt-2 pb-2" style="display: none;"id="motorbike-form-container">  
    <form class =" mt-2 mb-2" id="motorbike-form" >
        <div class="row ">
            <div class="col-4 ">
                <input type="text" class="form-control" name="brand" id="brand"  placeholder="Brand" required>
                <label for="brand" name="brand"></label>
            </div>
            <div class="col-4">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" required>
                <input class="form-control" type="text" name="colour" id="colour" placeholder="Colour" required>
                <label for="colour" name="colour"></label>
            </div>
            <div class="col-4 ">
                <input class="form-control" type="text" name="model_year" id="model_year" number placeholder="Model Year" required>
                <label for="model_year" name="model_Year"></label>
            </div>
            <div class="col-12">
                <button class="btn btn-success" type="submit" id="motorbike-btn">Add a new motorbike</button>
            </div>
        </div>   
    </form>   
</div>
<div class="container bg-light mt-2 mb-2 pt-2 pb-2" style="display: none;"id="owner-form-container"> 
    <form   class="mt-2 mb-2"id="owner-form">
        <input type="hidden" name="_token" id="token-owner" value="{{ csrf_token() }}" required>
        <div class="row">
            <div class="col-4">
                <input class="form-control" type="text" name="name" id="name" placeholder="Name">
                <label for="name" name="name"></label>
            </div>
            <div class="col-4">
                <select class="form-control custom-select" name="motorbike_id" id="select-motorbike">
                    <option value="" selected disabled hidden>Motorbike </option>
                    @foreach ($motorbikes as $motorbike)
                    <option value="{{$motorbike->id}}">{{$motorbike->brand}} - {{$motorbike->colour}} - {{$motorbike->model_year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="div col-4">
                <input class="form-control" type="text" name="location" id="location" placeholder="Location" required>
                <label for="location" name="location"></label>
            </div>
            <div class="col-12">
                <button class="btn btn-success" id="owner-btn">Add a new owner</button>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-12">    
        <button class="btn btn-info" id="show-motorbikes">Our Motorbikes</button>
        <button class="btn btn-light" id="show-owners">Our Owners</button>
        <button class="btn btn-warning" id="get-closest"> Find the closest owner</button>
    </div>
</div>
<div class="row">
    <div class="col-12 ">
        <div class="alert alert-success mt-2 mb-2" id="closest-alert" style="display:none">
            <h5 id="closest-owner"></h5>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 align-content-center">
        <div class="motorbikes bg-info text-white mt-1" id="motorbikes" style="display: none">
            <table class="table col-12 text-center">
            <thead>
                <h3 class="text-center">Motorbikes</h3>
                <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Year Model</th>
                </tr>
            </thead>
            <tbody id='new-motorbike-tr'>       
                @foreach ($motorbikes as $motorbike)
                <tr>
                    <td>{{$motorbike->brand }}</td> 
                    <td>{{$motorbike->colour }}</td>
                    <td>{{$motorbike->model_year}}</td>   
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 align-content-center">
        <div class="owners bg-light mt-1" id="owners"style="display: none">
            <table class="table text-center">
            <thead>
                <h3 class="text-center">Owners</h3>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Motorbike</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody id="new-owner-tr">
                @foreach ($owners as $owner)
                <tr>
                    <td>{{$owner->name }}</th> 
                    @if(isset($owner->motorbikes->brand))
                    <td>{{$owner->motorbikes->brand}} - {{$owner->motorbikes->colour}} - {{$owner->motorbikes->model_year}}</td>
                    @endif
                    <td>{{$owner->location}}</td>   
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('scripts.add_motorbike')
@include('scripts.add_owner')
@include('scripts.get_closest')
@include('scripts.toggle_content')
@endsection
