<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];
        $data[] = ['category' => 'Спорт', 'name' => 'sport'];
        $data[] = ['category' => 'Здоровье', 'name' => 'zdorovie'];
        $data[] = ['category' => 'Политика', 'name' => 'politika'];
        return $data;
    }
}