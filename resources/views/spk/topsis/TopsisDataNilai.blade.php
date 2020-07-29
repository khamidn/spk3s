@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>PERHITUNGAN TOPSIS</h2>
	<hr>
</div>

<div class="row clearfix jsdemo-notification-button">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
        <button type="button" id="notifikasi-hitung-selesai" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Proses selesai">CREATE</button>
         <button type="button" id="notifikasi-proses-hitung" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="center" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Proses hitung...">PROSES</button>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-6 col-lg-offset-3  col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					FILTER KELAS
				</h2>
			</div>
			<div class="body">
				<form action="{{route('dataNilai.index')}}">
						<div class="row clearfix">
		                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
		                        <select class="form-control show-tick" id="cariKelas" name="cariKelas">
		                            <option value="">-- Pilih Kelas --</option>
		                            @foreach($kelas as $kls)	
			            				<option value="{{$kls->id}}" @if(Request::get('cariKelas')==$kls->id) selected="" @endif>{{$kls->nama_kelas}}</option>
			            			@endforeach
		                        </select>
		                    </div>
		                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
		                        <button type="submit" class="btn btn-primary">Filter</button>
		                    </div>
		                </div>
                	</form>
			</div>
		</div>
	</div>
</div>



<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DAFTAR NILAI ALTERNATIF</h2>
				<ul class="header-dropdown m-r--5">
						 <li class="dropdown">

						 	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						 		<i class="material-icons">more_vert</i>
						 	</a>
						 	<ul class="dropdown-menu pull-right">
						 		 <li><a href="{{route('dataNilai.download')}}"><i class="material-icons col-indigo">file_download</i>Unduh Nilai</a></li>
						 		 <li><a href="" data-toggle="modal" data-target="#uploadNilai"><i class="material-icons col-lime">file_upload</i>Unggah Nilai</a></li>
						 	</ul>
						 </li>			
					</ul>
			</div>

			<!-- awal body -->
			<div class="body">
				@php 
				$jumlah = count($data);
				$jumlahAlternatif = count($dataAlternatif);
				@endphp
				
               <form id="form_advanced_validation" action="{{route('topsisMatriks.simpan')}} " method="POST" class="form-horizontal">
				{{csrf_field()}}

				<input value="{{Request::get('cariKelas')}}" class="hidden" name="inputKelas">
				<ul class="nav nav-tabs tab-nav-right">
					<li role="presentation" class="active"><a href="#nilai-awal" data-toggle="tab" >NILAI AWAL</a></li>
					<li role="presentation"><a href="#nilai-dikonversi" data-toggle="tab">NILAI DIKONVERSI</a></li> 
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="nilai-awal">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									@php 
										$pK=80/$jumlah;
										$jPk=$pK*$jumlah;
										$pA=100-$jPk;
									@endphp
									<tr>
										<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
										<th colspan="6" class="text-center">Kriteria</th>
									</tr>
									<tr>
										
										@foreach($kriteria as $k1)
										<th width="{{$pK}}%">{{$k1->nama_kriteria}}</th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@php
									$noUtama1=0;
									if(count($siswa)){
										foreach($siswa as $al1){
										$noUtama1+=1;
										echo '<tr>';
										echo '<td>'.$al1->nama_siswa.'</td>';
										$noSub1=0;
										for($i=1; $i<=$jumlah; $i++){
											$keys =array_keys($data);
											$xxx=$keys[array_search("gsda",$keys)+($i-1)];
											$newname=$al1->id."-".$xxx;
											$noSub1+=1;
											$nilai = ambil_nilai_siswa($al1->id,$xxx);

											if($noSub1==5){
											echo'<td>';
													echo'<select name="kolom-'.$newname.'" id="na-k'.$noUtama1.'b'.$noSub1.'" data-target="k'.$noSub1.'b'.$noUtama1.'" data-kolom="'.$noSub1.'" class="form-control inputnumber kolomm'.$noSub1.'" title="kolomm'.$noSub1.'" disabled="">';
														$c='A';
														$chars=array($c);
														if($nilai==0){
														echo '<option value="0" selected="selected">--Pilih--</option>';
														}
														for($x=$c; $x<='E'; $chars[]=$x++)
															{
																$sl='';
																if($nilai==$x)
																{
																	$sl='selected="selected"';

																}
																echo '<option value="'.$x.'" '.$sl.'>'.$x.'</option>';
															}
													echo'</select>';
												echo'</td>';

											}	

											elseif($noSub1==6){
												echo'<td>';
													echo'<select name="kolom-'.$newname.'" id="na-k'.$noUtama1.'b'.$noSub1.'" data-target="k'.$noSub1.'b'.$noUtama1.'" data-kolom="'.$noSub1.'" class="form-control inputnumber kolomm'.$noSub1.'" title="kolomm'.$noSub1.'" disabled="">';
														$c='A';
														$chars=array($c);
														if($nilai==0){
														echo '<option value="0" selected="selected">--Pilih--</option>';
														}
														for($x=$c; $x<='E'; $chars[]=$x++)
															{
																$sl='';
																if($nilai==$x)
																{
																	$sl='selected="selected"';

																}
																echo '<option value="'.$x.'" '.$sl.'>'.$x.'</option>';
															}
													echo'</select>';
												echo'</td>';
											}
											else{
												echo '<td><div class="form-group"><div class="form-line"><input type="number" name="kolom-'.$newname.'" id="na-k'.$noUtama1.'b'.$noSub1.'"  class="form-control inputnumber kolom'.$noSub1.'" value="'.$nilai.'" readonly="" /></div></div></td>';	
											}
										}
										echo '</tr>';
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}

									@endphp
								</tbody>
							</table>
						</div>
						<!-- <div class="row">
							<div class="col-lg-6">
								<button type="submit" id="simpanNilai" name="submit" class="btn btn-success waves-effect" @if(Request::get('cariKelas')== "") disabled @endif >Simpan Nilai</button>
								<button type="button" id="hitungAhpTopsis" class="btn btn-primary waves-effect" @if(Request::get('cariKelas')=="") disabled @endif>Hitung</button>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label>Keterangan</label>
								<ul>
									<li>Simpanlah data nilai siswa setelah melakukan perubahan nilai, dengan tekan tombol "Simpan Nilai" berwana hijau</li>
									<li>Untuk melihat hasil perhitungan, tekan tombol "Hitung" berwarna biru</li>
									<li>Dengan menekan tombol hitung, sistem menyimpan secara automatis nilai siswa setelah proses hitung selesai</li>
								</ul>
							</div>
						</div> -->
					</div>

					<div role="tabpanel" class="tab-pane fade" id="nilai-dikonversi">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
										<th colspan="2" class="text-center">Kriteria</th>
									</tr>
									<tr>
									@foreach($kriteria as $k2)
									<th>{{$k2->nama_kriteria}} </th>
									@endforeach
									</tr>
								</thead>
								<tbody>
									@php 
									$noUtama2=0;
									if(count($siswa)){	
										foreach($siswa as $al2){
										$noUtama2+=1;
										echo '<tr>';
										echo '<td>'.$al2->nama_siswa.'</td>';
										$noSub2=0;
										for($i=1; $i<=$jumlah; $i++){
											$noSub2+=1;
											echo '<td><input type="text" id="ndk-k'.$noUtama2.'b'.$noSub2.'" class="form-control" value="0" readonly="" /> </td>';
										}	
										echo '</tr>';	
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}
									@endphp
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> 
			<!-- akhir body -->
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>MATRIKS</h2>
			</div>
			<div class="body">
				<ul class="nav nav-tabs tab-nav-right">
					<li role="presentation" class="active"><a href="#kuadrat" data-toggle="tab">KUADRAT KONVERSI</a></li>
					<li role="presentation"><a href="#nilai-ternormalisasi" data-toggle="tab">NILAI TERNORMALISASI</a></li>
					<li role="presentation"><a href="#bobot-ternormalisasi" data-toggle="tab">BOBOT TERNORMALISASI</a></li>
					<li role="presentation"><a href="#titik-ideal" data-toggle="tab">TITIK IDEAL</a></li>
					<li role="presentation"><a href="#jarak-solusi" data-toggle="tab">JARAK SOLUSI IDEAL</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="kuadrat">
						<label>Data Nilai Dikonversi Yang Telah Dikuadratkan</label>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
										<th colspan="6" class="text-center">Kriteria</th>
										
									</tr>
									<tr>

										@foreach($kriteria as $k3)
										<th rowspan="1">{{$k3->nama_kriteria}} </th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@php 
									$noUtama3=0;
									if(count($siswa)){
										foreach($siswa as $al3){
											$noUtama3+=1;
											echo '<tr>';
											echo '<td>'.$al3->nama_siswa.'</td>';
											$noSub3=0;
											for($i=1; $i<=$jumlah; $i++){
												$noSub3+=1;
												echo '<td><input type="text" id="kk-k'.$noUtama3.'b'.$noSub3.'" class="form-control kolomKuadrat'.$noSub3.'" value="0" readonly="" /> </td>';
											}	
											echo '</tr>';
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}
									@endphp
								</tbody>
								<tfoot>
									@if(count($siswa))
									<tr>
										<th><strong>∑𝑥<sup>2</sup></strong></th>
										@php
										 
											for($h=1; $h<=$jumlah; $h++){
												echo'<td><input type="text" id="kuadrat-b'.$h.'" class="form-control kuadrat-b'.$h.'" value="0" title="'.$h.'" readonly=""/></td>';
											}
										
										@endphp
									</tr>
									@endif
									@if(count($siswa))
									<tr>
										<th><strong>√∑𝑥<sup>2</sup></strong></th>
										@php
											for($j=1; $j<=$jumlah; $j++){
												echo '<td><input type="text" class="form-control akarKuadrat-b'.$j.'" id="akarKuadrat-b'.$j.'" value="0" readonly=""/></td>';
											}
										@endphp
									</tr>
									@endif
								</tfoot>
							</table>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="nilai-ternormalisasi">
						<label>Data Ternomalisasi Terbobot</label>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
										<th colspan="6" class="text-center">Kriteria</th>
									</tr>
									<tr>
										
										@foreach($kriteria as $k4)
										<th rowspan="1">{{$k4->nama_kriteria}} </th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@php 
									$noUtama4=0;
									if(count($siswa)){
										foreach($siswa as $al4){
											$noUtama4+=1;
											echo '<tr>';
											echo '<td>'.$al4->nama_siswa.'</td>';
											$noSub4=0;
											for($i=1; $i<=$jumlah; $i++){
												$noSub4+=1;
												echo '<td><input type="text" id="nternormalisasi-k'.$noUtama4.'b'.$noSub4.'" class="form-control" value="0" readonly="" /> </td>';
											}
											echo '</tr>';
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}
									@endphp
								</tbody>
							</table>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="bobot-ternormalisasi">
						<label>Bobot pada matriks yang telah dinormalisasi</label>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
									<th colspan="6" class="text-center">Kriteria</th>
								</tr>
								<tr>
										@php 

										@endphp
										@foreach($kriteria as $k5)
										<th rowspan="1">{{$k5->nama_kriteria}} </th>
										@endforeach
								</tr>
							</thead>
							<tbody>
									@php 
									$noUtama5=0;
									if(count($siswa)){
										foreach($siswa as $al5){
											$noUtama5+=1;
											echo '<tr>';
											echo '<td>'.$al5->nama_siswa.'</td>';
											$noSub5=0;
											for($i=1; $i<=$jumlah; $i++){
												$noSub5+=1;
												echo '<td><input type="text" id="bt-k'.$noUtama5.'b'.$noSub5.'" class="form-control kolomBt'.$noSub5.'" value="0" readonly="" /> </td>';
											}
											echo '</tr>';
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}
									@endphp
								</tbody>
						</table>
						</div>
						
					</div>

					<div role="tabpanel" class="tab-pane" id="titik-ideal">
						<label>TITIK IDEAL POSITIF</label>
						@php 
						$pk = 100 / $jumlah;
						@endphp
						<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th colspan="6" class="text-center">Kriteria</th>
								</tr>
								<tr>
									
										@foreach($kriteria as $k6)
										<th width="{{$pk}}%" rowspan="1" >{{$k6->nama_kriteria}} </th>
										@endforeach
								</tr>
							</thead>
							<tbody>
								@if(count($siswa))
									@php
									echo '<tr>';
										$noUtama6=0;
										for($i=1; $i<=$jumlah; $i++){
											$noUtama6+=1;
											echo '<td><input type="text" id="tp-k'.$noUtama6.'" class="form-control" value="0" readonly="" /> </td>';
										}
									echo '</tr>';
									@endphp
								@else
									<tr>
										<td colspan="7">No data available in table</td>
									</tr>
								@endif
							</tbody>
						</table>
						</div>
						

						<label>TITIK IDEAL NEGATIF</label>
						<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th colspan="6" class="text-center">Kriteria</th>
								</tr>
								<tr>
										@foreach($kriteria as $k7)
										<th width="{{$pk}}%" rowspan="1">{{$k7->nama_kriteria}} </th>
										@endforeach
								</tr>
							</thead>
							<tbody>
								@if(count($siswa))
									@php
									echo '<tr>';
										$noUtama7=0;
										for($i=1; $i<=$jumlah; $i++){
											$noUtama7+=1;
											echo '<td><input type="text" id="tn-k'.$noUtama7.'" class="form-control" value="0" readonly="" /> </td>';
										}
									echo '</tr>';
									@endphp
								@else
									<tr>
										<td colspan="7">No data available in table</td>
									</tr>
								@endif
							</tbody>
						</table>
						</div>
						
					</div>

					<div role="tabpanel" class="tab-pane" id="jarak-solusi">
						<label>Jarak Setiap Alternatif Terhadap Titik Ideal Positif S<sup>+</sup></label>
						<div class="table-responsive">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
									<th colspan="6" class="text-center">Kriteria</th>
									<th rowspan="2">Nilai S<sup>+</sup></th>
								</tr>
								<tr>
									@foreach($kriteria as $k8)
									<th>{{$k8->nama_kriteria}}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
									@php 
									$noUtama8=0;
									if(count($siswa)){
										foreach($siswa as $al6){
											$noUtama8+=1;
											echo '<tr>';
											echo '<td>'.$al6->nama_siswa.'</td>';
											$noSub8=0;
											for($i=1; $i<=$jumlah; $i++){
												$noSub8+=1;
												echo '<td><input type="text" id="jp-k'.$noUtama8.'b'.$noSub8.'" class="form-control" value="0" readonly="" /> </td>';
											}
											echo '<td><input type="text" class="form-control" id="jmljp-b'.$noUtama8.'" value="0" readonly="" /></td>';
											echo '</tr>';
										}
									}
									else{
										echo '<tr>';
										echo '<td colspan="7">No data available in table</td>';
										echo '</tr>';
									}
									@endphp
								</tbody>
						</table>	
						</div>
						


						<label>Jarak Setiap Alternatif Terhadap Titik Ideal Negatif S<sup>-</sup></label>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th rowspan="2" width="{{$pA}}%">Nama Siswa</th>
									<th colspan="6" class="text-center">Kriteria</th>
									<th rowspan="2">Nilai S<sup>-</sup></th>
								</tr>
								<tr>
									@foreach($kriteria as $k9)
									<th>{{$k9->nama_kriteria}}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@php
								$noUtama9=0;
								if(count($siswa)){
									foreach($siswa as $al7){
										$noUtama9+=1;
										echo '<tr>';
										echo '<td>'.$al7->nama_siswa.'</td>';
										$noSub9=0;
										for($i=1; $i<=$jumlah; $i++){
											$noSub9+=1;
											echo '<td><input type="text" id="jn-k'.$noUtama9.'b'.$noSub9.'" class="form-control" value="0" readonly="" /> </td>';

										}
										echo '<td><input type="text" class="form-control" id="jmljn-b'.$noUtama9.'" value="0" readonly="" /></td>';
										echo '</tr>';

									}
								}
								else{
									echo '<tr>';
									echo '<td colspan="7">No data available in table</td>';
									echo '</tr>';
								}

								@endphp
							</tbody>
						</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
		<div class="card">
			<div class="header">
				<h2>NILAI PREFERENSI</h2>
			</div>
			<div class="body">
				<label>Nilai preferensi diperoleh dari kedekatan relatif dengan solusi ideal</label>
				<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th width="70%">Nama Siswa</th>
							<th width="10%">Nilai Preferensi</th>
							<!-- <th width="20%">Keputusan</th> -->
						</tr>
					</thead>
					<tbody>
						@php
						$noUtama8=0;
						if(count($siswa)){ 
							foreach($siswa as $al8){
								$noUtama8+=1;
								echo '<tr>';
								echo '<td>'.$al8->nama_siswa.'</td>';
								echo '<td><input type="text" id="nilaiCi-k'.$noUtama8.'" name="nilaiCi-k'.$noUtama8.'" class="form-control" value="0" readonly="" /> </td>';
								echo '</tr>';
							}
						}
						else{
							echo '<tr>';
							echo '<td colspan="7">No data available in table</td>';
							echo '</tr>';
						}
						@endphp
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
@endsection

@push("modal")
<div class="modal fade" id="uploadNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Upload Form Nilai Siswa</h4>
			</div>
			<form action="{{route('dataNilai.upload')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="modal-body">
					<input type="file" name="import_nilai">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Upload Nilai</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endpush

@section("js-custom")
<script type="text/javascript">
$(function(){
	hitung();
	// $('#hitungAhpTopsis').text('Hitung');
	// $(".inputnumber").each(function(){
	// 	$(this).change(function(){
	// 		hitung();
	// 		$('#notifikasi-hitung-selesai').click();
	// 	});
	// });
	$('#hitungAhpTopsis').on('click',function(){
		hitung();
		$('#notifikasi-hitung-selesai').click();
		$("#simpanNilai").click();
				
	});

});

function hitung(){
	$(".inputnumber").each(function(){
		nilai_dikonversi();
		kuadrat_konversi();
		nilai_ternormalisasi();
		bobot_ternormalisasi();
		titik_ideal();
		jarak_solusi_ideal();
		nilai_preferensi();
		// hasil_keputusan();
	});
}

function nilai_dikonversi(){
	for(i=1; i<=<?=$jumlahAlternatif; ?>; i++){
			for(x=1; x<=<?=$jumlah; ?>; x++){

				if(x==5){
					var ntugas =$("#na-k"+i+"b"+x).val();
					if(ntugas=='A'){
						$("#ndk-k"+i+"b"+x).val(5);	
					}

					if(ntugas=='B'){
						$("#ndk-k"+i+"b"+x).val(4);	
					}
					if(ntugas=='C'){
						$("#ndk-k"+i+"b"+x).val(3);	
					}
					if(ntugas=='D'){
						$("#ndk-k"+i+"b"+x).val(2);	
					}
					if(ntugas=='E'){
						$("#ndk-k"+i+"b"+x).val(1);	
					}
				}
				
				else if(x==3){
					var naKehadiran = $("#na-k"+i+"b"+x).val();

					if(naKehadiran>=90){
						$("#ndk-k"+i+"b"+x).val(5);	
					}

					else if(naKehadiran>=80){
						$("#ndk-k"+i+"b"+x).val(4);	
					}

					else if(naKehadiran>=70){
						$("#ndk-k"+i+"b"+x).val(3);
					}
					else if(naKehadiran>=60){
						$("#ndk-k"+i+"b"+x).val(2);
					}

					else if(naKehadiran>=1){
						$("#ndk-k"+i+"b"+x).val(1);
					}

					else{
						$("#ndk-k"+i+"b"+x).val(0);
					}
				}

				else if(x==6 ){
					var nsikap =$("#na-k"+i+"b"+x).val();
					if(nsikap=='A'){
						$("#ndk-k"+i+"b"+x).val(5);	
					}

					if(nsikap=='B'){
						$("#ndk-k"+i+"b"+x).val(4);	
					}
					if(nsikap=='C'){
						$("#ndk-k"+i+"b"+x).val(3);	
					}
					if(nsikap=='D'){
						$("#ndk-k"+i+"b"+x).val(2);	
					}
					if(nsikap=='E'){
						$("#ndk-k"+i+"b"+x).val(1);	
					}
				}

				else {
					var natarget =$("#na-k"+i+"b"+x).val();
					if(natarget>=90){
						$("#ndk-k"+i+"b"+x).val(5);	
					}

					else if(natarget>=80){
						$("#ndk-k"+i+"b"+x).val(4);	
					}

					else if(natarget>=70){
						$("#ndk-k"+i+"b"+x).val(3);
					}
					else if(natarget>=60){
						$("#ndk-k"+i+"b"+x).val(2);
					}

					else if(natarget>=1){
						$("#ndk-k"+i+"b"+x).val(1);
					}

					else{
						$("#ndk-k"+i+"b"+x).val(0);
					}
				}

			}
		}
}

function kuadrat_konversi(){
	for(i=1; i<=<?=$jumlahAlternatif; ?>; i++){
		for(x=1; x<=<?=$jumlah; ?>; x++){
			var ndktarget = $("#ndk-k"+i+"b"+x).val();
			var kuadrat = Math.pow(Number(ndktarget),2);
			$("#kk-k"+i+"b"+x).val(kuadrat);

			// hitung kuadrat
		var sum=0;
		$(".kolomKuadrat"+x).each(function(){
			sum+=Number($(this).val());	
		});
		var fx1 = sum;
		$("#kuadrat-b"+x).val(fx1);

		//hitung akar kuadrat
		var akTarget = $("#kuadrat-b"+x).val();
		var akarKuadrat = Math.sqrt(akTarget);
		var n = akarKuadrat.toFixed(3);
		$("#akarKuadrat-b"+x).val(n);
		
		}
	}


}

function nilai_ternormalisasi(){
	for(i=1; i<=<?=$jumlahAlternatif; ?>; i++){
		for(x=1; x<=<?=$jumlah; ?>; x++){
			var kkTarget = $("#kk-k"+i+"b"+x).val();
			var akTarget = $("#akarKuadrat-b"+x).val();
			var hitung = Math.sqrt(kkTarget)/akTarget;
			// var n = Math.ceil(hitung *100)/100;
			var n =hitung;
			$("#nternormalisasi-k"+i+"b"+x).val(n.toFixed(3));
		}
	}

}

function bobot_ternormalisasi(){
	var bobot = {!! $bobotss !!};
	for(i=1; i<=<?=$jumlahAlternatif; ?>; i++){
		for(x=1; x<=<?=$jumlah; ?>; x++){
			var ntTarget = $("#nternormalisasi-k"+i+"b"+x).val();
			var hitung =bobot[x-1]*ntTarget;
			$("#bt-k"+i+"b"+x).val(hitung.toFixed(3));
		}
		
	}

}

function titik_ideal(){
	//TITIK IDEAL
	var cols = <?=$jumlah;?>;
	var rows = <?=$jumlahAlternatif; ?>;
	//ambil nilai
	var matrik = new Array(rows);
	for(s=0; s<rows; s++){
		matrik[s] = new Array(cols);
		for(t=0; t<=cols; t++){
			var s1=s+1;
			var t1=t+1;
			var nilai = $("#bt-k"+s1+"b"+t1).val();
			matrik[s][t]=Number(nilai);
		}
	}
	// console.log(matrik);

	//Hitung titik ideal positif
	for(k=0; k< cols; k++){
		var maxm1 = matrik[0][k];
		var maxm2 = matrik[0][k];
		var k1=k+1;
		for(l=1; l< rows; l++){
		var l1=l+1;
			if(matrik[l][k] > maxm1){
				maxm1 = matrik[l][k];
			}
			
			if(matrik[l][k] < maxm2){
				maxm2 = matrik[l][k];
			}
			$("#tp-k"+k1).val(maxm1); //titik ideal positif
			$("#tn-k"+k1).val(maxm2); //titik ideal negatif
		}
	}
}

function jarak_solusi_ideal(){
	var cols = <?=$jumlah;?>;
	var rows = <?=$jumlahAlternatif; ?>;

	var arrayTP = new Array(cols);
	var arrayTN = new Array(cols);
	for(i=1; i<=<?=$jumlah;?>; i++){
		var tipTarget =$("#tp-k"+i).val();
		var tinTarget =$("#tn-k"+i).val();
		arrayTP[i-1]=Number(tipTarget);
		arrayTN[i-1]=Number(tinTarget);
	}

	for(x=1; x<=rows; x++){
		var jumlahjp=0;
		var jumlahjn=0;
		for(a=1; a<=cols; a++){
			var btTarget =$("#bt-k"+x+"b"+a).val();
			var hitungjp =arrayTP[a-1] - Number(btTarget);
			var hitungjn =Number(btTarget) - arrayTN[a-1];		
			$("#jp-k"+x+"b"+a).val(hitungjp.toFixed(3));//jarak solusi ideal positif
			$("#jn-k"+x+"b"+a).val(hitungjn.toFixed(3));//jarak solusi ideal negatif

			jumlahjp += Number(hitungjp);
			jumlahjn += Number(hitungjn);

			// console.log(a++);
		}


		var jumlah_jp = Math.sqrt(jumlahjp);
		var jumlah_jn = Math.sqrt(jumlahjn);
		// console.log("+",jumlah_jp.toFixed(2),"-",jumlah_jn.toFixed(2));
		$("#jmljp-b"+x).val(jumlah_jp.toFixed(3));
		$("#jmljn-b"+x).val(jumlah_jn.toFixed(3));
	}
}

function nilai_preferensi(){
	for(c=1; c<=<?=$jumlahAlternatif;?>; c++){
		var jpTarget = $("#jmljp-b"+c).val();
		var jnTarget = $("#jmljn-b"+c).val();
		var hitungCi = Number(jnTarget) / (Number(jnTarget)+Number(jpTarget));
		$("#nilaiCi-k"+c).val(hitungCi.toFixed(3));

	}
	
}

</script>
@endsection