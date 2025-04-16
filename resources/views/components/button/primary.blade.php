@props([
    'label' => '',
    'type' => '',
    'isLink' => false,
    'href' => ''
])

@if ($isLink === true)
<a href="{{$href}}" class="px-5 py-2 text-white transition-all duration-300 ease-in-out bg-indigo-500 border border-indigo-500 rounded-md hover:bg-transparent hover:text-indigo-500">{{$label}}</a>
@else

<button type="{{$type}}" class="px-5 py-2 text-white transition-all duration-300 ease-in-out bg-indigo-500 border border-indigo-500 rounded-md hover:bg-transparent hover:text-indigo-500">{{$label}}</button>
@endif

