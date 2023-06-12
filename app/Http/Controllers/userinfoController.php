<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userinfo;
class userinfoController extends Controller
{
    public function store(Request $request){
        $Userinfo = new Userinfo();
        $Userinfo -> name = $request -> name;
        $Userinfo -> email = $request -> email;
        $Userinfo -> address = $request -> address;
        $Userinfo -> phone = $request -> phone;
        $Userinfo -> LGA = $request -> LGA;
        $Userinfo -> state = $request -> state;
        
        $Userinfo -> save();
        return redirect()->back()->with('status',"successfully Deleted");
    }

    public function destroy($id) {
        UserInfo::where('id', $id)->delete();
        return redirect()->back()->with('status',"successfully Deleted");
    }

    public function edit($id) {
        return UserInfo::find($id);
    }

    public function update(Request $request){
        $imagename='';
        $user = Userinfo::find($request->id1);
        
        $this->validate($request,['image' => 'image|mimes:jpeg,jpg,png|max:4096']);
        if($request->file('image')) {
            $img = $request->file('image');
            $fileExt = $img->getClientOriginalExtension();
            $filename = $this->random_num().'.'.$fileExt;
            $imagename = $filename;
            $url = public_path().'/uploads/users/';
            $img->move($url,$filename);

        }

        UserInfo::find($request->id1)->update([
            'names'=> $request->name1,
            'email'=> $request->email1,
            'ph_number'=> $request->phone1,
            'image'=> $imagename
        ]);
        return redirect()->back()->with('status',"successfully updated");
    }

    public function random_num(){
        $length = 16;
        $key='';
        $keys= array_merge(range(0,9),range('a', 'z'));
        for($i=0;$i<$length;$i++){
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
}
