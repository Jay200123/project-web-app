<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Product;
use App\Models\Student;

class SearchController extends Controller
{
    public function search(Request $request){

        $searchResults = (new Search())
        ->registerModel(Product::class, 'description')
        ->registerModel(Student::class, 'fname')
        ->search($request->get('search')); 
        // dd($searchResults); 
        return view('search', compact('searchResults'));

    }
}
