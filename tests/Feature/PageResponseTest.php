<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
test('Named Route returns a successful response', function () {
    $response = $this->get(route('home'));
    $response->assertOk();
});