<?php

function str_angka($str)
{
    $value = str_replace(',', '', $str);
    return $value;
}

function str_uang($str,$inout)
{
    if($inout == TRUE){
        $value = str_replace('.', '', $str);
        $tampung= str_replace(',', '.', $str);
        return $tampung;
    }elseif($inout == FALSE){
        $value = str_replace('.', ',', $str);
        //$tampung= str_replace(',', '.', $str);
        return $tampung;
    }
}

function cek_pengguna($idr,$angka){
    if($idr != $angka ) {
        return redirect('404');
   }
}

function cek_nilai($param){
    if($param != NULL ) {
        return $param;
   }elseif($param == NULL){
       return 0;
   }
}

function replace_nilai($param){
    $result = str_replace('.', '', $param);
    $tampung = str_replace(',', '.', $result);
    // $param = preg_replace('/(\d+).(\d+)/', '$1,$2', $input); 
    return $tampung;
}

function replace_nilai_db($param){
    $result = str_replace('.', ',', $param);
    // $param = preg_replace('/(\d+).(\d+)/', '$1,$2', $input); 
    return $result;
}

function semester($int)
{
    switch ($int) {
        case 1:
            $semester='Semester I';
            break;
        case 2:
            $semester='Semester II';
            break;
    }
    return $semester;
}

function bulan($int)
{
    switch ($int) {
        case 1:
            $bulan='Januari';
            break;
        case 2:
            $bulan='Februari';
            break;
        case 3:
            $bulan='Maret';
            break;
        case 4:
            $bulan='April';
            break;
        case 5:
            $bulan='Mei';
            break;
        case 6:
            $bulan='Juni';
            break;
        case 7:
            $bulan='Juli';
            break;
        case 8:
            $bulan='Agustus';
            break;
        case 9:
            $bulan='September';
            break;
        case 10:
            $bulan='Oktober';
            break;
        case 11:
            $bulan='Nopember';
            break;
        case 12:
            $bulan='Desember';
            break;
    }
    
    return $bulan;
}

function bulan_var(){
    $variable = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus', 'September','Oktober', 'Nopember','Desember');
    return $variable;
}

function tahun_var(){
    $variable = array();
    for ($i = 2017; $i<=date('Y')+2;$i++){
        array_push($variable, $i);
    }
    return $variable;
}