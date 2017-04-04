@extends('layouts.app')

@section('css')
     <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@endsection

@section('scripts')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="/js/app.js"></script>
@endsection