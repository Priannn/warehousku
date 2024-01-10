<?php

namespace App\Http\Controllers;

use App\Models\Creatine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdmincController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creatines = Creatine::all();
        return view('dashboard.creatine', compact('creatines'));
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
            'name' => 'required|string|max:200',
            'merk' => 'required|string|max:20|',
            'harga' => 'required|string|max:200000000000|',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $photo = null;
        if($request->hasFile('photo')){
            $photo = $request->file('photo')->store('photos');
        }

        $creatine = new Creatine();
        $creatine->name = $request->name;
        $creatine->merk = $request->merk;
        $creatine->harga = $request->harga;
        $creatine->photo = $photo;

        $creatine->save();

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('dashboard.creatine');

    }

    /**
     * Display the specified resource.
     */
    public function show(Creatine $creatine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Creatine $creatine)
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

       $creatine = Creatine::find($id);
        $photo =$creatine->photo;
        if($request->hasFile('photo')){
            if($photo != null){
                if(Storage::exists($photo)){
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photos');
        }

       $creatine->name = $request->name;
       $creatine->merk = $request->merk;
       $creatine->harga = $request->harga;
       $creatine->photo = $photo;
       $creatine->save();
        session()->flash('info','data berhasil di perbaruhi');
        return redirect()->route('dashboard.creatine');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $creatines = Creatine::find($id);
        if($creatines){
            $creatines->delete();
            session()->flash('danger', 'data berhasil di hapus');
        } else {
            session()->flash('danger', 'data tidak ditemukan');
        }
        return redirect()->route('dashboard.creatine');
    }
}
