          <!-- Start Left panel -->
          <div class="rbt-right-side-panel popup-dashboardright-section">
              <div class="rbt-default-sidebar">
                  <div class="inner">
                      <div class="content-item-content">
                          <div class="rbt-default-sidebar-wrapper">
                              <nav class="mainmenu-nav">
                                  <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                      @if (!request()->routeIs('chat.show.loading'))
                                          @php
                                              $videoId = request()->route('videoId');
                                              $chatUuid = request()->route('chatUuid') ?? session('chat_uuid');
                                          @endphp

                                          <li><a
                                                  href="{{ route('chat.show', ['videoId' => $videoId, 'chatUuid' => $chatUuid]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/text.png') }}"
                                                      alt="AI Generator"><span>إسأل سنا</span></a></li>
                                          <li><a href="{{ route('snaps.show', ['videoId' => $videoId]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/code-editor.png') }}"
                                                      alt="AI Generator"><span>ملخصات سنا</span></a></li>
                                          <li><a href="{{ route('exam.show', ['videoId' => $videoId]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/photo.png') }}"
                                                      alt="AI Generator"><span>إختبر فهمك</span>
                                              </a></li>
                                      @else
                                          <li><a href="{{ route('chat.show', ['videoId' => $videoId, 'chatUuid' => $chatUuid]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/text.png') }}"
                                                      alt="AI Generator"><span>إسأل سنا</span></a></li>
                                          <li><a href="{{ route('snaps.show', ['videoId' => $videoId]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/code-editor.png') }}"
                                                      alt="AI Generator"><span>ملخصات</span></a></li>
                                          <li><a href="{{ route('exam.show', ['videoId' => $videoId]) }}"><img
                                                      src="{{ asset('assets/images/generator-icon/photo.png') }}"
                                                      alt="AI Generator"><span>إختبر فهمك</span>
                                              </a></li>
                                      @endif
                                  </ul>
                              </nav>

                          </div>
                      </div>
                  </div>

                  <p class="subscription-copyright copyright-text text-center b3  small-text">© 2024 <a
                          href="#">سنا </a>.</p>
              </div>
          </div>
          <!-- End Left panel -->
