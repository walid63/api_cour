<?php 
include "./vendor/autoload.php";
require_once "./_config/_database/_connect.php"; 
use Jajo\JSONDB;
function generateMsg($arr)
{
    $faker = Faker\Factory::create('fr_FR');


$q = "INSERT INTO `utilisateur` 
(`id_user`, `nom`, `prenom`, `date_dn`) 
VALUES 
('dupont', 'alain', '2023-01-24 00:49:54'), 
('Barthez', 'moustapha', '2023-01-24 00:49:54');";
/*date ('Y-m-d H:i:s')*/ 

$query = "INSERT INTO `utilisateur` (`contenu`, `id_user`, `titre`) ";



 $arr = [];

 for ($i=0; $i < 100; $i++) { 
    $result = "('".$faker->paragraph()."','".$faker->randomDigit()."','".$faker->word()."')";
    $arr[] = [$result];
    
 }
 dump($query,$arr);

 $json_db = new JSONDB( "./datas" );
 $json_db->insert( 'messages.json', 
	[ 
		$query => $arr, 
		
	]
);
 //print_r
}

function getJsonQuery()
{
    $json_db = new JSONDB("./datas");
    $users = $json_db->select( '*' )
	->from( 'messages.json' )
	->get();
   $arr = implode($users);
   print_r($users);
}

//getJsonQuery();

$array = file_get_contents("./datas/messages.json");

$display = json_decode($array,true);


//print_r($display.'<br>');
$arr_req = [];

foreach ($display as $key => $value) {
    //print_r($value);
    $arr_req = $value;

}

echo implode(",",$arr_req);