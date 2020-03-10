<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        $data[] = [
          'name' => 'admin',
          'email' => 'admin@mail.ru',
          'password' => Hash::make('12345678'),
            'is_admin' => true
        ];

        for($i = 0; $i < 10; $i++){
            $data[] = [
                'name' => 'stest' . $i,
                'email' => 'stest' . $i . '@mail.ru',
                'password' => Hash::make('12345678'),
                'is_admin' => false
            ];
        }

        return $data;
    }
}
