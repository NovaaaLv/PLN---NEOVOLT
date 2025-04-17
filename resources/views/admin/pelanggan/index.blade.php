<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pelanggan" href="{{ route('pelanggan.index') }}" />
    </x-header.text-container>
  </x-header.container>

  <x-card.container>
    <x-card.header label="Data Semua pelanggan" />

    <x-card.action>
      <x-button.primary label="Tambah pelanggan" :isLink="true" href="{{ route('pelanggan.create') }}" />

      <p class="text-sm text-slate-600">
        Total Pelanggan:
        <span
          class="inline-flex items-center px-3 py-1 ml-2 text-xs font-semibold text-indigo-700 bg-indigo-100 rounded-full">
          {{ $pelanggans->total() }}
        </span>
      </p>

    </x-card.action>

    <table class="w-full mt-10">
      <tr class="w-full">
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No Kontrol</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Nama</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Alamat</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Telepon</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Jenis Pelanggan</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Aksi</th>
      </tr>

      @foreach ($pelanggans as $pelanggan)
        <tr class="transition-all duration-300 ease-in-out text-slate-600 hover:bg-indigo-50">
          <td class="px-5 py-3 text-left">{{ $pelanggans->firstItem() + $loop->index }}</td>
          <td class="px-5 py-3 text-left">{{ $pelanggan->no_kontrol }}</td>
          <td class="px-5 py-3 text-left">{{ $pelanggan->nama }}</td>
          <td class="px-5 py-3 text-left">{{ $pelanggan->alamat }}</td>
          <td class="px-5 py-3 text-left">{{ $pelanggan->telepon }}</td>
          <td class="px-5 py-3 text-left">{{ $pelanggan->jenis->jenis_plg }}</td>
          <td>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button>
                    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  <x-table.action-item icon="fa-pen" href="{{ route('pelanggan.edit', ['id' => $pelanggan->id]) }}"
                    label="Edit" />
                  <form action="{{ route('pelanggan.delete', ['id' => $pelanggan->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-table.action-item :isButton="true" label="Delete" icon="fa-trash" />
                  </form>
                </x-slot>
              </x-dropdown>
            </div>
          </td>
        </tr>
      @endforeach

      @if ($pelanggans->isEmpty())
        <tr>
          <td rowspan="7" colspan="7">
            <div class="flex flex-col items-center justify-center py-10">
              <img src="{{ asset('assets/images/Empty-pana.svg') }}" alt="Data Kosong" class="w-52 mb-4">
              <p class="text-lg font-semibold text-slate-700">Belum ada data pelanggan</p>
              <p class="text-sm text-slate-500 mt-1">Silakan tambahkan data terlebih dahulu</p>
            </div>
          </td>
        </tr>
      @endif

      <tr>
        <td rowspan="7" colspan="7">
          <div class="mt-4">
            {{ $pelanggans->links('vendor.pagination.tailwind') }}
          </div>
        </td>
      </tr>
    </table>
  </x-card.container>
</x-app-layout>
