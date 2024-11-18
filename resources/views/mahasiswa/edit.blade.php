@extends('layouts.layout')

@section('title', 'Update Data Mahasiswa')

@section('content')

<h2>Update Data Mahasiswa</h2><br>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-start">

                <form action="{{ route('update', $mahasiswa->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <label for="nama">Nama </label>
                    <input type="text" name="nama" id="nama" required value="{{ $mahasiswa->nama }}" class="form-control mb-2">
                
                    <label for="nrp">NRP </label>
                    <input type="text" name="nrp" id="nrp" required value="{{ $mahasiswa->nrp }}" class="form-control mb-2">
                
                    <label for="email">Email </label>
                    <input type="text" name="email" id="email" required value="{{ $mahasiswa->email }}" class="form-control mb-2">
                
                    <label for="jurusan">Jurusan </label>
                    <input type="text" name="jurusan" id="jurusan" required value="{{ $mahasiswa->jurusan }}" class="form-control mb-3">
                
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection