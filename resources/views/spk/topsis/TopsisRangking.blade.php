@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>HASIL AKHIR</h2>
	<hr>
</div>

@if(Auth::check())
	@if(Auth::user()->hasRole('admin'))
		<div class="row clearfix">
			<div class="col-lg-6 col-lg-offset-3  col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							FILTER KELAS
						</h2>
					</div>
					<div class="body">
						<form action="{{route('topsis.rangking')}}">
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
	@endif
@endif


<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="header">
				<h2>RANGKING SISWA</h2>
				<!-- <a href="{{route('export.alternatif')}}"> -->
					<!-- <ul class="header-dropdown m-r--5">
						 <li class="dropdown">
						 	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i>
						 	</a>
						 	<ul class="dropdown-menu pull-right">

						 		<li class=" @if(Auth::check()) @if(Auth::user()->hasRole('admin'))@if(Request::get('cariKelas')=="") disabled @endif @endif @endif"><a href="{{route('export.alternatif')}}"><i class="material-icons col-indigo" >file_download</i>
						 			Unduh Rangking</a>
						 		</li>
						 	</ul>
								
						 </li>			
					</ul> -->
			</div>

			
			<div class="body">
				
			<form class="form-horizontal" role="form" method="POST" action="{{route('keputusan.simpan')}}">
			{{csrf_field()}}
				<div class="table-responsive">
				<table class="table table-striped js-basic-example dataTable">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="10%">NISN</th>
							<th width="50%">Nama</th>
							<th width="10%">Nilai</th>
							<th width="20%">Keputusan</th>
						</tr>
					</thead>
					<tbody>
						@php 
							$noUtama9=0;
							$noUrut=1;
							if(count($rangking)){
								foreach($rangking as $rank){
								$noUtama9+=1;
								echo '<tr>';
								echo '<td>'.$noUrut++.'</td>';
								echo '<td>'.$rank->nisn.'</td>';
								echo '<td>'.$rank->nama_siswa.'</td>';
								echo '<td><input style="width:100%;"type="text" id="rangking-k'.$noUtama9.'" class="form-control" value="'.$rank->nilai_akhir_ci.'" readonly="" /> </td>';

								if(Auth::check()){
									if(Auth::user()->hasRole('admin')){
										echo '<td>';
											echo '<select name="keputusan-k'.$noUtama9.'" class="form-control show-tick" disabled="">';
												$status = $rank->keputusan;
													if($status==1){
														echo '<option value="0">Belum Naik Kelas</option>';
														echo '<option value="1" selected="selected">Naik Kelas</option>';
													}
													else{
														echo '<option value="0" selected="selected">Belum Naik Kelas</option>';
														echo '<option value="1">Naik Kelas</option>';
													}
											echo '</select>';
										 echo '</td>';
									}
									else{
										echo '<td>';
											echo '<select name="keputusan-k'.$noUtama9.'" class="form-control show-tick">';
												$status = $rank->keputusan;
													if($status==1){
														echo '<option value="0">Belum Naik Kelas</option>';
														echo '<option value="1" selected="selected">Naik Kelas</option>';
													}
													else{
														echo '<option value="0" selected="selected">Belum Naik Kelas</option>';
														echo '<option value="1">Naik Kelas</option>';
													}
											echo '</select>';
										 echo '</td>';
										
									}
								}
								echo '</tr>';
								}
							}
							else{
								echo '<tr>';
								echo '<td colspan="5">No data available in table</td>';
								echo '</tr>';
							}
						@endphp
					</tbody>
				</table>
				</div>

				
					<div class="row">
						@if(Auth::check())
							@if(Auth::user()->hasRole('wali_kelas'))
						<div class="col-lg-2">
							<button type="submit" id="simpanKeputusan" class="btn btn-success waves-effect" style="margin-top: 20px;">Simpan Keputusan</button>
						</div>
							@endif
						@endif
						</form>
						<form action="{{route('export.alternatif')}}">
							@if(Auth::check())
								@if(Auth::user()->hasRole('admin'))
								<input value="{{Request::get('cariKelas')}}" class="hidden" name="inputKelas">
								@endif
							@endif
								<div class="col-lg-2">
									<button type="submit"  class="btn btn-primary waves-effect class=" @if(Auth::check()) @if(Auth::user()->hasRole('admin'))@if(Request::get('cariKelas')=="") disabled @endif @endif @endif"" style="margin-top: 20px;">Unduh Rangking</button>
								</div>
						</form>
					</div>
					
				

				
			</div>

		</div>
	</div>
</div>

@endsection

