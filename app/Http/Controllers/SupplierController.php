<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    function list()
    {
        $suppliers = Supplier::orderBy('id')->get();
        return view(
            'components/Listings/SupplierList',
            compact('suppliers')
        );
    }

    function new()
    {
        $supplier = new Supplier();
        $supplier->id = Supplier::max('id') + 1;
        $supplier->supplier_name = "";
        $supplier->cnpj = "";

        return view("components/Forms/FormSupplier", compact('supplier'));
    }

    function save(Request $request)
    {
        if ($request->input('id') == Supplier::max('id') + 1) {
            $supplier = new Supplier();
        } else {
            $supplier = Supplier::find($request->input('id'));
        }

        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->cnpj = $request->input('cnpj');

        $supplier->save();

        return redirect('supplier/list');
    }

    function edit($id) {
        $supplier = Supplier::find($id);

        return view("components/Forms/FormSupplier", compact('supplier'));
    }

    function delete($id)
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect('supplier/list');    
    }
}
