<?php

use App\Models\Course;
 use function Pest\Laravel\get;
 use function Pest\Laravel\get;
use Illuminate\Support\Carbon;

test('shows courses overview', function () {
    // arrange
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    // act & assert
    $this->get(route('pages.home'))
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
    $this->get(route('pages.home'))
        ->assertOk()
        ->assertSeeText($releasedCourse->title)
        ->assertDontSeeText($notReleasedCourse->title);

});

test('shows courses ordered by released date', function () {
    // Arrange
    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();
    $newestReleasedCourse = Course::factory()->released()->create();
    // act & assert
    $this->get(route('pages.home'))
        ->assertSeeInOrder([
            $newestReleasedCourse->title,
            $releasedCourse->title,
        ]);
});

it('includes login if not logged in', function () {
    // Act & Assert
     $this->get(route('pages.home'))
        ->assertOk()
        ->assertSeeText('Login')
        ->assertSee(route('login'));
});

it('includes link to dashboard if logged in', function () {
    // Act & Assert
    loginAsUser();
     $this->get(route('pages.home'))
        ->assertOk()
         ->assertSeeText('Dashboard')
        ->assertSee(route('pages.dashboard'));
});

it('includes courses link', function () {
    // Arrange
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    // Act & Assert
    $this->get(route('pages.home'))
        ->assertOk()
         ->assertSee([
            route('pages.course-details', $firstCourse),
            route('pages.course-details', $secondCourse),
            route('pages.course-details', $lastCourse),
        ]);
       
});

