<?php

use App\Models\Agenda;
use App\Models\AnggotaDewan;
use App\Models\Bidang;
use App\Models\Category;
use App\Models\Download;
use App\Models\Pengumuman;
use App\Models\Post;

test('home page renders all authentic sections successfully', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('Menu Utama');
    $response->assertSee('Sambutan Ketua DPD');
    $response->assertSee('Berita Fraksi PKS');
    $response->assertSee('Kabar Senayan');
    $response->assertSee('Anggota DPRD Fraksi PKS');
    $response->assertSee('Video');
    $response->assertSee('Download E-Book');
    $response->assertSee('Daftar PKS Online');
    $response->assertSee('Pengunjung');
    $response->assertDontSee('Statistik Pengunjung Website');
});

test('articles page renders successfully', function () {
    $category = Category::create(['name' => 'Berita', 'slug' => 'berita']);
    $post = Post::create([
        'title' => 'Uji Coba Artikel PKS',
        'slug' => 'uji-coba-artikel-pks',
        'content' => '<p>Konten artikel pengujian.</p>',
        'status' => 'publish',
        'type' => 'post',
    ]);
    $post->categories()->attach($category->id);

    $response = $this->get('/artikel');
    $response->assertStatus(200);
    $response->assertSee('Uji Coba Artikel PKS');

    $detailResponse = $this->get('/artikel/uji-coba-artikel-pks');
    $detailResponse->assertStatus(200);
    $detailResponse->assertSee('Konten artikel pengujian.');
});

test('static profil pages render successfully', function () {
    Post::create([
        'title' => 'Sambutan Ketua DPD',
        'slug' => 'sambutan-ketua-dpd',
        'content' => 'Isi sambutan ketua',
        'status' => 'publish',
        'type' => 'page',
    ]);
    Post::create([
        'title' => 'Tentang Kami',
        'slug' => 'tentang-kami',
        'content' => 'Profil kami',
        'status' => 'publish',
        'type' => 'page',
    ]);
    Post::create([
        'title' => 'Visi dan Misi',
        'slug' => 'visi-dan-misi',
        'content' => 'Visi misi partai',
        'status' => 'publish',
        'type' => 'page',
    ]);
    Post::create([
        'title' => 'Sejarah',
        'slug' => 'sejarah',
        'content' => 'Sejarah partai',
        'status' => 'publish',
        'type' => 'page',
    ]);

    $this->get('/sambutan-ketua-dpd')->assertStatus(200);
    $this->get('/tentang-kami')->assertStatus(200);
    $this->get('/visi-dan-misi')->assertStatus(200);
    $this->get('/sejarah')->assertStatus(200);
    $this->get('/struktur-kepengurusan')->assertStatus(200);
});

test('dewan, bidang, agenda, and pengumuman pages render successfully', function () {
    AnggotaDewan::create([
        'name' => 'H. Asmawi',
        'slug' => 'h-asmawi',
        'position' => 'Ketua Fraksi PKS DPRD OI',
    ]);

    Bidang::create([
        'name' => 'Bidang Kaderisasi',
        'slug' => 'bidang-kaderisasi',
        'description' => 'Mencetak kader berkualitas',
    ]);

    Agenda::create([
        'title' => 'Musda PKS',
        'slug' => 'musda-pks',
        'status' => 'publish',
    ]);

    Pengumuman::create([
        'title' => 'Pengumuman Penting',
        'slug' => 'pengumuman-penting',
        'status' => 'publish',
    ]);

    $this->get('/anggota-dewan')->assertStatus(200)->assertSee('H. Asmawi');
    $this->get('/bidang')->assertStatus(200)->assertSee('Bidang Kaderisasi');
    $this->get('/bidang/bidang-kaderisasi')->assertStatus(200);
    $this->get('/agenda')->assertStatus(200)->assertSee('Musda PKS');
    $this->get('/pengumuman')->assertStatus(200)->assertSee('Pengumuman Penting');
});

test('feedback form submission works', function () {
    $this->get('/hubungi')->assertStatus(200);

    $response = $this->post('/hubungi', [
        'nama' => 'Ahmad Pengunjung',
        'email' => 'ahmad@example.com',
        'whatsapp' => '081234567890',
        'saran_kritik' => 'Semoga PKS semakin maju dan membela rakyat.',
    ]);

    $response->assertRedirect('/hubungi');
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('feedbacks', [
        'name' => 'Ahmad Pengunjung',
        'email' => 'ahmad@example.com',
    ]);
});

test('download pages render successfully', function () {
    Download::create([
        'title' => 'Mars PKS',
        'category_type' => 'Lagu',
        'file_path' => '/uploads/2025/09/Mars-PKS.mp3',
        'file_type' => 'MP3',
    ]);

    $this->get('/download')->assertStatus(200)->assertSee('Mars PKS');
    $this->get('/e-book')->assertStatus(200);
    $this->get('/hymne-mars-pks')->assertStatus(200);
    $this->get('/logo')->assertStatus(200);
    $this->get('/donasi')->assertStatus(200);
});

test('footer has visitor counter with data-target and responsive mobile center alignment', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('id="footer-visitor-counter"', false);
    $response->assertSee('data-target=', false);
    $response->assertSee('text-center md:text-left', false);
});

test('site settings update dynamically reflects across header, footer, and contact page', function () {
    \App\Models\Setting::updateOrCreate(['key' => 'contact_phone'], ['value' => '08999888777', 'group' => 'general']);
    \App\Models\Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'sekretariat@pks-oi.id', 'group' => 'general']);
    \App\Models\Setting::updateOrCreate(['key' => 'contact_address'], ['value' => 'Gedung Dakwah DPD PKS Ogan Ilir Baru', 'group' => 'general']);

    // Re-share to simulate fresh request
    $settings = \App\Models\Setting::all()->pluck('value', 'key')->toArray();
    \Illuminate\Support\Facades\View::share('siteSettings', $settings);

    $home = $this->get('/');
    $home->assertSee('08999888777');
    $home->assertSee('sekretariat@pks-oi.id');
    $home->assertSee('Gedung Dakwah DPD PKS Ogan Ilir Baru');

    $contact = $this->get('/hubungi');
    $contact->assertSee('08999888777');
    $contact->assertSee('sekretariat@pks-oi.id');
    $contact->assertSee('Gedung Dakwah DPD PKS Ogan Ilir Baru');
});

test('sambutan page renders dynamic content from database', function () {
    $page = Post::where('slug', 'sambutan-ketua-dpd')->first();
    if (!$page) {
        $page = Post::create([
            'title' => 'Sambutan Ketua DPD PKS Ogan Ilir',
            'slug' => 'sambutan-ketua-dpd',
            'content' => '<p>Uji coba pidato resmi dinamis ketua DPD.</p>',
            'status' => 'publish',
            'type' => 'page',
        ]);
    } else {
        $page->update(['content' => '<p>Uji coba pidato resmi dinamis ketua DPD.</p>']);
    }

    $response = $this->get('/sambutan-ketua-dpd');
    $response->assertStatus(200);
    $response->assertSee('Uji coba pidato resmi dinamis ketua DPD.', false);
});
