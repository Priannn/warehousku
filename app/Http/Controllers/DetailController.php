<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.detail');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

// <?php
// namespace App\Http\Controllers;
// use App\Models\Whey;
// use App\Models\Gainer;
// use App\Models\Creatine;

// class DetailController extends Controller
// {
//     public function showByCategory(string $category, string $id)
//     {
//         $product = $this->findProductByCategory($category, $id);

//         return view('landing.detail', ['product' => $product]);
//     }

//     private function findProductByCategory(string $category, string $id)
//     {
//         switch ($category) {
//             case 'whey':
//                 return Whey::find($id);
//             case 'gainer':
//                 return Gainer::find($id);
//             case 'creatine':
//                 return Creatine::find($id);
//             default:
//                 // Handle jika kategori tidak sesuai
//                 return null;
//         }
//     }
// }



