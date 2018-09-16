<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Kategori;
use App\Barang;
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
        DB::table('reparasi')->delete();

        $shabrina = User::create(array(
            'name' => 'Shabrina',
            'nisn'  => '11084',
            'role' => '1',
            'password' => bcrypt('shabrina')));

        $mega = User::create(array(
            'name' => 'Mega',
            'nisn'  => '11085',
            'role' => '1',
            'password' => bcrypt('mega')));

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

        $this->command->info('Barang telah diisi!');

        // Reparasi::create(array(
        //     'reparasi_id'  => rand(),
        //     'barang_id'  => $kamera->id,
        //     'jumlah_barang'  => '10',
        //     'keterangan_reparasi' => 'Terjatuh dan bangkit lagi',
        //     'status' => '1'
        // ));

        // Reparasi::create(array(
        //     'reparasi_id'  => rand(),
        //     'barang_id'  => $projektor->id,
        //     'jumlah_barang'  => '15',
        //     'keterangan_reparasi' => 'Terjatuh dan bangkit lagi',
        //     'status' => '1'
        // ));

        // $this->command->info('Reparasi telah dibuat!');
    }
}
