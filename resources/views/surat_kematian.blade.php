@extends('layouts.home')

@section('content')
<div class="dash-content">
    <div class="overview">
        <div class="title">                    
            <h2>Surat Kematian</h2>
        </div>
    </div>
</div>
<!--Main content-->
<div class="container">
    <br /><br />
        <table class="table table-bordered table-hover">
            <thead>
                
                
                <th>Nama Lengkap Almarhum</th>
                <th>Hubungan</th>
                <th>Tempat Meninggal</th>
                <th>Tanggal Meninggal</th>
                <th>Waktu Meninggal</th>
                <th>Jenis Kelamin Almarhum</th>
                <th>Alamat Almarhum</th>
                <th>Agama Almarhum</th>
                <th>Penyebab Meninggal</th>
                
                
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($surat as $key => $data)
                <tr>
                    
                    
                    <td>{{ $data['namaLengkapMeninggal'] }}</td>
                    <td>{{ $data['hubungan'] }}</td>
                    <td>{{ $data['tempatMeninggal'] }}</td>
                    <td>{{ $data['tanggalMeninggal'] }}</td>
                    <td>{{ $data['waktuMeninggal'] }}</td>
                    <td>{{ $data['jenisKelaminMeninggal'] }}</td>
                    <td>{{ $data['alamatWargaMeninggal'] }}</td>
                    <td>{{ $data['agamaMeninggal'] }}</td>
                    <td>{{ $data['penyebabMeninggal'] }}</td>
                    
                    
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
    