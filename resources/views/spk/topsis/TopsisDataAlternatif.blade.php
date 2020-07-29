@extends("admin.layout")
@section("content")
<div class="block-header">
	<h2>DATA SISWA</h2>
	<hr>
</div>
<div class="row clearfix @if(Auth::check()) @if(AUth::user()->hasRole('wali_kelas')) hidden @endif @endif ">
	<div class="col-lg-6 col-lg-offset-3  col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					FILTER KELAS
				</h2>
			</div>
			<div class="body">
				<form action="{{route('dataAlternatif.index')}}">
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

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>DAFTAR SISWA</h2>
				<ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                    	@if(Auth::check())
                    		@if(Auth::user()->hasRole('admin'))
                    			<i class="material-icons">info_outline</i>
                    		@else
                    			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i>
					 			</a>
							 	<ul class="dropdown-menu pull-right">
							 		<li><a href="#" class="create-modal"><i class="material-icons col-green">add_box</i>
							 			Tambah Siswa</a>
							 		</li>
							 	</ul>

                    		@endif
                    	@endif
                    	

                    	
                    </li>
                </ul>
			</div>
			<div class="body">
				<div class="row clearfix jsdemo-notification-button">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-create" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Siswa berhasil ditambahkan">CREATE</button>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-update" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Siswa berhasil diupdate">UPDATE</button>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
                        <button type="button" id="notifikasi-delete" class="btn bg-pink btn-block waves-effect hidden" data-placement-from="top" data-placement-align="left" data-animate-enter="animated fadeInUp" data-animate-exit="animated fadeOutUp" data-color-name="bg-green" data-text="Siswa berhasil dihapus">DELETE</button>
                    </div>
                    
                </div>
				<div class="table-responsive">
					<table class="table table-hover table-striped js-basic-example dataTable" id="table">
						<thead>
							<tr>
								<th width="10%">No</th>
								<th width="10%">NISN</th>
								<th @if(Auth::check()) @if(Auth::user()->hasRole('wali_kelas')) width="65%" @else width="65%" @endif @endif>Nama</th>
								<th width="15$">Kelas</th>
								@if(Auth::check())
									@if(Auth::user()->hasRole('wali_kelas'))
										<th width="15%" class="text-center">Aksi</th>
									@endif
								@endif
							</tr>
						</thead>
						<tbody>
							{{ csrf_field() }}
							@php $nomer=1; @endphp
							@foreach($siswa as $a1)
							<tr class="post{{$a1->id}}">
								<td>{{$nomer++}} </td>
								<td>{{$a1->nisn}}</td>
								<td>{{$a1->nama_siswa}}</td>
								<td>{{$a1->spk_kelas->nama_kelas}}</td>
								<td class="text-center">
									<div class="icon-button-demo">
										@if(Auth::check())
											@if(Auth::user()->hasRole('wali_kelas'))
												<a type="button" class="edit-modal btn bg-green waves-effect" data-id="{{$a1->id}}" data-nisn="{{$a1->nisn}}" data-namasiswa="{{$a1->nama_siswa}}" data-kelas="{{$a1->kelas_id}}">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
										
												<a type="button" class="delete-modal btn bg-red waves-effect" data-id="{{$a1->id}}" data-nisn="{{$a1->nisn}}" data-namasiswa="{{$a1->nama_siswa}}" data-kelas="{{$a1->kelas_id}}">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
											@endif
										@endif
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
        <button type="button"  id="close-btn" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal" role="form">

      		<div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label for="body">NISN</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Example: 103060126" value="" required>
                        </div>
                        <label class="error errorNisn hidden"></label>
                    </div>
                </div>
            </div>
      		
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
                    <label for="body">Nama</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Example: Budi Pamungkas" value="" required>
                        </div>
                        <label class="error errorNama hidden"></label>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
            		<label for="kelas">Kelas</label>
            	</div>
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
            		<div class="form-group">
            			<select class="form-control show-tick" id="kelas" name="kelas">
	            			
	            				@if(Auth::check())
	            					@if(Auth::user()->hasRole('admin'))
	            						<option id="pilih-kelas" value="">-- Pilih Kelas --</option>
	            						@foreach($kelas as $kls)
	            							
				    						<option value="{{$kls->id}}" @if(Request::get('cariKelas')==$kls->id) selected="" @endif>{{$kls->nama_kelas}}</option>
				    					@endforeach
				    				@else
				    					<option value="{{$IdKelas->id}}" selected="">{{$IdKelas->nama_kelas}}</option>
	            					@endif
	            				@endif
	            				
            			</select>
            			<label class="error errorKelas hidden"></label>
            		</div>
            	</div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="close-btn" class="btn btn-default" id="closeModalTambah" data-dismiss="modal">Cancel</button>
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
	                        </div>
	                    </div>
	                </div> -->
	                <input type="text" id="fid" name="id" class="form-control" disabled="">
	            </div>


				<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="title">NISN</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="t" name="t" class="form-control">
	                        </div>
	                    </div>
	                </div>
	            </div>
				<div class="row clearfix">
	                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="body">Nama</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="b" name="b" class="form-control" placeholder="Example: Budi Pamungkas" value="">
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row clearfix">
	            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-5 form-control-label">
	                    <label for="kelas">Kelas</label>
	                </div>
	                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7">
	                    <div class="form-group">
	                        <!-- <div class="form-line">
	                            <input type="text" id="b" name="b" class="form-control" placeholder="Example: Budi Pamungkas" value="" required="">
	                            <p class="error text-center alert alert-danger hidden"></p>
	                        </div> -->
	                        <select class="form-control show-tick" id="k" name="k">
		            			<option value="">-- Pilih Kelas --</option>
		    					@foreach($kelas as $kls)
		    						<option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
		    					@endforeach
		            			
		            			
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

@section("js-custom")
<script type="text/javascript">
	$('#create').on('hidden.bs.modal', function(e){
		$('.form-horizontal')[0].reset();
	});
	
	//CREATE
	$(document).on('click','.create-modal',function(){
		$('#create').modal('show');
		$('.form-horizontal').show();
		$('.modal-title').text('Tambahkan Alternatif');
	});
	
	$("#add").click(function(){
		$.ajax({
			type:"POST",
			url: "{{route('simpanAlternatif')}}",
			data: {
				'_token':"{{csrf_token() }}",
				'nisn':$('#nisn').val(),
				'nama':$('input[name=nama]').val(),
				'kelas':$('#kelas').val(),
			},
			success:function(data){
				if((data.errors)){
					$('.errorNisn').removeClass('hidden');
					$('.errorNisn').text(data.errors.nisn);
					$('.errorNama').removeClass('hidden');
					$('.errorNama').text(data.errors.nama);
					$('.errorKelas').removeClass('hidden');
					$('.errorKelas').text(data.errors.kelas);
				}
				else{
					$('.errorNisn').addClass('hidden');
					$('.errorNama').addClass('hidden');
					$('.errorKelas').addClass('hidden');
					$('.form-horizontal')[0].reset();
					$('#closeModalTambah').click();
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
		// $('#footer_action_button').addClass("glyphicon-check");
		$('#footer_action_button').removeClass("glyphicon-trash");
		$('.actionBtn').addClass('btn-primary');
		$('.actionBtn').removeClass('btn-danger');
		$('.actionBtn').addClass('edit');
		$('.modal-title').text('Edit Alternatif');
		$('.deleteContent').hide();
		$('.form-horizontal').show();
		$('#idAlternatif').val($(this).data('id'));
		$('#fid').val($(this).data('id'));
		$('#fid').addClass('hidden');
		$('#t').val($(this).data('nisn'));
		$('#b').val($(this).data('namasiswa'));
		$('#k').val($(this).data('kelas')).change();
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.edit',function(){
		$.ajax({
			type:"POST",
			url:"{{route('editAlternatif')}}",
			data:{
				'_token':"{{csrf_token() }}",
				'id':$('#fid').val(),
				'nisn':$('#t').val(),
				'nama':$('#b').val(),
				'kelas':$('#k').val(),
			},
			success:function(data){
				$('#closeModalTambah').click();
				$('.form-horizontal')[0].reset();
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
		$('.modal-title').text('Hapus Alternatif');
		$('.id').text($(this).data('id'));
		$('.deleteContent').show();
		$('.form-horizontal').hide();
		$('.title').html($(this).data('body'));
		$('#edit-delete-modal').modal('show');
	});
	$('.modal-footer').on('click','.delete',function(){
		$.ajax({
			type:'GET',
			url:"{{route('hapusAlternatif')}}",
			data:{
				'_token':"{{csrf_token()}}",
				'id': $('.id').text()
			},
			success:function(data){
				$('#notifikasi-delete').click();
				$('.post'+$('.id').text()).remove();
				window.location.reload(true);
			}
		});

	});


</script>
@endsection

