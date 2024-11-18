<!-- resources/views/index.blade.php -->
@extends('layouts.layout')

@section('title', 'Data Mahasiswa')

@section('content')

    <h1>Data Mahasiswa</h1>

    <!-- Table -->
    <table class="table table-bordered mt-5">
        <thead class="table-secondary">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0 @endphp
            @forelse ($mahasiswas as $mhs)
                <tr class="align-middle">
                    <td>{{ ++$i }}</td>
                    <td><img src="/img/img2.png" width="50"></td>
                    <td>
                        <a href="{{ route('edit', $mhs->id) }}" class="btn btn-outline-success">Ubah</a>
                        <form action="{{ route('destroy', $mhs->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Konfirmasi Hapus')" class="btn btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->nrp }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->jurusan }}</td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">No Data ...</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="justify-content-center mt-4">
        {{ $mahasiswas->links('pagination::bootstrap-5') }}
    </div>
@endsection
