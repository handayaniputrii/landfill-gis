<div class="page-header">
    <h1>Hasil Perhitungan </h1>
</div>
<?php 

$row = $db->get_row("SELECT * FROM tb_rel_alternatif 
    WHERE kode_sub NOT IN (SELECT kode_sub FROM tb_sub)");
if($row){
    print_msg('Nilai alternatif belum diatur!');
} else {
     include 'hitung_hasil.php';   
}
