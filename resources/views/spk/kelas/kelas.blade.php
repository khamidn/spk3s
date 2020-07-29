@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>KELAS</h2>
	<hr>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DAFTAR KELAS</h2>
				<ul class="header-dropdown m-r--5">
                    <!-- <li class="dropdown">
                        <a href="#" class="tambah-pengguna btn btn-success mb-2">Tambah Pengguna</a>
                    </li> -->
                    <li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i>
			 			</a>
					 	<ul class="dropdown-menu pull-right">
					 		<li><a href="#" class="tambah-kelas"><i class="material-icons col-green">add_box</i>
					 			Tambah Kelas</a>
					 		</li>
					 	</ul>
                    </li>
                </ul>
			</div>
			<div class="body">
				<div class="row clearfix jsdemo-notification-button">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-create" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Kelas baru berhasil ditambahkan">CREATE</button>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-update" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Pengguna berhasil diupdate">UPDATE</button>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-delete" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Pengguna berhasil dihapus">DELETE</button>
                    </div>
                    
                </div>
				<div class="table-responsive">
					<table class="table table-hover js-basic-example dataTable" id="table">
						<thead>
							<tr>
								<th width="40%">Nama Kelas</th>
								<th width="40%">Wali Kelas (username)</th>
								<th width="20%" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							{{ csrf_field() }}
							@php $nomer=1; @endphp
							@foreach($kelas as $kls)
							<tr class="post{{$kls->id}}">
								<td>{{$kls->nama_kelas}} </td>
								<td>
									
									@if($kls->users->id=='1')
										<span style="color:red;">Belum ada</span>
									@else
										{{$kls->users->username}}
									@endif
								</td>
								<td class="text-center">
									<div class="icon-button-demo">
										<a type="button" class="edit-modal btn bg-green waves-effect" data-id="{{$kls->id}}" data-namakelas="{{$kls->nama_kelas}}"  data-namawali="{{$kls->users->id}}">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
										<a type="button" class="delete-modal btn bg-red waves-effect" data-id="{{$kls->id}}" data-namakelas="{{$kls->nama_kelas}}"  data-namawali="{{$kls->users->id}}">
											<i class="glyphicon glyphicon-trash"></i>
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
<div id="create" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true" aria-labelledby="modalTambahTitle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      	
      	<form class="form-horizontal" role="form">
      		
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label for="body">Nama Kelas</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Example: 10 TKJ" value="">
                        </div>
                        <label class="error errorNamaKelas hidden"></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
            		<label for="kelas">Wali Kelas</label>
            	</div>
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
            		<div class="form-group">
            			<select class="form-control show-tick" id="waliKelas" name="waliKelas">
	            			<option value="" selected="selected">-- Pilih Wali --</option>
	            			@foreach($users as $waliKelas)
	            				@if($waliKelas->id > 1)
	            					<option value="{{$waliKelas->id}}">{{$waliKelas->username}}</option>
	            				@endif
	            			@endforeach
	            			
            			</select>

            		</div>
            	</div>
            </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="closeModalTambah" data-dismiss="modal">Cancel</button>
        <button type="submit" id="add" class="btn btn-primary">Simpan</button>
      </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<div id="edit-delete-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
				<!-- <input id="idAlternatif" class="hidden"/> -->
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
	                    <label for="title">Nama Kelas</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="nk" name="nk" class="form-control" placeholder="10 TKJ">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
				
	            <div class="row clearfix">
	            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="roles">Wali Kelas</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <!-- <div class="form-line">
	                            <input type="text" id="b" name="b" class="form-control" placeholder="Example: Budi Pamungkas" value="" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div> -->
	                        <select class="form-control show-tick" id="nw" name="nw">
		            			<option value="">-- Pilih Wali --</option>
		            			@foreach($users as $waliKelas)
		            				@if($waliKelas->id==1)
		            				<option value="{{$waliKelas->id}}">Belum ada</option>
		            				@else
		            				<option value="{{$waliKelas->id}}">{{$waliKelas->username}}</option>
		            				@endif
	            				@endforeach
            				</select>
	                    </div>
	                </div>
	            </div>
				</form>
				<div class="deleteContent">
					Yakin hapus kelas <strong class="title"></strong>
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

@section("js-custom")
<script type="text/javascript">
	//CREATE
	$(document).on('click','.tambah-kelas',function(){
		$('#create').modal('show');
		$('.form-horizontal').show();
		$('.modal-title').text('Tambahkan Kelas Baru');
	});

	$("#add").click(function(){
		$.ajax({
			type:"POST",
			url:"{{route('simpan.kelas')}}",
			data:{
				'_token':"{{csrf_token() }}",
				'nama_kelas':$('#nama_kelas').val(),
				'waliKelas':$('#waliKelas').val(),
			},
			success:function(data){

				if((data.errors)){
					$('.errorNamaKelas').removeClass('hidden');
					$('.errorNamaKelas').text(data.errors.nama_kelas);
				}
				else{
					$('.errorNamaKelas').addClass('hidden');
					$('#closeModalTambah').click();
					$('.form-horizontal')[0].reset();
					$('#notifikasi-create').click();
					window.location.reload(true);
				}
				
			}
		});
	});

	//UPDATE
	$(document).on('click', '.edit-modal', function(){
		$('#footer_action_button').text("Update");
		$('#footer_close_button').text("Close");
		$('#footer_action_button').removeClass("glyphicon-trash");
		$('.actionBtn').addClass('btn-primary');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit Data Kelas');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('#fid').val($(this).data('id'));
		$('#nk').val($(this).data('namakelas'));
		$('#nw').val($(this).data('namawali')).change();
		$('#edit-delete-modal').modal('show');
	});

	$('.modal-footer').on('click','.edit',function(){
		$.ajax({
			type:'POST',
			url:"{{route('update.kelas')}}",
			data:{
				'_token':"{{csrf_token() }}",
				'id':$('#fid').val(),
				'nama_kelas':$('#nk').val(),
				'users_id':$('#nw').val(),
			},
			success:function(data){
				$('#notifikasi-update').click();
				window.location.reload(true);
			}
		});
	});

	//DELETE
	$(document).on('click','.delete-modal',function(){
		$('#footer_action_button').text("Iya");
		$('#footer_close_button').text("Tidak");
		$('.actionBtn').removeClass('btn-primary');
		$('.actionBtn').addClass('btn-danger');
		$('.actionBtn').addClass('delete');
		$('.modal-title').text('Hapus Kelas');
		$('.id').text($(this).data('id'));
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		$('.title').html($(this).data('namakelas'));
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.delete',function(){
		$.ajax({
			type:'GET',
			url:"{{route('hapus.kelas')}}",
			data:{
				'_token':"{{csrf_token()}}",
				'id': $('.id').text()
			},
			success:function(data){
				$('#notifikasi-delete').click();
				window.location.reload(true);
			}
		})
	});
</script>
@endsection

