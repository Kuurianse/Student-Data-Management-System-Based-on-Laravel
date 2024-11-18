@extends('layouts.layout')

@section('title', 'Tambah Data Mahasiswa')

@section('content')

<h2>Tambah Data Mahasiswa</h2><br>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-start">

                <form action="{{ route('store') }}" method="post">
                    @csrf
                    
                    <label for="nama">Nama </label>
                    <input type="text" name="nama" id="nama" required value="{{ old('nama') }}" class="form-control mb-2">
                
                    <label for="nrp">NRP </label>
                    <input type="text" name="nrp" id="nrp" required value="{{ old('nrp') }}" class="form-control mb-2">
                
                    <label for="email">Email </label>
                    <input type="text" name="email" id="email" required value="{{ old('email') }}" class="form-control mb-2">
                
                    <label for="jurusan">Jurusan </label>
                    <input type="text" name="jurusan" id="jurusan" required value="{{ old('jurusan') }}" class="form-control mb-2">
                
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        
                </form>

            </div>
        </div>
    </div>
</div>

@endsection