<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pemakaian" href="{{ route('pemakaian.index') }}" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Data Semua Pemakaian" />

    <x-card.action>
      <x-button.primary label="Tambah Data Pemakaian" :isLink="true" href="{{ route('pemakaian.create') }}" />
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
            <p class="py-4 mt-5 text-xl font-semibold text-center text-slate-800">Data Tidak Teredia</p>
          </td>
        </tr>
      @endforelse
    </table>
  </x-card.container>
</x-app-layout>
