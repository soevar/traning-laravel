<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use Log;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $allProducts = Product::orderBy('code', 'asc')->paginate(5);
        return view(
                'product/index', [
            'products' => $allProducts
                ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //dd($request->all());
        if ($request->hasFile('photo')) {
            $f = $request->file('photo');
            $namaFile = $f->getClientOriginalName();
            $ukuranFile = $f->getClientSize();
            $extFile = $f->getClientOriginalExtension();
            $pathFile = public_path('image');
            $fileTujuan = uniqid() . "." . $extFile;

            Log::debug("Nama file: $namaFile");
            Log::debug("Ukuran file: $ukuranFile");
            Log::debug("Ext file: $extFile");
            Log::debug("path file: $pathFile");
            $f->move($pathFile, $fileTujuan);
        }

//        $this->validate($request, [
//            'code' => 'required|min:3|max:5',
//            'name' => 'required',
//        ]);
//
//        Product::create($request->all());
//        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'code' => 'required|min:3|max:5',
            'name' => 'required',
        ]);

        Session::flash('flash_message', 'Product ' . $product->code . ' berhasil diedit');
        $product->fill($request->all())->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('flash_message', 'Product ' . $product->code . ' berhasil didelete');
        return redirect()->route('product.index');
    }

}
