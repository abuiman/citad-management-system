<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $applicants = [
            [
              'email'    => 'mby378@gmail.com',
              'first_name'     => 'Muhammad Bello',
              'surname'     => 'Yahaya',
              'other_name'     => 'Bello',
              'phone'     => '07036896412',
              'password' => Hash::make('12345678'),
              'status'   => 1
            ],
            [
                'email'    => 'imnadglobal@gmail.com',
                'first_name'     => 'Amina',
                'surname'     => 'Muhammad Bello',
                'other_name'     => '',
                'phone'     => '08060210205',
              'password' => Hash::make('12345678'),
              'status'   => 1
            ],
            [
              'email'    => 'muhammadbelloyahaya@yahoo.com',
              'first_name'     => 'Nadeen',
              'surname'     => 'Muhammad',
              'other_name'     => 'Bello',
              'phone'     => '',
              'password' => Hash::make('12345678'),
              'status'   => 1
            ],
          ];
    }
}
