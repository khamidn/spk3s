@extends("admin.layout")
@section("content")
<div class="row clearfix">
  <div class="col-xs-12 col-sm-3">
    <div class="card profile-card">
      <div class="profile-header">&nbsp;</div>
      <div class="profile-body">
          <div class="image-area">
              <img src="../../images/user-lg.jpg" alt="Profile Image" />
          </div>
          <div class="content-area">
            <h3>Nur Khamid</h3>
            <p>Web Software Developer</p>
            <p>Administrator</p>
          </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-9">
    <div class="card">
      <div class="body">
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#biodata" aria-controls="biodata" role="tab" data-toggle="tab">BIODATA</a></li>
            <li role="presentation"><a href="#edit_biodata" aria-controls="edit_biodata" role="tab" data-toggle="tab">EDIT BIODATA</a></li>
            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">KATA SANDI</a></li>
            <li role="presentation"><a href="#email" aria-controls="email" role="tab" data-toggle="tab">EMAIL</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="biodata">
              <div class="body">
                <div class="row">
                    <div class="col-lg-3">
                      <label>Nama</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Kelas</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>NISN</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Tempat Lahir</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Tanggal Lahir</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Jenis Kelamin</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Agama</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Status Dalam Keluarga</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Anak Ke</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Alamat</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>No.Telepon</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Sekolah Asal</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Nama Ayah</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Nama Ibu</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Alamat Orang Tua</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Pekerjaan Ayah</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Pekerjaan Ibu</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Nama Wali</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Alamat Wali</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                      <label>Pekerjaan Wali</label>
                    </div>
                    <div class="col-lg-6">: </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="edit_biodata">
              <form class="form-horizontal">
                <div class="body">
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Nama</label>
                          </div>
                          <div class="col-lg-6">
                              <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Kelas</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>NISN</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Tempat Lahir</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Tanggal Lahir</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Jenis Kelamin</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Agama</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Status Dalam Keluarga</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Anak Ke</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Alamat</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>No.Telepon</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Sekolah Asal</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Nama Ayah</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Nama Ibu</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Alamat Orang Tua</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Pekerjaan Ayah</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Pekerjaan Ibu</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Nama Wali</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Alamat Wali</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Pekerjaan Wali</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-sm-offset-10 col-sm-3">
                              <button type="submit" class="btn btn-danger">SUBMIT</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                <form class="form-horizontal">
                  <div class="body">
                        <div class="row">
                            <div class="col-lg-3">
                              <label>Kata Sandi Lama</label>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                              <label>Kata Sandi Baru</label>
                            </div>
                            <div class="col-lg-6">
                              <input class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                              <label>Ulangi Kata Sandi Baru</label>
                            </div>
                            <div class="col-lg-6">
                              <input class="form-control">
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-sm-offset-10 col-sm-3">
                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                            </div>
                          </div>
                        </div>
                  </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="email">
              <form class="form-horizontal">
                <div class="body">
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Alamat Email Resmi</label>
                          </div>
                          <div class="col-lg-6">
                              <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-3">
                            <label>Alamat Email Lainnya</label>
                          </div>
                          <div class="col-lg-6">
                            <input class="form-control">
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group">
                          <div class="col-sm-offset-10 col-sm-3">
                              <button type="submit" class="btn btn-danger">SUBMIT</button>
                          </div>
                        </div>
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
@endsection
