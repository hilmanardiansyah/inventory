<x-app-layouts title="Edit Barang Keluar">
    <x-card>
        <x-slot name="header">
            <h4>Edit Barang Keluar</h4>
        </x-slot>

        <x-form action="{{ route('admin.barangKeluar.update', $barangKeluar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-form.select label="Barang" name="barang_id">
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $barangKeluar->barang_id ? 'selected' : '' }}>
                        {{ $barang->nama }}
                    </option>
                @endforeach
            </x-form.select>
            <x-form.input label="Jumlah Keluar" name="jumlah_keluar" value="{{ $barangKeluar->jumlah_keluar }}" type="number" />
            <x-form.input label="Tanggal Keluar" name="tanggal_keluar" value="{{ $barangKeluar->tanggal_keluar }}" type="date" />
            <x-form.textarea label="Keterangan" name="keterangan">{{ $barangKeluar->keterangan }}</x-form.textarea>
            <x-form.submit>Update Barang Keluar</x-form.submit>
        </x-form>
    </x-card>
</x-app-layout>
