<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use function Pest\Laravel\get;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

test('shows courses overview', function () {
    // arrange
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    // act & assert
    $this->get(route('page.home'))
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
    $releasedCourse = Course::factory()->released()->create();
    $notReleasedCourse = Course::factory()->create();
    // Act & Assert
    $this->get(route('page.home'))
        ->assertOk()
        ->assertSeeText($releasedCourse->title)
        ->assertDontSeeText($notReleasedCourse->title);

});

test('shows courses ordered by released date', function () {
    // Arrange
    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();
    $newestReleasedCourse = Course::factory()->released()->create();
    // act & assert
    $this->get(route('page.home'))
        ->assertSeeInOrder([
            $newestReleasedCourse->title,
            $releasedCourse->title,
        ]);
});

test('includes social tags', function () {
    // Arrange
    // Act
    // Assert
})->skip();
