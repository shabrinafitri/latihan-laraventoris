<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Kategori;
use App\Barang;
use App\Peminjaman;
use App\Reparasi;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('profile')->delete();
        DB::table('kategori')->delete();
        DB::table('barang')->delete();
        DB::table('peminjaman')->delete();
        DB::table('reparasi')->delete();

        $shabrina = User::create(array(
            'name' => 'Shabrina Fitri',
            'nisn'  => '11084',
            'role' => '1',
            'password' => bcrypt('shabrina')));

        $mega = User::create(array(
            'name' => 'Mega Tri',
            'nisn'  => '11085',
            'role' => '1',
            'password' => bcrypt('mega')));

        $feby = User::create(array(
            'name' => 'Tri Feby',
            'nisn'  => '11086',
            'role' => '1',
            'password' => bcrypt('feby')));

        $sophia = User::create(array(
            'name' => 'Sophia Firdausya',
            'nisn'  => '11087',
            'role' => '1',
            'password' => bcrypt('sophia')));

        $alwi = User::create(array(
            'name' => 'Alwiansyah',
            'nisn'  => '11088',
            'role' => '1',
            'password' => bcrypt('alwi')));

        $bhagus = User::create(array(
            'name' => 'Bhagus Firmansyah',
            'nisn'  => '11089',
            'role' => '1',
            'password' => bcrypt('bhagus')));

        $admin = User::create(array(
            'name' => 'Admin',
            'nisn'  => '11000',
            'role' => '2',
            'password' => bcrypt('admin')));

		$this->command->info('User telah diisi!');

        Profile::create(array(
            'jurusan'  => 'Rekayasa Perangkat Lunak',
            'angkatan'  => '2016',
            'user_id' => $shabrina->id
        ));

        Profile::create(array(
            'jurusan'  => 'Rekayasa Perangkat Lunak',
            'angkatan'  => '2016',
            'user_id' => $mega->id
        ));

        Profile::create(array(
            'jurusan'  => 'Administrasi Perkantoran',
            'angkatan'  => '2017',
            'user_id' => $feby->id
        ));

        Profile::create(array(
            'jurusan'  => 'Administrasi Perkantoran',
            'angkatan'  => '2017',
            'user_id' => $sophia->id
        ));

        Profile::create(array(
            'jurusan'  => 'Akutansi',
            'angkatan'  => '2019',
            'user_id' => $alwi->id
        ));

        Profile::create(array(
            'jurusan'  => 'Akutansi',
            'angkatan'  => '2019',
            'user_id' => $bhagus->id
        ));

        Profile::create(array(
            'jurusan'  => 'Operator',
            'angkatan'  => '2016',
            'user_id' => $admin->id
        ));

        $this->command->info('Profile telah diisi!');

        /////

        $projektor = Kategori::create(array(
            'nama_kategori' => 'Projektor'
        ));

        $kamera = Kategori::create(array(
            'nama_kategori' => 'Kamera'
        ));

        $spidol = Kategori::create(array(
            'nama_kategori' => 'Spidol'
        ));

        $kok = Kategori::create(array(
            'nama_kategori' => 'Shuttlecock'
        ));

        $bola = Kategori::create(array(
            'nama_kategori' => 'Bola'
        ));

        $this->command->info('Kategori telah diisi!');

        Barang::create(array(
            'kode_barang'  => rand(),
            'nama_barang' => 'NEC VE280G',
            'keterangan_barang' => 'DLP, 2800 ANSI Lumens, SVGA, 2.3kg.',
            'stok' => '60',
            'kat_id' => $projektor->id
        ));

        Barang::create(array(
            'kode_barang'  => rand(),
            'nama_barang' => 'SONY A7 Mark III',
            'keterangan_barang' => '24.3MP Full-Frame Exmor CMOS Sensor',
            'stok' => '45',
            'kat_id' => $kamera->id
        ));

        Barang::create(array(
            'kode_barang'  => rand(),
            'nama_barang' => 'SNOWMAN',
            'keterangan_barang' => 'Black, Blue and Red Ink',
            'stok' => '100',
            'kat_id' => $spidol->id
        ));

        Barang::create(array(
            'kode_barang'  => rand(),
            'nama_barang' => 'YONEX Aerosensa 50',
            'keterangan_barang' => 'Bulu Angsa Asli',
            'stok' => '60',
            'kat_id' => $kok->id
        ));

        $this->command->info('Barang telah diisi!');

        Peminjaman::create(array(
            'peminjaman_id'  => rand(),
            'user_id'  => $shabrina->id,
            'barang_id'  => $kamera->id,
            'jumlah_barang'  => '1',
            'status' => 'dikembalikan'
        ));

        Peminjaman::create(array(
            'peminjaman_id'  => rand(),
            'user_id'  => $mega->id,
            'barang_id'  => $kamera->id,
            'jumlah_barang'  => '2',
            'status' => 'dikembalikan'
        ));

        Peminjaman::create(array(
            'peminjaman_id'  => rand(),
            'user_id'  => $feby->id,
            'barang_id'  => $kok->id,
            'jumlah_barang'  => '1',
            'status' => 'dipinjam'
        ));

        Peminjaman::create(array(
            'peminjaman_id'  => rand(),
            'user_id'  => $bhagus->id,
            'barang_id'  => $projektor->id,
            'jumlah_barang'  => '1',
            'status' => 'dipinjam'
        ));

        $this->command->info('Peminjaman telah dibuat!');
        
        Reparasi::create(array(
            'reparasi_id'  => rand(),
            'barang_id'  => $projektor->id,
            'jumlah_barang'  => '15',
            'keterangan_reparasi' => 'Tersiram air rindu',
            'status' => 'perbaikan'
        ));

        Reparasi::create(array(
            'reparasi_id'  => rand(),
            'barang_id'  => $kamera->id,
            'jumlah_barang'  => '10',
            'keterangan_reparasi' => 'Terjatuh dan bangkit lagi',
            'status' => 'selesai'
        ));

        $this->command->info('Reparasi telah dibuat!');
    }
}
