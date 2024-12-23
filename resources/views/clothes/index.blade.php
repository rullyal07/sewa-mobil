@extends('back-end.master')
@section('sidebar')
    @include('back-end.sidebar')
@endsection
@section('navbar')
    @include('back-end.navbar')
@endsection
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row mb-5">
                        <div class="col-auto me-auto mb-4 mt-2 h3">Product's lists</div>
                        <div class="col-auto">
                            <a href="{{route('clothes.create')}}" class="btn btn-primary m-2 justify-content-end"><i class="far fa-credit-card me-2"></i>Add product</a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Colour</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Material</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">1<sup>st</sup> Image</th>
                                    <th scope="col">2<sup>nd</sup> Image</th>
                                    <th scope="col">3<sup>rd</sup> Image</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Prices</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $no => $data )
                                <tr>
                                    <th scope="row">{{$no + 1 . "."}}</th>
                                    <td>{{$data['jenis']}}</td>
                                    <td>{{$data['model']}}</td>
                                    <td>{{$data['warna']}}</td>
                                    <td>{{$data['ukuran']}}</td>
                                    <td>{{$data['bahan']}}</td>
                                    <td>{{$data['Deskripsi']}}</td>
                                    <td><img src="{{asset('storage/' . $data['foto1'])}}" alt="image1" style="width: 100px; height: auto"></td>
                                    <td><img src="{{asset('storage/' . $data['foto2'])}}" alt="image2" style="width: 100px; height: auto"></td>
                                    <td><img src="{{asset('storage/' . $data['foto3'])}}" alt="image3" style="width: 100px; height: auto"></td>
                                    <td>{{$data['stok']}}</td>
                                    <td>{{$data['harga_sewa']}}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{route('clothes.edit', $data)}}" class="btn btn-warning">Edit</a>
                                            <a href="{{route('clothes.destroy', $data)}}" class="btn btn-danger" onclick="hapus(event, this)">Delete</a>
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
    </div>
    <!-- Table End -->
<form action="" method="POST" id="frmhapus">
    @method('delete')
    @csrf
</form>

{{-- <div id="status" class="invisible">@isset($status) {{$status}} @endisset</div> --}}
<div id="pesan" class="invisible">@isset($pesan) {{$pesan}} @endisset</div>

    <script>
        const body = document.getElementById('body')
        const status = document.getElementById('status')
        const pesan = document.getElementById('pesan')
        const form = document.getElementById('frmhapus')

        function tampil_pesan(){
            if(pesan.innerHTML.trim() !== ''){
                swal('Mantap', pesan.innerHTML, 'success')
            }
        }

        function hapus(event, el){
            event.preventDefault()
            swal({
  title: "Yakin?",
  text: "Data tidak akan kembali jika terhapus",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Ya, hapus!",
  cancelButtonText: "Batal",
  closeOnConfirm: false
},
function(){
    form.setAttribute('action', el.getAttribute('href'))
    form.submit()
  swal("Terhapus", "Produk Berhasil dihapus", "success");
});
};


        body.onload = function(){
            tampil_pesan()
        }
    </script>
@endsection
