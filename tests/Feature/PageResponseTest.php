<?php

test('Named Route returns a successful response', function () {
    $response = $this->get(route('home'));
    $response->assertOk();
});