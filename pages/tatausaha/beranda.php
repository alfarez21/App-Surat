<?php
  $surat = $sMasuk->getData();
  $blmdis = $sMasuk->getDataa("=",["idDisposisi"=>2]);
  $sdhdis = $sMasuk->getDataa("=",["idDisposisi"=>1]);
  $content = "
  <div class='px-5 jumbotron jumbotron-fluid'>
    <div class='container'>
      <h1>SELAMAT DATANG DI APPS SURAT</h1>
      <p>hallo, {$user[0]['fullname']} semoga anda nyaman menggunakan aplikasi kami</p>
    </div>
  </div>
  <section class='dashboard-counts section-padding'>
    <div class='container-fluid'>
      <div class='row'>
        <!-- Count item widget-->
        <div class='col-xl-2 col-md-4 col-6'>
          <div class='wrapper count-title d-flex'>
            <div class='icon'><i class='icon-bill'></i></div>
            <div class='name'><strong class='text-uppercase'>surat masuk</strong>
              <div class='count-number'>".count($surat)."</div>
            </div>
          </div>
        </div>
        <!-- Count item widget-->
        <div class='col-xl-2 col-md-4 col-6'>
          <div class='wrapper count-title d-flex'>
            <div class='icon'><i class='icon-bill'></i></div>
            <div class='name'><strong class='text-uppercase'>surat belum disposisi</strong>
              <div class='count-number'>".count($blmdis)."</div>
            </div>
          </div>
        </div>
        <!-- Count item widget-->
        <div class='col-xl-2 col-md-4 col-6'>
          <div class='wrapper count-title d-flex'>
            <div class='icon'><i class='icon-bill'></i></div>
            <div class='name'><strong class='text-uppercase'>surat sudah disposisi</strong>
              <div class='count-number'>".count($sdhdis)."</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
";