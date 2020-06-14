<?php

use Illuminate\Database\Seeder;
use App\Task;

class TaskSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 3)->create();
    }
}
