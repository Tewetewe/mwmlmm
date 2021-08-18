@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Sub Kategori</h1>
            </div>


            <div class="row">
                <div class="col-md-8" style="margin: auto">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Sub Kategori</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{route('subkategori.update', $subkategori->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                      <div class="form-group">
                                        <label for="formGroupExampleInput2">Nama Sub Kategori</label>
                                        <input required type="text" name="sub_kategori" class="form-control" id="formGroupExampleInput2" placeholder="Sub Kategori" value="{{$subkategori->sub_kategori}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kategori (Pilih Kategori)</label>
                                        <select required class="js-example-basic-single" name="kategori_id" required value="{{$subkategori->kategori_id}}">
                                            @foreach ($kategoris as $kategori)
                                                @if($kategori->id == $subkategori->kategori_id)
                                                    <option selected value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                                @else
                                                    <option value="{{$kategori->id}}">{{ucfirst($kategori->kategori)}}</option>
                                                @endif    
                                            @endforeach
                                        </select>
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
