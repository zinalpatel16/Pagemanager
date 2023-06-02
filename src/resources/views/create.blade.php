@extends('pagesmanager::master')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            Pages
            <a href="{{url('pages')}}" class="float-right" ><button class="btn btn-primary btn-sm">Go To List</button></a>
        </div>
        <div class="card-body">
            <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data">
                @include('pagesmanager::partial')
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection