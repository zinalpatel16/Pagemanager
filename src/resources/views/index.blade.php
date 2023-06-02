@extends('pagesmanager::master')
@section('content')
    <br>
    <div class="card">
        <div class="card-header">
            Pages
            <a href="{{url('pages/create')}}" class="float-right" ><button class="btn btn-primary btn-sm">Create</button></a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $key => $page)
                    <tr>
                        <td scope="row">{{$key+1}}</td>
                        <td><img src="{{ asset('storage').'/'.$page->cover }}" alt="{{$page->title}}" width="150px" class="thumbnail"></td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->slug}}</td>
                        <td>{{$page->created_at}}</td>
                        <td>
                            <a href="{{url('pages/'.$page->id.'/edit')}}">
                                <button class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <button class="btn btn-sm btn-danger delete" data-id="{{$page->id}}">Delete</button>
                            <form id="delete-{{$page->id}}" action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
