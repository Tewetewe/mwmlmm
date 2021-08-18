@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
                <a href="#" data-toggle="modal" data-target="#kategoriModal" class="btn btn-success">+ Tambah Data</a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-orderable="false">No.</th>
                                    <th>Nama</th>
                                    <th>Terakhir Update</th>
                                    <th data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                     
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kategori->kategori}}</td>
                                    <td>{{$kategori->updated_at}}</td>
                                    <td>
                                        <div class="row">
                                            <form action="{{route('kategori.edit', $kategori->id)}}" method="GET">
                                                <button type="submit" class="btn btn-info mr-2">
                                                    Edit
                                                </button>
                                            </form>   
                                            <form action="{{route('kategori.destroy', $kategori->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                  
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('kategori.store')}}"  method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Baru</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Nama Kategori</label>
                              <input required type="text" name="kategori" class="form-control" id="formGroupExampleInput2" placeholder="Nama Kategori">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Simpan</a>
                    </div>
                </form>
            </div>
        </div>
    </div>



</section>
@endsection
