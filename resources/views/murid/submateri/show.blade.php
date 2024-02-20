@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-subtitle main="Materi" :sub="$submateris->materi->nama" />
</div>


@endsection