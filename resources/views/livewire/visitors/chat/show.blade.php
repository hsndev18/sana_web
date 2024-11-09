<div>
    <div class="chat-box-section">
        <div class="chat-top-bar">
            <div class="section-title">
                <div class="icon">
                    <img src="{{ asset('assets/images/icons/document-file.png') }}" alt="">
                </div>
                <h6 class="title">
                    محادثة مع مقطع الفيديو ({{ $video->title ?? 'لا يوجد' }})
                </h6>
            </div>
            <div class="dropdown history-box-dropdown">
                <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <i class="fa-regular fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu style-one">
                    <li><a class="dropdown-item" href="#"><i class="fa-sharp fa-solid fa-arrows-rotate"></i> إعادة انشاء </a></li>
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
                                     @if ($message->is_ai) src="{{ asset('assets/images/logo/chatlogo.png') }}" @else src="{{ asset('assets/images/team/unknownuser.png') }}" @endif
                                     alt="Author">
                            </div>
                            <div class="chat-content" @if($loop->last && $message->is_ai) id="last_bot_message" @endif>
                                @if ($message->is_ai)
                                    <h6 class="title">سنا</h6>
                                @else
                                    <h6 class="title">ضيف</h6>
                                @endif
                                <div id="msg-text">
                                    @if(!$loop->last || $message->created_at->diffInSeconds() >= 10 || !$message->is_ai)
                                        {{ $message->content }}
                                    @endif
                                </div>
                                @if($loop->last && $message->is_ai)
                                    <div class="reaction-section">
                                        <div class="btn-grp justify-content-end">
                                            <div class="right-side-btn">
                                                <button data-bs-toggle="modal" onclick='Swal.fire({ title: "تم بنجاح!", text: "تم تقييم الرد بنجاح!", icon: "success" });' data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="fa-sharp fa-regular fa-thumbs-up"></i></button>
                                                <button data-bs-toggle="modal" onclick='Swal.fire({ title: "تم بنجاح!", text: "تم تقييم الرد بنجاح!", icon: "success" });' data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="fa-sharp fa-regular fa-thumbs-down"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($loop->last && !$message->is_ai)
                    <div class="chat-box ai-speech ">
                        <div class="inner">
                            <div class="chat-section">
                                <div class="author">
                                    <img class="w-100" src="{{ asset('assets/images/logo/chatlogo.png') }}" alt="Sana">
                                </div>
                                <div class="chat-content">
                                    <h6 class="title">سنا</h6>
                                    <div id="msg-text">
                                        يقوم سنا الآن بمعالجة الإجابة وإنشاءها، يرجى الانتظار...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
            <div class="new-chat-form border-gradient" >
                <textarea id="txtarea" rows="1" placeholder="اكتب رسالة..." wire:model="question"
                          wire:loading.attr="disabled" id="user_message" wire:keydown.enter="sendMessage()"></textarea>

                <div class="left-icons">
                    <a class="form-icon icon-send" wire:loading.attr="disabled" id="sendBtn"
                       wire:click="sendMessage()"  data-bs-placement="top">
                        <i class="fa-sharp fa-solid fa-paper-plane-top"></i>
                    </a>
                </div>
            </div>
            <p class="b3 small-text">سنا، لخلق تجربة تعليمية تفاعلية ممتعة ومفيدة</p>
            @script
            <script>
                $wire.on('messageSent', () => {
                    $wire.dispatch('getResponse');
                    setTimeout(() => {
                        window.scrollTo(0, document.body.scrollHeight);
                    }, 100);
                });

                $wire.on('responseRetrieved', (content) => {
                    setTimeout(() => {
                        const element = $("#last_bot_message").find("#msg-text");
                        if (element.length !== 0) {
                            typeWriter(element, content[0], 0);
                        }
                        window.scrollTo(0, document.body.scrollHeight);
                    }, 500);
                });

                function typeWriter(element, content, i) {
                    if (i < content.length) {
                        element.append(content.charAt(i));

                        if(document.body.scrollHeight > window.innerHeight){
                            window.scrollTo(0, document.body.scrollHeight);
                        }

                        i++;
                        setTimeout(() => typeWriter(element, content, i), 20);
                    }
                }
            </script>
            @endscript
        </div>
    </div>
</div>
