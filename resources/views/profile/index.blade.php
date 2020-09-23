@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="h3 mb-0 text-gray-800 text-capitalize">{{__('msg.Welcome')}} {{$user->name}}</h1>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{__('msg.Edit Profile')}}<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="p-1 font-weight-light"><a href="{{url('profile/edit',['id'=> $user->id])}}">{{__('msg.Change your Info')}}</a></li>
                            <li class="p-1 font-weight-light"><a href="#" data-toggle="modal" data-target="#changePass">{{__('msg.Change your Password')}}</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.container-message -->

            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Default Card Example -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    {{__('msg.name')}}
                                </h6>
                            </div>
                            <div class="card-body text-capitalize" >
                                {{__('msg.Role')}}: {{ $user->role->title }} <br>
                                {{__('msg.name')}}: {{$user->name}}<br>
                                {{__('msg.Email')}}: {{$user->email}}
                            </div>
                        </div>

                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{__("msg.Contact Info")}}</h6>
                            </div>
                            <div class="card-body text-capitalize">
                                {{__("msg.Email")}}: {{$user->email}}<br>
                                {{__('msg.MobilePhone')}}: #####<br>
                                {{__('msg.office Phone')}}: #####<br>
                            </div>
                        </div>

                        <!-- Collapsable Card Example -->
                        <div class="card shadow mb-4 ">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">{{__('msg.Task calender')}}</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card card-body">
                                    <form method="post" action="#" id="Events">
                                        @csrf
                                        <input type="datetime-local" name="date" required>
                                        <input type="text" id="title" name="title" required>
                                        <label for="event">{{__('msg.Event')}}</label>
                                    </form>
                                    <textarea rows="4" cols="50" name="comment" form="Events" placeholder="{{__('msg.Description')}}"></textarea>
{{--                                    <input class="w-25 btn btn-primary p-2 m-2" type="submit" form="Events" required>--}}
                                    <button class="w-25 btn btn-primary p-2 m-2" type="submit">{{__('msg.Submit')}}</button>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card shadow mb-4 col-lg-3" style="height: 368px">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">{{__('msg.Profile Photo')}}</h6>
                            <div class="dropdown no-arrow ml-5">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">{{__("msg.Photo Setting")}}:</div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changeImg">{{__('msg.Change your photo')}}</a>
                                    <a class="dropdown-item" href="#">{{__('msg.Delete')}}</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <img src="<?php $url= Storage::url(Auth::user()->avatar); echo asset("$url")?>" alt="profil image" class="rounded mx-auto d-block" style="width: 200px; height: 266px">
                            {{--                                    <img src="<?php $url = Storage::url(\Illuminate\Support\Facades\Auth::user()->img); echo asset("$url")?>" class="rounded mx-auto d-block" style="width: 200px; height: 266px">--}}
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


                {{--   Modal Avatar   --}}
                <div class="modal fade" id="changeImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__("msg.Choose your Photo")}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" action="{{url('/profile/avatar',['id'=>Auth::user()->id])}}" class="uploader" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputProfileImg" name="avatar">
                                        <label class="custom-file-label" for="#inputProfileImg">{{__('msg.Choose file')}}</label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('msg.Cancel')}}</button>
                                    <button class="btn btn-primary" type="submit">{{__('msg.Submit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{--   Modal Password   --}}
                <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('msg.Change your Password')}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="post" action="{{ url('/profile/editPass',['id'=>Auth::user()->id])}}" class="uploader" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3 ">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">

                                    <input id="password-confirm" type="password" placeholder="Re-Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 m-2">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__("msg.Cancel")}}</button>
                                    <button class="btn btn-primary" type="submit">{{__("msg.Submit")}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div></section>
    </div>
@endsection
