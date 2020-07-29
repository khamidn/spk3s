@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>KRITERIA</h2>
	<hr>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DAFTAR KRITERIA</h2>
			</div>
			<div class="body">
				<div class="row clearfix jsdemo-notification-button">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-update" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Kriteria berhasil diupdate">UPDATE</button>
                    </div>
                </div>
				
				<div class="table-responsive">
					<table class="table table-hover js-basic-example dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Kriteria</th>
								<th>Nama Kriteria</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@php $nomer=1; @endphp
							@foreach($kriteria as $kriterias)
							<tr>
								<td>{{$nomer++}} </td>
								<td>C{{$kriterias->id_kriteria}} </td>
								<td>{{$kriterias->nama_kriteria}}</td>
								<td>
									<div class="icon-button-demo">
										<a type="button" class="edit-modal btn bg-green waves-effect" data-id="{{$kriterias->id_kriteria}}" data-kriteria="{{$kriterias->nama_kriteria}}">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
									</div>
								</td>
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

@push("modal")
<div id="edit-delete-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="modal">

					<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="id">ID</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="fid" name="id" class="form-control" disabled="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>

				<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="title">Nama Kriteria</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="namaKriteria" name="namaKriteria" class="form-control" placeholder="Example: Kehadiran" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
				
				</form>
				<div class="deleteContent">
					Yakin hapus <strong class="title"></strong>
					<span class="hidden id"></span> dari daftar?
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
		        	<span id="footer_close_button" class="glyphicon glyphicon"></span>
		        </button>
				<button type="button" class="btn actionBtn" data-dismiss="modal">
		          	<span id="footer_action_button" class="glyphicon"></span>
	        	</button>
			</div>	
		</div>
	</div>
</div>
@endpush

@section('js-custom')
<script type="text/javascript">
// EDIT KRITERIA
$(document).on('click', '.edit-modal', function(){
		$('#footer_action_button').text("Update");
		$('#footer_close_button').text("Close");
		$('#footer_action_button').removeClass("glyphicon-trash");
		$('.actionBtn').addClass('btn-primary');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit Kriteria');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('#idAlternatif').val($(this).data('id'));
		$('#fid').val($(this).data('id'));
		$('#namaKriteria').val($(this).data('kriteria'));
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.edit',function(){
		$.ajax({
			type:'POST',
			url:"{{route('AhpKriteria.update')}}",
			data:{
				'_token':"{{csrf_token() }}",
				'id':$('#fid').val(),
				'nama':$('#namaKriteria').val()
			},
			success:function(data){
				$('#notifikasi-update').click();
				window.location.reload(true);
			},
		});
	});
</script>
@endsection