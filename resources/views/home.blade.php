@extends('layouts.home')

@section('content')
<div class="container">
  <div class="dash-content">
    <div class="overview">            
      <div class="title">              
        <h2>Dashboard</h2>
      </div>
      <div class="boxes">              
        <div class="box box1">
          <i class="uil uil-clipboard-alt"></i>
          <span class="text">Jumlah Surat</span>
          <span class="number">{{$surat_count}}</span>
        </div>
        <div class="box box2">
          <i class="uil uil-book"></i>
          <span class="text">Jumlah Laporan</span>
          <span class="number">{{$laporan_count}}</span>
        </div>
        <div class="box box3">
          <i class="uil uil-users-alt"></i>
          <span class="text">Jumlah Pengguna</span>
          <span class="number">{{$users_count}}</span>
        </div>            
      </div>
    </div>
  </div>
</div>
@endsection
