<div class="page-header">
    <h1>Kriteria</h1>
</div>

    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Atribut</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_kriteria 
        WHERE kode_kriteria LIKE '%$q%' OR
            nama_kriteria LIKE '%$q%' OR
            atribut LIKE '%$q%'
        ORDER BY kode_kriteria");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->kode_kriteria?></td>
        <td><?=$row->nama_kriteria?></td>
        <td><?=$row->atribut?></td>  
    </tr>
    <?php endforeach;?>
    </table>
</div>