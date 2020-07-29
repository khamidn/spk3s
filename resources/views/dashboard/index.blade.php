@extends("admin.layout")
@section("content")
<div class="block-header">
  <h2>BERANDA</h2>
  <hr>
</div>
@if(Auth::check())
@if(Auth::user()->hasRole('admin'))
  <div class="row clearfix">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">TOTAL PENGGUNA</div>
                <div class="number count-to" data-from="0" data-to="{{$jumlahP}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group</i>
            </div>
            <div class="content">
                <div class="text">TOTAL SISWA</div>
                <div class="number count-to" data-from="0" data-to="{{$jumlahS}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            <div class="content">
                <div class="text">TOTAL KELAS</div>
                <div class="number count-to" data-from="0" data-to="{{$jumlahK}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->hasRole('admin'))
<div class="row clearfix">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
      <!-- <div class="header"> -->
        <div class="header">
          <h2><em>Decision Support System</em> (DSS) Kenaikan Kelas Siswa</h2>
          <ul class="header-dropdown m-r-0">
              <li>
                  <a href="javascript:void(0);">
                      <i class="material-icons">info_outline</i>
                  </a>
              </li>
          </ul>
        </div>
        <div class="body">
          <p><b>Sistem Pendukung Keputusan (SPK)</b> atau <b><em>Decision Support System (DSS)</em></b> Kenaikan Kelas Siswa SMK Widya Dharma Turen. Merupakan sistem yang digunakan untuk memperoleh solusi kenaikan kelas siswa yang cepat dan tepat.</p>
          <p>Sistem ini menggunakan metode <em>Analitical Hieracy Process</em> (AHP) dan <em>Technique Order Preference by Similarity To Ideal Solution</em> (TOPSIS).</p>
        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
@endif

@if(Auth::user()->hasRole('wali_kelas'))  
<div class="row clearfix">
  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
      <div class="header">
        <div class="header">
         <h2><em>Decision Support System</em> (DSS) Kenaikan Kelas Siswa</h2>
          <ul class="header-dropdown m-r-0">
              <li>
                  <a href="javascript:void(0);">
                      <i class="material-icons">info_outline</i>
                  </a>
              </li>
          </ul>
        </div>
        <div class="body">
          <p><b>Sistem Pendukung Keputusan (SPK)</b> atau <b><em>Decision Support System (DSS)</em></b> Kenaikan Kelas Siswa SMK Widya Dharma Turen. Merupakan sistem yang digunakan untuk memperoleh solusi kenaikan kelas siswa yang cepat dan tepat.</p>
          <p>Sistem ini menggunakan metode <em>Analitical Hieracy Process</em> (AHP) dan <em>Technique Order Preference by Similarity To Ideal Solution</em> (TOPSIS).</p>
        </div>
      </div>
    </div>
  </div>

  <!-- DITAMPILKAN UNTUK WALI KELAS -->
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div class="card">
    <div class="header">
      <h2>Input Nilai</h2>
        <ul class="header-dropdown m-r-0">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
      <div class="body">
         <div class="button-demo">
           <a href="{{route('inputNilai.index')}}" type="button" class="btn btn-primary waves-effect">Input Nilai</a>
           <p>Isi masing-masing nilai siswa disini.</p>
         </div>
      </div>
    </div>
  </div>

</div>
@endif

@if(Auth::user()->hasRole('admin'))
<div class="row clearfix">
  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div class="card">
    <div class="header">
      <h2>Prosedur SPK</h2>
        <ul class="header-dropdown m-r-0">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
      <div class="body" style="height: 175px;">
         <div class="button-demo">
           <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#prosedurSPK">Lihat Prosedur</button>
           <p>Prosedur SPK merupakan penjelasan langkah yang harus dilakukan untuk menggunakan sistem</p>
         </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div class="card">
    <div class="header">
      <h2>Metode AHP</h2>
        <ul class="header-dropdown m-r-0">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
      <div class="body" style="height: 175px;">
         <div class="button-demo">
           <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#olahDataAHP">Olah Data AHP</button>
           <p>Olah Data AHP merupakan proses pertama berupa input tingkat kepentingan kriteria</p>
         </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div class="card">
    <div class="header">
      <h2>Metode TOPSIS</h2>
        <ul class="header-dropdown m-r-0">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
      <div class="body" style="height: 175px;">
         <div class="button-demo">
           <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#olahDataTOPSIS">Olah Data TOPSIS</button>
           <p>Olah Data TOPSIS merupakan proses kedua yang akan melakukan proses seleksi nilai siswa</p>
         </div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
  <div class="card">
    <div class="header">
      <h2>Hasil Akhir</h2>
      <ul class="header-dropdown m-r-0">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
      <div class="body" style="height: 175px;">
         <div class="button-demo">
           <a  href="{{route('topsis.rangking')}}"type="button" class="btn btn-primary waves-effect">Lihat Hasil Akhir</a>
           <p>Hasil Akhir menampilkan solusi dan rangking siswa</p>
         </div>
      </div>
    </div>
  </div>
</div>
@endif

@endif


<div class="row clearfix">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <div class="card">
      <div class="header">
          <h2>PESERTA DIDIK NAIK KELAS (%)</h2>
          <ul class="header-dropdown m-r--5">
            <li class="dropdown">
              <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">donut_large</i>
              </a>
            </li>
          </ul>
      </div>
      <div class="body">
          <div id="donut_chart" class="dashboard-donut-chart"></div> 
           <input id="jumlahTNK" value="{{$jumlahTNK}}" type="hidden">
            <input id="jumlahNK" value="{{$jumlahNK}}" type="hidden">
            <input id="jumlahS" value="{{$jumlahS}}" type="hidden">       
      </div>
  </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <div class="card">
    <div class="header">
      <h2>KETERANGAN SISWA/SISWI</h2>
      <ul class="header-dropdown m-r--5">
            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons">info_outline</i>
                </a>
            </li>
        </ul>
    </div>
    <div class="body">
      <div class="row clearfix demo-icon-container ">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="demo-google-material-icon"> <i class="material-icons col-cyan">lens</i> <span class="icon-name">Naik Kelas:<b> {{$jumlahNK}} orang</b></span>
          </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
          <div class="demo-google-material-icon "> <i class="material-icons col-pink">lens</i> <span class="icon-name">Belum Naik Kelas:<b> {{$jumlahTNK}} orang</b></span>
          </div>
      </div>
      </div>
      
      <!-- <a href="{{route('dataNilai.index')}}">Lebih detail</a> -->
    </div>
  </div>
</div>
</div>
@endsection

@push("modal")
<!-- MODAL PROSEDUR -->

<!-- PROSEDUR SPK -->
<div id="prosedurSPK" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="modalTambahTitle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Prosedur SPK</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            Prosedur SPK3S (Sistem Pendukung Keputusan Kenaikan Kelas Siswa) adalah sebagai berikut:
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ol>
              <li><b>Data kriteria</b> digunakan untuk mengambil keputusan kenaiakan kelas siswa</li>
              <li><b>Data tingkat tingkat kepentingan tiap kriteria</b>, untuk diproses menggunakan metode Analitical Hieracy Process (AHP). Sehingga bobot yang dihasilkan digunakan dalam proses Technique Order Preference by Similarity To Ideal Solution (TOPSIS)</li>
              <li><b>Menyiapkan data nilai siswa</b></li>
              <li><b>Olah data siswa</b> menggunakan proses Technique Order Preference by Similarity To Ideal Solution (TOPSIS)</li>
              <li><b>Hasil akhir</b> merupakan data nilai siswa yang telah dirangking. Sehingga sistem menampilkan data siswa yang layak naik kelas.</li>
            </ol>
          </div>  
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeModalTambah" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- PROSEDUR OLAH DATA AHP -->
<div id="olahDataAHP" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="modalTambahTitle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Langkah Olah Data AHP</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            Prosedur Analitical Hieracy Process (AHP) adalah sebagai berikut:
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ol>
              <li><b>Nilai Kepentingan Kriteria</b>. Setiap kriteria memiliki bobot kepentingan yang berbeda antara satu dengan lainnya. Penentuan kepentingan tiap kriteria ditentukan oleh pihak sekolah SMK Widya Dharma Turen melalui pemberian nilai perbandingan antar kriteria.</li>
              <li><b>Matriks Perbandingan Berpasangan</b>. Pemberian nilai skala intesitas kepentingan untuk perbandingan berpasangan sesuai dengan langkah 1 (satu) dengan menggunakan skala intesitas kepentingan yang digunakan oleh (Pratiwi, 2016), dalam melakukan perbandingan antara satu kriteria dengan kritera lainnya.</li>
              <li><b>Normalisasi Matriks</b>. Normaliasi matrik dilakukan dengan membagi antara nilai pada matriks perbandingan berpasangan dengan jumlah masing-masing kolom kriteria.</li>
              <li><b>Penjumlahan Tiap Baris</b>. Penjumlahan tiap baris dilakukan dengan mengalikan nilai pada kolom prioritas baris C1 pada Tabel langkah nomer 3 (tiga) dengan nilai baris C1 kolom C1 pada Tabel langkah nomer 2 (dua). </li>
              <li><b>Rasio Konsistensi</b>. Rasio konsistensi diperoleh dari penjumlahan nilai jumlah perbaris pada Tabel langkah nomer 4 (empat) dengan nilai prioritas pada Tabel langkah nomer 3 (tiga).</li>
              <li><b>Uji Konsistensi</b>. Uji Konsistensi dilakukan untuk memastikan bahwa nilai CR <= 0.1. Apabila nilai CR lebih besar dari 0.1 maka matriks perbandingan berpasangan pada Tabel langkah nomer 2 (dua) harus diperbaiki.</li>
            </ol>
          </div>  
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeModalTambah" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- PROSEDUR Olah Data TOPSIS -->
<div id="olahDataTOPSIS" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="modalTambahTitle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Prosedur Olah Data TOPSIS</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            Prosedur Technique Order Preference by Similarity To Ideal Solution (TOPSIS) adalah sebagai berikut:
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ol>
              <li><b>Data Siswa Dengan 6 Kriteria</b>. Nilai siswa yang digunakan ialah nilai rata-rata semester ganjil, semester genap, kehadiran, praktek, tugas dan sikap</li>
              <li><b>Konversi Data Siswa</b>. Nilai siswa 0-100 dan E-A dikonversi menjadi 1-5.</li>
              <li><b>Kuadrat Konversi</b>. Data yang telah dilakukan konversi, selanjutnya dikuadrat</li>
              <li><b>Normalisasi</b>. Normalisasi matriks dilakukan dengan menggunakan persamaan sebagai berikut:
                <p>
                  <img src="{{URL::asset('images/persamaan-topsis/persamaan1.png')}}"/>
                </p>
              </li>
              <li><b>Normalisasi Terbobot</b>. Matriks normalisasi diperoleh dengan mengalikan setiap nilai kolom masing-masing kriteria dengan bobot kriteria yang telah dihitung dengan proses AHP menggunakan persamaan sebagai berikut: 
                <p>
                  <img src="{{URL::asset('images/persamaan-topsis/persamaan2.png')}}">
                </p>
              </li>
              <li><b>Menghitung Titik Ideal Positif dan Negatif</b>.
                <ol type="a">
                   <li>Titik ideal positif diperoleh dengan menggunakan persamaan sebagai berikut:
                      <p><img src="{{URL::asset('images/persamaan-topsis/persamaan3.png')}}" style="width:95%; height: 95%;"></p>
                   </li>
                   <li>Titik ideal negative diperoleh dengan menggunakan persamaan sebagai berikut:
                     <p><img src="{{URL::asset('images/persamaan-topsis/persamaan4.png')}}" style="width:95%; height: 95%;"></p>
                   </li>
                </ol>
              </li>
              <li><b>Menghitung Jarak Antaran Nilai Terbobot Setiap Alernatif Terhadap Solusi Ideal Positif Dan Solusi Ideal Negative</b>.
                <ol type="a">
                  <li>Jarak Antaran Nilai Terbobot Setiap Alernatif Terhadap Solusi Ideal Positif dengan menggunakan persamaan sebagai berikut:
                    <p>
                      <img src="{{URL::asset('images/persamaan-topsis/persamaan5.png')}}"/>
                    </p>
                  </li>
                  <li>Jarak Antaran Nilai Terbobot Setiap Alernatif Terhadap Solusi Ideal Negatif dengan menggunakan persamaan sebagai berikut:
                    <p>
                      <img src="{{URL::asset('images/persamaan-topsis/persamaan6.png')}}"/>
                    </p>
                  </li>
                </ol>
              </li>
              <li><b>Menghitung Preferensi. Nilai preferensi merupakan nilai terakhir yang digunakan untuk melakukan perangkingan dari nilai tertinggi sampai terendah dengan menggunakan persamaan sebagai berikut</b>. 
                 <p>
                  <img src="{{URL::asset('images/persamaan-topsis/persamaan7.png')}}">
                </p>
              </li>
            </ol>
          </div>  
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeModalTambah" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL PROSEDUR -->
@endpush

@section("js-chart-donut")
<!-- ChartJs -->
<!-- <script src="{{URL::asset('plugins/chartjs/Chart.bundle.js')}}"></script> -->
<!-- Morris Plugin Js -->
<script src="{{URL::asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('plugins/morrisjs/morris.js')}}"></script>
<!-- Custom Js -->

<script src="{{URL::asset('js/pages/index.js')}}"></script>
<script src="{{URL::asset('plugins/autosize/autosize.js')}}"></script>
<script src="{{URL::asset('js/pages/forms/basic-form-elements.js')}}"></script>
@endsection
