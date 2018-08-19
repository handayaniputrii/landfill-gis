<div class="page-header">
    <h1>Tambah User</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode_user" value="<?=set_value('kode_user', kode_oto('kode_user', 'tb_user', 'U', 2))?>"/>
            </div>
            <div class="form-group">
                <label>Nama User <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_user"  value="<?=set_value('nama_user')?>"/>                
            </div>
            <div class="form-group">
                <label>Level <span class="text-danger">*</span></label>
                <select class="form-control" name="level">
                    <?=get_level_option(set_value('level'))?>
                </select>              
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user"  value="<?=set_value('user')?>"/>                
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass"  value="<?=set_value('pass')?>"/>                
            </div>
            <div class="form-group">
                <button name="form_user" title="Klik disini untuk menyimpan data user" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a title="Klik disini untuk kembali ke daftar user" class="btn btn-danger" href="?m=user"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>        
        </form>
    </div>
</div>
