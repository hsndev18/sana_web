<?php

namespace App\Livewire\Visitors\Exam;

use App\Models\Video;
use App\Models\Answer;
use App\Models\Attempt;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;

    public $videoId;
    public $video;
    public $questions;
    public $answers = [];

    public $examSubmited = false;

    public function mount($videoId)
    {
        $this->videoId = $videoId;
        $this->video = Video::where('id', $videoId)->first();

        $this->video->load('questions.answers');

        $questionsCount = $this->video->questions->count();
        $this->questions = $this->video->questions->random($questionsCount);
    }

    public function selectAnswer($questionId, $answerId)
    {
        $this->answers[$questionId] = $answerId;
    }

    public function render()
    {
        return view('livewire.visitors.exam.show');
    }

    public function save()
    {

        $this->validate([
            'answers' => 'required|array|size:' . count($this->questions),
            'answers.*' => 'required|exists:answers,id',
        ], [
            'answers.*.required' => __('يجب اختيار الإجابة'),
            'answers.*.exists' => __('الإجابة المختارة غير صحيحة'),
            'answers.required' => __('يجب اختيار الإجابة'),
            'answers.array' => __('يجب اختيار الإجابة'),
            'answers.min' => __('يجب إكمال الاجابة على جميع الأسئلة'),
            'answers.max' => __('يجب إكمال الاجابة على جميع الأسئلة'),
            'answers.size' => __('يجب إكمال الاجابة على جميع الأسئلة'),
        ]);


        try {
            DB::beginTransaction();
            $sessionId = session()->getId();
            $examAttempt = Attempt::create([
                'session_id' => $sessionId,
                'attemptable_id' => $this->video->id,
                'attemptable_type' => Video::class,
                'result' => 0,
            ]);

            $totalCorrect = 0;
            $answers = $this->answers;
            $totalQuestions = count($answers);

            foreach ($answers as $questionId => $answerId) {
                $answer = Answer::find($answerId);

                // Attach this answer to the attempt
                $examAttempt->answers()->attach($answerId, ['question_id' => $questionId]);

                // Check if the answer is correct
                if ($answer && $answer->is_correct) {
                    $totalCorrect++;
                }
            }

            // Calculate grade
            $examAttempt->save();

            $this->alert('success', 'Done, Your Grade is : ' . $totalCorrect . '/' . $totalQuestions, [
                'position' => 'bottom-end',
                'timer' => 3000,
            ]);

            $this->examSubmited = true;

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $this->alert('error', $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
            ]);
            Log::error('Error Occur in exam for : ' . $e->getMessage());
        }
    }
}
