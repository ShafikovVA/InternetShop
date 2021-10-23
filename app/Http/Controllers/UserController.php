<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function registration(Request $request){
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'check' => 'required'
        ]);

        User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect(Route('main'))->with('message', 'вы успешно зарегестрировались');
    }
    
    public function auth(Request $request){ 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            return back()->with('message', 'вы успешно авторизовались');
        }
        return back()->with('message', 'Вы ввели неккоректные данные');
    }

    public function getThisUser(Request $request){
        $fullname = $request->firstname. ' '. $request->secondname. ' '. $request->thirdname;
  
        $data = Auth::user();
        
        return view('personal_cabinet', ['data' => $data]);
    }

    public function edit(Request $request){
        /*$request->validate([
            'first_name' => 'required',
            'second_name' => 'required',
            'birthdate' => 'required'
        ]);*/
        $user = User::find(Auth::id());
        
        if($request->file('image') == null )
        {
            $user = User::find(Auth::id());
            $user->first_name = $request->firstname;
            $user->second_name = $request->secondname;
            $user->birthdate = $request->birthdate;
            $user->save();
        }
        else{ 

            $user->first_name = $request->firstname;
            $user->second_name = $request->secondname;
            $user->birthdate = $request->birthdate;
            
            $path = $request->file('image')->store('uploads', 'public');
            $user->image = $path;
            
            $user->save();
        }

        return back()->with('message', 'данные успешно изменены');
    }

    public function logout(Request $request){
        $back_route = app('router')->getRoutes()->match(app('request')->create(redirect()->back()->getTargetUrl()));
        $back_route_name = $back_route->getName();
        Auth::logout();
        
        if($back_route_name == 'personal_cabinet'){
            return Redirect(Route('main'))->with('message', 'вы успешно вышли из системы');
        }
        else{
            return back()->with('message', 'вы успешно вышли из системы');
        }
    }
}
