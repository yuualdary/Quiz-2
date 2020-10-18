<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class TodoCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $joinTodo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($joinTodo)
     {
         $this->joinTodo = $joinTodo;

         foreach($joinTodo as $jT){
             $name=$jT->name;
         }

         $this->name=$name;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
       return $this->from('example@example.com')
                   ->view('send_email_todo_created')
                   ->with([
                         'name' => $this->name,
                     ]);
     }
}
