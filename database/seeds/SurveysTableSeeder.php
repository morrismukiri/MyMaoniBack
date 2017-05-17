<?php

use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//        factory(\App\Models\Survey::class, 10)->create();
        factory(\App\Models\Survey::class, 10)
            ->create()
            ->each(function ($survey) {
                $survey->polls()
                    ->saveMany(factory(\App\Models\Poll::class, rand(2, 5))->create()
                        ->each(function ($poll) {
                            $poll->answers()
                                ->saveMany(factory(\App\Models\Answers::class,rand(2, 5) )->make());
                        }));

            });
    }
}
