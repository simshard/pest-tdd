<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
 

class PageDashboardController extends Controller
{
    public function __invoke()
    {
      $user = Auth::user();
      $user = User::with('purchasedCourses')->find(Auth::id());
      $purchasedCourses = $user->purchasedCourses;
        return view('pages.dashboard', compact('purchasedCourses'));
    }
}  