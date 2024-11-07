<div>
    <div class="chat-box-section">
        <div class="chat-top-bar">
            <div class="section-title">
                <div class="icon">
                    <img src="{{ asset('assets/images/icons/document-file.png') }}" alt="">
                </div>
                <h6 class="title">جميع ماتحتاج من ملخصات للدرس : <p class="mb--20"> <a
                            href="https://www.youtube.com/watch?v={{ $video->video_id }}"
                            target="_blank">https://www.youtube.com/watch?v={{ $video->video_id }}</a></p>
                </h6>
            </div>

        </div>
        <div class="chat-box-list" id="chatContainer">
            <div class="chat-content">
                <ul>
                    @foreach ($snaps as $snap)
                        <li>
                            <p class="mb--20">{{ $snap->summary }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </div>
</div>
