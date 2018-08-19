<script src="assets/js/highcharts.js"></script>     
<script src="assets/js/exporting.js"></script>     
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"> Hasil Perangkingan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Rank</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Total</th>            
        </tr>
        <?php
        $total = get_total($normal);
        $rank = get_rank($total);        
        foreach($rank as $key => $val):
        $db->query("UPDATE tb_alternatif SET total='$total[$key]', rank='$val' WHERE kode_alternatif='$key'");
        ?>
        <tr>
            <td><?=$val?></td>
            <td><?=$key?></td>
            <td><?=$ALTERNATIF[$key]?></td>
            <td><?=round($total[$key], 3)?></td>
        </tr>
        <?php endforeach ?>
        </table>
    </div>        
    <div class="panel-body">
        <a class="btn btn-default" href="cetak.php?m=hitung" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak </a>
    </div>
</div>
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
            $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY rank ");
                
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
                'pointFormat'=> '<tr><td style="color:{series.color};padding:0">{series.name}: </td>
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

