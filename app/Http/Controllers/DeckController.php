<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function showDeck(Deck $deck){
        return view('single-deck',['deckName'=>$deck->deck_name,'cards'=>$deck->posts()->latest()->get(),"id"=>$deck['id']]);
    }
    public function createDeck(Request $request){
        $incomingFields = $request->validate([
            "deck_name"=>'required',
            'subject'=>'required'
        ]);
        $incomingFields['user_id']=auth()->user()->id;
    $deck = Deck::create($incomingFields);
    return redirect("/")->with('success',"You have successfully created a deck");

       
    }
    public function showCreateForm(){
        return view('deck-create-form');
    }

    //card

    public function showCardForm(Deck $deck){
        return view('add-card',['deck'=>$deck]);
    }
    public function addCard(Deck $deck,Request $request){
        $incomingFields = $request->validate([
            'question'=>'required',
            'answer'=>'required'
        ]);
        $incomingFields['deck_id']=$deck['id'];
        Card::create($incomingFields);
        return redirect('/deck/'.$deck->id)->with('success','The card has been added successfully');
    }
}
