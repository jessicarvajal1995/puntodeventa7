<?php

namespace App\Http\Controllers;

use App\PurchaseDetails;
use Illuminate\Http\Request;
use App\Http\Request\PurchaseDetails\StoreRequest;
use App\Http\Request\PurchaseDetails\UpdateRequest;

class PurchaseDetailsController extends Controller
{
    public function index()
    {
        $purchase_details = PurchaseDetails::get();
        return view('admin.purchasedetails.index', compact('purchase_details'));
    }

    public function create()
    {
        return view('admin.purchasedetails.create');
    }

    
    public function store(StoreRequest $request)
    {
        PurchaseDetails::create($request->all());
        return redirect()->route('purchase_details.index');
    }

    public function show(PurchaseDetails $purchasedetails)
    {
        return view('admin.purchasedetails.show', compact('purchasedetails'));
    }

    public function edit(PurchaseDetails $purchasedetails)
    {
        return view('admin.purchasedetails.show', compact('purchasedetails'));
    }

    public function update(UpdateRequest $request, PurchaseDetails $purchasedetails)
    {
        $purchasedetails->update($request->all());
        return redirect()->route('purchase_details.index');
    }

    
    public function destroy(PurchaseDetails $purchasedetails)
    {
        $purchasedetails->delete();
        return redirect()->route('purchase_details.index');
    }
}
