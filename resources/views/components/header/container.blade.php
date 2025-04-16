<div class="w-full p-5 bg-white border-b border-slate-300">
  {{ $slot }}
</div>


@if (session('success'))
<div class="w-full px-10" id="container-alert">
  <div class="flex items-center justify-between w-full p-5 my-2 text-green-600 rounded-lg bg-green-600/10" >
    <p>{{ session('success') }}</p>

    <button class="px-2 py-1 text-green-600 rounded-lg bg-green-600/20" onclick="handleClose()">&times;</button>
  </div>
</div>
@endif


@if ($errors->any())
  <div class="flex flex-col w-full gap-5 px-10">
    @foreach ($errors->all() as $error)
      <div class="flex items-center justify-between w-full p-5 my-2 text-red-600 rounded-lg bg-red-600/10" id="container-alert">
        <p>{{ $error }}</p>

        <button class="px-2 py-1 text-red-600 rounded-lg bg-red-600/20" onclick="handleClose()">&times;</button>
      </div>
    @endforeach
  </div>
@endif


@push('script')
  <script>
    function handleClose() {
      const container = document.getElementById('container-alert')
      container.classList.add('hidden');

    }
  </script>
@endpush
