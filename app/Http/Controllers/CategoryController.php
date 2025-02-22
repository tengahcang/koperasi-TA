<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pageTitle = 'Categories List';
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        // dd($categories);
        return view('categories.index', ['pageTitle' => $pageTitle, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pageTitle = 'Create Categories';
        return view('categories.create', compact('pageTitle'));
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
            // 'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required',
            // 'lastName' => 'required',
            // 'email' => 'required|email',
            // 'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('categories')->insert([
            'name' => $request->categoryName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pageTitle = 'category Detail';
        $categories = DB::table('categories')->where('id', '=', $id)->first();
        // dd($categories);
        return view('categories.show', ['pageTitle' => $pageTitle, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pageTitle = 'category Edit';
        $categories = DB::table('categories')->where('id', '=', $id)->first();
        return view('categories.edit', ['pageTitle' => $pageTitle, 'categories' => $categories]);
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
            // 'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required',
            // 'lastName' => 'required',
            // 'email' => 'required|email',
            // 'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->categoryName,
                'updated_at' => Carbon::now(),
            ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('categories')->where('id', $id)->update(['deleted_at' => Carbon::now()]);
        return redirect()->route('categories.index');
    }
}
