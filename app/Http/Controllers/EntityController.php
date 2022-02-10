<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Designation;

class EntityController extends Controller
{
    //
    public function getAllCategories(Request $request)
    {
        
        $categories = Category::all();
        $message  = empty($categories) ? "Data empty" : $categories;
        return response()->json(['status'=>'200', 'message'=> $message]);
    }

    public function getAllDesignations(Request $request)
    {
        
        $desginations = Designation::all();
        $message  = empty($desginations) ? "Data empty" : $desginations;
        return response()->json(['status'=>'200', 'message'=> $message]);
    }

    public function getDesignationById(Request $request)
    {
        $id = $request->id;

        $desgination = Designation::findOrFail($id);
        return response()->json(['status'=>'200', 'message'=> $desgination]);
    }
}
