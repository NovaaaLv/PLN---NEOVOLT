@props([
    'label' => '',
    'href' => '',
])

<div class="flex justify-end gap-2 item-center">
  <a href="{{ $href }}" class="text-sm font-light transition-all duration-300 ease-in-out items text-slate-600 hover:text-indigo-600">
   <span class="mr-1">/</span> {{ $label }}
  </a>
</div>
