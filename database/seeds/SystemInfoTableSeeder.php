<?php

use Illuminate\Database\Seeder;

class SystemInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('system_infos')->delete();
        \DB::table('system_infos')->insert([
           0 => [
               'address' => '浙江省诸暨市陶朱街道唐三路19号',
               'phone' => '0575-87306058',
               'facsimile' => '0575-87303922',
               'email' => 'mi53068@hangfengtex.com',
               'contract_person' => '吴珊',
               'image' => '',
           ]
        ]);
    }
}
