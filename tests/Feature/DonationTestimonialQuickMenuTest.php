<?php

use App\Models\Bidang;
use App\Models\QuickMenu;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('donation page renders bank sumsel babel as primary bank', function () {
    Setting::updateOrCreate(['key' => 'donation_bank_1_name'], ['value' => 'Bank Sumsel Babel Syariah', 'group' => 'general']);
    Setting::updateOrCreate(['key' => 'donation_bank_1_rekening'], ['value' => '', 'group' => 'general']);

    $response = $this->get('/donasi');
    $response->assertStatus(200);
    $response->assertSee('Bank Sumsel Babel Syariah');
    $response->assertSee('Bank Utama Wilayah');
    $response->assertSee('Nomor rekening sedang dalam proses pembaruan resmi');
});

test('donation page renders account number when configured in settings', function () {
    Setting::updateOrCreate(['key' => 'donation_bank_1_rekening'], ['value' => '1200987654321', 'group' => 'general']);

    $response = $this->get('/donasi');
    $response->assertStatus(200);
    $response->assertSee('1200987654321');
    $response->assertSee('Salin Nomor Rekening');
});

test('admin can update donation settings', function () {
    $admin = User::create([
        'name' => 'Admin Settings',
        'email' => 'admin_donasi@pks.id',
        'password' => Hash::make('Secret123!'),
        'role' => 'admin',
    ]);

    $response = $this->actingAs($admin)->post('/admin/settings', [
        'donation_bank_1_name' => 'Bank Sumsel Babel Syariah Cabang Indralaya',
        'donation_bank_1_rekening' => '888877776666',
        'donation_bank_1_holder' => 'DPD PKS KABUPATEN OGAN ILIR',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('settings', [
        'key' => 'donation_bank_1_rekening',
        'value' => '888877776666',
    ]);
});

test('admin can perform full CRUD on testimonials', function () {
    $admin = User::create([
        'name' => 'Admin Testi',
        'email' => 'admin_testi@pks.id',
        'password' => Hash::make('Secret123!'),
        'role' => 'admin',
    ]);

    // 1. Index
    $this->actingAs($admin)->get('/admin/testimonials')
        ->assertStatus(200)
        ->assertSee('Daftar Testimonial');

    // 2. Create / Store
    $response = $this->actingAs($admin)->post('/admin/testimonials', [
        'name' => 'Ustadz Ahmad Fauzi',
        'profession' => 'Tokoh Agama Indralaya',
        'content' => 'PKS Ogan Ilir selalu hadir melayani dan memperjuangkan aspirasi rakyat.',
        'status' => 'publish',
    ]);
    $response->assertRedirect('/admin/testimonials');

    $testi = Testimonial::where('name', 'Ustadz Ahmad Fauzi')->first();
    expect($testi)->not->toBeNull();
    expect($testi->status)->toBe('publish');

    // 3. Update
    $response = $this->actingAs($admin)->put("/admin/testimonials/{$testi->id}", [
        'name' => 'Ustadz Ahmad Fauzi, M.Pd.I',
        'profession' => 'Ulama & Tokoh Masyarakat',
        'content' => 'Pelayanan PKS Ogan Ilir sangat nyata dan konsisten.',
        'status' => 'publish',
    ]);
    $response->assertRedirect('/admin/testimonials');
    expect($testi->fresh()->name)->toBe('Ustadz Ahmad Fauzi, M.Pd.I');

    // 4. Delete
    $response = $this->actingAs($admin)->delete("/admin/testimonials/{$testi->id}");
    $response->assertRedirect('/admin/testimonials');
    $this->assertDatabaseMissing('testimonials', ['id' => $testi->id]);
});

test('admin can perform full CRUD on quick menus', function () {
    $admin = User::create([
        'name' => 'Admin Quick Menu',
        'email' => 'admin_qm@pks.id',
        'password' => Hash::make('Secret123!'),
        'role' => 'admin',
    ]);

    // 1. Index
    $this->actingAs($admin)->get('/admin/quick-menus')
        ->assertStatus(200)
        ->assertSee('Menu Cepat');

    // 2. Create
    $response = $this->actingAs($admin)->post('/admin/quick-menus', [
        'name' => 'Layanan Aspirasi',
        'url' => '/hubungi',
        'icon' => 'fa-solid fa-bullhorn',
        'order' => 10,
        'is_active' => '1',
    ]);
    $response->assertRedirect('/admin/quick-menus');

    $menu = QuickMenu::where('name', 'Layanan Aspirasi')->first();
    expect($menu)->not->toBeNull();
    expect($menu->is_active)->toBeTrue();

    // 3. Update
    $response = $this->actingAs($admin)->put("/admin/quick-menus/{$menu->id}", [
        'name' => 'Aspirasi Warga',
        'url' => '/hubungi',
        'icon' => '/uploads/2025/09/ICON-About.webp',
        'order' => 11,
        'is_active' => '1',
    ]);
    $response->assertRedirect('/admin/quick-menus');
    expect($menu->fresh()->name)->toBe('Aspirasi Warga');

    // 4. Delete
    $response = $this->actingAs($admin)->delete("/admin/quick-menus/{$menu->id}");
    $response->assertRedirect('/admin/quick-menus');
    $this->assertDatabaseMissing('quick_menus', ['id' => $menu->id]);
});

test('admin can update bidang icon and it displays on public page', function () {
    $admin = User::create([
        'name' => 'Admin Bidang',
        'email' => 'admin_bidang@pks.id',
        'password' => Hash::make('Secret123!'),
        'role' => 'admin',
    ]);

    $bidang = Bidang::create([
        'name' => 'Bidang Kaderisasi',
        'slug' => 'bidang-kaderisasi',
        'icon' => 'fa-solid fa-users',
    ]);

    $response = $this->actingAs($admin)->put("/admin/bidang/{$bidang->id}", [
        'name' => $bidang->name,
        'icon' => '/uploads/2023/08/Icon-KD2.webp',
        'order' => 1,
    ]);

    $response->assertRedirect('/admin/bidang');
    expect($bidang->fresh()->icon)->toBe('/uploads/2023/08/Icon-KD2.webp');

    // Check frontend public page
    $frontResponse = $this->get('/bidang');
    $frontResponse->assertStatus(200);
    $frontResponse->assertSee('/uploads/2023/08/Icon-KD2.webp');
});
