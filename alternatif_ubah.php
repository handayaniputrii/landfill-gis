<?php
    $row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<form method="post">
    <div class="row">
        <div class="col-sm-6">
            <?php if($_POST) include'aksi.php'?>            
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_alternatif" value="<?=$row->kode_alternatif?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?=set_value('nama_alternatif', $row->nama_alternatif)?>" id="nama"/>                
            </div>
            <div class="form-group">
                <label>Latitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="lat" id="lat" value="<?=set_value('lat', $row->lat)?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Longitude <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="lng" name="lng" value="<?=set_value('lng', $row->lng)?>" readonly=""/>
            </div>
			<div class="form-group">
                <label>Luas Lahan</label>
                <input class="form-control" type="text" name="luas_lahan" value="<?=set_value('luas_lahan', $row->luas_lahan)?>"/>
            </div>
			<div class="form-group">
                <label>Harga Lahan</label>
                <input class="form-control" type="text" name="harga_lahan" value="<?=set_value('harga_lahan', $row->harga_lahan)?>"/>
            </div>
            <div class="form-group">
                <label>Warna</label>
                <input class="form-control" type="color" name="warna" value="<?=set_value('warna', $row->warna)?>"/>
            </div>
            <div class="form-group hidden">
                <label>Area</label>
                <textarea class="form-control" name="area"><?=set_value('area', $row->area)?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>        
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" type="text" id="pac-input" placeholder="Cari lokasi" />
            </div>
            <div id="map" style="height: 400px;"></div> 
            <hr />                    
            <div class="form-group">
                <button type="button" class="btn btn-danger pull-right" onclick="clearPolygon()"><span class="glyphicon glyphicon-trash"></span> Clear Polygon</button>                
            </div>                    
        </div>  
    </div>
</form>
<script>
var defaultCenter = {
    lat : -2.9537659, 
    lng : 104.7483702
};
var polygons = [];
function initMap() {
    
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
	mapTypeId: 'satellite',
    center: defaultCenter 
  });
    
    var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.CURSOR,
            drawingControl: true,
            drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['polygon']
        },    
        polygonOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
        }
    });
    
    drawingManager.setMap(map);        
        
    var polygonChanged = function(){        
        var arr_polt = [];
        $.each(polygons, function(k, v){
            arr_polt.push(google.maps.geometry.encoding.encodePath(v.getPath()));            
        });
        $('textarea[name="area"]').val(arr_polt.toString());   
    }
    
    var poly_exist = $('textarea[name="area"]').val();
                
    if(poly_exist!=''){
        
        poly_exist = poly_exist.split(',');
                        
        $.each(poly_exist, function(k, v){
            var ph = google.maps.geometry.encoding.decodePath(v);
            var p = new google.maps.Polygon({
                paths: ph,
                fillColor: '#ffff00',
                fillOpacity: 1,
                strokeWeight: 5,
                clickable: false,
                editable: true,
                zIndex: 1
            });
            
            polygons.push(p);
            google.maps.event.addListener(p.getPath(), 'set_at', polygonChanged);
            google.maps.event.addListener(p.getPath(), 'insert_at', polygonChanged);
            p.setMap(map); 
        });
    }                
    
    google.maps.event.addDomListener(drawingManager, 'polygoncomplete', function(polygon) {        
        polygons.push(polygon);     
        console.log(polygon);
        google.maps.event.addListener(polygon.getPath(), 'set_at', polygonChanged);
        google.maps.event.addListener(polygon.getPath(), 'insert_at', polygonChanged);
        polygonChanged();
    });
                            
    
  var marker = new google.maps.Marker({
    position: defaultCenter,
    map: map,
    title: 'Click to zoom',
    draggable:true
  });
  
  var input = document.getElementById('pac-input');
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);
  
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);
    
    var infowindow = new google.maps.InfoWindow({
        content: '<h4>Drag untuk pindah lokasi</h4>'
    });
    
  infowindow.open(map, marker);
  var infowindowContent = document.getElementById('infowindow-content');
  
   autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      marker.setPosition(place.geometry.location);
      marker.setVisible(true);
      
      document.getElementById('nama').value = place.name;
      document.getElementById('lat').value = place.geometry.location.lat();
      document.getElementById('lng').value = place.geometry.location.lng();
      
      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }
              
      infowindow.setContent(place.name + '');
      infowindow.open(map, marker);
    });
}

function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
}

function clearPolygon(){
    $.each(polygons, function(k, v){
        v.setMap(null);            
    });
    polygons = [];
    $('textarea[name="area"]').val('');
}

$(function(){
    initMap();
})
</script>