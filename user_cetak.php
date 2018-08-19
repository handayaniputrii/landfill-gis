<h1>Data User</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama User</th>
            <th>User</th>
            <th>Level</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_user 
        WHERE kode_user LIKE '%$q%' OR
            nama_user LIKE '%$q%' OR
            user LIKE '%$q%'
        ORDER BY kode_user");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->kode_user?></td>
        <td><?=$row->nama_user?></td>
        <td><?=$row->user?></td>      
        <td><?=$row->level?></td>   
    </tr>
    <?php endforeach;?>
</table>