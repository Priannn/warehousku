@extends('templates.main')
@section('content')
@php
$pretitle = 'Halaman';
$title = 'Data Cretine';
@endphp
@push('page-action')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create Data
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Data Creatine</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('dashboard.creatine.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                    <div class="form-group mb-4">
                        <label for="merk">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk">
                    </div>
                    <div class="form-group mb-4 ms-auto">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>    
                <div class="form-group">
                    <label for="photo">Gambar Produkk</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <!-- button untuk submit add data -->
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
        </div>
      
      </div>
    </div>
  </div>
@endpush
<h1></h1>
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th class="border text-center">Photo</th>
            <th class="border text-center">Nama</th>
            <th class="border text-center">Merk</th>
            <th class="border text-center">Harga</th>
            <th class="border text-center">Action</th>
          </tr>
        </thead>
        <tbody>         
       @foreach ($creatines as $crt)
    <tr>
        <td class="border text-center">
            <img src="{{asset('storage/' . $crt->photo)}}" style="height: 200px; :auto;" alt="{{$crt->name}}">
        
        </td>
        <td class="border text-center">{{$crt->name}}</td>
        <td class="border text-center">{{$crt->merk}}</td>
        <td class="border text-center">{{$crt->harga}}</td>
        <td class="border text-center">
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-warning mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$crt->id}}">
                Edit
              </button>
           
              <div class="modal fade" id="staticBackdrop{{$crt->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Whey {{$crt->id}}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('dashboard.creatine.update', $crt->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $crt->name)}}">
                        </div>
                            <div class="form-group mb-4">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk" value="{{old('merk', $crt->merk)}}">
                            </div>
                            <div class="form-group mb-4 ms-auto">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="{{old('harga', $crt->harga)}}">
                            </div>    
                        <div class="form-group">
                            <label for="photo">Gambar Produkk</label>
                            <input type="file" class="form-control" id="photo" name="photo" value="{{old('photo', $crt->photo)}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <!-- button untuk submit add data -->
                            <button type="submit" class="btn btn-success">Edit Data</button>
                        </div>
                    </form>
                    </div>
                  
                  </div>
                </div>
              </div>
              {{-- <a href="#" class="btn btn-warning me-2">Edit</a> --}}
                <form action="{{route('dashboard.creatine.destroy', $crt->id)}}" method="post">
                 @csrf
                 @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger" onclick="confirmDelete()">
                </form>                        
            </div>
        </td>
    </tr>
    @endforeach


        </tbody>
    </table>
    </div>
</div>

@endsection
