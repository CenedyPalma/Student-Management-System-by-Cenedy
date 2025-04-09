<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Subject; 

class SubjectController extends Controller
{
      public function ViewSubject(){
    	$data['allData'] = Subject::all();
    	return view('backend.setup.subject.view_subject',$data);
 
    }


	public function SubjectAdd(){
    	return view('backend.setup.subject.add_subject');
    }

    public function SubjectStore(Request $request){

	    	$validatedData = $request->validate([
	    		'name' => 'required|unique:subjects,name',
	    		
	    	]);

	    	$data = new Subject();
	    	$data->name = $request->name;
	    	$data->save();

	    	$notification = array(
	    		'message' => 'Subject Inserted Successfully',
	    		'alert-type' => 'success'
	    	);

	    return redirect()->route('subject.view')->with($notification);

	    }


	    public function SubjectEdit($id){
	    	$editData = Subject::find($id);
	    	return view('backend.setup.subject.edit_subject',compact('editData'));
	    }



	    public function SubjectUpdate(Request $request,$id){

	 $data = Subject::find($id);
     
     $validatedData = $request->validate([
    		'name' => 'required|unique:subjects,name,'.$data->id
    		
    	]);

    	
    	$data->name = $request->name;
    	$data->save();

    	$notification = array(
    		'message' => 'Subject Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('subject.view')->with($notification);
    }


     public function SubjectDelete($id){
	    	$user = Subject::find($id);
	    	$user->delete();

	    	$notification = array(
	    		'message' => 'Subject Deleted Successfully',
	    		'alert-type' => 'info'
	    	);

	   return redirect()->route('subject.view')->with($notification);

	    }




} 
