<div class="page-header">
    <h1>Tambah Kriteria</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_kriteria" value="<?=set_value('kode_kriteria', kode_oto('kode_kriteria', 'tb_kriteria', 'C', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kriteria"  value="<?=set_value('nama_kriteria')?>"/>
                <div id="name_error" class="val_error"></div>
            </div>
            <div class="form-group">
                <label>Atribut <span class="text-danger">*</span></label>
                <select id="atribut" class="form-control" name="atribut">
                    <option></option>
                    <?=get_atribut_option(set_value('atribut'))?>
                </select>
            </div>
            <div class="form-group">
                <button name="form_kriteria" title="Klik disini untuk menyimpan data kriteria" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a title="Klik disini untuk kembali ke daftar kriteria" class="btn btn-danger" href="?m=kriteria"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>        
        </form>
    </div>
</div>
