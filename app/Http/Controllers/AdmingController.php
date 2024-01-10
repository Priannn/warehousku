<?php

namespace App\Http\Controllers;

use App\Models\Gainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdmingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gainers = Gainer::all();
        return view('dashboard.gainer', compact('gainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'merk' => 'required|string|max:20',
            'harga' => 'required|string|max:2000000000000',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $photo = null;
        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('photos');
        }
        $gainer = new Gainer();
        $gainer->name = $request->name;
        $gainer->merk = $request->merk;
        $gainer->harga = $request->harga;
        $gainer->photo = $photo;

        $gainer->save();

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.gainer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gainer $gainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gainer $gainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'merk' => ['required'],
            'harga' => ['required'],
            'photo' => ['image'],
        ]);

       $gainer = Gainer::find($id);
        $photo = $gainer->photo;
        if($request->hasFile('photo')){
            if($photo != null){
                if(Storage::exists($photo)){
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photos');
        }

        $gainer->name = $request->name;
        $gainer->merk = $request->merk;
        $gainer->harga = $request->harga;
        $gainer->photo = $photo;
        $gainer->save();
        session()->flash('info','data berhasil di perbaruhi');
        return redirect()->route('dashboard.gainer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gainers = Gainer::find($id);
        if($gainers){
            $gainers->delete();
            session()->flash('danger', 'data berhasil di hapus');
        } else {
            session()->flash('danger', 'data tidak ditemukan');
        }
        return redirect()->route('dashboard.gainer');
    }
}
