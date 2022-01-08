<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Apisetting;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('products.create');
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
                'name_ar'     => 'required|min:3|unique:products,name_ar',
                'name_en'     => 'required|min:3|unique:products,name_en',
                'desc_ar'     => 'required|min:5',
                'desc_en'     => 'required|min:5',
                'active_from' => 'required|date',
                'price'       => 'required|numeric',
                'gpc'         => 'required|numeric|min:8|exists:categories,code',
                'egs'         => 'required|numeric|unique:products,code',
         ]);

         $input = $request->except(['egs']);

         $tax = Apisetting::first();

         $input['egs'] = 'EG-' .  $tax->commercial_number . '-' . $request->egs;

         $input['code'] =  $request->egs;

         Products::create($input);

         return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);


        $request->validate([
            'name_ar'     => 'required|min:3|unique:products,name_ar,'.$id,
            'name_en'     => 'required|min:3|unique:products,name_en,'.$id,
            'desc_ar'     => 'required|min:5',
            'desc_en'     => 'required|min:5',
            'price'       => 'required|numeric',
            'gpc'         => 'required|numeric|min:8|exists:categories,code',
            'egs'         => 'required|numeric|unique:products,egs,'.$id,
     ]);

     $input = $request->except(['egs']);

     $tax = Apisetting::first();

     $input['egs'] = 'EG-' .  $tax->commercial_number . '-' . $request->egs;

     $input['code'] =  $request->egs;

     $product->update($input);

     session()->flash('message', 'Updated Successfully');

     return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);

        $product->delete();

        session()->flash('message', 'Deleted Successfully');

        return redirect('products');

    }


    public function submit()
    {
       $products = Products::whereNull('status')->latest()->get();

       return view('products.submit', compact('products'));

    }

    public function sendproducts(Request $request)
    {

         $request->validate([
             'product_ids' => 'required|array'
         ]);

         $list = [];

         $tax = Apisetting::first();

         foreach($request->product_ids as $id){

            $product = Products::findOrFail($id);

            $list['codeType']      = 'EGS';
            $list['parentCode']    =  $product->gpc;
            $list['itemCode']      =  $product->egs;
            $list['codeName']      =  $product->name_en;
            $list['codeNameAr']    =  $product->name_ar;
            $list['activeFrom']    =  $product->active_from;
            $list['activeTo']      =  $product->active_to;
            $list['description']   =  $product->desc_en;
            $list['descriptionAr'] =  $product->desc_ar;
            $list['requestReason'] = "Request reason text";
         }

      $response =  SendProducts($list);

      if(!is_null($response)){

      if( $response['error']){

          $product->update([
              'status' => 'Error',
              'reason' => $response['msg']
            ]);

      }else{

        $product->update(['status' => 'Submitted']);

      }

      session()->flash('message', 'Submitted Successfully');

       return redirect()->back();

    }else{


        return redirect()->back()->withErrors('Code Error');
    }



    }



    public function rejected()
    {
       $products = Products::whereStatus('Error')->latest()->get();

       return view('products.rejected', compact('products'));

    }


    public function active()
    {
       $products = Products::whereStatus('Approved')->latest()->get();

       return view('products.active', compact('products'));

    }

    public function pending()
    {
       $products = Products::whereStatus('Submitted')->latest()->get();

       return view('products.pending', compact('products'));

    }

}