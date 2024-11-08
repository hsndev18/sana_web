@use('\App\Models\Session')
<header class="rbt-dashboard-header rainbow-header header-default header-left-align rbt-fluid-header">
    <div class="container-fluid position-relative">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3 col-md-6 col-6">
                <div class="header-left d-flex">
                    <div class="logo">
                        <a href="#">
                            <img class="logo-light" src="{{ asset('assets/images/logo/logo.svg')}}" alt="ChatBot Logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <nav class="mainmenu-nav d-none d-lg-inline-block text-center">

                    @php
                        $videoId = request()->route('videoId');
                        $chatUuid = Session::sessionId(session()->getId())->first()?->chats()->videoId($videoId)->first()->uuid ?? 'create';
                    @endphp
                    <ul class="mainmenu">
                        <li><a href="{{ route('landing') }}">الرئيسية</a></li>
                        <li><a href="{{ route('chat.show', ['videoId' => $videoId, 'chatUuid' => $chatUuid]) }}">اسأل سنا</a></li>
                        <li><a href="{{ route('snaps.show', $videoId) }}">ملخصات سنا</a></li>
                        <li><a href="{{ route('exam.show', $videoId) }}">إختبر فهمك</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="header-right">

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar ml--10 d-block d-lg-none">
                        <div class="hamberger">
                            <button class="hamberger-button">
                                <i class="fa-sharp fa-regular fa-bars"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

                    <!-- Start Admin meta Group -->
                    <div class="rbt-admin-panel account-access rbt-user-wrapper right-align-dropdown">
                        <div class="rbt-admin-card grid-style">
                            <div class="rbt-avatars m-auto size-sm">
                                <img src="{{ asset('assets/images/team/unknownuser.png')}}" alt="Admin">
                            </div>
                        </div>
                    </div>
                    <!-- End Admin meta Group -->

                </div>
            </div>
        </div>
    </div>
</header>
<div class="popup-mobile-menu">
    <div class="inner-popup">
        <div class="header-top">
            <div class="logo">
                <a href="#">
                    <img class="logo-light" src="{{ asset('assets/images/logo/logo.svg')}}" alt="ChatBot Logo">
                </a>
            </div>
            <div class="close-menu">
                <button class="close-button">
                    <i class="fa-sharp fa-regular fa-x"></i>
                </button>
            </div>
        </div>

        <div class="content">
            <div class="rbt-default-sidebar-wrapper">
                <nav class="mainmenu-nav">
                    <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                        <li>
                            <a href="{{ route('chat.show', ['videoId' => $videoId, 'chatUuid' => $chatUuid]) }}"><img src="{{ asset('assets/images/generator-icon/text.png')}}" alt="AI Generator">
                                <span>اسأل سنا</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('snaps.show', $videoId) }}">
                                <img src="{{ asset('assets/images/generator-icon/photo.png')}}" alt="AI Generator">
                                <span>ملخصات سنا</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('exam.show', $videoId) }}">
                                <img src="{{ asset('assets/images/generator-icon/code-editor.png')}}" alt="AI Generator">
                                <span>إختبر فهمك</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>
