<?php
require_once 'functions.php'; // memanggil file functions.php utk kebutuhan koneksi dan fungsi yg ada pd file general.php

/** LOGIN **/
if($act=='login'){ // jika act = login maka cek autentifikasinya
    $user = esc_field($_POST['user']); // esc_field dari general.php
    $pass = esc_field($_POST['pass']);

    if(empty($user)){ // validasi input user kosong
      print_msg("Nama user harus diisi"); // print_msg dari general.php
    }else if(empty($pass)){  // validasi input password kosong
      print_msg("Password harus diisi"); // show pesan error
    }else{ // validasi oke
        $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'"); // mengambil baris tabel admin yg sesuai dg data inputan user & pass
        if($row){ // jika ditemukan
            $_SESSION['login'] = $row->user;// assign session login isinya nama user buat ditampilin di menu utama
            $_SESSION['level'] = $row->level;
            redirect_js("index.php?m=tentang"); // diarahkan ke halaman utama
        } else{ //jika tidak ditemukan
            print_msg("Username dan password tidak cocok."); // menampilkan kesalahan username & password tidak cocok
        }
    }
}else if ($mod=='password'){ // ubah password
    $pass1 = $_POST['pass1']; // get input password lama
    $pass2 = $_POST['pass2']; // get input password baru
    $pass3 = $_POST['pass3']; // get konfirmasi password

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");
    
    if($pass1=='' || $pass2=='' || $pass3=='') // jika inputan kosong
        print_msg('Field bertanda * harus diisi.'); // menampilkan kesalahan
    elseif(!$row) // jika input password lama tidak sama dengan sebelumnya
        print_msg('Password lama salah.'); // menampilkan input kesalahan password lama
    elseif($pass2!=$pass3)//validasi kesamaan input pass baru dan konfirmasi pass
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{ // jika oke
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'"); // mengupdate data password
        print_msg('Password berhasil diubah.', 'success'); // menampilkan pesan berhasil ubah password
    }
}elseif($act=='logout'){ // logout
    unset($_SESSION['login'], $_SESSION['level']); // unset nilai session login
    header("location:index.php?m=alternatif_list"); // mengarahkan ke halaman login
}

/** user */
if($mod=='user_tambah'){
    set_rules('kode_user', 'Kode User', 'required|is_unique[tb_user.kode_user]');
    set_rules('nama_user', 'Nama User', 'required');
    set_rules('user', 'Username', 'required|is_unique[tb_user.user]');
    set_rules('pass', 'Password', 'required');
    
    $kode_user = $_POST['kode_user'];
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];
    
    if(run_validation()){
        $db->query("INSERT INTO tb_user (kode_user, nama_user, user, pass, level) 
                VALUES ('$kode_user', '$nama_user', '$user', '$pass', '$level')");            
        set_msg('User berhasil ditambah!');
        redirect_js("index.php?m=user");
    }   
} else if($mod=='user_ubah'){    
    set_rules('nama_user', 'Nama User', 'required');
    set_rules('pass', 'Password', 'required');
        
    $nama_user = $_POST['nama_user'];    
    $pass = $_POST['pass'];
    $level = $_POST['level'];
    
    if(run_validation()){
        $db->query("UPDATE tb_user SET nama_user='$nama_user', pass='$pass', level='$level' WHERE kode_user='$_GET[ID]'");    
        set_msg('User berhasil diubah!');        
		redirect_js("index.php?m=user");
    }       
} else if ($act=='user_hapus'){
    $db->query("DELETE FROM tb_user WHERE kode_user='$_GET[ID]'");
    set_msg('User berhasil dihapus!');
    redirect_js("index.php?m=user");
}

/** nilai alternatif */
else if ($mod=='rel_alternatif_ubah'){ 
    $error = false; 

    foreach($_POST as $key => $value){
        if(!$value){
            $error = true; 
            break; 
        }
    }
    if($error){ 
        print_msg("Isikan semua nilai alternatif"); 
    }else{ 
        foreach($_POST as $key => $value){ 
            $ID = str_replace('ID-','',$key);             
            $db->query("UPDATE tb_rel_alternatif SET kode_sub='$value' WHERE ID='$ID'");
        }
        set_msg('Nilai alternatif berhasil diubah');
        redirect_js("index.php?m=rel_alternatif");
    }
}

/** alternatif */
elseif($mod=='alternatif_tambah'){ 
    set_rules('kode_alternatif', 'Kode', 'required|is_unique[tb_alternatif.kode_alternatif]');
    set_rules('nama_alternatif', 'Nama', 'required');
    set_rules('lat', 'Latitude', 'required');
    set_rules('lng', 'Longitude', 'required');
	set_rules('luas_lahan', 'Luas Lahan', 'required');
    set_rules('harga_lahan', 'Harga Lahan', 'required');
    set_rules('warna', 'warna', 'required');
    set_rules('area', 'Area', 'required');
        
    $kode_alternatif = $_POST['kode_alternatif']; 
    $nama_alternatif = $_POST['nama_alternatif']; 
	$luas_lahan = $_POST['luas_lahan'];
	$harga_lahan = $_POST['harga_lahan'];
    $lat = $_POST['lat']; 
    $lng = $_POST['lng'];
    $warna = $_POST['warna']; 
    $area = $_POST['area']; 
     
    
    if(run_validation()){        
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, luas_lahan, harga_lahan, lat, lng, warna, area)
            VALUES ('$kode_alternatif', '$nama_alternatif', '$luas_lahan', '$harga_lahan', '$lat', '$lng', '$warna', '$area')");
          
        $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_sub) 
            SELECT '$kode_alternatif', kode_kriteria, 0 FROM tb_kriteria");
        set_msg('Alternatif berhasil ditambah!');
    	redirect_js("index.php?m=alternatif");    
    }     
} else if($mod=='alternatif_ubah'){
    set_rules('nama_alternatif', 'Nama', 'required');
    set_rules('lat', 'Latitude', 'required');
    set_rules('lng', 'Longitude', 'required');
	set_rules('luas_lahan', 'Luas Lahan', 'required');
    set_rules('harga_lahan', 'Harga Lahan', 'required');
    set_rules('warna', 'warna', 'required');
    set_rules('area', 'Area', 'required');
    
	$kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif']; 
	$luas_lahan = $_POST['luas_lahan'];
	$harga_lahan = $_POST['harga_lahan'];
    $lat = $_POST['lat']; 
    $lng = $_POST['lng'];	
    $warna = $_POST['warna']; 
    $area = $_POST['area']; 
   
    if(run_validation()){        
        $db->query("UPDATE tb_alternatif SET 
                nama_alternatif='$nama_alternatif', 
				luas_lahan='$luas_lahan',
				harga_lahan='$harga_lahan',
                lat='$lat',
                lng='$lng',
                warna='$warna',
                area='$area' 
            WHERE kode_alternatif='$_GET[ID]'");          
        set_msg('Alternatif berhasil diubah!');
    	redirect_js("index.php?m=alternatif");    
    }         
} else if ($act=='alternatif_hapus'){
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='$_GET[ID]'");
	set_msg('Alternatif berhasil dihapus!');
    header("location:index.php?m=alternatif");
}

elseif($mod=='rel_kriteria'){
    $ID1 = $_POST['ID1'];
    $ID2 = $_POST['ID2'];
    $nilai = abs($_POST['nilai']);
    
    if($ID1==$ID2 && $nilai<>1){
        print_msg('Kriteria sama harus bernilai 1!');
    } else {        
        $db->query("UPDATE tb_rel_kriteria SET nilai=$nilai
            WHERE ID1='$ID1' AND ID2='$ID2'");               
        $db->query("UPDATE tb_rel_kriteria SET nilai=1/$nilai
            WHERE ID1='$ID2' AND ID2='$ID1'");
        print_msg('Data tersimpan!', 'success');
    }
}

/** sub */
elseif($mod=='sub_tambah'){         
    set_rules('kode_kriteria', 'Kriteria', 'required');
    set_rules('nama_sub', 'Nama', 'required');
    set_rules('nilai', 'Nilai', 'required');
    
    $kode_kriteria = $_POST['kode_kriteria'];
    $nilai = $_POST['nilai']; 
    $nama_sub = $_POST['nama_sub']; 
    
    if(run_validation()){
        $db->query("INSERT INTO tb_sub (kode_kriteria, nama_sub, nilai) 
            VALUES ('$kode_kriteria', '$nama_sub', '$nilai')");
        set_msg('Sub kriteria berhasil ditambah!');
        redirect_js("index.php?m=sub");       
    } 
} else if($mod=='sub_ubah'){     
    set_rules('nama_sub', 'Nama', 'required');
    set_rules('nilai', 'Nilai', 'required');
    
    $kode_kriteria = $_POST['kode_kriteria'];
    $nilai = $_POST['nilai']; 
    $nama_sub = $_POST['nama_sub']; 
    
    if(run_validation()){
        $db->query("UPDATE tb_sub SET nama_sub='$nama_sub', nilai='$nilai' WHERE kode_sub='$_GET[ID]'");
        set_msg('Sub kriteria berhasil diubah!');
        redirect_js("index.php?m=sub"); 
    }        
} else if ($act=='sub_hapus'){
    $db->query("DELETE FROM tb_sub WHERE kode_sub='$_GET[ID]'");
	set_msg('Sub kriteria berhasil dihapus!');
    header("location:index.php?m=sub");
}

/** kriteria */
else if($mod=='kriteria_tambah'){
    set_rules('kode_kriteria', 'Kode Kriteria', 'required|is_unique[tb_kriteria.kode_kriteria]');
    set_rules('nama_kriteria', 'Nama Kriteria', 'required');
    set_rules('atribut', 'Atribut', 'required');
    
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $atribut = $_POST['atribut'];
    
    if(run_validation()){
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria, atribut) 
                VALUES ('$kode_kriteria', '$nama_kriteria', '$atribut')");  
                
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) 
            SELECT '$kode_kriteria', kode_kriteria, 1 FROM tb_kriteria");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) 
            SELECT kode_kriteria, '$kode_kriteria', 1 FROM tb_kriteria WHERE kode_kriteria<>'$kode_kriteria'");
            
        $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_sub) 
            SELECT kode_alternatif, '$kode_kriteria', -1  FROM tb_alternatif");
            
        set_msg('Data kriteria berhasil ditambah!');        
        redirect_js("index.php?m=kriteria");
    }   
} else if($mod=='kriteria_ubah'){    
    set_rules('nama_kriteria', 'Nama Kriteria', 'required');
    set_rules('atribut', 'Atribut', 'required');
    
    $nama_kriteria = $_POST['nama_kriteria'];
    $atribut = $_POST['atribut'];
    
    if(run_validation()){
        $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama_kriteria', atribut='$atribut' WHERE kode_kriteria='$_GET[ID]'");
        set_msg('Data kriteria berhasil diubah!');            
		redirect_js("index.php?m=kriteria");
    }       
} else if ($act=='kriteria_hapus'){
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
     
    $db->query("DELETE FROM tb_rel_kriteria WHERE ID1='$_GET[ID]' OR ID2='$_GET[ID]'"); 
    $db->query("DELETE FROM tb_sub WHERE kode_kriteria='$_GET[ID]'");
      
    set_msg('Data kriteria berhasil dihapus!');    
    header("location:index.php?m=kriteria");
}