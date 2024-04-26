<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5); // Default per page limit
        $products = Product::paginate($perPage);

        return response()->json($products);
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $perPage = $request->input('perPage', 5);

    $products = Product::where('name', 'like', "%$query%")
                        ->orWhere('description', 'like', "%$query%")
                        ->paginate($perPage);

    return response()->json($products);
}
}
