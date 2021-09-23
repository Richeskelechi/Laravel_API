<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Products::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        return Products::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if($id == null){
            return 'product Id is required';
        }
        $data =  Products::find($id);
        if($data == '' ){
            return 'Can not find product with the specified Id';
        }
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if($id == null){
            return 'product Id is required';
        }
        $data =  Products::find($id);
        if($data == '' ){
            return 'Can not find product with the specified Id';
        }
        $data->update($request->all());
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        if($id == null){
            return 'product Id is required';
        }
        $value =  Products::destroy($id);
        if( $value == 1){
            return "Product Deleted Successfully";
        }
        return "Product Cannot be deleted";
    }

    /**
     * Search for a name in the database
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name = '')
    {
        if($name == ''){
            return 'product Name is required for the search';
        }
        // if we search like this it will br strict with thw search variable. so we must type exactly 
        // the name in the database to get a result
        // $value =  Products::where('name', $name)->get();

        // but the code below will check to see if it can get a name that looks like the search variable we specified.
        $value =  Products::where('name', 'like', '%'.$name.'%')->get();
        if( $value->isEmpty()){
            return "Product Not Found";
        }
        return $value;
    }
}
