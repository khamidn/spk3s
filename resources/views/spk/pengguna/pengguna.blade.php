@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>PENGGUNA</h2>
	<hr>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DAFTAR PENGGUNA</h2>
				<ul class="header-dropdown m-r--5">
                    <!-- <li class="dropdown">
                        <a href="#" class="tambah-pengguna btn btn-success mb-2">Tambah Pengguna</a>
                    </li> -->
                    <li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i>
			 			</a>
					 	<ul class="dropdown-menu pull-right">
					 		<li><a href="#" class="tambah-pengguna"><i class="material-icons col-green">add_box</i>
					 			Tambah Pengg...</a>
					 		</li>
					 	</ul>
                    </li>
                </ul>
			</div>
			<div class="body">
				<div class="row clearfix jsdemo-notification-button">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-create" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Pengguna berhasil ditambahkan">CREATE</button>
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
								<th width="10%">Username</th>
								<th width="10%">Password</th>
								<th width="55%">Hak Akses</th>
								<th width="15%" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							{{ csrf_field() }}
							@php $nomer=1; @endphp
							@foreach($users as $users1)
							<tr class="post{{$users1->id}}">
								<td>{{$users1->username}} </td>
								<td>{{$users1->password_unscript}}</td>
								<td>
									@foreach($users1->roles as $r)
									{{$r->name}}
									@endforeach
								</td>
								<td class="text-center">
									<div class="icon-button-demo">
										<a type="button" class="edit-modal btn bg-green waves-effect" data-id="{{$users1->id}}" data-username="{{$users1->username}}" data-password="{{$users1->password_unscript}}" data-roles="@foreach($users1->roles as $r){{$r->name}}@endforeach">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
										<a type="button" class="delete-modal btn bg-red waves-effect" data-id="{{$users1->id}}" data-username="{{$users1->username}}" data-password="{{$users1->password_unscript}}" data-roles="@foreach($users1->roles as $r){{$r->name}}@endforeach">
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
                    <label for="body">Username</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Example: Budi_Pamungkas" value="">
                        </div>
                        <label class="error errorUsername hidden"></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label for="body">Password</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" id="password" name="password" class="form-control" value="">
                            
                        </div>
                       <label class="error errorPassword hidden"></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
            		<label for="kelas">Hak Akses</label>
            	</div>
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
            		<div class="form-group">
            			<select class="form-control show-tick" id="roles" name="roles">
	            			<option value="" selected="selected">-- Pilih Roles --</option>
	            			<option value="admin">Admin</option>
	            			<option value="wali_kelas">Wali Kelas</option>
            			</select>
            			<label class="error errorRoles hidden"></label>
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
	                <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="id">ID</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="fid" name="id" class="form-control" disabled="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div> -->
	                <input type="text" id="fid" name="id" class="form-control" disabled="">
	            </div>
	            

				<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="title">Username</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="u" name="u" class="form-control" placeholder="Example: Budi Pamungkas" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
				<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="password">Password</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="p" name="p" class="form-control" value="" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row clearfix">
	            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="roles">Roles</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <!-- <div class="form-line">
	                            <input type="text" id="b" name="b" class="form-control" placeholder="Example: Budi Pamungkas" value="" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div> -->
	                        <select class="form-control show-tick" id="r" name="r">
		            			<option value="">-- Pilih Roles --</option>
		            			<option value="admin">Admin</option>
		            			<option value="wali_kelas">Wali Kelas</option>
            				</select>
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
	//CREATE
	$(document).on('click','.tambah-pengguna',function(){
		$('#create').modal('show');
		$('.form-horizontal').show();
		$('.modal-title').text('Tambahkan Pengguna Baru');
	});

	$("#add").click(function(){
		$.ajax({
			type:"POST",
			url: "{{route('simpan.pengguna')}}",
			data: {
				'_token':"{{csrf_token() }}",
				'username':$('input[name=username]').val(),
				'password':$('#password').val(),
				'password_unscript':$('#password').val(),
				'roles':$('#roles').val(),
			},
			success:function(data){
				if((data.errors)){
					$('.errorUsername').removeClass('hidden');
					$('.errorUsername').text(data.errors.username);
					$('.errorPassword').removeClass('hidden');
					$('.errorPassword').text(data.errors.password);
					$('.errorRoles').removeClass('hidden');
					$('.errorRoles').text(data.errors.roles);
				}
				else{
					$('.errorUsername').addClass('hidden');
					$('.errorPassword').addClass('hidden');
					$('.errorRoles').addClass('hidden');
					$('#closeModalTambah').click();
					$('.form-horizontal')[0].reset();
					$('#notifikasi-create').click();
					window.location.reload(true);
				}
			},
		});

	});

	//UPDATE
	$(document).on('click', '.edit-modal', function(){
		$('#footer_action_button').text("Update");
		$('#footer_close_button').text("Close");
		$('#footer_action_button').removeClass("glyphicon-trash");
		$('.actionBtn').addClass('btn-primary');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit Pengguna');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('#idAlternatif').val($(this).data('id'));
		$('#fid').val($(this).data('id'));
		$('#fid').addClass('hidden');
		$('#u').val($(this).data('username'));
		$('#p').val($(this).data('password'));
		$('#r').val($(this).data('roles')).change();
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.edit',function(){
		$.ajax({
			type:'POST',
			url:"{{route('update.pengguna')}}",
			data:{
				'_token':"{{csrf_token() }}",
				'id':$('#fid').val(),
				'username':$('#u').val(),
				'password':$('#p').val(),
				'password_unscript':$('#p').val(),
				'roles':$('#r').val(),
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
		$('.modal-title').text('Hapus Pengguna');
		$('.id').text($(this).data('id'));
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		$('.title').html($(this).data('username'));
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.delete',function(){
		$.ajax({
			type:'GET',
			url:"{{route('hapus.pengguna')}}",
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