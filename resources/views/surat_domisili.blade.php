@extends('layouts.home')

@section('content')
<div class="dash-content">
    <div class="overview">
        <div class="title">                    
            <h2>Surat Domisili</h2>
        </div>
    </div>
</div>
<!--Main content-->
<div class="container">
    <br /><br />
        <table class="table table-bordered table-hover">
            <thead>
                <th>Nama</th>
                <th>Tempat/Tgl Lahir</th>
                <th>NIK</th>
                <th>Pekerjaan</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Kewarga negaraan</th>
                <th>Alamat Asal</th>
                <th>Alamat Sekarang</th>
                
                <th>Dibuat</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($surat as $key => $data)
                <tr>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['tempatTanggalLahir'] }}</td>
                    <td>{{ $data['nik'] }}</td>
                    <td>{{ $data['pekerjaan'] }}</td>
                    <td>{{ $data['agama'] }}</td>
                    <td>{{ $data['statusPerkawinan'] }}</td>
                    <td>{{ $data['kewarganegaraan'] }}</td>
                    <td>{{ $data['alamatAsal'] }}</td>
                    <td>{{ $data['alamatSekarang'] }}</td>
                    
                    <td>{{ $data['createdAt'] }}</td>
                    <td>{{ $data['statusSurat'] }}</td>
                    <td>
                        <form action="{{ route('updateSuratDomisili', ['key' => $data['key']]) }}" method="POST" id="updateForm">
    @csrf
    @method('PATCH')
    @if($data['statusSurat'] == 'Proses')

    <button type="submit" name="status" value="1" id="terimaButton" class="btn btn-success {{ $data['statusSurat'] ? 'active' : '' }}">Terima</button>
    <button type="submit" name="status" value="0" id="tolakButton" class="btn btn-danger {{ !$data['statusSurat'] ? 'active' : '' }}">Tolak</button>
    @endif
</form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection
    