@extends('Layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <section style="background-color: #eee;">
                    <div class="container py-2">
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">

                                    <div class="card-body text-center">
                                        <img src="{{ asset('image/no-pic.png') ?? asset('images/default-avatar.png') }}" alt="avatar" class="rounded-circle bg-dark img-fluid" style="width: 150px;">

                                        <h5 class="my-3">{{ $user->firstName ?? 'No Name' }}</h5>
                                        <p class="text-muted mb-1">{{ $user->email ?? 'No Email' }}</p> 

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">User Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{ $user->firstName ?? 'No Name' }} {{$user->lastName ?? 'No Name'}}</p>  
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                             <p class="text-muted mb-0">{{ $user->email ?? 'No Email'}}</p>  
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Phone number</p>
                                            </div>
                                            <div class="col-sm-9">
                                             <p class="text-muted mb-0">{{ $user->phone ?? 'Not Provided' }}</p>  
                                            </div>
                                        </div>
                                        
                                       {{--  <hr>
                                        
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-success" data-toggle="modal" data-target="#proInfoModal"><i class="fa fa-edit"></i> Edit Profile Info</a>
                                            </div>
                                            <div class="col-sm-9"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection