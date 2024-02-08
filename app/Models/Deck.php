<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;
    protected $fillable  = ['deck_name','subject','user_id'];
    public function posts(){
        return $this->hasMany(Card::class,'deck_id');
    }
}
