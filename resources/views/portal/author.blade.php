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
            @csrf
            <div id="table_container">
            @include('portal.table')

            </div>

        </div>
    </div>
</div>


@endsection


