<?php

use App\Models\Course;
use Illuminate\Queue\Middleware\Skip;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('shows courses overview', function () {
  //arrange
  Course::factory()->create(['title' => 'First course']);
  Course::factory()->create(['title' => 'Second course']);
  Course::factory()->create(['title' => 'Third course']);
  //act & assert
   $this->get(route('home'))
        ->assertSeeText(['First course', 'Second course', 'Third course']);
  
});


test('only shows released courses', function () {
    // Arrange
     //act 
  //assert
 
})->skip();

test('shows courses ordered by released date', function () {
    // Arrange
     //act 
  //assert  
})->skip();

test('includes social tags', function () {
    // Arrange
    // Act
    // Assert    
})->skip();