@extends('visitors.sub_layouts.master')

@section('title', __('الرئيسية'))

@section('content')
    <!-- Dashboard Center Content -->
    <div class="rbt-dashboard-content">
        <div class="content-page">
            
            <livewire:visitors.video.loading :videoId="$videoId"/>
     
        </div>
    </div>
@endsection

@section('scripts')

@endsection
