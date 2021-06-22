<?php

namespace App\Http\Controllers;

use App\Models\Bookmodel;
use App\Models\Usermodel;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function gethome(Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
        $countbook= Bookmodel::all()->count();
        $countuser= Usermodel::all()->count();
        return view('admin.home',compact('countbook','countuser','name','image'));
    }

    public function getuser(Request $request)
    {   
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
       $ds= Usermodel::all();
       return view('admin.user',compact('ds','name','image'));
    }

    public function create(Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
        $ds= Usermodel::all();
       return view('admin.createuser',compact('ds','name','image'));
    }



    public function createuser(Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
       $user = $request->all();
       $id= $request->input(key:'username');
       
       if($request->hasFile('image'))
       {
               $file=$request->file('image');
               $extension = $file->getClientOriginalExtension();
               if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
               {
                   return redirect()->route('createbook',['mess','Định dạng ảnh không đúng']);
               }
               $imageName = "{$id}.{$extension}";
               $file->move("images",$imageName);
       }else{
                $imageName = null;
       }

       $p = new Usermodel($user);
       $p->userimage = $imageName;
       $p->save();
       return redirect()->route('user',compact('name','image'));
    }

    public function getbyid($id,Request $request)
    {

        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
       $ds= Usermodel::all();
       $user = Usermodel::where('id',$id)->get()->first();
       return view('admin.reviewuser',compact('user','ds','name','image'));

    }

    public function edit($id,Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
         $ds= Usermodel::all();
         $user = Usermodel::where('id',$id)->get()->first();
         return view('admin.edituser',compact('user','ds','name','image'));
    }


    public function edituser(Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
     $name= $request->input(key:'username');


     $p= Usermodel::where('username',$name)->get()->first();
   

     
     if($request->hasFile('image'))
     {
             $file=$request->file('image');
             $extension = $file->getClientOriginalExtension();
             if($extension != 'jpg' && $extension != 'png' && $extension !='jpeg')
             {
                 return redirect()->route('createbook',['mess','Định dạng ảnh không đúng']);
             }
             $imageName = "{$name}.{$extension}";
             $file->move("images",$imageName);
     }else{
              $imageName = $p->userimage;
     }

     $username=$request->input(key:'username');
     $password=$request->input(key:'password');

     $role=$request->input(key:'role');
     $id=$request->input(key:'id');

     Usermodel::where('id',$id)->update(['username'=>$username,'password'=>$password,'userimage'=>$imageName,'role'=>$role]);

     return redirect()->route('user',compact('name','image'));
    }


    public function deleteuser($id,Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
     $user = Usermodel::where('id',$id)->delete();
     return redirect()->route('user',compact('name','image'));
    }

    public function login()
    {
        return view('user.login',['mess'=>'']);
    }


    public function checklogin(Request $request)
    {
        if($request->session()->has('user')){
            $request->session()->forget('user');
        }
        
        $user = $request->input(key:'user');
        $password = $request->input(key:'password');
        $mess="";
        $data= Usermodel::where('username',$user)->get()->first();

        if(isset($data)){
            if($data->password==$password){
                $request->session()->put('user', $data);
                if($data->role==1){
                    return redirect()->route('adminhome');
                    
                }else
                {
                    return redirect()->route('userindex');
                }
            }else{
                $mess="User Name or Password incorrect ";
            }
        }else  $mess="User Name or Password incorrect ";

        return view('user.login',compact('mess'));

    }


    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect()->route('library');
    }

    
    function userindex(Request $request)
    {
        $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
       $id=$request->session()->get('user')->id;
       $ds = Usermodel::where('id',$id)->get()->first();
       return view('user.index',compact('ds','name','image'));

    }

}
