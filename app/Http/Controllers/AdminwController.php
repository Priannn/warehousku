<?php

namespace App\Http\Controllers;

use App\Models\Whey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wheys = Whey::all();
        return view('dashboard.whey', compact('wheys'));
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
            'harga' => 'required|string|max:20000000000|',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);

        $photo = null;

if ($request->hasFile('photo')) {
    $photo = $request->file('photo')->store('photos');
}
        $whey = new Whey();
        $whey->name = $request->name;
        $whey->merk = $request->merk;
        $whey->harga = $request->harga;
        $whey->photo = $photo;
        $whey->save();


        session()->flash('success', 'Data berhasil dtambahkan');
        return redirect()->route('dashboard.whey');

    }

    /**
     * Display the specified resource.
     */
    public function show(Whey $whey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Whey $whey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $this->validate($request,[
        'name' => ['required'],
        'merk' => ['required'],
        'harga' => ['required', 'numeric'],
        'photo' => ['image'],
    ]);
        $whey =  Whey::find($id);
        $photo = $whey->photo;
        if ($request->hasFile('photo')){
            if($photo != null){
                if(Storage::exists($photo)){
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photos');
        }

        $whey->name = $request->name;
        $whey->merk = $request->merk;
        $whey->harga = $request->harga;
        $whey->photo = $photo;

        $whey->save();
        session()->flash('info', 'Data berhasil diperbaharui');
        return redirect()->route('dashboard.whey');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wheys = Whey::find($id);
        if($wheys){
        $wheys->delete();
        session()->flash('danger', 'Data berhasil dihapus');
    } else {
        session()->flash('danger', 'Data tidak ditemukan');
    }
    return redirect()->route('dashboard.whey');
    }
}
