<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PageHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       //$courses = Course::all();
        $courses = Course::query()
            ->whereNotNull('released_at')
            ->get();
        return view ('home', compact('courses'));
    }
}
