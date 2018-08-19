<script src="assets/js/highcharts.js"></script>     
<script src="assets/js/exporting.js"></script>  
<div class="page-header">
    <h1>Rekomendasi Lahan</h1>
</div>
<div class="row">
    <div class="col-md-8">
        <div id="map" style="height: 500px;"></div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Keterangan</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                   <thead><tr>
						<th>Rangking</th>
                        <th>Warna</th>
                        <th>Nama</th>
                    </tr></thead>
                    <?php 
                    $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY rank");
                    foreach($rows as $row):?>
                    <tr>
						<td onclick="setCenter(<?=$row->lat?>, <?=$row->lng?>, '<?=$row->nama_alternatif?>', <?=$no++?>)"><?=$row->rank?></td>
                        <td style="background: <?=$row->warna?>;">&nbsp;</td>
                        <td onclick="setCenter(<?=$row->lat?>, <?=$row->lng?>, '<?=$row->nama_alternatif?>', <?=$no++?>)"><?=$row->nama_alternatif?></td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Grafik</h3>
    </div>
    <div class="panel-body">        
        <style>
        .highcharts-credits{
            display: none;
        }
        </style>
        <?php
        function get_chart1(){
            global $db;
            $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY rank");
                
            foreach($rows as $row){                
                $data[$row->nama_alternatif] = $row->total * 1;                 
            }
             
            $chart = array();
            
            $chart['chart']['type'] = 'column';            
            $chart['title']['text'] = 'Grafik Hasil Perangkingan';    
            $chart['plotOptions'] = array(
                'column' => array(
                    'depth' => 25,
                )
            );
            
            $chart['xAxis'] = array(
                'categories' => array_keys($data),                   
            );
            $chart['yAxis'] = array(
                'min' => 0,
                'title' => array('text' => 'Total'),
            );
            $chart['tooltip'] = array(
                'headerFormat'=> '<span style="font-size:10px">{point.key}</span><table>',
                'pointFormat'=> '<tr><td style="color:{series.color]]]};padding:0">{series.name}: </td>
                    <td style="padding:0"><b>{point.y:.3f}</b></td></tr>',
                'footerFormat'=> '</table>',
                'shared'=> true,
                'useHTML'=> true,
            );
                        
            $chart['series']= array(
                array(
                    'name' => 'Total nilai',
                    'data' => array_values($data),
                )
            );
            return $chart;
        }
            
        ?>
        <script>
        $(function(){
            $('#chart1').highcharts(<?=json_encode(get_chart1())?>);   
        })
        </script>
        <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>        
    </div>
</div>
<script>
var map_dekat;
var infowindow = new google.maps.InfoWindow();
var markers = [<?=count($rows)?>];

function tampilDekat(){     
    map_dekat = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
		mapTypeId: 'satellite',
        center: {
            lat : -2.9537659,
            lng : 104.7483702
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
            'Harga Lahan : Rp ' + v.harga_lahan + '<br>Luas Lahan : ' + v.luas_lahan + ' Ha';
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
            //console.log(poly_exist);
            $.each(poly_exist, function(key, val){
                var ph = google.maps.geometry.encoding.decodePath(val);
                console.log(ph);
                var p = new google.maps.Polygon({
                    paths: ph,
                    fillColor: v.warna,
                    fillOpacity: 0.5,
                    strokeWeight: 0.8,
                    clickable: false,
                    //editable: true,
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
    map_dekat.setZoom(17);
    markers[indeks].setAnimation(google.maps.Animation.BOUNCE);
    setTimeout(function(){ markers[indeks].setAnimation(null); }, 750);
    
	infowindow.setContent(contentString); 
    infowindow.setPosition({
        lat : lat, 
        lng : lng
    });
    infowindow.open(map_dekat);
}

$(function(){
    tampilDekat();
})
</script>