<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class studentDemoData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->Insert([
            'name' =>'Rahim',
            'roll'=>122
        ]);
    }
}
