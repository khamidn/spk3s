@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>BOBOT KRITERIA</h2>
	<hr>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>HASIL BOBOT MASING-MASING KRITERIA</h2>
			</div>
			<div class="body">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Kriteria</th>
								<th>Nama Kriteria</th>
								<th>Bobot</th>
							</tr>
						</thead>
						<tbody>
							@php $nomer=1; @endphp
							@foreach($bobotKriteria as $bk)
							<tr>
								<td>{{$nomer++}} </td>
								<td>C{{$bk->id_kriteria}}</td>
								<td>{{$bk->nama_kriteria}}</td>
								<td>{{$bk->bobot_kriteria}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection