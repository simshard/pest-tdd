<?php
use Carbon\Carbon;
use App\Models\User;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Sequence;

uses(RefreshDatabase::class);

test('logged in users can access dashboard page', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
    ->get(route('pages.dashboard'))
    ->assertOk();
});

test('guests will be redirected to login page', function () {   
    //Arrange

    //Act & Assert
    $this->get(route('pages.dashboard'))
    ->assertRedirect(route('login'));
});

 

  test('it lists purchased courses', function () {   
     //Arrange
      $user = User::factory()
      ->has(Course::factory()
      ->count(2)
      ->state(new Sequence(
    ['title' => 'Course A'],
    ['title' => 'Course B'],
      )) ,'purchasedCourses')
    ->create();
 
// $pcs = $user->purchasedCourses->toArray(); 
// dd($pcs[0]['title'].' * '.$pcs[1]['title']);

      //Act & Assert
      $this->actingAs($user)
      ->get(route('pages.dashboard'))
      ->assertOk() 
     
       ->assertSeeText(['Course A', 'Course B']);  
     
  });

 test('does not list any unpurchased courses', function () {   
    //Arrange
       $user = User::factory()->create();
       $course = Course::factory()->create(); 

//     //Act & Assert
    $this->actingAs($user)
      ->get(route('pages.dashboard'))
      ->assertOk()
      ->assertDontSee($course->title);
 });

 test('shows most recent purchased course first', function () {   
//     //Arrange
      $user = User::factory()->create();
    $firstPurchasedCourse = Course::factory()->create();
    $latestPurchasedCourse = Course::factory()->create();
    $user->purchasedCourses()->attach($firstPurchasedCourse, ['created_at' => Carbon::yesterday()]);
    $user->purchasedCourses()->attach($latestPurchasedCourse, ['created_at' => Carbon::now()]);
    //Act & Assert
       $this->actingAs($user)
      ->get(route('pages.dashboard'))
      ->assertOk() 
      ->assertSeeInOrder([
        $latestPurchasedCourse->title,
        $firstPurchasedCourse->title,  
        ]);
});


test('includes link to course video', function () {   
    //Arrange
    $user = User::factory()
    ->has(Course::factory(), 'purchasedCourses' )
    ->create();
    //Act & assert
    $this->actingAs($user)
    ->get(route('pages.dashboard'))
    ->assertOk()

    ->assertSeeText('Watch Video')
    ->assertSee(route('pages.course-video',Course::first()));
 
});