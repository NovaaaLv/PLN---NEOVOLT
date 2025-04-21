@props([
    'label' => '',
    'href' => '',
    'isButton' => false,
    'icon' => '',
    'type' => 'button',
])

@if ($isButton === true)
  <button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start hover:bg-gray-100 focus:outline-none focus:bg-gray-100']) }}
  >
    <table>
      <tr>
        <td class="pr-5"><i class="fa-solid {{ $icon }}"></i></td>
        <td><span>{{ $label }}</span></td>
      </tr>
    </table>
  </button>
@else
  <a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out text-start hover:bg-gray-100 focus:outline-none focus:bg-gray-100']) }}
  >
    <i class="fa-solid {{ $icon }}"></i> <span class="ml-4">{{ $label }}</span>
  </a>
@endif
