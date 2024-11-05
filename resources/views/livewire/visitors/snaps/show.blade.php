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
          
        </div>
    </div>
</div>
