<div class="row">
    <div class="swiper mySwiper p-5">
        <div class="swiper-wrapper large-height">
        @foreach ($snaps as $snap)
                <div class="rainbow-pricing style-aiwave swiper-slide">
                    <div class="pricing-table-inner">
                        <div class="pricing-top">
                            <div class="pricing-header ">
                                <div class="d-flex justify-content-between align-items-center gap-4">
                                    <h3 class="title color-var-one">البطاقة {{ $loop->iteration }} / {{ $snaps->count() }}</h3>
                                    <div class="icon">
                                        <i class="fa-regular fa-bolt"></i>
                                    </div>
                                </div>
                                <p class="h5 my-4 lh-base">{{ $snap->summary }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
    </div>

        @script
        <script>
            let myOwnSwiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
            });
        </script>
        @endscript
</div>
