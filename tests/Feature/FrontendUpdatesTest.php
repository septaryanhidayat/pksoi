<?php

use App\Models\Download;
use App\Models\Dpc;
use App\Models\Post;

test('halaman dpc tidak menampilkan nama ketua', function () {
    Dpc::create([
        'name' => 'DPC PKS Indralaya',
        'slug' => 'dpc-pks-indralaya',
        'head_name' => 'Ahmad Fauzi',
        'address' => 'Jl. Lintas Timur KM 35 Indralaya',
        'description' => 'Kantor Cabang PKS Indralaya melayani masyarakat.',
    ]);

    $response = $this->get(route('dpc.index'));

    $response->assertStatus(200);
    $response->assertSee('DPC PKS Indralaya');
    $response->assertDontSee('Ketua:');
});

test('halaman home menampilkan 4 artikel samping dan slider ebook sebagai etalase', function () {
    // Siapkan kategori dan posts
    $category = \App\Models\Category::firstOrCreate(['name' => 'Berita'], ['slug' => 'berita']);
    for ($i = 1; $i <= 6; $i++) {
        $post = Post::create([
            'title' => "Berita Uji Coba $i",
            'slug' => "berita-uji-coba-$i",
            'type' => 'post',
            'status' => 'publish',
            'content' => "Konten Berita Uji Coba $i",
            'excerpt' => "Cuplikan Berita Uji Coba $i",
            'published_at' => now(),
        ]);
        $post->categories()->attach($category->id);
    }

    $response = $this->get(route('home'));

    $response->assertStatus(200);
    $response->assertSee('Download E-Book');
    $response->assertSee('Dapatkan E-Book Gratis Materi Dakwah');
    $response->assertSee(route('download.ebook'));
    $response->assertSee('gtranslate_wrapper');
    $response->assertSee('back-to-top');
});

test('counter pengunjung bertambah pada setiap request get web', function () {
    $counterFile = storage_path('app/visitor_hits.txt');
    @unlink($counterFile);

    // Request 1: hits awal (53512) di-increment jadi 53513
    $this->get(route('home'));
    $hits1 = (int) file_get_contents($counterFile);
    expect($hits1)->toBe(53513);

    // Request 2: hits di-increment lagi jadi 53514
    $this->get(route('page.tentang-kami'));
    $hits2 = (int) file_get_contents($counterFile);
    expect($hits2)->toBe(53514);

    // Request 3: hits di-increment lagi jadi 53515
    $this->get(route('dpc.index'));
    $hits3 = (int) file_get_contents($counterFile);
    expect($hits3)->toBe(53515);
});

test('halaman download ebook memuat tombol unduh file asli', function () {
    $response = $this->get(route('download.ebook'));

    $response->assertStatus(200);
    $response->assertSee("Ma'rifatullah");
    $response->assertSee("Ma'rifatul Qur'an");
    $response->assertSee("Ghazwul Fikri");
    $response->assertSee('Download E-Book (PDF)');
});
