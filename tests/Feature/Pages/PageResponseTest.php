<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('home page returns a successful response', function () {
    $response = $this->get(route('page.home'));
    $response->assertOk();
});
 
test('course details page returns a successful response', function () {
   $course = Course::factory()->released()->create();
    $response = $this->get(route('course-details', $course->slug));
    $response->assertOk();
});
