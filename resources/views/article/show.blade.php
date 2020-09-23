@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{$article->title}}'s page</h1>
                    <a href="{{ route('author.Portal') }}" type="submit" style="margin: 0px 0px 0px 1350px" class="btn btn-info">Articles Page</a>
                </div>

                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{route('author.update',['id'=>$article->id])}}" method="post">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Title:</label>
                                <input type="" name="title" id="title" class="form-control" required value="{{$article->title}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="family">Category:</label>
                                <input type="text" name="category" id="category" class="form-control" required
                                       value="{{$article->category}}">
                                @error('family')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Body:</label>
                                <textarea type="text" name="body" id="body" class="form-control" required>{{$article->body}}</textarea>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$article->id}}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

