@extends("admin.layout")
@section("content")
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header">Profil Sekolah</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li></i>Konfigurasi</li>
              <li></i>Profil Sekolah</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4>SMK WIDYA DHARMA TUREN</h4>
                  <div class="follow-ava">
                    <img src="img/sample-img-2.png" alt="">
                  </div>
                  <h6>Ter-Akreditasi 'A'</h6>
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
                   <a data-toggle="tab" href="#profilSekolah">
                      <i class="icon-user"></i>
                      Profil
                  </a>

                 </li>
                 <li>
                   <a data-toggle="tab" href="#edit-profilSekolah">
                     <i class="icon-envelope"></i>
                     Edit Profil
                   </a>
                 </li>
               </ul>
               </header>
               <div class="panel-body">
                 <div class="tab-content">

                   <div id="profilSekolah" class="tab-pane active">
                     <div class="panel">
                       <div class="panel-body bio-graph-info">
                         <h1>Data Sekolah</h1>

                         <div class="row">
                           <div class="bio-row">
                                <p><span>Nama Sekolah </span>: SMK Widya Dharma Turen </p>
                              </div>
                              <div class="bio-row">
                                <p><span>NPSN </span>: -</p>
                              </div>
                              <div class="bio-row">
                                <p><span>NIS/NSS/NDS </span>: -</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Alamat Sekolah </span>: Jl. Raya Turen No.--</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Kelurahan </span>: Turen</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Kecamatan </span>: Turen</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Kabupaten/Kota </span>: Malang</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Provinsi </span>: Jawa Timur</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Email </span>: smkwd@gmail.com</p>
                              </div>
                              <div class="bio-row">
                                <p><span>Website </span>: www.smkwidyadharmaturen.com</p>
                              </div>
                              <div class="bio-row">
                                <p><span>No.Telepon </span>: (+62) 123 456789</p>
                              </div>
                         </div>
                       </div>
                     </div>
                 </div>

                 <div id="edit-profilSekolah" class="tab-pane">
                   <div class="panel">
                     <div class="panel-body bio-graph-info">
                       <h1>Info Data Sekolah</h1>
                       <form class="form-horizontal" role="form">
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Nama Sekolah</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="namaSekolah" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">NSPN</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="nspn" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">NIS/NSS/NDS</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Alamat Sekolah</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Kelurahan</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Kecamatan</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Kabupaten/Kota</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Provinsi</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Email</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Website</label>
                           <div class="col-lg-6">
                             <div class="panel-body">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">No.Telepon</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Kompetensi Keahlian</label>
                           <div class="col-lg-6">

                             <section class="panel">
               <header class="panel-heading">
                 Tags Input
               </header>
               <div class="panel-body">
                 <input name="tagsinput" id="tagsinput" class="tagsinput" value="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal" />
               </div>
             </section>

                           </div>
                         </div>
                         <div class="form-group">
                           <label class="col-lg-2 control-label">Nama Kepala Sekolah</label>
                           <div class="col-lg-6">
                             <input type="text" class="form-control" id="NIS/NSS/NDS" placeholder="">
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
@endsection
