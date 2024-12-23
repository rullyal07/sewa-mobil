@extends('back-end.master')
@section('sidebar')
    @include('back-end.sidebar')
@endsection
@section('navbar')
    @include('back-end.navbar')
@endsection
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="row mb-4">
                    <div class="col-auto me-auto mt-2 h3">Product</div>
                    <div class="col-auto">
                    </div>
                </div>
                <form action="{{route('clothes.store')}}" method="POST" id="formclothes" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Type</label>
                        <input class="form-control" name="jenis" id="jenis"
                        type="text" aria-label="default input example"
                        value="@isset($jenis){{$jenis}}@endisset" placeholder="insert the type">
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Model</label>
                        <input class="form-control" name="model" id="model"
                        type="text" aria-label="default input example"
                        value="@isset($model){{$model}}@endisset" placeholder="insert the model">
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Colour</label>
                        <input class="form-control" name="warna" id="warna"
                        type="text" aria-label="default input example"
                        value="@isset($warna){{$warna}}@endisset" placeholder="insert the colour">
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Size</label>
                        <select class="form-select" id="ukuran" name="ukuran" aria-label="default input example">
                            <option selected>select the size</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                            <option value="4XL">4XL</option>
                            <option value="5XL">5XL</option>
                            <option value='6XL'>6XL</option>
                            <option value="All size">All size</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Material</label>
                        <input class="form-control text-start" name="bahan" id="bahan" maxlength="30"
                        type="text" aria-label="default input example"
                        value="@isset($bahan){{$bahan}}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Description</label>
                        <textarea class="form-control" id="Deskripsi" name="Deskripsi" placeholder="enter a description" rows="7"></textarea>

                    </div>
                    <div class="mb-3">
                        <label for="foto1" class="form-label">1<sup>st</sup> Image</label>
                        <input class="form-control" id="foto1" name="foto1" type=file >
                    </div>
                    <div class="mb-3">
                        <label for="foto2" class="form-label">2<sup>nd</sup> Image</label>
                        <input class="form-control" id="foto2" name="foto2" type=file >
                    </div>
                    <div class="mb-3">
                        <label for="foto3" class="form-label">3<sup>rd</sup> Image</label>
                        <input class="form-control" id="foto3" name="foto3" type=file >
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Stock</label>
                        <input class="form-control" name="stok" id="stok"
                        type="text" aria-label="default input example"
                        value="@isset($stok){{$stok}}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="clothes" class="form-label">Price</label>
                        <input class="form-control" name="harga_sewa" id="stok"
                        type="text" aria-label="default input example"
                        value="@isset($harga_sewa){{$harga_sewa}}@endisset">
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" id="sv">Save</button>
                        <a href="{{route('clothes.index')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

            <div id="pesan" class="invisible">
                @isset($pesan)
                    {{$pesan}}
                @endisset
            </div>

<script>
    const btnSave = document.getElementById('sv')
    const form = document.getElementById('formclothes')
    const jenis = document.getElementById('jenis')
    const warna = document.getElementById('warna')
    const ukuran = document.getElementById('ukuran')
    const bahan = document.getElementById('bahan')
    const Deskripsi = document.getElementById('Deskripsi')
    const stok = document.getElementById('stok')
    const harga_sewa = document.getElementById('harga_sewa')
    const pesan = document.getElementById('pesan')
    const body = document.getElementById('body')
    const payment = document.getElementById('clothes')

    function simpan(){
        if(jenis.value === ''){
            jenis.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(model.value === ''){
            model.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(warna.value === ''){
            warna.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(bahan.value === ''){
            bahan.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(Deskripsi.value === ''){
            Deskripsi.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(model.value === ''){
            model.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(ukuran.value === 'select the size'){
            ukuran.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else if(stok.value === ''){
            stok.focus()
            swal("Maaf", "lengkapi datanya terlebih dulu", "error")
        }else{
            form.submit()
        }
    }
    function tampil_pesan(){
        if(pesan.innerHTML.trim() !== ''){
            swal('Data Duplication', pesan.innerHTML, 'error')
        }
    }

    btnSave.onclick = function(){
        simpan()
    }
    body.onload = function(){
        tampil_pesan()
    }
</script>
@endsection
