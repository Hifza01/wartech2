@extends('layouts.home')

@section('content')
<div class="container">
    <div class="dash-content">
        <div class="overview">
            <div class="title">                    
                <h2>Daftar Surat </h2>
            </div>
            <form action="{{ route('surat') }}" method="GET" class="m-0 p-0">
                <div class="input-group">
                    <select name="filtersurat" id="filtersurat" class="form-control form-select flex-grow-1 custom-select" required>
                        <option value="">Pilih Jenis Surat:</option>
                        <option value="Surat Domisili" {{ old('filtersurat') == 'Surat Domisili' ? 'selected' : '' }}>Surat Domisili</option>
                        <option value="Surat Keterangan Nikah" {{ old('filtersurat') == 'Surat Keterangan Nikah' ? 'selected' : '' }}>Surat Keterangan Nikah</option>
                        <option value="Surat Kematian" {{ old('filtersurat') == 'Surat Kematian' ? 'selected' : '' }}>Surat Kematian</option>
                    </select>
                </div>
                
            </form>

<!-- Render data from Firebase -->

                
            
        </div>
    </div>
    <div class="row bg-light my-3 mx-0 border border-dark border-opacity-25">
        
        <div class="col-12 text-center mt-1">
            <i class="fa-solid fa-circle-info fa-6x" style="color:#0d6efd ;"></i>
                <div class="container-fluid">
                    
                    <br /><br />
                    
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Nama</th>
                                <th>Jenis Surat</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if($surat !== null)
                                @foreach($surat as $id => $surat)
                                <tr>
                                    <td>{{ $surat['nama'] }}</td>
                                    <td>{{ $surat['jenisSurat'] }}</td>
                                    <td>{{ $surat['alamatSekarang'] }}</td>
                                    <td>{{ $surat['status'] ? 'Diterima' : 'Ditolak' }}</td>
                                    <td><a href="{{ route('surat.edit', ['surat' => $id]) }}" class="btn btn-success btn-sm btn-rounded">Detail</a>                
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>  
        </div>
    </div>
@endsection