@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Sub Kategori</h1>
                <a href="#" data-toggle="modal" data-target="#kategoriModal" class="btn btn-success">+ Tambah Data</a>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Sub Kategori</h6>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-orderable="false">No.</th>
                                    <th>Sub Kategori</th>
                                    <th>Kategori</th>
                                    <th>Terakhir Update</th>
                                    <th data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                     
                            <tbody>
                                @foreach ($subkategoris as $subkategori)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subkategori->sub_kategori}}</td>
                                    @if(isset($subkategori->kategori['kategori']))
                                    <td>{{$subkategori->kategori['kategori']}}</td>
                                    @else
                                    <td>NULL</td>
                                    @endif
                                    <td>{{$subkategori->updated_at}}</td>
                                    <td>
                                        <div class="row">
                                            <form action="{{route('subkategori.edit', $subkategori->id)}}" method="GET">
                                                <button type="submit" class="btn btn-info mr-2">
                                                    Edit
                                                </button>
                                            </form>   
                                            <form action="{{route('subkategori.destroy', $subkategori->id)}}" method="POST">
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
                <form action="{{route('subkategori.store')}}"  method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sub Kategori Baru</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="form-group">
                            <select required class="js-example-basic-single" name="kategori_id" style="width:100%; height: 100%">
                                <option value="" selected disabled hidden>--Pilih Kategori--</option>
                                @foreach ($kategoris as $kategori)
                                <option value="{{$kategori->id}}">{{ucfirst($kategori->kategori)}}</option>      
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                              <label for="formGroupExampleInput2">Sub Kategori</label>
                              <input required type="text" name="sub_kategori" class="form-control" id="formGroupExampleInput2" placeholder="Sub Kategori">
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
