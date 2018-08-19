<div class="page-header">
    <h1>Nilai Kriteria</h1>
</div>
<?php show_msg()?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="sub" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=sub_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead><tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Kriteria</th>
                <th>Keterangan</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr></thead>
            <tbody>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT c.kode_sub, c.kode_kriteria, k.nama_kriteria, c.nama_sub, c.nilai 
                FROM tb_sub c INNER JOIN tb_kriteria k ON k.kode_kriteria=c.kode_kriteria 
                WHERE c.kode_kriteria LIKE '%$q%' OR k.nama_kriteria LIKE '%$q%' OR c.nama_sub LIKE '%$q%' 
                ORDER BY k.kode_kriteria, nilai");
            $no=1;
            foreach($rows as $row):?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row->kode_kriteria?></td>
                <td><?=$row->nama_kriteria?></td>
                <td><?=$row->nama_sub?></td>
                <td><?=$row->nilai?></td>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=sub_ubah&ID=<?=$row->kode_sub?>&kode_kriteria=<?=$row->kode_kriteria?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a class="btn btn-xs btn-danger" href="aksi.php?act=sub_hapus&ID=<?=$row->kode_sub?>&kode_kriteria=<?=$row->kode_kriteria?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
