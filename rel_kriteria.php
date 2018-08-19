<div class="page-header">
    <h1>Nilai Bobot Kriteria</h1>
</div>
<?php
if($_POST) include'aksi.php';
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline" method="post">
            <div class="form-group">
                <select class="form-control" name="ID1">
                <?=get_kriteria_option( $_POST['ID1'])?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="nilai">
                <?=AHP_get_nilai_option($_POST['nilai'])?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="ID2">
                <?=get_kriteria_option( $_POST['ID2'])?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">            
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>Kode</th>
                <th>Nama</th>
                <?php foreach($KRITERIA as $key => $val):?>
                <th><?=$key?></th>
                <?php endforeach?>
            </tr></thead>
            <tbody>
            <?php
            $data = get_rel_kriteria();  
            $kolom_total = get_kolom_total($data); 
            $normal = AHP_normalize($data, $kolom_total);                  
            $rata = AHP_get_rata($normal);     
            $cm = AHP_consistency_measure($data, $rata);
            $a=1;
            foreach($data as $key => $val):?>
            <tr>
                <td><?=$key?></td>
                <td><?=$KRITERIA[$key]->nama_kriteria?></td>
                <?php  
                    $b=1;
                    foreach($val as $k => $v){ 
                        if( $key == $k ) 
                            $class = 'success';
                        elseif($b > $a)
                            $class = 'danger';
                        else
                            $class = '';
                            
                        echo "<td class='$class'>".round($v, 3)."</td>";   
                        $b++;            
                    } 
                    $no++;       
                ?>
            </tr>
            <?php $a++; endforeach;?>
            </tbody>
            <tfoot><tr>
                <td colspan="2" class="text-right">Total</td>
                <?php foreach($kolom_total as $key => $val):?>
                <td><?=round($val, 3)?></td>
                <?php endforeach?>
            </tr></tfoot>         
        </table>
    </div>
    <div class="panel-body">
    
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr>
                <th>Kode</th>
                <?php foreach($KRITERIA as $key => $val):?>
                <th><?=$key?></th>
                <?php endforeach?>
                <th>Prioritas</th>
                <th>CM</th>
            </tr></thead>
            <?php                                                           
            foreach($normal as $key => $val):
            $db->query("UPDATE tb_kriteria SET bobot='$rata[$key]' WHERE kode_kriteria='$key'");
            ?>
            <tr>
                <td><?=$key?></td>
                <?php foreach($val as $k => $v):?>
                <td><?=round($v, 3)?></td>
                <?php endforeach?>   
                <td><?=round($rata[$key], 3)?></td> 
                <td><?=round($cm[$key], 3)?></td>              
            </tr>                        
            <?php endforeach?>                       
        </table>
    </div>
    <div class="panel-body">
        <p>Berikut tabel ratio index berdasarkan ordo matriks.</p>     
    </div>       
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead><tr>
                <th>Ordo matriks</th>
                <?php foreach($nRI as $key => $val):?>
                <?php if(count($data)==$key):?>
                <td class="text-primary"><strong><?=$key?></strong></td>
                <?php else:?>
                <td><?=$key?></td>
                <?php endif?>
                <?php endforeach?>
            </tr></thead>
            <tr>
            <th>Ratio index</th>
            <?php foreach($nRI as $key => $val):?>
            <?php if(count($data)==$key):?>
            <td class="text-primary"><strong><?=$val?></strong></td>
            <?php else:?>
            <td><?=$val?></td>
            <?php endif?>
            <?php endforeach?>
            </tr>
        </table>
    </div>
    <div class="panel-footer">
        <?php
            $CI = ((array_sum($cm)/count($cm))-count($cm))/(count($cm)-1);	
        	$RI = $nRI[count($data)];
        	$CR = $CI/$RI;
        	echo "<p>Consistency Index: ".round($CI, 3)."<br />";	
        	echo "Ratio Index: ".round($RI, 3)."<br />";
        	echo "Consistency Ratio: ".round($CR, 3);
        	if($CR>0.10){
        		echo " (Tidak konsisten)<br />";	
        	} else {
        		echo " (Konsisten)<br />";
        	}
        ?>
        </div>
</div>