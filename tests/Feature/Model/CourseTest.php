<?php

use App\Models\Video;
use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('only returns released courses for released query scope', function () {
    // Arrange
    $releasedcourse = Course::factory()->released()->create();
    $unreleasedcourse = Course::factory()->create();

    // Act Assert
    expect(Course::released()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);

});


test('course has videos', function () {
    // Arrange
    $course = Course::factory()->create();
    Video:: factory()->count(3)->create(['course_id' => $course->id]);
    
    // Act & Assert 
    expect($course->videos)
    ->toHaveCount(3)
    ->each ->toBeInstanceOf(Video::class); 
    });
 
