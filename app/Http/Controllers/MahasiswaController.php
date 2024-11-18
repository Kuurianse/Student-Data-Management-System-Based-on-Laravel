<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        // $mahasiswas = Mahasiswa::latest()->get();
        $mahasiswas = Mahasiswa::latest()->paginate(8);

        return view('mahasiswa', compact('mahasiswas'));
    }

    public function create(){
        return view('mahasiswa.create');
    }

    // Request $request adalah cara untuk menangkap data yang dikirim dari form. 
    // $nama = $request->nama;           // dari input name="nama"
    // $email = $request->email;         // dari input name="email"
    // $request->nama akan berisi "John"
    // $request->email akan berisi "john@example.com"

    public function store(Request $request){
        // validasi
        $validatedData = $request->validate([
            'nama' => 'required|max:200',
            'nrp' => 'required|max:10|unique:mahasiswas',
            'email' => 'required|email',
            'jurusan' => 'required|max:100'
        ]);

        Mahasiswa::create($validatedData);

        return redirect()->route('index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id){
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([   
            'nama' => 'required|max:200',
            'nrp' => 'required|max:10|unique:mahasiswas,nrp,'.$id,
            'email' => 'required|email',
            'jurusan' => 'required|max:100'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validatedData);

        return redirect()->route('index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id){
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();

        return redirect()->route('index')->with('success', 'Data berhasil didelete!');
    }

    public function search(Request $request){
        $keyword = $request->keyword; 

        if($keyword){
            $mahasiswas = Mahasiswa::where('nama', 'LIKE', "%{$keyword}%")
            ->orWhere('nrp', 'LIKE', "%{$keyword}%")
            ->orWhere('email', 'LIKE', "%{$keyword}%")
            ->orWhere('jurusan', 'LIKE', "%{$keyword}%")
            ->latest()->paginate(5)
            ->appends(['keyword' => $keyword]);
            // ->get()
        }else{
            // $mahasiswas = Mahasiswa::all();
            $mahasiswas = Mahasiswa::latest()->paginate(8);
        }

        return view('mahasiswa', compact('mahasiswas'));
    }
}
