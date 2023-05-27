@extends('layouts.app')

@section('content')
    <div class="px-main">
        <div class="max-w-main mx-auto space-y-10 pt-10">
            <div>
                @include('partials.page-header')
            </div>

            @if (!have_posts())
                <x-alert type="warning">
                    {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
                </x-alert>
            @endif
        </div>
    </div>
@endsection
