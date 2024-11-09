<div>
    <p class="description mt-3">يرجى نسخ رابط المقطع التعليمي ولصقه بالمكان المخصص له بالاسفل</p>
    <div class="form-group">
        <input name="text" id="slider-text-area" wire:model="videoUrl"  wire:keydown.enter="save()"
            placeholder="مثال: https://www.youtube.com">
        <a class="btn-default @@btnClass" wire:click="save()">إبدأ الآن مع سنا</a>
    </div>
</div>
