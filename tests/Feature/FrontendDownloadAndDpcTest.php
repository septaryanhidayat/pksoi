<?php

use App\Models\Download;
use App\Models\Dpc;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('home page loads successfully', function () {
    $this->seed();
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('Sambutan Ketua DPD');
    $response->assertSee('Download E-Book');
});

test('dpc page displays real subdistricts without lorem ipsum', function () {
    $this->seed();
    $response = $this->get('/dpc-pks');
    $response->assertStatus(200);
    $response->assertSee('DPC PKS Indralaya');
    $response->assertSee('DPC PKS Tanjung Raja');
    $response->assertSee('DPC PKS Tanjung Batu');
    $response->assertDontSee('Lorem Ipsum is simply dummy text');
});

test('download ebook returns real file attachment', function () {
    $this->seed();
    $ebook = Download::where('file_path', 'like', '%.pdf')->first();
    expect($ebook)->not->toBeNull();

    $response = $this->get(route('download.file', $ebook->id));
    $response->assertStatus(200);
    $response->assertHeader('content-type', 'application/pdf');
    expect($response->headers->get('content-disposition'))->toContain('attachment');
});

test('download audio returns mp3 attachment', function () {
    $this->seed();
    $audio = Download::where('file_path', 'like', '%.mp3')->first();
    expect($audio)->not->toBeNull();

    $response = $this->get(route('download.file', $audio->id));
    $response->assertStatus(200);
    $response->assertHeader('content-type', 'audio/mpeg');
    expect($response->headers->get('content-disposition'))->toContain('attachment');
});
