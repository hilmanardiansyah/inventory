<x-app-layouts title="Tambah Barang Keluar">
    <x-card>
        <x-slot name="header">
            <h4>Tambah Barang Keluar</h4>
        </x-slot>

        <x-form action="{{ route('admin.barangKeluar.store') }}" method="POST">
            @csrf
            <x-form.select label="Barang" name="barang_id">
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="Jumlah Keluar" name="jumlah_keluar" type="number" />
            <x-form.input label="Tanggal Keluar" name="tanggal_keluar" type="date" />
            <x-form.textarea label="Keterangan" name="keterangan"></x-form.textarea>
            <x-form.submit>Tambah Barang Keluar</x-form.submit>
        </x-form>
    </x-card>
</x-app-layout>
