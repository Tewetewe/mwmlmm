@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>
            </div>


            <div class="row">
                <div class="col-md-8" style="margin: auto">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                      <div class="form-group">
                                        <label for="formGroupExampleInput2">Nama Kategori</label>
                                        <input required type="text" name="kategori" class="form-control" id="formGroupExampleInput2" placeholder="Nama Kategori" value="{{$kategori->kategori}}">
                                      </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                                
                            </div>
                        </div>
                </div>
            </div>
                    
        </div>



</section>
@endsection
