<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Request\Purchase\StoreRequest;
use App\Http\Request\Purchase\UpdateRequest;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Lima'),
        ]);
        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key],
            "price"=>$request->price[$key]);
        }
        $purchase->purchaseDetails()->createMany($results);
        // VER VIDEO 8, el edit y store esta diferente
        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $sultotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.show', compact('purchase'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        return redirect()->route('purchases.index');
    }

    
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index');
    }
}
