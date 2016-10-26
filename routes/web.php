<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Send a message by Javascript

Route::post('message',function(Request $request){
  $user=Auth::user();

  $message=ChatMessage::create([
      'user_id' => $user->id,
      'message' => $request->input('message')
    ]);

    event(new ChatMessageWasReceived($message,$user));

});
