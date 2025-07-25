<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmbedsController;
use App\Models\Post;
use App\Livewire\PostEdit;
use App\Livewire\PostPage;
use App\Livewire\ProfilePage;
use App\Livewire\CollectionPage;
use App\Livewire\ProjectEdit;
use App\Livewire\Moderation;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Http\Controllers\userController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    /**$user = \App\Models\User::whereEmail('marc@kiroweb.com')->first();
    $user->password = bcrypt('1234');
    $user->save();**/
    return redirect('/home');
});

Route::get('/routes', function () {
    return response()->json(Route::getRoutes()->getRoutes());
});


Route::get('/update-users', function() {
    $users = \App\Models\User::where('id', '>', 819)->get();

    foreach($users as $user)
    {
        $user->password = bcrypt(\Str::random(60));
        $user->username = \Str::slug($user->name . $user->surnames);

        $user->save();
    }
}); 

Route::get('/lang', function() {
    $cookie = cookie()->forever('lang', request('l')); 
    return redirect()->back()->withCookie($cookie);
});

Route::get('/ca', function() {
    $cookie = cookie()->forever('lang', 'ca'); 
    
    return redirect()->back()->withCookie($cookie);;
});

Route::get('/es', function() {
    $cookie = cookie()->forever('lang', 'es'); 
    
    return redirect()->back()->withCookie($cookie);;
});

Route::get('/en', function() {
    $cookie = cookie()->forever('lang', 'en'); 
    
    return redirect()->back()->withCookie($cookie);;
});

Route::get('/pl', function() {
    $cookie = cookie()->forever('lang', 'pl');
    App::setLocale('pl');
    return redirect('/home')->withCookie($cookie);
});

Route::get('/el', function() {
    $cookie = cookie()->forever('lang', 'el');
    App::setLocale('el');
    return redirect('/home')->withCookie($cookie);
});

Route::get('/de', function() {
    $cookie = cookie()->forever('lang', 'de');
    App::setLocale('de');
    return redirect('/home')->withCookie($cookie);
});

Route::get('embed-latest', [EmbedsController::class, 'latest']);

Route::get('/home', Home::class)->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/post-edit/{post?}', PostEdit::class)->name('post-edit');
});

require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return redirect('/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/moderation', Moderation::class)->name('moderation');

//----------------------------------------------------------------
Route::get('/users/{id}', Users::class)->name('users.show');
//----------------------------------------------------------------
Route::get('/users', Users::class)->name('users');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::view('/create', 'create')->middleware(['auth']);

Route::get('/{user:username}', ProfilePage::class)->name('profile-page');
Route::get('/{user:username}/collection/{collectionId}', CollectionPage::class)->name('collection-page');


Route::get('/{user:username}/followers', function ($username) {
    return view('followers', [
        'username' => $username
    ]);
});
Route::get('/{user:username}/following', function ($username) {
    return view('following', [
        'username' => $username
    ]);
});

Route::get('/project/create', ProjectEdit::class)->name('project.create')->middleware(['auth']);
Route::get('/project/{post}', PostPage::class)->name('post.show');
Route::get('/{user:username}/project/{post}/edit', ProjectEdit::class)->middleware(['auth'])->name('project.edit');



/**
Route::get('/{user:username}/status/{post}', function ($username, $postId) {
    $post = Post::findOrFail($postId);
    return view('post-page', [
        'username' => $username,
        'post' => $post
    ]);
}); */
