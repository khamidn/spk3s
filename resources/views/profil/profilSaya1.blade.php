@extends("admin.layout")
@section("content")
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header">Profil Saya</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li></i>Konfigurasi</li>
              <li></i>Profil Saya</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <li></i>Berikut ini adalah informasi biodata pokok anda. Pastikan data yang ditampilkan benar dan sesuai.</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>NAMA USER</h4>
                  <div class="follow-ava">
                    <img src="img/profile-widget-avatar.jpg" alt="">
                  </div>
                  <h6>NIS: 01234567890</h6>
                  <h6>JURUSAN SISWA</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                   <a data-toggle="tab" href="#profil">
                     <i class="icon-user"></i>
                     BIODATA
                   </a>
                 </li>
                 <li>
                   <a data-toggle="tab" href="#edit-profil">
                     <i class="icon-envelope"></i>
                     EDIT BIODATA
                   </a>
                 </li>
                 <li>
                   <a data-toggle="tab" href="#alamat-email">
                     <i class="icon-envelope"></i>
                     EMAIL
                   </a>
                 </li>

                 <li>
                   <a data-toggle="tab" href="#kata-sandi">
                     <i class="icon-envelope"></i>
                     KATA SANDI
                   </a>
                 </li>

                </ul>
              </header>

              <div class="panel-body">
                <div class="tab-content">
                  <!-- data profil -->
                  <div id="profil" class="tab-pane active">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">

                        <div class="row">
                          <div class="bio-row">
                            <p><span>Nama Lengkap </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Kelas</span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>NIS </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Tempat Lahir </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Tanggal Lahir </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Jenis Kelamin</span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Agama </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Status Dalam Keluarga </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Anak Ke </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Alamat </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>No.Telepon </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Sekolah Asal </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Nama Ayah </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Nama Ibu </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Alamat Ortu </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Pekerjaan Ayah </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Pekerjaan Ibu </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Nama Wali </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Alamat Wali </span>:</p>
                          </div>
                          <div class="bio-row">
                            <p><span>Pekerjaan Wali </span>:</p>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- edit profil -->
                  <div id="edit-profil" class="tab-pane">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Info Profil</h1>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nama Peserta Didik</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Kelas</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nomer Induk Nasional</label>
                            <div class="col-lg-6">
                              <input name="" id="" class="form-control" id="NomerIndukNasional" placeholder=""></input>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tempat Lahir</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Tanggal Lahir</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="b-day" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis Kelamin</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="occupation" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Agama</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="email" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Status Dalam Keluarga</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="mobile" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Anak Ke </label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nomor Telepon Rumah</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Sekolah Asal</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nama Ayah</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nama Ibu</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat Orang Tua</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Pekerjaan Ayah</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Pekerjaan Ibu</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nama Wali</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat Wali</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="url" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Pekerjaan Wali</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="pekerjaanWali" placeholder="">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div id="alamat-email" class="tab-pane">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> EMAIL</h1>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat Email Resmi</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Alamat Email Lainnya</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div id="kata-sandi" class="tab-pane">
                    <div class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> RUBAH KATA SANDI</h1>
                        <form class="form-horizontal" role="form">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Kata Sandi Lama</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="f-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Kata Sandi Baru</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Ulangi Sandi Baru</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="l-name" placeholder=" ">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>



                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
