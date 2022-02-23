<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Designation;
use App\Models\Department;
use App\Models\Folder;
use App\Models\File;


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

    public function uploadFiles(Request $request){
        // $img = $request->files;
        $created_by = $request->created_by;
        $parentFolder = $request->parent_folder;

        //  return count($request->file('file'));
        foreach($request->file('file') as $file){

            $imageName = $file->getClientOriginalName();

            
            # Generate timestamp with image name;
            $img = time() . '_' . $imageName;
    
            $upload = $file->move('uploads/documents/', $img);

            # Save Image to file

         if($upload){
            $file = New File();
            $file->file_name = $upload;
            $file->parent_folder = $parentFolder;
            $file->post_by = $created_by;
            $save = $file->save();
         }
        
        
    }
    if($save){
            return response()->json(['status'=>200,'message'=>"file successfully created"]);
    }else{
            return response()->json(['status'=>204,'message'=>"file cant save"]);
    }
         

    }

    public function createFolder(Request $request){

        $folder_name = $request->folderName;
        $posted_by = $request->post_by;
        $parentFolder = $request->parent_folder;

        if($this->isItEmpty($folder_name) && $this->isItEmpty($posted_by)){
            return response()->json(['status'=>204,'message'=>"All field needs to be filled"]);
        }else{
            $folder = new Folder();
            $folder->folderName = $folder_name;
            $folder->created_by = $posted_by;
            $folder->parentFolder = $parentFolder;
            
            if($folder->save()){
                return response()->json(['status'=>200,'message'=>"Folder Sucessfully Created"]);
            }
        }


    }

    public function getFolderByParent(Request $request){
        $id = $request->parent_id;
        $post_by = $request->post_by;
        $results = Folder::where('parentFolder',$id)->where('created_by',$post_by)->get();
        return response()->json(['status'=>200,'message'=>$results]);

    }

    public function sendFolderList(Request $request){
        $folders = Folder::all();
        $html = "
        <ul>";

        foreach($folders as $folder){
            if($folder->parentFolder == 0){
                $h = "<li>".$folder->folderName;
                $results = Folder::where('parentFolder',$folder->id)->get();
                $count = count($results);
                if($count > 0){
                    $u = "<ul>";
                    foreach($results as $result){
                        $f = "<li>".$result->folderName;
                        $f .= $this->doRepeat($result);
                        $u .= $f;

                    }
                    $getfiles = File::where('parent_folder',$folder->id)->get();
                    $fff = "";
                    foreach($getfiles as $getfile ){
                        $fff .= "<li>".$getfile->file_name."</li>";
                    }
                    $u .= $fff;
                    $u .= "</ul>";
                    $h .= $u."</li>"; 
                    
        
                }else{
                    $getfiles = File::where('parent_folder',$folder->id)->get();
                    $fff = "<ul>";
                    foreach($getfiles as $getfile ){
                        $fff .= "<li>".$getfile->file_name."</li>";
                    }
                    $h = $fff."</ul></li>";
                }
                $html .= $h;
            
            }
        }
        $html .= " </ul>";
        return $html;

    }

    protected function isItEmpty($data)
    {
        if(empty($data)){
            return true;
        }else{
            return false;
        }
    }

    protected function doRepeat($folder){
        $results = Folder::where('parentFolder',$folder->id)->get();
        $count = count($results);
        if($count > 0){
            $u = "<ul>";
            foreach($results as $result){
                $f = "<li>".$result->folderName;
                // doRepeat($h,$result);
                $f .= $this->doRepeat($result);
                $u .= $f;
            }
            $getfiles = File::where('parent_folder',$folder->id)->get();
            $fff = "";
            foreach($getfiles as $getfile ){
                $fff .= "<li>".$getfile->file_name."</li>";
            }
            $u .= $fff;
            $u .= "</ul>";
            $h = $u."</li>"; 
            

        }else{
            $getfiles = File::where('parent_folder',$folder->id)->get();
            $fff = "<ul>";
            foreach($getfiles as $getfile ){
                $fff .= "<li>".$getfile->file_name."</li>";
            }
            $h = $fff."</ul></li>";
        }
        return $h;
    }
}
