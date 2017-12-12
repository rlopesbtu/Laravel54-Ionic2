<?php

use Illuminate\Http\Request;


Route::middleware('Auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(){
   return \CodeFlix\Models\User::paginate();
});

\ApiRoute::version('v1', function(){
    \ApiRoute::get('/test', function (){
        return "test";
    });
});

