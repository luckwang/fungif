<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(GifsTableSeeder::class);
        $this->call(GifTagTableSeeder::class);
		$this->call(RepliesTableSeeder::class);
    }
}
