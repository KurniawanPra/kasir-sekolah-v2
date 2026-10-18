<?php

use App\Models\Jurusan;
use App\Models\User;

test('unauthenticated users are redirected to login when accessing jurusan index', function () {
    $response = $this->get(route('jurusan.index'));

    $response->assertRedirect(route('login'));
});

test('authenticated users can view jurusan index', function () {
    $user = User::factory()->create();
    Jurusan::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('jurusan.index'));

    $response->assertStatus(200);
    $response->assertSee('Data Jurusan');
});

test('authenticated users can search jurusan', function () {
    $user = User::factory()->create();
    Jurusan::factory()->create([
        'kode_jurusan' => 'RPL',
        'nama_jurusan' => 'Rekayasa Perangkat Lunak',
    ]);
    Jurusan::factory()->create([
        'kode_jurusan' => 'TKJ',
        'nama_jurusan' => 'Teknik Komputer dan Jaringan',
    ]);

    $response = $this->actingAs($user)->get(route('jurusan.index', ['search' => 'Perangkat']));

    $response->assertStatus(200);
    $response->assertSee('Rekayasa Perangkat Lunak');
    $response->assertDontSee('Teknik Komputer dan Jaringan');
});

test('authenticated users can view create jurusan page', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('jurusan.create'));

    $response->assertStatus(200);
    $response->assertSee('Tambah Jurusan');
});

test('authenticated users can store a new jurusan', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('jurusan.store'), [
        'kode_jurusan' => 'DKV',
        'nama_jurusan' => 'Desain Komunikasi Visual',
        'keterangan' => 'Jurusan desain grafis dan multimedia.',
        'status' => 'aktif',
    ]);

    $response->assertRedirect(route('jurusan.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('jurusans', [
        'kode_jurusan' => 'DKV',
        'nama_jurusan' => 'Desain Komunikasi Visual',
        'keterangan' => 'Jurusan desain grafis dan multimedia.',
        'status' => 'aktif',
    ]);
});

test('store jurusan requires kode_jurusan, nama_jurusan, and status', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('jurusan.store'), [
        'kode_jurusan' => '',
        'nama_jurusan' => '',
        'status' => '',
    ]);

    $response->assertSessionHasErrors(['kode_jurusan', 'nama_jurusan', 'status']);
});

test('authenticated users can view jurusan detail', function () {
    $user = User::factory()->create();
    $jurusan = Jurusan::factory()->create([
        'kode_jurusan' => 'AKL',
        'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
        'status' => 'aktif',
    ]);

    $response = $this->actingAs($user)->get(route('jurusan.show', $jurusan));

    $response->assertStatus(200);
    $response->assertSee('Akuntansi dan Keuangan Lembaga');
    $response->assertSee('AKL');
});

test('authenticated users can view edit jurusan page', function () {
    $user = User::factory()->create();
    $jurusan = Jurusan::factory()->create();

    $response = $this->actingAs($user)->get(route('jurusan.edit', $jurusan));

    $response->assertStatus(200);
    $response->assertSee($jurusan->nama_jurusan);
    $response->assertSee($jurusan->kode_jurusan);
});

test('authenticated users can update a jurusan', function () {
    $user = User::factory()->create();
    $jurusan = Jurusan::factory()->create([
        'kode_jurusan' => 'TM',
        'nama_jurusan' => 'Teknik Mesin',
        'status' => 'aktif',
    ]);

    $response = $this->actingAs($user)->put(route('jurusan.update', $jurusan), [
        'kode_jurusan' => 'TPM',
        'nama_jurusan' => 'Teknik Pemesinan',
        'keterangan' => 'Perbarui keterangan mesin',
        'status' => 'tidak aktif',
    ]);

    $response->assertRedirect(route('jurusan.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('jurusans', [
        'id' => $jurusan->id,
        'kode_jurusan' => 'TPM',
        'nama_jurusan' => 'Teknik Pemesinan',
        'keterangan' => 'Perbarui keterangan mesin',
        'status' => 'tidak aktif',
    ]);
});

test('authenticated users can delete a jurusan', function () {
    $user = User::factory()->create();
    $jurusan = Jurusan::factory()->create();

    $response = $this->actingAs($user)->delete(route('jurusan.destroy', $jurusan));

    $response->assertRedirect(route('jurusan.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseMissing('jurusans', [
        'id' => $jurusan->id,
    ]);
});
