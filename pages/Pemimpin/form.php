<?php
  $surat = $sMasuk->getDataa("=",["noRegister"=>"$id"]);
  $sifatS = $sifat->getData();
  $ftoSurat = explode(",",$surat[0]['pics']);
  $pegawai = $users->getDataa("!=", ["idUser"=>2]);
  foreach ($sifatS as $sft) {
    $sfat .= "<option value='{$sft['idSifat']}'>{$sft['sifat']}</option>";
  }
  foreach ($pegawai as $pgw) {
    $pgwai .= "<option value='{$pgw['idUser']}'>{$pgw['fullname']}</option>";
  }
  $disable = "disabled";
  if($_GET['form']=="tambah"){
      $sMasuk->update(["idBacaL"=>1],["noRegister"=>"$id"]);
      $btn = "
      <div class='form-group row'>
        <div class='col-sm-4 offset-sm-2'>
          <button type='submit' class='btn btn-primary' name='simpan'>Simpan</button>
        </div>
      </div>
      ";
      foreach ($ftoSurat as $ftsurat) {
        $fsurat .= "
        <div style='height:300px' class='col-sm-3 p-0 mx-3'>
          <div class='zoom-gallery'>
            <a href='files/{$ftsurat}' title='Surat Masuk' data-source=''>
              <img src='files/{$ftsurat}' style='height:300px;width:100%'/>
            </a>
          </div>
        </div>";
      }
      $img = "
      <div class='form-group row'>
        <div class='col-sm-10 offset-sm-2'>
          <div class='row'>
            $fsurat
          </div>
        </div>
      </div>
      ";

      if($surat[0]['pics']==""){
        $img = "";
      }
    $content = template::breadcrumb("Beranda:index.php,Surat Belum Disposisi:?page=daftarsurat&disposisi=belum,Disposisi Surat Masuk")."
    <!-- FORM-->
    <div class='card'>
      <div class='card-header'>
        <h4 class='d-flex'><span class='my-auto'>DISPOSISI SURAT MASUK</span> <a href='?page=daftarsurat&disposisi=belum' class='btn btn-success ml-auto'>Kembali</a></h4> 
      </div>
      <div class='card-body'>
        <form class='form-horizontal' method='post' action='logic/disposisi.php'>
          <input type='text' name='idP' hidden value='{$surat[0]['idSMasuk']}'>
          <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>No Register</label>
          <div class='col-sm-2'>
            <input type='text' class='form-control' maxlength='20' name='noRegister' value='{$surat[0]['noRegister']}' required $disable data-msg='Tidak Boleh Kosong'>
          </div>
        </div>
        <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Tanggal Masuk</label>
          <div class='col-sm-2'>
            <input type='date' class='form-control' name='tglMasuk' value='{$surat[0]['tglMasuk']}' required $disable data-msg='Tidak Boleh Kosong'>
          </div>
        </div>
        <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Tanggal Surat</label>
          <div class='col-sm-2'>
            <input type='date' class='form-control' name='tglSurat' value='{$surat[0]['tglSurat']}' required $disable data-msg='Tidak Boleh Kosong'>
          </div>
        </div>
        <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Asal</label>
          <div class='col-sm-7'>
            <input type='text' class='form-control' maxlength='50' name='asal' value='{$surat[0]['asal']}' required $disable data-msg='Tidak Boleh Kosong'>
          </div>
        </div>
        <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Perihal</label>
          <div class='col-sm-7'>
            <input type='text' class='form-control' maxlength='100' name='perihal' value='{$surat[0]['perihal']}' required $disable data-msg='Tidak Boleh Kosong'>
          </div>
        </div>
        <div class='line'></div>
          <div class='form-group row'>
            <label class='col-sm-2 form-control-label'>Sifat</label>
            <div class='col-sm-2 mb-3'>
              <select name='sifat' class='form-control'>
                <option>-- Sifat Surat --</option>
                $sfat
              </select>
            </div>
          </div>
          <div class='line'></div>
          <div class='form-group row'>
            <label class='col-sm-2 form-control-label'>Pegawai Yang Dituju</label>
            <div class='col-sm-3 mb-3'>
              <select name='ditunjuk' class='form-control'>
                <option>-- Nama Pegawai --</option>
                $pgwai
              </select>
            </div>
          </div>
          <div class='line'></div>
          $btn
          $img
        </form>
      </div>
    </div>
    ";
  }
  if($_GET['form']=="lihat"){
    foreach ($sifatS as $sft) {
      if($surat[0]['idSifat']==$sft['idSifat']){
        $sfat = "<option value='{$sft['idSifat']}' selected>{$sft['sifat']}</option>";
      }

    }
    foreach ($pegawai as $pgw) {
      if($surat[0]['idUser']==$pgw['idUser']){
        $pgwai = "<option value='{$pgw['idUser']}' selected>{$pgw['fullname']}</option>";
      }
    }
    foreach ($ftoSurat as $ftsurat) {
      $fsurat .= "
      <div style='height:300px' class='col-sm-3 p-0 mx-3'>
        <div class='zoom-gallery'>
          <a href='files/{$ftsurat}' title='Surat Masuk' data-source=''>
            <img src='files/{$ftsurat}' style='height:300px;width:100%'/>
          </a>
        </div>
      </div>";
    }
    $img = "
    <div class='form-group row'>
      <div class='col-sm-10 offset-sm-2'>
        <div class='row'>
          $fsurat
        </div>
      </div>
    </div>
    ";

    if($surat[0]['pics']==""){
      $img = "";
    }
  $content = template::breadcrumb("Beranda:index.php,Surat Sudah disposisi:?page=daftarsurat&disposisi=sudah,Lihat Disposisi Surat Masuk")."
  <!-- FORM-->
  <div class='card'>
    <div class='card-header'>
      <h4 class='d-flex'><span class='my-auto'>LIHAT DISPOSISI SURAT MASUK</span> <a href='?page=daftarsurat&disposisi=sudah' class='btn btn-success ml-auto'>Kembali</a></h4> 
    </div>
    <div class='card-body'>
      <form class='form-horizontal' method='post'>
        <div class='form-group row'>
        <label class='col-sm-2 form-control-label'>No Register</label>
        <div class='col-sm-2'>
          <input type='text' class='form-control' maxlength='20' name='noRegister' value='{$surat[0]['noRegister']}' required $disable data-msg='Tidak Boleh Kosong'>
        </div>
      </div>
      <div class='line'></div>
      <div class='form-group row'>
        <label class='col-sm-2 form-control-label'>Tanggal Masuk</label>
        <div class='col-sm-2'>
          <input type='date' class='form-control' name='tglMasuk' value='{$surat[0]['tglMasuk']}' required $disable data-msg='Tidak Boleh Kosong'>
        </div>
      </div>
      <div class='line'></div>
      <div class='form-group row'>
        <label class='col-sm-2 form-control-label'>Tanggal Surat</label>
        <div class='col-sm-2'>
          <input type='date' class='form-control' name='tglSurat' value='{$surat[0]['tglSurat']}' required $disable data-msg='Tidak Boleh Kosong'>
        </div>
      </div>
      <div class='line'></div>
      <div class='form-group row'>
        <label class='col-sm-2 form-control-label'>Asal</label>
        <div class='col-sm-7'>
          <input type='text' class='form-control' maxlength='50' name='asal' value='{$surat[0]['asal']}' required $disable data-msg='Tidak Boleh Kosong'>
        </div>
      </div>
      <div class='line'></div>
      <div class='form-group row'>
        <label class='col-sm-2 form-control-label'>Perihal</label>
        <div class='col-sm-7'>
          <input type='text' class='form-control' maxlength='100' name='perihal' value='{$surat[0]['perihal']}' required $disable data-msg='Tidak Boleh Kosong'>
        </div>
      </div>
      <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Sifat</label>
          <div class='col-sm-2 mb-3'>
            <select name='sifat' class='form-control' disabled>
              <option>Sifat Surat</option>
              $sfat
            </select>
          </div>
        </div>
        <div class='line'></div>
        <div class='form-group row'>
          <label class='col-sm-2 form-control-label'>Pegawai Yang Dituju</label>
          <div class='col-sm-3 mb-3'>
            <select name='ditunjuk' class='form-control' disabled>
              <option>Nama Pegawai</option>
              $pgwai
            </select>
          </div>
        </div>
        <div class='line'></div>
        $upload
        $btn
        $img
      </form>
    </div>
  </div>
  ";
}
?>