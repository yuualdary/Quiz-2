<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Resource\TodoResource;
use Auth;
use App\Events\TodoCreatedEvent;
use Illuminate\Support\Facades\DB;



class TodoController extends Controller
{
  public function index(){

      $todos = Todo::where('user_id' ,Auth::user()->id)
                  ->orderBy('created_at' , 'desc')
                  ->get();

      return TodoResource::collection($todos);
    }

    public function store(TodoRequest $request){

      $todo = todo::create([
        'user_id' =>Auth::user()->id,
        'text' => $request->text,
        'done' => 0
      ]);


      $joinTodo=DB::table('todos')
                ->join('users','users.id','=','todos.user_id')
                ->where([['todos.id','=',$todo->id]])//ini sebenarny bakal error, karena table id ada 2 di soal sama" id, harusnya $todo->todo_id, karena db suah seperti itu saya tidak berani ubah hehehe
                ->get(); 

      event(new TodoCreatedEvent($todo,$joinTodo));

      return new TodoResource($todo);
    }

    public function delete($id){
      Todo::destroy($id);
      return 'success';
    }

    public function changeDoneStatus($id){
      $todo = Todo::find($id);
      if($todo->done == 1){
        $update = 0;
      }else{
        $update = 1;
      }

      $todo->done=$update;
      $todo->save();

      $data['todo']=$todos;

      // $todo->update([
      //   'done' => $update
      // ]);
      
      
      return new TodoResources($todos);
    }
}
