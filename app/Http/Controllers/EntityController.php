<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Designation;
use App\Models\Department;

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

    public function getDesignationByCategory(Request $request)
    {
        $id = $request->cat_id;
        $desgination = Designation::where('category_id',$id);
        $response = $this->isTheResponseEmpty($desgination);
            return response()->json(['status'=>'200', 'message'=> $response]);
    }

    public function getAllDepartment(Request $request)
    {
        
        $departments = Department::all();
        $message  = empty($departments) ? "Data empty" : $departments;
        return response()->json(['status'=>'200', 'message'=> $message]);
    }

    protected function isTheResponseEmpty($message)
    {
        if(empty($message)){
            $message = "Empty call";
            return $message;
        }else{
            return $message;
        }
    }
}
