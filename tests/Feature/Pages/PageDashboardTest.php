<?php
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
    //   ->assertSee($user->courses->first()->title)
    //   ->assertSee($user->courses->last()->title);   
     
  });

// test('does not list any unpurchased courses', function () {   
//     //Arrange

//     //Act & Assert
// });

// test('shows most recent purchased course first', function () {   
//     //Arrange

//     //Act & Assert
// });
// test('includes link to product video', function () {   
//     //Arrange

//     //Act & Assert
// });