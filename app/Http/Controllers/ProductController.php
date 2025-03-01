<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pageTitle = 'Product List';
        $products = DB::table('products')
            ->select('products.*', 'categories.name as category_name') // Pilih kolom spesifik untuk menghindari konflik
            ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
            ->whereNull('products.deleted_at') // Pastikan hanya produk yang belum dihapus
            ->whereNull('categories.deleted_at') // Opsional: Jika ingin menyaring kategori yang belum dihapus
            ->get();
        // dd($products);
        return view('products.index', ['pageTitle' => $pageTitle, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pageTitle = 'Create Product';
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        return view('products.create',['pageTitle' => $pageTitle, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'required' => ':Attribute harus diisi.',
            // 'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'barcode' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('products')->insert([
            'categories_id' => $request->category,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pageTitle = 'product Detail';
        $product = DB::table('products')
        ->select('products.*', 'categories.name as category_name') // Pilih kolom spesifik
        ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
        ->where('products.id', '=', $id) // Pastikan pakai products.id untuk menghindari konflik
        ->first();
        // dd($product);
        return view('products.show', ['pageTitle' => $pageTitle, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pageTitle = 'Create Product';
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $product = DB::table('products')
        ->select('products.*', 'categories.name as category_name') // Pilih kolom spesifik
        ->leftJoin('categories', 'products.categories_id', '=', 'categories.id')
        ->where('products.id', '=', $id) // Pastikan pakai products.id untuk menghindari konflik
        ->first();
        // dd([$categories,$product]);
        return view('products.edit', ['pageTitle' => $pageTitle, 'categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $messages = [
            'required' => ':Attribute harus diisi.',
            // 'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'barcode' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('products')->where('id',$id)->insert([
            'categories_id' => $request->category,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
