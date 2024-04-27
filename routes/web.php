<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// On first glance
Route::any('/', function () {
    return view('index');
});

// Home Button
Route::get('/index', function()
{
    return view('index'); 
})->name('index');

// Redirect from /index to / when accessing Home Button
Route::permanentRedirect('/index', '/');

// Blog Button
Route::get('/blog', function()
{
    return view('blog'); 
})->name('blog');

// About Team Button
Route::get('/team', function()
{
    return view('team'); 
})->name('team');

// Contact Button
Route::get('/contact', function()
{
    return view('contact'); 
})->name('contact');

// Weather Button
Route::get('/weather', function()
{
    return view('weather'); 
})->name('weather');

// Login or Signin
Route::get('/sign-in', function()
{
    return view('sign-in'); 
})->name('sign-in');

Route::post('/login', 'AuthController@login')->name('login'); // wala pa ni nahuman

// Create_account
Route::get('/sign-up', function()
{
    return view('sign-up'); 
})->name('sign-up');

// Timeline
Route::get('/profile', function()
{
    return view('profile'); 
})->name('profile');