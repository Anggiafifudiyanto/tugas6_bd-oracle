<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_kelas=$_GET['id_kelas'];
	$sql="DELETE FROM kelas WHERE ID_KELAS = '$id_kelas'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:kelas.php');
}

elseif ($act=='input'){

 	$id_kelas = $_POST["id_kelas"];
 	$nama_kelas = $_POST["nama_kelas"];
 	$ruang_kelas = $_POST["ruang_kelas"];

   $sql="insert into kelas values ('$id_kelas','$nama_kelas','$ruang_kelas') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:kelas.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_kelas = $_POST["id_kelas"];
	$nama = $_POST["nama"];
 	$alamat = $_POST["alamat"];

	$sql = "UPDATE kelas SET NAMA_kelas='$nama', ALAMAT_kelas='$alamat' WHERE ID_kelas='$id_kelas'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
	header('location:kelas.php');
	}
	else {echo "gagal";}

}
?>
