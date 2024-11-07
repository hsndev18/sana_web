@extends('visitors.main_layouts.master')

@section('title', __('الرئيسية'))

@section('content')
    <!-- Start Slider Area  -->
    <div class="slider-area slider-style-1 variation-default slider-bg-image bg-banner1 slider-bg-shape"
         data-black-overlay="1">
        <!-- <div class="bg-blend-top bg_dot-mask"></div> -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="inner text-center mt--140" id="aboutsna">
                        <h1 class="title display-one">تطبيق سنا لتسهيل التعليم
                            <br> باستخدام نموذج علام اللغوي
                            <span class="header-caption">
                                <span class="cd-headline rotate-1">
                                    <span class="cd-words-wrapper" style="width: 221px;">
                                        <b class="theme-gradient is-visible">إســـــأل ســنـــا</b>
                                        <b class="theme-gradient is-hidden">ملخصات سنا</b>
                                        <b class="theme-gradient is-hidden">اخـتبر فهـمك</b>
                                    </span>
                                </span>
                            </span>
                        </h1>
                        {{-- SEND VIDEO --}}
                        <livewire:visitors.video.create />
                        {{-- END SEND VIDEO --}}
                        <div class="inner-shape">
                            <img src="{{ asset('assets/images/bg/icon-shape/icon-shape-one.png') }}" alt="Icon Shape"
                                 class="iconshape iconshape-one">
                            <img src="{{ asset('assets/images/bg/icon-shape/icon-shape-two.png') }}" alt="Icon Shape"
                                 class="iconshape iconshape-two">
                            <img src="{{ asset('assets/images/bg/icon-shape/icon-shape-three.png') }}" alt="Icon Shape"
                                 class="iconshape iconshape-three">
                            <img src="{{ asset('assets/images/bg/icon-shape/icon-shape-four.png') }}" alt="Icon Shape"
                                 class="iconshape iconshape-four">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shape">
            <img class="bg-shape-one" src="{{ asset('assets/images/bg/bg-shape-four.png') }}" alt="Bg Shape">
            <img class="bg-shape-two" src="{{ asset('assets/images/bg/bg-shape-five.png') }}" alt="Bg Shape">
        </div>
    </div>
    <!-- End Slider Area  -->

    <!-- Start Brand Area -->
    <!-- Start Tab__Style--one Area  -->
    <div class="rainbow-service-area rainbow-section-gap">
        <div class="container">
            <div class="row" id="whyus">
                <div class="col-lg-12">
                    <div class="section-title text-center pb--60" data-sal="slide-up" data-sal-duration="700"
                         data-sal-delay="100">
                        <h4 class="subtitle">
                            <span class="theme-gradient">لماذا نحن؟</span>
                        </h4>
                        <h2 class="title mb--0">ذكاء اصطناعي خصيصاً لك.</h2>
                    </div>
                </div>
            </div>

            <div class="row row--30 align-items-center">
                <div class="col-lg-12">
                    <div class="rainbow-default-tab style-three generator-tab-defalt">
                        <ul class="nav nav-tabs tab-button" role="tablist">
                            <li class="nav-item tabs__tab " role="presentation">
                                <button class="nav-link rainbow-gradient-btn without-shape-circle"
                                        id="video-generator-tab" data-bs-toggle="tab" data-bs-target="#video-generate"
                                        type="button" role="tab" aria-controls="video-generate"
                                        aria-selected="false"><span class="generator-icon"><img
                                            src="{{ asset('assets/images/icons/text-g.png') }}"
                                            alt="Vedio Generator Icon">اسأل سنا</span><span
                                        class="border-bottom-style"></span></button>
                            </li>
                            <li class="nav-item tabs__tab" role="presentation">
                                <button class="nav-link rainbow-gradient-btn without-shape-circle active"
                                        id="audio-generator-tab" data-bs-toggle="tab" data-bs-target="#audio-generate"
                                        type="button" role="tab" aria-controls="audio-generate"
                                        aria-selected="true"><span class="generator-icon"><img
                                            src="{{ asset('assets/images/icons/video-g.png') }}"
                                            alt="Vedio Generator Icon">ملخصات سنا</span><span
                                        class="border-bottom-style"></span></button>
                            </li>
                            <li class="nav-item tabs__tab " role="presentation">
                                <button class="nav-link rainbow-gradient-btn without-shape-circle"
                                        id="photo-generator-tab" data-bs-toggle="tab" data-bs-target="#photo-generate"
                                        type="button" role="tab" aria-controls="photo-generate"
                                        aria-selected="false"><span class="generator-icon"><img
                                            src="{{ asset('assets/images/icons/code-g.png') }}"
                                            alt="Vedio Generator Icon">اختبر فهمك</span><span
                                        class="border-bottom-style"></span></button>
                            </li>
                        </ul>

                        <div class="rainbow-tab-content tab-content">
                            <div class="tab-pane fade" id="video-generate" role="tabpanel"
                                 aria-labelledby="video-generator-tab">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="section-title">
                                                <h2 class="title">تحدث مع المقطع بطريقة تفاعلية
                                                </h2>
                                                <div class="features-section">
                                                    <ul class="list-style--1">
                                                        <li><i class="fa-regular fa-circle-check"></i>الرد على الأسئلة من محتوى المقطع أو الكتاب
                                                        </li>
                                                        <li><i class="fa-regular fa-circle-check"></i>طريقة تفاعلية للشروحات التعليمية</li>
                                                        <li><i class="fa-regular fa-circle-check"></i>مبني على نموذج عربي (علام)</li>
                                                    </ul>
                                                </div>
                                                <div class="read-more"><a class="btn-default color-blacked"
                                                                          href="#">جرب الآن <i
                                                            class="fa-sharp fa-solid fa-arrow-left me-2"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt_md--30 mt_sm--30">
                                            <div class="export-img">
                                                <div class="inner-without-padding">
                                                    <div class="export-img img-bg-shape">
                                                        <img src="{{ asset('assets/images/generator-img/chat-export-vedio.png') }}"
                                                             alt="Chat example Image">
                                                        <div class="image-shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="audio-generate" role="tabpanel"
                                 aria-labelledby="audio-generator-tab">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="section-title">
                                                <h2 class="title">ملخصات سنه تم عملها خصيصاً للمراجعات السريعة.
                                                </h2>
                                                <div class="features-section">
                                                    <ul class="list-style--1">
                                                        <li><i class="fa-regular fa-circle-check"></i>استخراج اهم النقاط الرئيسية من المقطع او الدرس
                                                        </li>
                                                        <li><i class="fa-regular fa-circle-check"></i>تلخيص النقاط الرئيسية بطريقة مشروحة باحترافية</li>
                                                        <li><i class="fa-regular fa-circle-check"></i>عدم الخروج عن سياق المقطع عند عمل الملخصات</li>
                                                        <li><i class="fa-regular fa-circle-check"></i>خلق طريقة تعليمية ممتعة مثل تصفح صفحات التواصل الإجتماعي</li>
                                                    </ul>
                                                </div>
                                                <div class="read-more"><a class="btn-default color-blacked"
                                                                          href="#">جرب الآن <i
                                                            class="fa-sharp fa-solid fa-arrow-right"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt_md--30 mt_sm--30">
                                            <div class="export-img">
                                                <div class="inner-without-padding">
                                                    <div class="export-img img-bg-shape">
                                                        <img src="{{ asset('assets/images/generator-img/chat-export-audio.png') }}"
                                                             alt="Chat example Image">
                                                        <div class="image-shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="photo-generate" role="tabpanel"
                                 aria-labelledby="photo-generator-tab">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="section-title">
                                                <h2 class="title">اختبر فهمك عن طريق إنشاء اختبار سريع.
                                                </h2>
                                                <div class="features-section">
                                                    <ul class="list-style--1">
                                                        <li><i class="fa-regular fa-circle-check"></i>انشاء اختبار بناءً على المعلومات المذكورة في المقطع او الدرس</li>
                                                        <li><i class="fa-regular fa-circle-check"></i>معرفة نتيجة الاختبار ونقاط الضعف بشكل أدق</li>
                                                        <li><i class="fa-regular fa-circle-check"></i>صنع تجربة تفاعلية مبنية على طرق الألعاب الحديثة</li>
                                                    </ul>
                                                </div>
                                                <div class="read-more"><a class="btn-default color-blacked"
                                                                          href="#">جرب الآن <i
                                                            class="fa-sharp fa-solid fa-arrow-right"></i></a></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mt_md--30 mt_sm--30">
                                            <div class="export-img">
                                                <div class="inner-without-padding">
                                                    <div class="export-img img-bg-shape">
                                                        <img src="{{ asset('assets/images/generator-img/chat-export-photo.png') }}"
                                                             alt="Chat example Image">
                                                        <div class="image-shape"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row" id="whyus">
                    <div class="col-lg-12">
                        <div class="section-title text-center pb--60" data-sal="slide-up" data-sal-duration="700"
                             data-sal-delay="100">
                            <h4 class="subtitle">
                                <span class="theme-gradient">فريقنا</span>
                            </h4>
                            <h2 class="title mb--0">فريق عمل سنا، تعرف علينا.</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--30 align-items-center">
                    <div class="col-lg-3 col-md-6 col-12 mt--30">
                        <div class="rainbow-card undefined">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a class="image" href="#">
                                        <img src="{{ asset('assets/images/team/dr.eid.jpg') }}" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <ul class="rainbow-meta-list">
                                        <li class="catagory-meta"><a href="#">أستاذ مساعد في الذكاء الاصطناعي</a></li>
                                    </ul>
                                    <h4 class="title"><a href="#">د. عيد البلوي</a></h4>
                                    <a class="btn-read-more border-transparent" href="#">
                                        <span>اللينكد أن <i class="fa-sharp fa-regular fa-arrow-left"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt--30">
                        <div class="rainbow-card undefined">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a class="image" href="#">
                                        <img src="{{ asset('assets/images/team/ibrahim-alnabhan.jpg') }}" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <ul class="rainbow-meta-list justify-content-center">
                                        <li class="catagory-meta"><a href="#">محلل بيانات ذكاء اصطناعي</a></li>
                                        <br>
                                        <li class="catagory-meta"><a href="#">اخصائي مشاريع</a></li>
                                    </ul>
                                    <h4 class="title"><a href="https://www.linkedin.com/in/ibrahim-alnabhan-22b034212">م. ابراهيم النبهان</a></h4>
                                    <a class="btn-read-more border-transparent" href="#">
                                        <span>اللينكد أن <i class="fa-sharp fa-regular fa-arrow-left"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt--30">
                        <div class="rainbow-card undefined">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a class="image" href="#">
                                        <img src="{{ asset('assets/images/team/Hasan-hassan.jpg') }}" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <ul class="rainbow-meta-list justify-content-center">
                                        <li class="catagory-meta"><a href="#">مهندس برمجيات</a></li>
                                        <li class="catagory-meta"><a href="#">ماجستير ذكاء اصطناعي</a></li>
                                    </ul>
                                    <h4 class="title"><a href="https://www.linkedin.com/in/hasan-alshikh">م. حسن الشيخ</a></h4>
                                    <a class="btn-read-more border-transparent" href="#">
                                        <span>اللينكد أن <i class="fa-sharp fa-regular fa-arrow-left"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt--30">
                        <div class="rainbow-card undefined">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a class="image" href="#">
                                        <img src="{{ asset('assets/images/team/abdulrahman-alsubayq.jpg') }}" alt="Blog Image">
                                    </a>
                                </div>
                                <div class="content">
                                    <ul class="rainbow-meta-list justify-content-center">
                                        <li class="catagory-meta"><a href="#">مهندس برمجيات</a></li>
                                        <li class="catagory-meta"><a href="#">اخصائي أمن سيبراني</a></li>
                                    </ul>
                                    <h4 class="title"><a href="#">م. عبدالرحمن السبيق</a></h4>
                                    <a class="btn-read-more border-transparent" href="https://linkedin.com/in/abdulrahmansbq">
                                        <span>اللينكد أن <i class="fa-sharp fa-regular fa-arrow-left"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Tab__Style--one Area  -->


    <!-- Start Brand Area -->
    <div class="rainbow-brand-area rainbow-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt--10">
                    <ul class="brand-list brand-style-2">
                        <li><a href="index.html#"><img src="{{ asset('assets/images/brand/sdaia.png') }}"
                                                       alt="Brand Image"></a></li>
                        <li><a href="index.html#"><img src="{{ asset('assets/images/brand/moe.png') }}"
                                                       alt="Brand Image"></a></li>
                        <li><a href="index.html#"><img src="{{ asset('assets/images/brand/mcit-cb.png') }}"
                                                       alt="Brand Image"></a></li>
                        <li><a href="index.html#"><img src="{{ asset('assets/images/brand/ein.png') }}"
                                                       alt="Brand Image"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-shape-left">
            <img src="{{ asset('assets/images/bg/bg-shape-two.png') }}" alt="Bg shape">
        </div>
    </div>
@endsection

@section('scripts')

@endsection
