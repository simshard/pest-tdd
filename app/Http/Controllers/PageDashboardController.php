<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PageDashboardController extends Controller
{
    public function __invoke()
    {
        $purchasedCourses = Auth::user()->purchasedCourses;

        return view('pages.dashboard', compact('purchasedCourses'));
    }
}