@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Memories</h1>
                <a href="{{route('moment.create')}}" class="btn btn-success">+ Tambah Data</a>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Memories</h6>
                </div>

                

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-orderable="false">No.</th>
                                    <th>Judul & Link</th>
                                    <th>Kategori Dll</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th data-orderable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($moments as $moment)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td style="word-wrap: break-word;min-width: 130px;max-width: 130px;">
                                        {{$moment->judul}} <br> <br> <br>
                                        Link Youtube: <a href="{{$moment->link_youtube}}">{{$moment->link_youtube}}</a>
    
                                    </td>
                                    <td style="word-wrap: break-word;min-width: 10px;max-width: 10px;">
                                        
                                        Kode Urut: {{$moment->kode_urut}}<br>


                                        @if($moment->subkategori->kategori['kategori'])
                                        Kategori : {{$moment->subkategori->kategori['kategori']}} <br>
                                        @else
                                        Kategori : NULL <br>
                                        @endif
    
                                        @if($moment->subkategori['sub_kategori'])
                                        Subkategori : {{$moment->subkategori['sub_kategori']}} <br>
                                        @else
                                        Subkategori : NULL <br>
                                        @endif

    
                                        @if($moment->tipe['tipe'])
                                        Tipe : {{$moment->tipe['tipe']}} <br>
                                        @else
                                        Tipe : NULL <br>
                                        @endif
    
                                        @if($moment->status['status'])
                                        Status : {{$moment->status['status']}} <br>
                                        @else
                                        Status : NULL <br>
                                        @endif
                                        
                                        Tanggal Due: <br>{{$moment->due_date_1}} - {{$moment->due_date_2}} <br>

                                        Terakhir Update : <br>{{$moment->updated_at}}

                                    </td>
                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 200px; text-align: justify">{{$moment->deskripsi}}</td>
                                    <td style="word-wrap: break-word;min-width: 200px;max-width: 200px; text-align: center">
                                        @if($moment->gambar != NULL)
                                        <img src="{{$moment->gambar}}" style="height:200px; width:200px"/>
                                        @else
                                        <img src="/images/default.jpg" style="height:200px; width:200px"/>
                                        @endif
                                    </td>
                                    <td style="word-wrap: break-word;min-width: 10px;max-width: 10px; text-align: justify">
                                        <div class="row">
                                            <form action="{{route('moment.edit', $moment->id)}}" method="GET">
                                                <button type="submit" class="btn btn-info mr-2">
                                                    Edit
                                                </button>
                                            </form>   
                                            <form action="{{route('moment.destroy', $moment->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mr-2">
                                                    Delete
                                                </button>
                                            </form>
                                            <form action="{{route('moment.show', $moment->id)}}" method="GET">
                                                <button type="submit" class="btn btn-primary mr-2">
                                                    Detail
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
       
    




</section>
@endsection
