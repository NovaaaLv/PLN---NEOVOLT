<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pemakaian" href="{{ route('pemakaian.index') }}" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Data Semua Pemakaian" />

    <x-card.action>
      <div class="flex items-end">
        <x-button.primary label="Tambah Data Pemakaian" :isLink="true" href="{{ route('pemakaian.create') }}" />
      </div>
      <div class="space-y-2">
        <p class="text-sm text-slate-600">
          Total Pemakaian:
          <span
            class="inline-flex items-center px-3 py-1 ml-2 text-xs font-semibold text-indigo-700 bg-indigo-100 rounded-full">
            {{ $totalPemakaian }}
          </span>
        </p>
        {{-- search berdasarkan bulan tahun dan no kontrol --}}
        <form action="{{ route('pemakaian.index') }}" method="GET" class="flex items-center gap-2">
          <input type="text" name="no_kontrol" placeholder="No Kontrol" value="{{ request('no_kontrol') }}"
            class="px-3 py-1 text-sm border rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none text-slate-600" />

          <input type="number" name="tahun" placeholder="Tahun" value="{{ request('tahun') }}"
            class="px-3 py-1 text-sm border rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none text-slate-600" />

          <select name="bulan"
            class="px-3 py-1 text-sm border rounded-lg focus:ring-2 focus:ring-indigo-300 focus:outline-none text-slate-600">
            <option value="">Bulan</option>
            @foreach (range(1, 12) as $bln)
              <option value="{{ $bln }}" @selected(request('bulan') == $bln)>
                {{ DateTime::createFromFormat('!m', $bln)->format('F') }}
              </option>
            @endforeach
          </select>

          <button type="submit"
            class="px-3 py-1 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
            Cari
          </button>
        </form>
      </div>
    </x-card.action>

    <table class="w-full mt-10">
      <tr class="w-full">
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Tahun</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Bulan</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No Kontrol</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Nama</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Jenis Pelanggan</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Meter Awal</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Meter Akhir</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Jumlah Pakai</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Biaya Beban Pemakai</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Biaya Pemakaian</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Aksi</th>
      </tr>
      @forelse ($pemakaians as $pemakaian)
        <tr class="transition-all duration-300 ease-in-out text-slate-600 hover:bg-indigo-50">
          <td class="px-5 py-3 text-left">{{ $pemakaians->firstItem() + $loop->index }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->tahun }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->bulan }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->pelanggan->no_kontrol }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->pelanggan->nama }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->pelanggan->jenis->jenis_plg }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->meter_awal }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->meter_akhir }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->jumlah_pakai }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->biaya_beban_pemakai }}</td>
          <td class="px-5 py-3 text-left">{{ $pemakaian->biaya_pemakaian }}</td>
          <td>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button>
                    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  <x-table.action-item icon="fa-pen" href="{{ route('pemakaian.edit', ['id' => $pemakaian->id]) }}"
                    label="Edit" />
                  <form action="{{ route('pemakaian.delete', ['id' => $pemakaian->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-table.action-item :isButton="true" label="Delete" icon="fa-trash" />
                  </form>
                  </form>
                </x-slot>
              </x-dropdown>
          </td>
        </tr>
      @empty
        <tr>
          <td rowspan="12" colspan="12">
            <div class="flex flex-col items-center justify-center py-10">
              <img src="{{ asset('assets/images/Empty-pana.svg') }}" alt="Data Kosong" class="w-52 mb-4">
              <p class="text-lg font-semibold text-slate-700">Belum ada pemakaian</p>
              <p class="text-sm text-slate-500 mt-1">Silakan tambahkan data terlebih dahulu</p>
            </div>
          </td>
        </tr>
      @endforelse
      <tr>
        <td rowspan="12" colspan="12">
          <div class="mt-4">
            {{ $pemakaians->links('vendor.pagination.tailwind') }}
          </div>
        </td>
      </tr>
    </table>
  </x-card.container>
</x-app-layout>
