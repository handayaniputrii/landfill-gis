<h1>Laporan Hasil Perhitungan</h1>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Hasil Analisa</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php            
            $data = get_rel_alternatif();
            foreach($KRITERIA as $key => $val):?>
            <th><?=$val->nama_kriteria?></th>
            <?php endforeach?>
        </tr></thead>
        <?php foreach($data as $key => $val):?>
        <tr>
            <td><?=$ALTERNATIF[$key]?></td>
            <?php foreach($val as $k => $v):?>
            <td><?=$CRIPS[$v]->nama_sub?></td>
            <?php endforeach?>
        </tr>
        <?php endforeach?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Data Nilai</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php            
            $data_nilai = get_rel_alternatif_nilai($data);
            foreach($KRITERIA as $key => $val):?>
            <th><?=$val->nama_kriteria?></th>
            <?php endforeach?>
        </tr></thead>
        <?php foreach($data_nilai as $key => $val):?>
        <tr>
            <td><?=$ALTERNATIF[$key]?></td>
            <?php foreach($val as $k => $v):?>
            <td><?=round($v, 3)?></td>
            <?php endforeach?>
        </tr>
        <?php endforeach?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Normalisasi</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php foreach($KRITERIA as $key => $val):?>
            <th><?=$key?></th>
            <?php endforeach?>
        </tr><tr>
            <th>Atribut</th>
            <?php foreach($KRITERIA as $key => $val):?>
            <th><?=$val->atribut?></th>
            <?php endforeach?>
        </tr></thead>
        <?php 
        $normal = get_moora_normal($data_nilai);
        foreach($normal as $key => $val):?>
        <tr>
            <td><?=$key?></td>
            <?php foreach($val as $k => $v):?>
            <td><?=round($v, 3)?></td>
            <?php endforeach?>
        </tr>
        <?php endforeach?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Normalisasi Terbobot</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php foreach($KRITERIA as $key => $val):?>
            <th><?=$key?></th>
            <?php endforeach?>
        </tr><tr>
            <th>Prioritas</th>
            <?php foreach($KRITERIA as $key => $val):?>
            <th><?=round($val->bobot, 3)?></th>
            <?php endforeach?>
        </tr></thead> 
        <?php 
        $terbobot = get_normal_terbobot($normal);
        foreach($terbobot as $key => $val):?>
        <tr>
            <td><?=$key?></td>
            <?php foreach($val as $k => $v):?>
            <td><?=round($v, 3)?></td>
            <?php endforeach?>
        </tr>
        <?php endforeach?>
        </table>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Perangkingan</h3>
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
</div>