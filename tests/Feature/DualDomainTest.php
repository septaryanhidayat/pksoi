<?php

use App\Models\Post;

test('website can be accessed via pksoganilir domain', function () {
    $response = $this->get('https://pksoganilir.com/');

    $response->assertStatus(200);
});

test('website can be accessed via oganilir.pks.id domain', function () {
    $response = $this->get('https://oganilir.pks.id/');

    $response->assertStatus(200);
});

test('website can be accessed via ogan.ilir.pks.id domain', function () {
    $response = $this->get('https://ogan.ilir.pks.id/');

    $response->assertStatus(200);
});

test('subpages are reachable across both domains', function () {
    $response1 = $this->get('https://pksoganilir.com/hubungi');
    $response1->assertStatus(200);

    $response2 = $this->get('https://oganilir.pks.id/hubungi');
    $response2->assertStatus(200);
});
