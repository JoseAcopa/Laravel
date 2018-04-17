<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotations;
use App\Products;
use PDF;

class QuotationsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $quotations = Quotations::all();
      return view('admin.quotation.quotation', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Products::all();
      return view('admin.quotation.add-quotation', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return $_POST;
      // $quotation = new Quotations;
      // $quotation->folio = request('folio');
      // $quotation->RFC = request('RFC');
      // $quotation->name = request('name');
      // $quotation->date = request('date');
      // $quotation->job = request('job');
      // $quotation->nClient = request('nClient');
      // $quotation->direction = request('direction');
      // $quotation->mail = request('mail');
      // $quotation->company = request('company');
      // $quotation->nBidding = request('nBidding');
      // $quotation->description = request('description');
      // $quotation->total = request('total');
      // $quotation->IVA = request('IVA');
      // $quotation->totalAmount = request('totalAmount');
      // $quotation->save();
      // return redirect('admin/quotation')->with('success','Cotizacion '. $quotation->folio .' Guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Products::find($id);
      $quotations = Quotations::all();
      return view('admin.inventary.show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadPDF(Request $request)
    {
      $product = $request->products;
      $total = $request->total;
    	$pdf = PDF::loadView('admin.PDF.quotations', compact('product', 'total'));
		    return $pdf->stream('cotizacion.pdf');
    }
}
