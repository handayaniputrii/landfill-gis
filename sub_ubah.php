<?php
    $row = $db->get_row("SELECT * FROM tb_sub WHERE kode_sub='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Nilai Kriteria</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kriteria</label>
                <select disabled="" class="form-control" name="kode_kriteria">
                    <?=get_kriteria_option($row->kode_kriteria)?>
                </select>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="text" name="nama_sub" value="<?=$row->nama_sub?>" />
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input class="form-control" type="text" name="nilai" value="<?=$row->nilai?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=sub&kode_kriteria=<?=$_GET['kode_kriteria']?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
