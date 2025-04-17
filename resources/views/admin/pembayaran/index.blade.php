<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pembayaran" href="{{ route('pembayaran.index') }}" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Data Pembayaran" />

    <x-card.action>
      <div class=""></div>
      <div class="space-y-2">
        <p class="text-sm text-slate-600">
          Total Pembayaran:
          <span
            class="inline-flex items-center px-3 py-1 ml-2 text-xs font-semibold text-indigo-700 bg-indigo-100 rounded-full"
            title="Total Semua Data">
            {{ $pemakaians->count() }}
          </span>
          <span
            class="inline-flex items-center px-3 py-1 ml-2 text-xs font-semibold text-green-700 bg-green-100 rounded-full relative group"
            title="Total Sudah Lunas">
            {{ $totalLunas }}

            <span
              class="absolute bottom-full mb-2 opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 bg-gray-800 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10 transition-all duration-300 ease-in-out">Sudah
              Lunas</span>
          </span>
          <span
            class="inline-flex items-center px-3 py-1 ml-2 text-xs font-semibold text-red-700 bg-red-100 rounded-full group relative"
            title="Total Belum Lunas">
            {{ $totalBelumLunas }}

            <span
              class="absolute bottom-full mb-2 opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 bg-gray-800 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10 transition-all duration-300 ease-in-out">Belum
              Lunas</span>
          </span>
          <a href="{{ route('report.all') }}"
            class="inline-flex items-center justify-center ml-2 text-sm font-semibold text-indigo-700 rounded-full group relative cursor-pointer">
            <i class="fa-solid fa-file-pdf"></i>

            <span
              class="absolute bottom-full mb-2 opacity-0 scale-0 group-hover:opacity-100 group-hover:scale-100 bg-gray-800 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10 transition-all duration-300 ease-in-out">Download
              Laporan</span>
          </a>
        </p>
        {{-- Search No Kontrol Tahun dan Bulan --}}
        <form action="{{ route('pembayaran.index') }}" method="GET" class="flex items-center gap-2">
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

    <div class="overflow-x-scroll overflow-y-clip">
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
          <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Status</th>
          <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Aksi</th>
        </tr>
        @forelse ($pemakaians as $pemakaian)
          <tr class="transition-all duration-300 ease-in-out text-slate-600 hover:bg-indigo-50">
            <td class="px-5 py-3 text-left">{{ $loop->iteration }}</td>
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
            <td class="px-5 py-3 text-left">
              <x-status-badge :status="$pemakaian->status" :isButton="true" />
            </td>
            <td>
              <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                    <button>
                      <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                    </button>
                  </x-slot>

                  <x-slot name="content" class="fixed z-50">
                    @if (Auth::user()->role === 'admin')
                      <x-table.action-item icon="fa-file" href="{{ route('report.index', ['id' => $pemakaian->id]) }}"
                        label="Download Laporan" />
                    @endif
                    <x-table.action-item icon="fa-circle-info"
                      href="{{ route('pembayaran.view', ['id' => $pemakaian->id]) }}" label="Detail" />
                    <form action="{{ route('pembayaran.deleteStatus', ['id' => $pemakaian->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <x-table.action-item :isButton="true" label="Batalkan Pembayaran" icon="fa-trash" />
                    </form>
                    </form>
                  </x-slot>
                </x-dropdown>
            </td>
          </tr>
        @empty
          <tr>
            <td rowspan="13" colspan="13">
              <div class="flex flex-col items-center justify-center py-10">
                <img src="{{ asset('assets/images/Empty-pana.svg') }}" alt="Data Kosong" class="w-52 mb-4">
                <p class="text-lg font-semibold text-slate-700">Belum ada data pembayaran</p>
              </div>
            </td>
          </tr>
        @endforelse
      </table>
    </div>
  </x-card.container>
</x-app-layout>
