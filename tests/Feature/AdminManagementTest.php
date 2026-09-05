<?php

use App\Models\ActivityLog;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('admin can manage users with multi roles', function () {
    $superAdmin = User::create([
        'name' => 'Super Admin PKS',
        'email' => 'superadmin@pksoganilir.id',
        'password' => Hash::make('Secret12345!'),
        'role' => 'super_admin',
    ]);

    $this->actingAs($superAdmin);

    // List users
    $this->get('/admin/users')->assertStatus(200)->assertSee('Super Admin PKS');

    // Create editor user
    $response = $this->post('/admin/users', [
        'name' => 'Editor Berita',
        'email' => 'editor@pksoganilir.id',
        'password' => 'Password123!',
        'role' => 'editor',
    ]);

    $response->assertRedirect('/admin/users');
    $this->assertDatabaseHas('users', [
        'email' => 'editor@pksoganilir.id',
        'role' => 'editor',
    ]);
});

test('admin can manage static profile pages with rich content', function () {
    $admin = User::create([
        'name' => 'Admin Content',
        'email' => 'content@pksoganilir.id',
        'password' => Hash::make('Secret12345!'),
        'role' => 'admin',
    ]);

    $page = Post::create([
        'title' => 'Visi Misi DPD PKS',
        'slug' => 'visi-misi-dpd',
        'content' => '<p>Visi dan misi partai untuk rakyat.</p>',
        'type' => 'page',
        'status' => 'publish',
    ]);

    $this->actingAs($admin);

    $this->get('/admin/pages')->assertStatus(200)->assertSee('Visi Misi DPD PKS');

    // Edit page
    $response = $this->put("/admin/pages/{$page->id}", [
        'title' => 'Visi Misi DPD PKS Ogan Ilir Terbaru',
        'content' => '<p>Konten baru yang telah diedit via WYSIWYG.</p>',
        'status' => 'publish',
    ]);

    $response->assertRedirect('/admin/pages');
    $this->assertDatabaseHas('posts', [
        'id' => $page->id,
        'title' => 'Visi Misi DPD PKS Ogan Ilir Terbaru',
    ]);
});

test('admin can view activity and security logs and download backup', function () {
    $admin = User::create([
        'name' => 'Admin Security',
        'email' => 'sec@pksoganilir.id',
        'password' => Hash::make('Secret12345!'),
        'role' => 'admin',
    ]);

    ActivityLog::create([
        'user_name' => 'Admin Security',
        'action' => 'test_action',
        'description' => 'Log pengujian sistem',
        'ip_address' => '127.0.0.1',
        'status' => 'info',
    ]);

    $this->actingAs($admin);

    $this->get('/admin/security')->assertStatus(200)->assertSee('Log pengujian sistem');

    // Database backup view & download stream
    $this->get('/admin/backup')->assertStatus(200)->assertSee('Download File Backup');
    $backupResponse = $this->get('/admin/backup/download');
    $backupResponse->assertStatus(200);
    $backupResponse->assertHeader('content-type', 'application/sql');
});

test('admin can update seo and opengraph settings', function () {
    $admin = User::create([
        'name' => 'Admin SEO',
        'email' => 'seo@pksoganilir.id',
        'password' => Hash::make('Secret12345!'),
        'role' => 'admin',
    ]);

    $this->actingAs($admin);

    $this->get('/admin/settings')->assertStatus(200)->assertSee('SEO & Social Share (OpenGraph)', false);

    $response = $this->post('/admin/settings', [
        'site_name' => 'DPD PKS Ogan Ilir Official',
        'og_title' => 'Official DPD PKS Ogan Ilir',
        'og_description' => 'Website Resmi PKS Ogan Ilir',
        'twitter_card' => 'summary_large_image',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('settings', [
        'key' => 'site_name',
        'value' => 'DPD PKS Ogan Ilir Official',
    ]);
    $this->assertDatabaseHas('settings', [
        'key' => 'og_title',
        'value' => 'Official DPD PKS Ogan Ilir',
    ]);
});

test('gallery displays uploaded photos on galeri page and home page', function () {
    $photo = Post::create([
        'title' => 'Dokumentasi Baksos Ogan Ilir Terkini',
        'slug' => 'dokumentasi-baksos-ogan-ilir-terkini',
        'type' => 'gallery',
        'status' => 'publish',
        'featured_image' => '/uploads/galeri/test_baksos.webp',
        'content' => 'Bakti sosial donor darah dan sembako.',
        'published_at' => now(),
    ]);

    // Check on /galeri page
    $this->get('/galeri')
        ->assertStatus(200)
        ->assertSee('Dokumentasi Baksos Ogan Ilir Terkini')
        ->assertSee('/uploads/galeri/test_baksos.webp');

    // Check on homepage
    $this->get('/')
        ->assertStatus(200)
        ->assertSee('test_baksos.webp');
});

test('admin can manage bidang with rich content', function () {
    $admin = User::create([
        'name' => 'Admin Bidang',
        'email' => 'bidang@pksoganilir.id',
        'password' => Hash::make('Secret12345!'),
        'role' => 'admin',
    ]);

    $bidang = \App\Models\Bidang::create([
        'name' => 'Bidang Kaderisasi Anggota Partai',
        'slug' => 'bidang-kaderisasi',
        'description' => '<p>Deskripsi program kerja pembinaan anggota.</p>',
        'order' => 1,
    ]);

    $this->actingAs($admin);

    $this->get('/admin/bidang')->assertStatus(200)->assertSee('Bidang Kaderisasi Anggota Partai');
    $this->get("/admin/bidang/{$bidang->id}/edit")->assertStatus(200)->assertSee('bidang_desc');

    $response = $this->put("/admin/bidang/{$bidang->id}", [
        'name' => 'Bidang Kaderisasi Anggota Partai Updated',
        'description' => '<p><strong>Program Kerja Unggulan:</strong> Pelatihan rutin setiap bulan.</p>',
        'order' => 1,
    ]);

    $response->assertRedirect('/admin/bidang');
    $this->assertDatabaseHas('bidangs', [
        'id' => $bidang->id,
        'name' => 'Bidang Kaderisasi Anggota Partai Updated',
    ]);
});

