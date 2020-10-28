<?php
  function getBank()
  {
    $apiKey = '3ZAbaxDMaFmNmXppJ2M86C40C63jnv5tN2CIKetV';

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
    curl_setopt($ch,CURLOPT_URL,"https://payment.tripay.co.id/api/payment/channel");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch,CURLOPT_HTTPHEADER, array(
      "Authorization: Bearer ".$apiKey
    ));
    $output = curl_exec($ch); 
    curl_close($ch);

    return json_decode($output,true);
    
  }
  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.').",-";
    return $hasil_rupiah;
   
  }

  function upDown($awal,$akhir)
  {
    $hasil = array();
    if($awal <= $akhir){
      $hasil['status'] = 'naik';
      if($awal == 0){
        $hasil['pesren'] = 100;
      }else{
        $total = $akhir/$awal;
        $total = $total *100;
        $total = $total - 100;
        $hasil['persen'] = $total;
      }
    }else{
      $hasil['status'] = 'turun';
      if($akhir == 0){
        $hasil['pesren'] = 100;
      }else{
        $total = $awal/$akhir;
        $total = $total *100;
        $total = $total - 100;
        $hasil['persen'] = $total;
      }
    }

    return $hasil;
  }

?>