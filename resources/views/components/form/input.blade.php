@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'value' => '',
    'isTextArea' => false,
    'isDisabled' => false,
    'isReadonly' => false,
    'isHidden' => false,
    'placeholder' => '',
    'min' => '',
    'max' => '',
    'isStatus' => false, // <-- tambahan props khusus
])

@php
  $displayValue = $isStatus ? ucwords(str_replace('_', ' ', $value)) : $value;
@endphp

@if ($isTextArea === true)
  <textarea name="{{ $name }}" id="{{ $id }}" class="rounded-md border-slate-500 "
    @if ($isDisabled) disabled @endif @if ($isReadonly) readonly @endif
    placeholder="{{ $placeholder }}">{{ $displayValue }}</textarea>
@else
  <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
    class="rounded-md border-slate-500 text-slate-700 disabled:bg-slate-100 @if ($isHidden) hidden @endif"
    value="{{ $displayValue }}" @if ($isDisabled) disabled @endif
    @if ($isReadonly) readonly @endif placeholder="{{ $placeholder }}" min="{{ $min }}"
    max="{{ $max }}">
@endif
