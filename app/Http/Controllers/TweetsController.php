<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller
{
    //
    public function index() {
      $tweets = Tweet::latest()->get();
      // $tweets = [];
      // dd($tweets->Toarray());
      return view('tweets.index', ['tweets' => $tweets]);
    }

    public function show($id) {
      $tweet = Tweet::findOrFail($id);
      return view('tweets.show')->with('tweet', $tweet);
    }
}
