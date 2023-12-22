@extends('layouts.home')

@section('content')
<div class="container">
    <div class="dash-content">
        <div class="overview">
            <div class="title">                
                @if($id)
                    {{ Form::open(['url'=> route('surat.update', ['surat'=>$id]), 'method' => 'PUT']) }}                    
                    <h2>Detail Surat</h2>
                    
                @endif
                @foreach($surat as $key => $surat)
            </div>
        </div>
    </div>    
    <div class="row bg-light my-3 mx-0 border border-dark border-opacity-25">
        <div class="col-12 mt-1">                       
            <div class="container">                
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK:</label>
                    <input type="text" name="nik" id="nik" class="form-control" value="{{ $surat['nik'] }}" disabled required />
                    <input type="hidden" name="nik" value="{{ $surat['nik'] }}" />
                    @if($errors->has('nik'))
                    <div class='error small text-danger'>{{$errors->first('nik')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $surat['nama'] }}" disabled required />
                    <input type="hidden" name="nama" value="{{ $surat['nama'] }}" />
                    @if($errors->has('nama'))
                    <div class='error small text-danger'>{{$errors->first('nama')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="tempatTanggalLahir" class="form-label">Tempat/Tgl Lahir:</label>
                    <input type="text" name="tempatTanggalLahir" id="tempatTanggalLahir" class="form-control" value="{{ $surat['tempatTanggalLahir'] }}" disabled required />
                    <input type="hidden" name="tempatTanggalLahir" value="{{ $surat['tempatTanggalLahir'] }}" />
                    @if($errors->has('tempatTanggalLahir'))
                    <div class='error small text-danger'>{{$errors->first('tempatTanggalLahir')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="alamatAsal" class="form-label">Alamat Asal:</label>
                    <input type="text" name="alamatAsal" id="alamatAsal" class="form-control" value="{{ $surat['alamatAsal'] }}" disabled required />
                    <input type="hidden" name="alamatAsal" value="{{ $surat['alamatAsal'] }}" />
                    @if($errors->has('alamatAsal'))
                    <div class='error small text-danger'>{{$errors->first('alamatAsal')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="alamatSekarang" class="form-label">Alamat Sekarang:</label>
                    <input type="text" name="alamatSekarang" id="alamatSekarang" class="form-control" value="{{ $surat['alamatSekarang'] }}" disabled required />
                    <input type="hidden" name="alamatSekarang" value="{{ $surat['alamatSekarang'] }}" />
                    @if($errors->has('alamatSekarang'))
                    <div class='error small text-danger'>{{$errors->first('alamatSekarang')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="agama" class="form-label">Agama:</label>
                    <input type="text" name="agama" id="agama" class="form-control" value="{{ $surat['agama'] }}" disabled required />
                    <input type="hidden" name="agama" value="{{ $surat['agama'] }}" />
                    @if($errors->has('agama'))
                    <div class='error small text-danger'>{{$errors->first('agama')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="statusPerkawinan" class="form-label">Status Perkawinan:</label>
                    <input type="text" name="statusPerkawinan" id="statusPerkawinan" class="form-control" value="{{ $surat['statusPerkawinan'] }}" disabled required />
                    <input type="hidden" name="statusPerkawinan" value="{{ $surat['statusPerkawinan'] }}" />
                    @if($errors->has('statusPerkawinan'))
                    <div class='error small text-danger'>{{$errors->first('statusPerkawinan')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ $surat['pekerjaan'] }}" disabled required />
                    <input type="hidden" name="pekerjaan" value="{{ $surat['pekerjaan'] }}" />
                    @if($errors->has('pekerjaan'))
                    <div class='error small text-danger'>{{$errors->first('pekerjaan')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan:</label>
                    <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control" value="{{ $surat['kewarganegaraan'] }}" disabled required />
                    <input type="hidden" name="kewarganegaraan" value="{{ $surat['kewarganegaraan'] }}" />
                    @if($errors->has('kewarganegaraan'))
                    <div class='error small text-danger'>{{$errors->first('kewarganegaraan')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="jenisSurat" class="form-label">Jenis Surat:</label>
                    <input type="text" name="jenisSurat" id="jenisSurat" class="form-control" value="{{ $surat['jenisSurat'] }}" disabled required />
                    <input type="hidden" name="jenisSurat" value="{{ $surat['jenisSurat'] }}" />
                    @if($errors->has('jenisSurat'))
                    <div class='error small text-danger'>{{$errors->first('jenisSurat')}}</div>
                    @endif                    
                </div>
                <div class="mb-3">
                    <label for="status_laboran" class="form-label">Status Surat:</label>
                    <select name="status" class="form-control" autocomplete="off">
                        <option value="Disetujui" {{ ($id && $surat['status'] == 'Disetujui') ? 'selected' : '' }}>Setuju</option>
                        <option value="Ditolak" {{ ($id && $surat['status'] == 'Ditolak') ? 'selected' : '' }}>Tolak</option>                        
                    </select>   
                    @if($errors->has('status_laboran'))
                    <div class='error small text-danger'>{{ $errors->first('status_laboran') }}</div>
                    @endif
                </div>
                
                <button href="submit" class="btn btn-success btn-sm btn-rouneded">Kirim</button>
                <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm btn-rounded">Kembali</a>
                @endforeach
                {{ Form::close() }}
            </div>
        </div>
    </div>
    
@endsection