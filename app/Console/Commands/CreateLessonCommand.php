<?php

namespace App\Console\Commands;

use App\Models\Lesson;
use Illuminate\Console\Command;

class CreateLessonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-lesson-command {subject_id} {semester_id} {grade_id} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new lesson command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating a new lesson...');

        $lesson = Lesson::create([
            'subject_id' => $this->argument('subject_id'),
            'semester_id' => $this->argument('semester_id'),
            'grade_id' => $this->argument('grade_id'),
            'name' => $this->argument('name'),
        ]);

        $this->info('Lesson created successfully.');
    }
}
