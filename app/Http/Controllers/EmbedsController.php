<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class EmbedsController extends Controller
{
   public function latest()
   {
      $posts = Post::query()
         ->where('is_restricted', 1)
         ->where('privacy', 0)
         ->take(12)
         ->get();
         
      return view('embeds.latest', compact('posts'));
   } 
}
