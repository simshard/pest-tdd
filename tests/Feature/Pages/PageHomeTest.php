<?php

use App\Models\Course;
use Illuminate\Queue\Middleware\Skip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

test('shows courses overview', function () {
  //arrange
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    // DD([  $firstCourse->title,
    //         $firstCourse->description,
    //         $secondCourse->title,
    //         $secondCourse->description,
    //         $lastCourse->title,
    //         $lastCourse->description,
    //     ]);
  //act & assert
   $this->get(route('home'))
        ->assertOk()
        ->assertSeeText([
          $firstCourse->title,
            $firstCourse->description,
            $secondCourse->title,
            $secondCourse->description,
            $lastCourse->title,
            $lastCourse->description,
        ]);
  
});


test('only shows released courses', function () {
    // Arrange
   $releasedCourse = Course::factory()->create(['title' => 'Released course','released_at' => Carbon::yesterday()]);
   $notReleasedCourse = Course::factory()->create(['title' => 'Unreleased course'] );
// Act & Assert
    $this->get(route('home'))
        ->assertOk()
        ->assertSeeText($releasedCourse->title)
        ->assertDontSeeText($notReleasedCourse->title);
 
}) ;

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