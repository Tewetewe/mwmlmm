@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
            </div>


            <div class="row">
                <div class="col-md-6" style="margin: auto">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                            </div>
                            @if (session('errorProfile'))
                                <div class="alert alert-danger">
                                    {{ session('errorProfile') }}
                                </div>
                            @endif
                                @if (session('successProfile'))
                                    <div class="alert alert-success">
                                        {{ session('successProfile') }}
                                    </div>
                                @endif
                            <div class="card-body">
                                <form action="{{route('changeProfile')}}" method="POST">
                                    @method('PUT')
                                    @csrf
                                      <div class="form-group">
                                        <label for="formGroupExampleInput2">Nama</label>
                                        <input required type="text" name="name" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Nama" value="{{$user->name}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="formGroupExampleInput2">Username</label>
                                        <input required type="text" name="username" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Username" value="{{$user->username}}">
                                      </div>
                                    
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                                <hr>
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="current-password" class="col-md-4 control-label">Current Password</label>
                                        <div class="col-md-12">
                                            <input required id="current-password" type="password" class="form-control" name="current-password" required>
                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">New Password</label>
            
                                        <div class="col-md-12">
                                            <input required id="new-password" type="password" class="form-control" name="new-password" required>
            
                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                                        <div class="col-md-12">
                                            <input required id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group">
                                        <div class="col-md-12 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                </div>
            </div>
                    
        </div>
   


</section>
@endsection

