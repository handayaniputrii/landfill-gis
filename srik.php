<div class="page-header">
    <h1>Alternatif</h1>
</div>
<div class="row">
    <div class="col-md-8">
        <div id="map" style="height: 500px;"></div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Keterangan <small>(Klik untuk detail)</small></h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped small">
                    <thead><tr>
                        <th>Warna</th>
                        <th>Nama</th>
                    </tr></thead>
                    <?php 
                    $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE 1 ORDER BY kode_alternatif");
                    $no = 0;
                    foreach($rows as $row):?>
                    <tr>
                        <td style="background: <?=$row->warna?>;">&nbsp;</td>
                        <td onclick="setCenter(<?=$row->lat?>, <?=$row->lng?>, '<?=$row->nama_alternatif?>', <?=$no++?>)"><?=$row->nama_alternatif?></td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
var map_dekat;
var infowindow = new google.maps.InfoWindow();
var markers = [<?=count($rows)?>];

function tampilDekat(){     
    map_dekat = new google.maps.Map(document.getElementById('map'), {
        zoom: <?=get_option('default_zoom')?>,
        center: {
            lat : default_lat, 
            lng : default_lng
        }
    });
    
    if(navigator.geolocation) {        
        navigator.geolocation.getCurrentPosition(function(position) {                                
            default_lat = position.coords.latitude;
            default_lng =  position.coords.longitude;
            map_dekat.setCenter({
                lat : default_lat, 
                lng : default_lng
            });
        }, function() {
        console.log('error geolocation');
        });
    } else {        
        console.log('error geolocation');
    }  
       
    var data =  <?=json_encode($rows)?>;
    $.each(data, function(k, v){
        var pos = {
            lat : parseFloat(v.lat),
            lng : parseFloat(v.lng)
        };
        var contentString = '<h3>'  + v.nama_alternatif + '</h3>' + 
            '<p align="center">' + v.keterangan + '<!--<a href="?m=tempat_detail&ID=' + v.id_tempat + '" class="link_detail btn btn-primary">Lihat Detail</a>-->';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        markers[k] = new google.maps.Marker({
            position: pos,
            map: map_dekat,
            icon : 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+ v.rank +'|FE6256|000000',
            animation: google.maps.Animation.DROP
        });         
        markers[k].addListener('click', function() {
            infowindow.open(map_dekat, markers[k]);
        });
        
        if(v.area!='' && v.area!=null){            
            poly_exist = v.area.split(',');            
            $.each(poly_exist, function(key, val){
                var ph = google.maps.geometry.encoding.decodePath(val);                
                var p = new google.maps.Polygon({
                    paths: ph,
                    fillColor: v.warna,
                    fillOpacity: 1,
                    strokeWeight: 1,
                    clickable: false,                    
                    zIndex: 1
                });                
                p.setMap(map_dekat); 
            });
        }        
    });    
                    
}  
function setCenter(lat, lng, contentString, indeks){
    map_dekat.setCenter({
        lat : lat, 
        lng : lng
    });
    map_dekat.setZoom(15);
    markers[indeks].setAnimation(google.maps.Animation.BOUNCE);
    setTimeout(function(){ markers[indeks].setAnimation(null); }, 750);
    /*infowindow.setContent(contentString); 
    infowindow.setPosition({
        lat : lat, 
        lng : lng
    });
    infowindow.open(map_dekat);*/
}

$(function(){
    tampilDekat();
})
</script>