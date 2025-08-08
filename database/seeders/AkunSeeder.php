<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin DPD",
            "email" => "admin.dpd@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpd",
        ]);
       
        User::create([
            "name" => "admin DPC Lamsel",
            "email" => "admin.lamsel@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 1,
            "kabupaten" => "Lampung Selatan"
        ]);

        User::create([
            "name" => "admin DPC Lambar",
            "email" => "admin.lambar@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 2,
            "kabupaten" => "Lampung Barat"
        ]);

        User::create([
            "name" => "admin DPC Lamteng",
            "email" => "admin.lamteng@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 3,
            "kabupaten" => "Lampung Tengah"
        ]);

        User::create([
            "name" => "admin DPC Lamtim",
            "email" => "admin.lamtim@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 4,
            "kabupaten" => "Lampung Timur"
        ]);

        User::create([
            "name" => "admin DPC Mesuji",
            "email" => "admin.mesuji@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 5,
            "kabupaten" => "Mesuji"
        ]);

        User::create([
            "name" => "admin DPC Pringsewu",
            "email" => "admin.pringsewu@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 6,
            "kabupaten" => "Pringsewu"
        ]);

        User::create([
            "name" => "admin DPC Pesisir Barat",
            "email" => "admin.pesibar@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 7,
            "kabupaten" => "Pesisir Barat"
        ]);

        User::create([
            "name" => "admin DPC Tanggamus",
            "email" => "admin.tanggamus@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 8,
            "kabupaten" => "Tanggamus"
        ]);

        User::create([
            "name" => "admin DPC Tulang Bawang",
            "email" => "admin.tuba@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 9,
            "kabupaten" => "Tulang Bawang"
        ]);

        User::create([
            "name" => "admin DPC Tulang Bawang Barat",
            "email" => "admin.tubaba@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 10,
            "kabupaten" => "Tulang Bawang Barat"
        ]);

        User::create([
            "name" => "admin DPC Way Kanan",
            "email" => "admin.waykanan@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 11,
            "kabupaten" => "Way Kanan"
        ]);

        User::create([
            "name" => "admin DPC Bandar Lampung",
            "email" => "admin.balam@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 12,
            "kabupaten" => "Bandar Lampung"
        ]);

        User::create([
            "name" => "admin DPC Metro",
            "email" => "admin.metro@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 13,
            "kabupaten" => "Metro"
        ]);

        User::create([
            "name" => "admin DPC Pesawaran",
            "email" => "admin.pesawaran@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 14,
            "kabupaten" => "Pesawaran"
        ]);

        User::create([
            "name" => "admin DPC Lampung Utara",
            "email" => "admin.lamut@hwdilampung.or.id",
            "password" => Hash::make("123456"),
            "plain_password" => "123456",
            "role" => "dpc",
            "kabupaten_id" => 15,
            "kabupaten" => "Lampung Utara"
        ]);
    }
}
