<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Config;

class ProductController extends Controller {
    var $rp = 2;
    public function index() {
        $products = Product::paginate($this->rp);
        return view('product/index', compact('products'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
            $products = Product::where('code', 'like', '%'.$query.'%')
            ->orWhere('name', 'like', '%'.$query.'%')
            ->paginate($this->rp);
        }
        else {
            $products = Product::paginate($this->rp);
        }
        return view('product/index', compact('products'));
    }
    }
