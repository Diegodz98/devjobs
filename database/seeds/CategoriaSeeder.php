<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Frontend',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Backend',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Full Stack',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre' => 'DevOps',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre' => 'UI/UX',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Tech',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
    }
}
