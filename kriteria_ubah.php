<?php
    $row = $db->get_row("SELECT * FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Kriteria</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_kriteria" value="<?=$row->kode_kriteria?>" readonly=""/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kriteria" value="<?=$row->nama_kriteria?>"/>
            </div>
            <div class="form-group">
                <label>Atribut <span class="text-danger">*</span></label>
                <select class="form-control" name="atribut" id="atribut">
                    <option></option>
                    <?=get_atribut_option($row->atribut)?>
                </select>
            </div>
            <div class="form-group">
                <button id="kriteria" title="Klik disini untuk menyimpan data kriteria" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a title="Klik disini untuk kembali ke daftar kriteria" class="btn btn-danger" href="?m=kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>            
        </form>
    </div>
</div>
