<?php
    $row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Penilaian Alternatif &raquo; <small><?=$row->nama_alternatif?></small></h1>
</div>
<?php
$lat = $row->lat;
$lng = $row->lng;

/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$row->lat,$row->lng&destinations={$JARAK['BANDARA']['lat']},{$JARAK['BANDARA']['lng']}|{$JARAK['PUSAT']['lat']},{$JARAK['PUSAT']['lng']}&key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$output = curl_exec($ch);
curl_close($ch);

//var_dump($output);

if($output===FALSE){
    //echo curl_error($ch);
    print_msg('Gagal mencari jarak');
} else {
    $output = json_decode($output);
    $output = $output->rows[0]->elements;

    $jarak['C09'] = $output[0]->distance->value;
    
    if($jarak['C09']<=3000)
        $crips['C09'] = $JARAK['BANDARA']['sub'][0];
    else
        $crips['C09'] = $JARAK['BANDARA']['sub'][1];
    
    $jarak['C10'] = $output[1]->distance->value;
    if($jarak['C10']<=10000)
        $crips['C10'] = $JARAK['PUSAT']['sub'][0];
    elseif($jarak['C10']<=20000)
        $crips['C10'] = $JARAK['PUSAT']['sub'][1];
    else
        $crips['C10'] = $JARAK['PUSAT']['sub'][2];        
    //echo '<pre>'.print_r($crips, 1) . '</pre>';    
}*/
?>
<div class="row">
    <div class="col-sm-4">
        <?php if($_POST) include 'aksi.php'?>
        <form method="post">
        <?php
            $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_sub 
                FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  
                WHERE kode_alternatif='$_GET[ID]' ORDER BY kode_kriteria");
            foreach($rows as $row):?>
            <div class="form-group">
                <label><?=$row->nama_kriteria?></label>
                <select class="form-control" name="ID-<?=$row->ID?>" id="nilai_<?=$row->kode_kriteria?>">
                    <option value="">Pilih sub kriteria</option>
                    <?=get_crips_option($row->kode_kriteria, isset($crips[$row->kode_kriteria]) ? $crips[$row->kode_kriteria] : $row->kode_sub)?>
                </select>
                <p class="help-block" id="help_<?=$row->kode_kriteria?>"><?=isset($jarak[$row->kode_kriteria]) ? 'Jarak: ' . number_format($jarak[$row->kode_kriteria]). ' m' : ''?></p>
            </div>
            <?php endforeach?>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
<script>
var origin = new google.maps.LatLng(<?=$lat?>, <?=$lng?>);
var destinationA = new google.maps.LatLng(<?=$JARAK['BANDARA']['lat']?>, <?=$JARAK['BANDARA']['lng']?>);
var destinationB = new google.maps.LatLng(<?=$JARAK['PUSAT']['lat']?>, <?=$JARAK['PUSAT']['lng']?>);
var destinationC = new google.maps.LatLng(<?=$JARAK['SUNGAI']['lat']?>, <?=$JARAK['SUNGAI']['lng']?>);

var service = new google.maps.DistanceMatrixService();
service.getDistanceMatrix(
  {
    origins: [origin],
    destinations: [destinationA, destinationB, destinationC],
    travelMode: 'DRIVING'
  }, callback);

function callback(response, status) {
    if(status=='OK'){
        //console.log(response.rows[0].elements);  
		var sungai = response.rows[0].elements[0].distance.value;  
        $('#help_<?=$JARAK['SUNGAI']['kode']?>').html('Jarak: ' + sungai.toLocaleString() + ' m');                
        if(sungai<=300)
            $('#nilai_<?=$JARAK['SUNGAI']['kode']?>').val(<?=$JARAK['SUNGAI']['sub'][0]?>);
        else
            $('#nilai_<?=$JARAK['SUNGAI']['kode']?>').val(<?=$JARAK['SUNGAI']['sub'][1]?>);
		
        var bandara = response.rows[0].elements[1].distance.value;  
        $('#help_<?=$JARAK['BANDARA']['kode']?>').html('Jarak: ' + bandara.toLocaleString() + ' m');                
        if(bandara<=3000)
            $('#nilai_<?=$JARAK['BANDARA']['kode']?>').val(<?=$JARAK['BANDARA']['sub'][0]?>);
        else
            $('#nilai_<?=$JARAK['BANDARA']['kode']?>').val(<?=$JARAK['BANDARA']['sub'][1]?>);
                        
        var pusat = response.rows[0].elements[2].distance.value;  
        $('#help_<?=$JARAK['PUSAT']['kode']?>').html('Jarak: ' + pusat.toLocaleString() + ' m');
        if(pusat<=10000)
            $('#nilai_<?=$JARAK['PUSAT']['kode']?>').val(<?=$JARAK['PUSAT']['sub'][0]?>);
        else if(pusat>=20000)
            $('#nilai_<?=$JARAK['PUSAT']['kode']?>').val(<?=$JARAK['PUSAT']['sub'][1]?>);
        else
            $('#nilai_<?=$JARAK['PUSAT']['kode']?>').val(<?=$JARAK['PUSAT']['sub'][2]?>);
    } else {
        alert('Gagal memperoleh jarak');
    }    
}
</script>
