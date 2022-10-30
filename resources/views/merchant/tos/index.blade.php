@extends('layouts.auth_merchant')
@section('title', 'Term Of Service')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        {!! $setting->tos !!}
    </div>
</div>
@endsection
@push('js')
@endpush

