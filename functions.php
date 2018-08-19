<?php
error_reporting(~E_NOTICE & ~E_DEPRECATED);
session_start();  // memulai session

include 'config.php';
include'includes/db.php'; // memanggil file ez_sql_mysqli
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']); // membuat objek $db utk koneksi ke db
include'includes/general.php'; // memanggil file general
include'includes/paging.php'; // memanggil file paging

$mod = $_GET['m']; // menangkap url m
$act = $_GET['act']; // menangkap url act

$JARAK = array(
    'SUNGAI' => array(
        'kode' => 'C07',
        'lat' => -2.992218,
        'lng' => 104.762210,
        'sub' => array(26, 25),
    ),
	'BANDARA' => array(
        'kode' => 'C09',
        'lat' => -2.894028,
        'lng' => 104.701659,
        'sub' => array(30, 29),
    ),
    'PUSAT' => array(
        'kode' => 'C10',
        'lat' => -2.987843, 
        'lng' => 104.760250,
        'sub' => array(33, 32, 31),
    ),
);


$nRI = array (
	1=>0,
	2=>0,
	3=>0.58,
	4=>0.9,
	5=>1.12,
	6=>1.24,
	7=>1.32,
	8=>1.41,
	9=>1.46,
	10=>1.49,
    11=>1.51,
    12=>1.48,
    13=>1.56,
    14=>1.57,
    15=>1.59
);

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif ORDER BY kode_alternatif");
foreach($rows as $row){
    $ALTERNATIF[$row->kode_alternatif] = $row->nama_alternatif;
}

$rows = $db->get_results("SELECT * FROM tb_kriteria ORDER BY kode_kriteria");
foreach($rows as $row){
    $KRITERIA[$row->kode_kriteria] = $row;
}

function get_level_option($selected = ''){
    $arr = array(
        'admin'=>'Admin', 
        'pimpinan'=>'Pimpinan',
    );   
    foreach($arr as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}


$CRIPS = get_crips();

function get_rel_kriteria(){
    global $db;
    $rows = $db->get_results("SELECT ID1, ID2, nilai FROM tb_rel_kriteria ORDER BY ID1, ID2");
    $arr = array();
    foreach($rows as $row){
        $arr[$row->ID1][$row->ID2] = $row->nilai;
    }
    return $arr;
}

function get_rank($array){
    $data = $array;
    arsort($data); // value descending
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}

function get_crips(){
    global $db;
    $rows = $db->get_results("SELECT * FROM tb_sub ORDER BY kode_sub");
    $data= array();
    foreach($rows as $row){
        $data[$row->kode_sub] = $row;
    }
    return $data;
}

function get_kriteria_option($selected = 0){
    global $KRITERIA;        
    foreach($KRITERIA as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->nama_kriteria</option>";
        else
            $a.="<option value='$key'>$value->nama_kriteria</option>";
    }
    return $a;
}

function get_atribut_option($selected = ''){
    $atribut = array('max'=>'Maksimasi', 'min'=>'Minimasi');
    $a.="<option value='' selected>Pilih Atribut</option>";
    foreach($atribut as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$value</option>";
        else
            $a.= "<option value='$key'>$value</option>";
    }
    return $a;
}

function AHP_get_nilai_option($selected = ''){
    $nilai = array(
        '1' => 'Sama penting dengan',
        '2' => 'Mendekati sedikit lebih penting dari',
        '3' => 'Sedikit lebih penting dari',
        '4' => 'Mendekati lebih penting dari',
        '5' => 'Lebih penting dari',
        '6' => 'Mendekati sangat penting dari',
        '7' => 'Sangat penting dari',
        '8' => 'Mendekati mutlak dari',
        '9' => 'Mutlak sangat penting dari',
    );
    foreach($nilai as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$key - $value</option>";
        else
            $a.= "<option value='$key'>$key - $value</option>";
    }
    return $a;
}

function get_crips_option($kriteria, $selected = 0){
    global $db;
    $rows = $db->get_results("SELECT kode_sub, nilai, nama_sub FROM tb_sub WHERE kode_kriteria='$kriteria' ORDER BY kode_sub");    
    foreach($rows as $row){
        if($row->kode_sub==$selected)
            $a.="<option value='$row->kode_sub' selected>$row->nama_sub</option>";
        else
            $a.="<option value='$row->kode_sub'>$row->nama_sub</option>";
    }
    return $a;
}

function get_rel_alternatif(){  
    global $db;
    $rows = $db->get_results("SELECT a.kode_alternatif, k.kode_kriteria, c.kode_sub
        FROM tb_alternatif a
        	INNER JOIN tb_rel_alternatif ra ON ra.kode_alternatif=a.kode_alternatif
        	INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria
        	LEFT JOIN tb_sub c ON c.kode_sub=ra.kode_sub        
        ORDER BY a.kode_alternatif, k.kode_kriteria");
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->kode_sub;
    }
    return $data;
}

function get_rel_alternatif_nilai($data){
    global $CRIPS;

    $arr = array();
    foreach($data as $key => $val){
        foreach($val as $k => $v){
            $arr[$key][$k] = $CRIPS[$v]->nilai;
        }
    }
    return $arr;
}

function get_moora_normal($data){
    $arr = array();
    $kuadrat = array();

    foreach($data as $key => $val){
        foreach($val as $k => $v){
            $kuadrat[$k]+= ($v * $v);
        }
    }

    foreach($data as $key => $val){
        foreach($val as $k => $v){
            $arr[$key][$k] = $v / sqrt($kuadrat[$k]);
        }
    }
    return $arr;
}

function get_normal_terbobot($array){
    global $KRITERIA;
    $data = array();

    foreach($array as $key => $value){
        foreach($value as $k => $v){
            $data[$key][$k] = $v * $KRITERIA[$k]->bobot;
        }
    }

    return $data;
}

function get_total($normal){
    global $KRITERIA;
    $arr = array();
    foreach($normal as $key => $val){
        foreach($val as $k => $v){
            $arr[$key]+= $KRITERIA[$k]->atribut=='max' ? $v : $v * -1;
        }
    }
    return $arr;
}

function get_kolom_total($matriks = array()){
    $total = array();        
    foreach($matriks as $key => $value){
        foreach($value as $k => $v){
            $total[$k]+=$v;
        }
    }  
    return $total;
} 

function AHP_normalize($matriks = array(), $total = array()){
          
    foreach($matriks as $key => $value){
        foreach($value as $k => $v){
            $matriks[$key][$k] = $matriks[$key][$k]/$total[$k];
        }
    }     
    return $matriks;       
}

function AHP_get_rata($normal){
    $rata = array();
    foreach($normal as $key => $value){
        $rata[$key] = array_sum($value)/count($value); 
    } 
    return $rata;   
}

function AHP_consistency_measure($matriks, $rata){
    $matriks = AHP_mmult($matriks, $rata);    
    foreach($matriks as $key => $value){
        $data[$key]=$value/$rata[$key];        
    }
    return $data;
}

function AHP_mmult($matriks = array(), $rata = array()){
	$data = array();
    
    $rata = array_values($rata);
    
	foreach($matriks as $key => $value){
        $no=0;
		foreach($value as $k => $v){
			$data[$key]+=$v*$rata[$no];       
            $no++;  
		}				
	}  
    
	return $data;
}