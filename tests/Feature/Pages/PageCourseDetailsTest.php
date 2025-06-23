<?php

use App\Models\Video;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('shows course details', function () {
    // Arrange
    $course = Course::factory()
    ->released()
    ->create();
    
    // Act Assert
    $this->get(route('course-details', $course))
    ->assertOk()  
      ->assertSeeText([
              $course->title,
              $course->tagline,
              $course->description,
            ...$course->learnings,
           ]);
});

test('shows course video count', function () {
    // Arrange
    //$this->withoutExceptionHandling();
    $course = Course::factory()->create();
    Video:: factory()->count(3)->create(['course_id' => $course->id]);
    
    // Act & Assert
    $this->get(route('course-details', $course))
     ->assertOk()
     ->assertSeeText('3 videos');
    
});
