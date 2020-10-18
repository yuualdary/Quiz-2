<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;  

class Todo extends Model
{
  // protected $guarded = ['text','done,user_id'];
  protected $fillable = ['text','done','user_id'];


  public function user(){
    return belongsTo(User::class);
  }
}
