<?php

use App\Models\Video;
use App\Models\Course;

test('shows course details', function () {
    // Arrange
    $course = Course::factory()
    ->released()
    ->create();
    
 
    // Act Assert
    $this->get(route('pages.course-details', $course))
    ->assertOk()  
      ->assertSeeText([
              $course->title,
              $course->tagline,
              $course->description,
            ...$course->learnings,
      ]) 
       ->assertSee(asset("images/$course->image_name"));
});

test('shows course video count', function () {
    // Arrange
    $course = Course::factory()
    ->released()
    ->has(Video::factory()->count(3))
    ->create();
   
    // Act & Assert
    $this->get(route('pages.course-details', $course))
     ->assertOk()
     ->assertSeeText('3 videos');
    
});

test('does not show unreleased courses', function () {
    // Arrange
    $course = Course::factory()
    ->create();
   
    // Act & Assert
    $this->get(route('pages.course-details', $course))
     ->assertNotFound();
    
});
