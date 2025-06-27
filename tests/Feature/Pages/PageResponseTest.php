<?php

use App\Models\User;
 
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('home page returns a successful response', function () {
    $response = $this->get(route('pages.home'));
    $response->assertOk();
});
 
test('course details page returns a successful response', function () {
   $course = Course::factory()->released()->create();
    $response = $this->get(route('pages.course-details', $course->slug));
    $response->assertOk();
});

test('dashboard page returns a successful response', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
    ->get(route('dashboard'))
    ->assertOk();
});
