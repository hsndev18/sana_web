<div>
    <div class="chat-box-section">
        <div class="chat-top-bar">
            <div class="section-title">
                <div class="icon">
                    <img src="{{ asset('assets/images/icons/document-file.png') }}" alt="">
                </div>
                <h6 class="title">اختبر فهمك للدرس التالي: <p class="mb-0"> <a
                            href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                            target="_blank">https://www.youtube.com/watch?v={{ $video->video_id }}</a></p>
                </h6>
            </div>

        </div>
        <div class="chat-box-list" id="chatContainer">
            <div class="chat-content" dir="rtl">
                <ul>
                    @foreach ($questions as $index => $question)
                        <h6 class="mb-3 mt-3 pt-1">
                            {{ $loop->iteration . '. ' }}
                            {{ $question->content }}
                        </h6>
                        @foreach ($question->answers as $answerIndex => $answer)
                            <div class="form-check multiAnswer exam-answer @if($examSubmited && $answers[$question->id] == $answer->id && $answer->is_correct) correct-answer @elseif($examSubmited && $answers[$question->id] == $answer->id && !$answer->is_correct) wrong-answer @endif">
                                <input type="radio"
                                    class="form-check-input @error('answers.' . $question->id) is-invalid @enderror"
                                    id="answer.{{ $index }}.{{ $answerIndex }}"
                                    wire:click="selectAnswer({{ $question->id }}, {{ $answer->id }})"
                                    name="question.{{ $question->id }}"
                                    @if (isset($answers[$question->id]) && $answers[$question->id] == $answer->id) checked @endif>
                                <label class="form-check-label"
                                    for="answer.{{ $index }}.{{ $answerIndex }}">{{ $answer->content }}</label>
                                @error('answers.' . $question->id)
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    @endforeach
                </ul>

                <div class="row">
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button wire:click="save()" class="btn btn-default"
                            wire:loading.attr="disabled">
                            <span class="align-middle d-sm-inline-block me-sm-1">
                                {{ __('تسليم') }}
                            </span>
                            <i class="fa-regular fa-arrow-left me-3"></i>
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>
