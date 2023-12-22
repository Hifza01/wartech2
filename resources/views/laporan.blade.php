@extends('layouts.home')

@section('content')
<div class="dash-content">
    <div class="overview">
        <div class="title">                    
            <h2>Daftar Laporan</h2>
        </div>
    </div>
</div>
<!--Main content-->
<div class="container">
    <br /><br />
        <table class="table table-bordered table-hover">
            <thead>
                <th>Nama</th>
                <th>NIK</th>
                <th>No.HP</th>
                <th>Isi Laporan</th>
                <th>Foto</th>
                <th>Tanggal Pembuatan</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($surat as $key => $data)
                <tr>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['nik'] }}</td>
                    <td>{{ $data['noHP'] }}</td>
                    <td>{{ $data['laporan'] }}</td>
                    <td>
                        @if (!empty($data['imageUrl']))
                        <img src="{{ $data['imageUrl'] }}" width="100px" height="100px" />
                        @else
                        <span>Gambar Tidak Tersedia</span>
                        @endif
                    </td>
                    <td>{{ $data['createdAt'] }}</td>
                    <td>{{ $data['status'] ? 'Diterima' : 'Ditolak'  }}</td>
                    <td>
                        <form action="{{ route('updateSuratDomisili', ['key' => $data['key']]) }}" method="POST">
    @csrf
    @method('PATCH')
    <button type="submit" name="status" value="1" class="btn btn-success {{ $data['status'] ? 'active' : '' }}">Terima</button>
    <button type="submit" name="status" value="0" class="btn btn-danger {{ !$data['status'] ? 'active' : '' }}">Tolak</button>
</form>
                        <a href="" class="btn btn-warning btn-sm btn-rouneded">Hapus</a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>       
</div>
@endsection