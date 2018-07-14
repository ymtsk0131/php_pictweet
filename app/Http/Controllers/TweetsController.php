<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\Http\Requests\TweetRequest;

class TweetsController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $tweets = Tweet::latest()->get();
      return view('tweets.index')->with('tweets', $tweets);
    }

    public function show(Tweet $tweet) {
      return view('tweets.show')->with('tweet', $tweet);
    }

    public function create() {
      return view('tweets.create');
    }

    public function store(TweetRequest $request) {
      $tweet = new Tweet();
      $tweet->name = $request->name;
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }

    public function edit(Tweet $tweet) {
      return view('tweets.edit')->with('tweet', $tweet);
    }

    public function update(TweetRequest $request, Tweet $tweet) {
      $tweet->name = $request->name;
      $tweet->image = $request->image;
      $tweet->content = $request->content;
      $tweet->save();
      return redirect('/');
    }

    public function destroy(Tweet $tweet) {
      $tweet->delete();
      return redirect('/');
    }
}
