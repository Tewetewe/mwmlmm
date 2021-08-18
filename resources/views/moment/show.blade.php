@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid mb-3">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Memories</h1>
                {{-- <a href="#" data-toggle="modal" data-target="#asetModal" class="btn btn-success">+ Tambah Aset</a> --}}
            </div>

            <!-- DataTales Example -->
            <div class="row mb-3">
                <div class="col-xl-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Memory Detail</h6>
                        </div>
                        <div class="card-body mt-2">
                           <b>Judul :</b> {{$moment->judul}} <br>
                           <b>Link Youtube : </b> <a href="{{$moment->link_youtube}}">{{$moment->link_youtube}}</a><br>
                           @if(isset($moment->subkategori->kategori['kategori']))
                           <b>Kategori : </b> {{$moment->subkategori->kategori['kategori']}} <br>
                           @else
                           <b>Kategori : </b> NULL <br>
                           @endif

                           @if(isset($moment->subkategori['sub_kategori']))
                           <b>Sub Kategori : </b> {{$moment->subkategori['sub_kategori']}} <br>
                           @else
                           <b>Sub Kategori : </b> NULL <br>
                           @endif
                           
                           @if(isset($moment->tipe['tipe']))
                           <b>Tipe : </b> {{$moment->tipe['tipe']}} <br>
                           @else
                           <b>Tipe : </b> NULL <br>
                           @endif
                           
                           @if(isset($moment->status['status']))
                           <b>Status : </b> {{$moment->status['status']}} <br>
                           @else
                           <b>Status : </b> NULL <br>
                           @endif
                           
                           <b>Kode Urut : </b> {{$moment->kode_urut}} <br>
                           <b>Due Date 1 : </b> {{$moment->due_date_1}} <br>
                           <b>Due Date 2: </b> {{$moment->due_date_2}} <br>
                           <b>Terakhir Update : </b> {{$moment->updated_at}} <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
                        </div>
                        <div class="card-body" style="align-content: center">
                            @if($moment->gambar != NULL)
                            <img src="{{$moment->gambar}}" style="height:200px; width:200px"/>
                            @else
                            <img src="/images/default.jpg" style="height:200px; width:200px"/>
                            @endif                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-xl-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                        </div>
                        <div class="card-body mt-2">
                            <p style="text-align: justify">{{$moment->deskripsi}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
           


        </div>

        
        <div class="modal fade" id="asetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>



</section>
@endsection

