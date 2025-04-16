@props([
    'name' => '',
    'id' => ''
])


<select name="{{$name}}" id="{{$id}}" class="w-full rounded-md border-slate-500">
    {{$slot}}
</select>
