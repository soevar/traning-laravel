<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Product;
use App\User;
use Session;
use Log;

class ProblemController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $allProblems = null;
        if ($request->has('kata')) {
            $allProblems = Problem::where('title', 'LIKE', '%' . $request->kata . '%')->paginate(5);
        } else {
            $allProblems = Problem::orderBy('id', 'desc')->paginate(5);
        }
        return view(
                'problem/index', [
            'problem' => $allProblems
                ]
        );

//        $allProblems = Problem::orderBy('id', 'des')->paginate(5);
//        return view(
//                'problem/index', [
//            'problem' => $allProblems
//                ]
//        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $allProducts = Product::pluck('name', 'id');
        $allUsers = User::pluck('name', 'id');

        return view('problem.create')->
                        with(['products' => $allProducts, 'users' => $allUsers]);
//        return view('problem.create', [
//            'products' => $allProducts,
//            'users' => $allUsers
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
        ]);


        if ($request->hasFile('attachment')) {
            $f = $request->file('attachment');
            $namaFile = uniqid() . "." . $f->getClientOriginalExtension();
            Log::debug("namaFile: $namaFile");
            $lokasiFile = public_path('image');
            $f->move($lokasiFile, $namaFile);
            Problem::create([
                'title' => $request->title,
                'description' => $request->description,
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'attachment' => $namaFile
            ]);
        } else {
            Problem::create($request->all());
        }

        return redirect()->route('problem.index');
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
        $allProducts = Product::pluck('name', 'id');
        $allUsers = User::pluck('name', 'id');

        $problem = Problem::findOrFail($id);
        return view('problem.edit')->with(['problem' => $problem, 'products' => $allProducts, 'users' => $allUsers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $problem = Problem::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'product_id' => 'required',
            'user_id' => 'required',
        ]);


        if ($request->hasFile('attachment')) {
            $f = $request->file('attachment');
            $namaFile = uniqid() . "." . $f->getClientOriginalExtension();
            Log::debug("namaFile: $namaFile");
            $lokasiFile = public_path('image');
            $f->move($lokasiFile, $namaFile);
            $problem->title = $request->title;
            $problem->description = $request->description;
            $problem->product_id = $request->product_id;
            $problem->user_id = $request->user_id;
            $problem->attachment = $namaFile;
            $problem->save();
        } else {
            $problem->fill($request->all())->save();
        }

        Session::flash('flash_message', 'Problem ' . $problem->title . ' berhasil diedit');
        return redirect()->route('problem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $problem = Problem::findOrFail($id);
        $problem->delete();

        Session::flash('flash_message', 'Problem ' . $problem->title . ' berhasil didelete');
        return redirect()->route('problem.index');
    }

}
