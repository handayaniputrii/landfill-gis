<div class="page-header">
    <h1>Nilai Alternatif</h1>
</div>
<?php show_msg()?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />            
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?=$_GET['q']?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <?php foreach($KRITERIA as $key => $val):?>
                <th><?=$key?></th>
                <?php endforeach?>
                <th>Aksi</th>
            </tr></thead>
            <tbody>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT r.*, a.nama_alternatif, c.nama_sub
                FROM tb_rel_alternatif r 
                    INNER JOIN tb_alternatif a ON a.kode_alternatif=r.kode_alternatif
                    LEFT JOIN tb_sub c ON c.kode_sub=r.kode_sub
                WHERE a.nama_alternatif LIKE '%$q%'
                ORDER BY r.kode_alternatif, r.kode_kriteria");
            $data = array();
            foreach($rows as $row){
                $data[$row->kode_alternatif][$row->kode_kriteria]  = $row;
            }
            $no=0;
            foreach($data as $key => $val):?>
            <tr>
                <td><?=$key?></td>
                <td><?=current($val)->nama_alternatif?></td>
                <?php foreach($val as $k => $val):?>
                <td><?=$val->nama_sub?></td>
                <?php endforeach?>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?=$key?>"><span class="glyphicon glyphicon-edit"></span> Input </a>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
          </table>
    </div>    
</div>
