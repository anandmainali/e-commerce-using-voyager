<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function index()
    {
        return view('setting');
    }

    public function updateUser(Request $request,$id){
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|min:3|max:25',
            'email' => ['required','email',
                        Rule::unique('users')->ignore($id),],
            'avatar' => 'mimes:jpeg,png,gif,bmp,tiff',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email, 
            'phone' => $request->phone,
            'address' => $request->address,          
            
        ];

        if($request->hasfile('avatar')){
            $file = $request->avatar;
            $name = time() . $file->getClientOriginalName();
            //For Deleting file form pubic path
            //file::delete(public_path('assets/imgae/'.$user->image));
            //For uploading file in public path
            //$file->move(public_path('assets/imgae'),$name);
            //unlink(public_path().$user->image);
            $file->move('images/users/avatar',$name);
            
            $avatar = 'users/avatar/'.$name;
            $data['avatar'] = $avatar;
            if($user->avatar !== 'users/default.png'){
            unlink('images/'.$user->avatar);
            }
            }
                
            $user->update($data);

            $notification = array(
        'message' => 'User successfully updated.', 
        'alert-type' => 'success'
        );
            
            return redirect()->back()->with($notification);
    }

    public function updatePassword(Request $request,$id){
         $user = User::findOrFail($id);         
        $this->validate($request, [ 
            'oldPassword' => 'required',           
            'newPassword' => 'required|min:3|max:25',
            'confirmPassword' => 'required|min:3|max:25|same:newPassword',
        ]);
        $data = [
            'password' => bcrypt($request->newPassword),            
        ];
       if(!Hash::check($request->oldPassword, $user->password)){
        $notification = array(
        'message' => 'The specified password does not match the database password', 
        'alert-type' => 'error'
        );
         return back()->with($notification);
    }else{
       $user->update($data);
       $notification = array(
        'message' => 'Password successfully updated.', 
        'alert-type' => 'success'
        );
         return redirect()->back()->with($notification);
    } 
    }

   
}
