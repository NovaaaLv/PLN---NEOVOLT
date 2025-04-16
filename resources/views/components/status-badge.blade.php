@props([
    'status' => null,
    'isButton' => false,
])

@php
  $label = ucwords(str_replace('_', ' ', $status));
@endphp

@if ($isButton === true)
  <span
    class="px-4 py-2 rounded-lg whitespace-nowrap
    @if ($status === 'lunas') bg-green-600/20 text-green-600
    @elseif($status === 'belum_lunas') bg-red-600/20 text-red-600 @endif
">
    {{ $label }}
  </span>
@else
  <span
    class="px-4 py-2 rounded-lg whitespace-nowrap
    @if ($status === 'lunas') @elseif($status === 'belum_lunas') @endif
">
    {{ $label }}
  </span>
@endif
