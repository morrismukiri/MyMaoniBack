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
        $this->call(CategoriesTableSeeder::class);

        $this->call(SurveysTableSeeder::class);
//        $this->call(PollsTableSeeder::class);
        $this->call(OpinionsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
//        $this->call(AnswersTableSeeder::class);
    }
}
