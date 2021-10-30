<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function customer(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('customers')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actions = 
                    '<a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>';
                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}


// {{ route('admin.product.delete', ['id'=>$product->id]) }}
