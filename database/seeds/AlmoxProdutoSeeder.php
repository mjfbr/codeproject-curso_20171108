<?php

use Illuminate\Database\Seeder;

class AlmoxProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeProject\Entities\AlmoxProduto::truncate();
        factory(\CodeProject\Entities\AlmoxProduto::class, 10)->create();
    }
}