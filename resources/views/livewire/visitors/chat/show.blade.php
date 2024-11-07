<div>
    <div class="chat-box-section">
        <div class="chat-top-bar">
            <div class="section-title">
                <div class="icon">
                    <img src="{{ asset('assets/images/icons/document-file.png') }}" alt="">
                </div>
                <h6 class="title">Website roadmap title write me</h6>
            </div>
            <div class="dropdown history-box-dropdown">
                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-regular fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu style-one">
                    <li><a class="dropdown-item" href="text-generator.html#"><i
                                class="fa-sharp fa-solid fa-arrows-rotate"></i> Regenerate</a></li>
                    <li><a class="dropdown-item" href="text-generator.html#"><i class="fa-sharp fa-solid fa-tag"></i>
                            Pin Chat</a></li>
                    <li><a class="dropdown-item" href="text-generator.html#"><i class="fa-solid fa-file-lines"></i>
                            Rename</a></li>
                    <li><a class="dropdown-item" href="text-generator.html#"><i class="fa-solid fa-share-nodes"></i>
                            Share</a></li>
                    <li><a class="dropdown-item delete-item" href="text-generator.html#"><i
                                class="fa-solid fa-trash-can"></i> Delete Chat</a></li>
                </ul>
            </div>
        </div>
        <div class="chat-box-list" id="chatContainer">
            @forelse($chat?->messages ?? [] as $message)
                <div @class([
                    'chat-box',
                    'ai-speech' => $message->is_ai,
                    'author-speech' => !$message->is_ai,
                ])>
                    <div class="inner">
                        <div class="chat-section">
                            <div class="author">
                                <img class="w-100"
                                    @if ($message->is_ai) src="{{ asset('assets/images/team/avater.png') }}" @else src="{{ asset('assets/images/team/team-01sm.jpg') }}" @endif
                                    alt="Author">
                            </div>
                            <div class="chat-content">
                                @if ($message->is_ai)
                                    <h6 class="title">SANA AI<span class="rainbow-badge-card">
                                            <i class="fa-sharp fa-regular fa-check"></i> Bot</span>
                                    </h6>
                                @else
                                    <h6 class="title">HASAN</h6>
                                @endif

                                {{ $message->content }}

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="chat-box ai-speech">
                    <div class="inner">
                        <div class="chat-section">
                            <div class="author">
                                <img class="w-100" src="{{ asset('assets/images/team/avater.png') }}" alt="AiWave">
                            </div>
                            <div class="chat-content">
                                <h6 class="title">SANA AI<span class="rainbow-badge-card"><i
                                            class="fa-sharp fa-regular fa-check"></i> Bot</span></h6>
                                <p class="mb--20">تم معالجة المقطع التالي: <a
                                        href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                                        target="_blank">https://www.youtube.com/watch?v={{ $video->video_id }}</a></p>
                                <p class="mb--20">تقدر تسألني أي سؤال بخصوص هذا المقطع وماراح اقصر معك ابداً</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="rbt-static-bar">
            <div class="new-chat-form border-gradient">
                <textarea id="txtarea" rows="1" placeholder="Send a message..." wire:model="question"
                    wire:loading.attr="disabled" id="user_message"></textarea>

                <div class="right-icons">
                    <a class="form-icon icon-send" wire:loading.attr="disabled" id="sendBtn"
                        wire:click="sendMessage()" data-bs-placement="top">
                        <i class="fa-sharp fa-solid fa-paper-plane-top"></i>
                    </a>
                </div>
            </div>
            <p class="b3 small-text">AiWave can make mistakes. Consider checking important information.</p>
            @script
                <script>
                    $wire.on('messageSent', () => {
                        $wire.dispatch('getResponse');
                        window.scrollTo(0, document.body.scrollHeight);
                    });

                    $wire.on('responseRetrieved', (content) => {
                        setTimeout(() => {
                            const element = $("#last_bot_message").find(".msg-text");
                            if (element.length !== 0) {
                                typeWriter(element, content[0], 0);
                            }
                            window.scrollTo(0, document.body.scrollHeight);
                        }, 500);
                    });

                    function typeWriter(element, content, i) {
                        if (i < content.length) {
                            element.append(content.charAt(i));

                            i++;
                            setTimeout(() => typeWriter(element, content, i), 20);
                        }
                    }
                </script>
            @endscript
        </div>
    </div>
</div>
