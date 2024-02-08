<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname'=>'required',
            'loginpassword'=>'required'
        ]);
        if(auth()->attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/');
        }else{
            return redirect('/');
        }
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','You have logged out successfully');
    }
    public function displayHomepage(){
        if(auth()->check()){
            $decks = Deck::where('user_id',auth()->user()->id)->count();
            if($decks>0){
                $decks= Deck::where('user_id',auth()->user()->id)->get();
            }
            else{
                $decks = null;
            }
            return view('Homepage-feed',["decks"=>$decks]);
        }
    return view('Homepage');
    }
    public function register(Request $request){
        $incomingFields= $request->validate([
            'name'=>['required','max:20','min:3',Rule::unique('users','name')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:3','confirmed'],
            'password_confirmation'=>'required'
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return view('Homepage-feed')->with('success',"You have successfully registerd an account");
    }
}
