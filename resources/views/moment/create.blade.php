@extends('layouts.app')
@section('content')
<section>
   <!-- Page Heading -->
        

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Memory</h1>
            </div>


            <div class="row">
                <div class="col-md-8" style="margin: auto">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Memory</h6>
                            </div>
                            <div class="card-body">
                              <form action="{{route('moment.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6 mb-2" {{ ($errors->has('roll'))?'has-error':'' }} >
                                  <label class="form-label">Kategori</label>
                                  <select required class="js-example-basic-single"  id="kategori"  name="kategori_id" style="width:100%; height: 100%">
                                    <option value="" selected disabled hidden>--Pilih Kategori--</option>
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{$kategori->id}}">{{ucfirst($kategori->kategori)}}</option>      
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-6 mb-2" {{ ($errors->has('name'))?'has-error':'' }}>
                                  <label class="form-label">Sub Kategori</label>
                                  <select required class="js-example-basic-single" id="subkategori" name="sub_kategori_id" style="width:100%; height: 100%">
                                </select>
                                </div>
                                <div class="col-12 mb-2">
                                  <label for="inputAddress" class="form-label">Judul</label>
                                  <input required type="text" name="judul" class="form-control" id="inputAddress" placeholder="Masukkan Judul">
                                </div>

                                <div class="col-12 mb-2">
                                  <label for="inputAddress" class="form-label">Link Youtube</label>
                                  <input type="text" class="form-control" name="link_youtube" id="inputAddress" placeholder="Masukkan Link Youtube">
                                </div>

                                <div class="col-md-4 mb-2">
                                  <label class="form-label">Kode Urut</label>
                                  <input required type="number" name="kode_urut" class="form-control" name="kode_urut" placeholder="Masukkan Kode Urut">
                                </div>
                                <div class="col-md-4 mb-2">
                                  <label class="form-label">Tipe</label>
                                  <select required class="js-example-basic-single" name="tipe_id" style="width:100%; height: 100%">
                                    <option value="" selected disabled hidden>--Pilih Tipe--</option>
                                    @foreach ($tipes as $tipe)
                                    <option value="{{$tipe->id}}">{{ucfirst($tipe->tipe)}}</option>      
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                  <label class="form-label">Status</label>
                                  <select required class="js-example-basic-single" name="status_id" style="width:100%; height: 100%">
                                    <option value="" selected disabled hidden>--Pilih Status--</option>
                                    @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{ucfirst($status->status)}}</option>      
                                    @endforeach
                                </select>
                                </div>
                                
                                <div class="col-md-6 mb-2">
                                  <label for="inputAddress" class="form-label">Due Date I</label>
                                  <input required type="date" name="due_date_1" class="form-control">
                                </div>

                                <div class="col-md-6 mb-2">
                                  <label for="inputAddress" class="form-label">Due Date II</label>
                                  <input required type="date" name="due_date_2" class="form-control">
                                </div>
                                <div class="col-12 mb-2">
                                  <label for="inputAddress" class="form-label">Gambar</label>
                                  <input type="file" name="gambar" class="form-control" aria-label="Upload" accept="image/*;capture=camera">
                                </div>


                                <div class="col-12 mb-2">
                                  <label for="inputAddress" class="form-label">Deskripsi</label>
                                  <textarea required class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>

                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                                
                            </div>
                        </div>
                </div>
            </div>
                    
        </div>
   


</section>
@endsection

@push('js')
  <script type="text/javascript">
    $(document).ready(function() {
                    $('#kategori').on('change', function() {
                        var kategoriID = $(this).val();
                        if(kategoriID) {
                            $.ajax({
                                url: '/findSubKategori/'+kategoriID,
                                type: "GET",
                                data : {"_token":"{{ csrf_token() }}"},
                                dataType: "json",
                                success:function(data) {
                                    //console.log(data);
                                if(data){
                                    $('#subkategori').empty();
                                    $('#subkategori').focus;
                                    $('#subkategori').append('<option value="">-- Pilih Sub Kategori --</option>'); 
                                    $.each(data, function(key, value){
                                    $('select[name="sub_kategori_id"]').append('<option value="'+ value.id +'">' + value.sub_kategori+ '</option>');
                                });
                            }else{
                                $('#subkategori').empty();
                            }
                            }
                            });
                        }else{
                        $('#subkategori').empty();
                        }
                    });
                
                });
  </script>
@endpush

