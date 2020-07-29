@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>PERHITUNGAN</h2>
	<hr>
</div>
<form action="{{route('AhpMatriks.simpan')}} " method="POST" class="form-horizontal">
{{csrf_field()}}

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>MATRIKS</h2>
			</div>
			<div class="body">
				@php
				$irdata=array(
				1=>0.00,
				2=>0.00,
				3=>0.58,
				4=>0.90,
				5=>1.12,
				6=>1.24,
				7=>1.32,
				8=>1.41,
				9=>1.45,
				10=>1.49,
				11=>1.51,
				12=>1.48,
				13=>1.56,
				14=>1.57,
				15=>1.59,
				);
				$jumlah=count($data);
				$ir= 0.00;
				foreach($irdata as $irk=>$irv){
					if($irk==$jumlah){
						$ir=$irv;
					}
				}
				@endphp

				<!-- <button type="button" id="tombol" class="btn btn-primary">Hitung</button> -->
				<ul class="nav nav-tabs tab-nav-right">
					<li role="presentation" class="active"><a href="#perbandingan-berpasangan" data-toggle="tab">PERBANDINGAN BERPASANGAN</a></li>
					<li role="presentation"><a href="#nilai-kriteria" data-toggle="tab">NILAI KRITERIA</a></li>
					<li role="presentation"><a href="#jumlah-tiap-baris" data-toggle="tab">PENJUMLAHAN TIAP BARIS</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="perbandingan-berpasangan">						
						
							<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Kriteria</th>
										@foreach($kriteria as $k)
										<th>{{$k->nama_kriteria}} </th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@php $noUtama=0; 
										foreach($data as $k2=>$nama_kriteria)
										{

											$noUtama+=1;
											echo '<tr>';
											echo  '<td>'.$nama_kriteria.'</td>';
											$noSub=0;
											$xxx='';

											for($i=1; $i<=$jumlah; $i++)
											{
												$keys= array_keys($data);
												$xxx= $keys[array_search("gsda",$keys)+($i-1)];
												$newname=$k2."-".$xxx;
												$noSub+=1;

												if($noSub == $noUtama){
												   echo '<td><input type="number" id="k'.$noUtama.'b'.$noSub.'" class="form-control kolomm'.$noSub.'" value="1" readonly="" title="kolomm'.$noSub.'"/></td>';

												}

												else{
													if($noUtama > $noSub){
														echo '<td><input type="text" id="k'.$noUtama.'b'.$noSub.'" class="form-control kolomm'.$noSub.'" value="0" readonly="" title="kolomm'.$noSub.'"/></td>';
													}

													else{
														echo'<td>';
														echo'<select name="kolom-'.$newname.'" id="k'.$noUtama.'b'.$noSub.'" data-target="k'.$noSub.'b'.$noUtama.'" data-kolom="'.$noSub.'" class="form-control inputnumber kolomm'.$noSub.'" title="kolomm'.$noSub.'">';
														for($x=1; $x<=10; $x++)
														{
															$nilai=ambil_nilai_kriteria($k2,$xxx);
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

												}

											}
											echo '</tr>';
										}
									@endphp
								</tbody>
								<tfoot>
									<tr>
										<th><strong>Jumlah</strong></th>
										@php
											for($h=1; $h<=$jumlah; $h++)
											{
												echo'<td><input type="text" id="total'.$h.'" class="form-control" value="0" title="'.$h.'" readonly=""/></td>';
											}
										@endphp
									</tr>
								</tfoot>
							</table>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<button type="submit" name="submit" class="btn btn-primary">Simpan Kriteria</button>
							</div>
						</div>

						<div class="row">
								<div class="col-lg-12">
									<label>Keterangan</label>
									<ul>
										<li>Lakukan penyimpanan, setelah input nilai perbandingan berpasangan sebelum meninggalkan halaman, dengan tekan tombol Simpan Kriteria berwana biru</li>
									</ul>
								</div>
							</div>
						
					</div>

					<div role="tabpanel" class="tab-pane fade" id="nilai-kriteria">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Kriteria</th>
										@foreach($kriteria as $k)
										<th>{{$k->nama_kriteria}} </th>
										@endforeach
										<th>Jumlah</th>
										<th>Prioritas</th>
									</tr>
								</thead>
								<tbody>
									@php 
									$noUtama2=0;
									foreach($kriteria as $k2){
									$noUtama2+=1;
									echo '<tr>';
									echo '<td>'.$k2->nama_kriteria.'</td>';
									$noSub2=0;
									for($i=1; $i<=$jumlah; $i++)
									{
										$noSub2+=1;
										echo '<td><input type="text" id="mn-k'.$noUtama2.'b'.$noSub2.'" class="form-control" value="0" readonly=""/></td>';
									}
									echo '<td><input type="text" class="form-control" id="jml-b'.$noUtama2.'" value="0" readonly=""/></td>';
									echo '<td><input type="text" class="form-control" id="pri-b'.$noUtama2.'" value="0" readonly=""/></td>';
									echo '</tr>';
									}
									@endphp
								</tbody>
							</table>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane fade" id="jumlah-tiap-baris">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Kriteria</th>
										@foreach($kriteria as $k3)
										<th>{{$k3->nama_kriteria}}</th>
										@endforeach
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									@php
									$noUtama3=0;
									foreach($kriteria as $k3)
									{
										$noUtama3+=1;
										echo '<tr>';
										echo '<td>'.$k3->nama_kriteria.'</td>';
										$noSub3=0;
										for($i=1; $i<=$jumlah; $i++)
										{
											$noSub3+=1;
											echo '<td><input type="text" id="mptb-k'.$noUtama3.'b'.$noSub3.'" class="form-control" value="0" readonly="" /></td>';
										}
										echo '<td><input type="text" class="form-control" id="jmlptb-b'.$noUtama3.'" value="0" readonly="" /></td>';
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
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
		<div class="card">
			<div class="header">
				<h2>RASIO KONSISTENSI</h2>
			</div>

			<div class="body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Kriteria</th>
								<th>Jumlah Perbaris</th>
								<th>Prioritas</th>
								<th>Hasil</th>
							</tr>
						</thead>
						<tbody>
							@php 
								$noUtama4=0;
								foreach($kriteria as $kriterias){
									$noUtama4+=1;

									echo '<tr>';
									echo '<td>'.$kriterias->nama_kriteria.'</td>';
									echo '<td><input type="text" class="form-control" id="jmlrk-b'.$noUtama4.'" value="0" readonly=""/></td>';
									echo '<td><input type="text" class="form-control" id="priork-b'.$noUtama4.'" value="0" readonly=""/></td>';
									echo '<td><input type="text" class="form-control" id="hasilrk-b'.$noUtama4.'" name="hasilrk-b'.$noUtama4.'" value="0" readonly=""/></td>';
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



<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="header">
				<h2>HASIL PERHITUNGAN</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Keterangan</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Jumlah</td>
								<td>
									<input type="text" class="form-control" id="sumrk" value="0" readonly=""/>
								</td>
							</tr>
							<tr>
								<td>n(Jumlah Kriteria)</td>
								<td>
									<input type="text" class="form-control" id="sumkriteria" value="<?=$jumlah;?>" readonly=""/>
								</td>
							</tr>	
							<tr>
								<td>Maks(Jumlah/n)</td>
								<td>
									<input type="text" class="form-control" id="summaks" value="0" readonly=""/>
								</td>
							</tr>
							<tr>
								<td>CI(Maks-n/n)</td>
								<td>
									<input type="text" class="form-control" id="sumci" value="0" readonly=""/>
								</td>
							</tr>
							<tr>
								<td>CR(CI/IR)</td>
								<td>
									<input type="text" class="form-control" id="sumcr" name="sumcr" value="0" readonly=""/>
								</td>
							</tr>
									
						</tbody>
						<tfoot>
							<tr>
								<th>Status</th>
								<td>
									<input type="text" class="form-control" id="statusHasil" value="Tidak Konsisten" readonly=""/>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
@endsection

@section("js-custom")
<script type="text/javascript">
$(document).ready(function(){
	hitung();
	$(".inputnumber").each(function(){
		$(this).change(function(){
			hitung();
			
		});
	});
});


// function round(value, decimals){
// 	return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
// }

function hitung(){
	$(".inputnumber").each(function(){
		var dtarget=$ (this).attr('data-target');
		var dkolom=$ (this).attr('data-kolom');
		var jumlah = $ (this).val();
		var rumus = 1/parseFloat(jumlah);

		var fx=rumus;
		$("#"+dtarget).val(fx.toFixed(2)); 
		total();
		matrik_nilai_kriteria();
		matrik_penjumlah_tiap_baris();
		rasio_konsitensi();
	})
}

function total(){
	for(i=1; i<=<?=$jumlah; ?>; i++){
		var sum = 0;

		$(".kolomm"+i).each(function(){
			sum+= Number($(this).val());
		});
		var fx= sum;
		$("#total"+i).val(fx.toFixed(1));
		
	}
}

function matrik_nilai_kriteria(){
	for(i=1; i<=<?=$jumlah; ?>; i++){
		var jml=0;
		for(x=1; x<=<?=$jumlah; ?>; x++){
			var vtarget=$("#k"+i+"b"+x).val();
			var vkolomm=$("#total"+x).val();
			var rumus=Number(vtarget)/Number(vkolomm);
			// var fx=Math.ceil(rumus *100) / 100 ;
			var fx =rumus;
			jml+=Number(fx);
			$("#mn-k"+i+"b"+x).val(fx.toFixed(3));
		}

		// var jumlahmnk=Math.ceil(jml *100)/100;
		var jumlahmnk=jml;
		$("#jml-b"+i).val(jumlahmnk.toFixed(3));

		var jumlahmnkTarget = $("#jml-b"+i).val();
		var prio = jumlahmnkTarget / Number(<?=$jumlah;?>);
		// var nPrio=Math.ceil(prio * 100)/100;
		var nPrio=prio;
		$("#pri-b"+i).val(nPrio.toFixed(3));

	}
}

function matrik_penjumlah_tiap_baris(){
	for(i=1; i<=<?=$jumlah; ?>; i++){
		var jml=0;
		for(x=1; x<=<?=$jumlah; ?>; x++){
			var nilai = $("#k"+i+"b"+x).val();
			var prio = $("#pri-b"+x).val();
			var rumus= Number(nilai)*Number(prio);
			// var fx=Math.ceil(rumus*100)/100;
			var fx=rumus;
			$("#mptb-k"+i+"b"+x).val(fx.toFixed(3));

			jml+=Number(fx);
		}

		var jumlah_mptb=jml;
		$("#jmlptb-b"+i).val(jumlah_mptb.toFixed(3));
	}

}

function rasio_konsitensi(){
	var total=0;

	for(i=1; i<=<?=$jumlah; ?>; i++){
		var prio=$("#pri-b"+i).val();
		var jml=$("#jmlptb-b"+i).val();
		var jPerbaris=Number(jml).toFixed(2);
		var nPrio =Number(prio).toFixed(2);
		$("#jmlrk-b"+i).val(jPerbaris);//jumlah perbaris
		$("#priork-b"+i).val(nPrio);//priorotas

		var hasil=Number(jPerbaris) + Number(nPrio);
		total+=hasil;
		$("#hasilrk-b"+i).val(hasil.toFixed(2));//hasil
	}

	//hasil perhitungan AHP
	var fx2 = total.toFixed(2);
	// console.log(fx2);
	// $("#totalrk").val(fx2);
	$("#sumrk").val(fx2);
	var summaks=Number(total)/Number(<?=$jumlah;?>);
	var fx_summaks = summaks;
	$("#summaks").val(fx_summaks.toFixed(2));

	var ci_r_l=Number(summaks) - Number(<?=$jumlah;?>);
	var ci=Number(ci_r_l)/ (Number(<?=$jumlah;?>)-1);
	var fx_ci=ci;
	$("#sumci").val(fx_ci.toFixed(2));

	var cr=Number(ci)/Number(<?=$ir;?>);
	var fx_cr=cr;
	$("#sumcr").val(fx_cr.toFixed(2));

	if(fx_cr<0.1){
		$("#statusHasil").val("Konsisten");
	}

	else{
		$("#statusHasil").val("Tidak Konsisten");
	}
}

</script>
@endsection

