@extends('visitors.sub_layouts.master')

@section('title', __('الرئيسية'))

@section('content')
    <!-- Dashboard Center Content -->
    <div class="rbt-dashboard-content">
        <div class="content-page">

            <!-- Text Generator -->
            <livewire:visitors.chat.show :videoId="$videoId" :chatUuid="$chatUuid" />
        </div>
    </div>
@endsection

@section('scripts')

@endsection
