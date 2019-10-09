<?php 

class template{

  // Breadcrumb
  public static function breadcrumb($link){
    $links = explode(",",$link);
    foreach ($links as $link) {
      $link = explode(":",$link);
      $url[] = end($link); 
    }
    foreach ($links as $link) {
      $link = explode(":",$link);
      $urltext[] = $link[0]; 
    }
    for($i = 0;$i < count($links);$i++){
      if($links[$i] != end($links)){
        $bc .= "<li class='breadcrumb-item'><a href='$url[$i]'>$urltext[$i]</a></li>";
      }
      else{
        $bc .= "<li class='breadcrumb-item active'>$urltext[$i]</li>";
      }
    }

    return "
    <!-- Breadcrumb-->
    <div class='breadcrumb-holder'>
      <div class='container-fluid'>
        <ul class='breadcrumb'>
          $bc
        </ul>
      </div>
    </div>
    ";
  }

  // Alert
  public static function alert($warna,$isi,$close){
    if ($close) {
      $class = "alert-dismissible";
      $btn = "<button type='button' class='close' data-dismiss='alert'>&times;</button>"; 
    }
    return "<div class='alert alert-$warna border-0 text-center $class fade show'>$btn $isi</div>";
  }
}
?>