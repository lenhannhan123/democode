<?php

namespace App\Http\Controllers;

use App\Models\Bookmodel;
use Illuminate\Http\Request;

class Bookcontroller extends Controller
{
     public function getbook(Request $request)
     {
      $user =$request->session()->get('user');  
      $name=$user->username;
      $image=$user->userimage;
        $ds= Bookmodel::all();
        return view('admin.book',compact('ds','name','image'));
     }

     public function create(Request $request)
     {   

      $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
        $ds= Bookmodel::all();
        $user=$ds->sortByDesc('bookid')->first();
        $ID=$user->bookid;
       
        $number = ltrim($ID,'B') +1;
        $ID ='B'.$number;
        return view('admin.createbook',compact('ds','ID','name','image'));
     }



     public function createbook(Request $request)
     {
      $user =$request->session()->get('user');  
      $name=$user->username;
      $image=$user->userimage;
        $book = $request->all();
        $id= $request->input(key:'bookid');
        
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

        $p = new Bookmodel($book);
        $p->image = $imageName;
        $p->save();
        return redirect()->route('book',compact('name','image'));
     }


     public function getbyid($id,Request $request)
     {
      $user =$request->session()->get('user');  
      $name=$user->username;
      $image=$user->userimage;
        $ds= Bookmodel::all();
        $user = Bookmodel::where('bookid',$id)->get()->first();
        return view('admin.review',compact('user','ds','name','image'));

     }

     public function edit($id,Request $request)
     {
      $user =$request->session()->get('user');  
      $name=$user->username;
      $image=$user->userimage;
          $ds= Bookmodel::all();
          $user = Bookmodel::where('bookid',$id)->get()->first();
          return view('admin.edit',compact('user','ds','name','image'));
     }


     public function editbook(Request $request)
     {
      $user =$request->session()->get('user');  
        $name=$user->username;
        $image=$user->userimage;
      $id= $request->input(key:'bookid');


      $p= Bookmodel::where('bookid',$id)->get()->first();
    

      
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
               $imageName = $p->image;
      }

      $bookname=$request->input(key:'bookname');
      $author=$request->input(key:'author');

      $price=$request->input(key:'price');


      Bookmodel::where('bookid',$id)->update(['bookname'=>$bookname,'author'=>$author,'image'=>$imageName,'price'=>$price]);

      return redirect()->route('book',compact('name','image'));
     }

     public function delete($id,Request $request)
     {
      $user =$request->session()->get('user');  
      $name=$user->username;
      $image=$user->userimage;
      $user = Bookmodel::where('bookid',$id)->delete();
      return redirect()->route('book',compact('name','image'));
     }

     public function indexbook()
     {
      $ds= Bookmodel::all();
      return view('index',compact('ds'));
     }


}
