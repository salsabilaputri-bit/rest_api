<?php

//$mahasiswa = [
// [ 
//      "nama" => "Salsabila Putri",
//      "nim" => "2217020024",
//      "email" => "salsabilaputri160603@gmail.com"
//  ],
//     [ 
//      "nama" => "Yogi",
//      "nim" => "0601524018",
//      "email" => "yogigumilar@gmail.com"
//  ]
//];
// test commit

$dbh = new PDO('mysql:host=localhost;dbname=mahasiswa', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;

?>
