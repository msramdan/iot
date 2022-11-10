@extends('layouts.auth_merchant')
@section('title', 'Term Of Service')
@section('content')
<div class="page-content">
    <div class="container">
        {!! $setting->tos !!}
    </div>
</div>
@endsection
@push('js')
@endpush

