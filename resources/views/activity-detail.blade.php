@extends('layouts.app')

@section('content')
<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $activity->title }}</h1>

    <div class="text-sm text-gray-500 flex items-center gap-2 mb-6">
      <i class="fa fa-calendar-alt text-gray-400"></i>
      {{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}
    </div>

     @if ($activity->author)
    <div class="flex items-center gap-2">
        <i class="fa fa-user text-gray-400"></i>
        <span>Penulis: {{ $activity->author }}</span>
    </div>
    @endif

    @if ($activity->image)
      <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="w-full rounded-xl mb-8 object-cover">
    @endif

    <div class="text-gray-700 leading-relaxed text-lg text-justify">
      {!! nl2br(e($activity->content)) !!}
    </div>
  </div>
</section>
@endsection
