<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    public function saveProfile(Request $request){
        $request->validate([
            'avatar'=>'required|image|max:4000'
        ]);
        $user = auth()->user();
        $filename = $user->id.'-'. uniqid().'.jpg';

        $imageData=Image::make($request->avatar)->fit(120)->encode('jpg');
        Storage::put('/public/avatars/'.$filename,$imageData);

        $oldData = $user->avatar;

        $user->avatar= $filename;
        $user->save();
        if($oldData!='/logo.png'){
            Storage::delete(str_replace('/storage','/public',$oldData));
        }
        return redirect("/profile/".$user->name);

        }
    public function showProfileForm(){
        return view('profile-form');
    }
    public function showProfile(User $user){
        return view('profile',['user'=>$user]);
    }
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
