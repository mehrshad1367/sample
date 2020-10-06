@extends('master')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary btn-user m-2" style="align-items: center" data-toggle="modal" data-target="#NewPost">
                {{__('msg.Make A New Post Here...')}}
            </button>

            <section class="content">
                <img src="{{asset('portal/dist/img/credit/author.jpg')}}" class="img-lg" style="width: 55%;height: auto ;margin-right: 270px; " alt="Cinque Terre">

            </section>
            <div class="col-3">
            <select name="" id="btn-group-article" class="form-control input-sm">
                <option value="city">City</option>
                <option value="status">Status</option>
            </select>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>category</th>
                    <th>body</th>
                    <th colspan="2">Operation</th>
                </tr>
                </thead>
            <tbody>@if(!empty($articles))
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{$article->title}}</td>
                    @if(__('msg.Fa') == 'فارسی')

                    <td> <?php convertEnToFa($article->category); ?> </td>
                    <td> <?php convertEnToFa($article->body); ?></td>
                    @else
                        <td> {{ $article->category }} </td>
                        <td> {{ $article->body }}</td>
                    @endif
                    <td><a class = "btn btn-primary" style="cursor: pointer ; color: white" href="{{ url('author/edit',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Edit</a>
                    @if($article->status != 1)
                        <a class = "btn btn-success" style="cursor: pointer ; color: white" href="{{ url('author/confirm',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Confirm</a>
                        @else
                    <a class = "btn btn-success" style="cursor: pointer ; color: white" href="{{ url('author/confirm',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Reject</a>
                    @endif
                    <a class = "btn btn-danger" style="cursor: pointer ; color: white" href="{{ url('author/delete',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_delete">Delete</a></td>

                </tr>
            @endforeach
            @endif
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
