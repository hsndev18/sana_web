<div>
    <div wire:poll class="text-white text-center">
        @switch(true)
            @case($video->status->isPending())
                <h4>تم تحويل  <span class="theme-gradient"> الفيديو </span>للمعالجة </h4>
                @break
            @case($video->status->isDownloaded())
                <h4>تم تحميل <span class="theme-gradient"> الفيديو </span>  ويجري استخراج النص</h4>
                @break
            @case($video->status->isTranscribed())
                <h4>تم استخراج النص من <span class="theme-gradient"> الفيديو </span> وتجري رقمنته</h4>
                @break
            @case($video->status->isCompleted())
                <h4>تم <span class="theme-gradient"> رقمنة </span> النص بنجاح وجاري فتح المحادثة...</h4>
                @break
            @case($video->status->isFailed())
                <h4>حدث خطأ أثناء معالجة الفيديو</h4>
                @break
        @endswitch

    </div>
</div>
