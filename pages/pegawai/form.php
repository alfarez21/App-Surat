<?php
$surat = $sMasuk->getDataa("=",["noRegister"=>$id]);
$ftoSurat = explode(",",$surat[0]['pics']);
$sMasuk->update(["idBacaP"=>1],["noRegister"=>"$id"]);
$disable = "disabled";
if($surat[0]['idStts']==1){
  $btn ="";
}
else{
  $btn = "
    <div class='form-group row'>
      <div class='col-sm-4 offset-sm-2'>
        <button type='submit' class='btn btn-primary' name='simpan'>Terima</button>
      </div>
    </div>
";
}
foreach ($ftoSurat as $ftsurat) {
  $fsurat .= "
  <div style='height:300px' class='col-sm-3 p-0 mx-3'>
    <div class='zoom-gallery'>
      <a href='files/{$ftsurat}' title='Surat Masuk' data-source=''>
        <img src='files/{$ftsurat}' style='height:300px;width:100%'/>
      </a>
    </div>
    <div style='position:absolute;top:5px;right:10px;'>
      <a href='logic/hapusgambar.php?id=$id&img={$ftsurat}'>Hapus</a>
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
$content = template::breadcrumb("Beranda:index.php,Surat Masuk:?page=suratmasuk,Lihat Surat Masuk")."
<!-- FORM-->
<div class='card'>
  <div class='card-header'>
    <h4 class='d-flex'><span class='my-auto'>LIHAT SURAT MASUK</span> <a href='?page=suratmasuk' class='btn btn-success ml-auto'>Kembali</a></h4> 
  </div>
  <div class='card-body'>
    <form class='form-horizontal' method='post' action='logic/terimasurat.php'>
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
      $upload
      $btn
      $img
    </form>
  </div>
</div>
";

