@props([
    'value' => '',
    'label' => '',
    'isSelected' =>false,
])

<option value="{{$value}}" @if ($isSelected) selected @endif>{{$label}}</option>
