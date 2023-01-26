<?php
include "./vendor/autoload.php";
require_once "./_config/_database/_connect.php";

use Jajo\JSONDB;


function insertInUserTable($count = 0,)
{
    $faker = Faker\Factory::create('fr_FR');
    $query = "INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `date_dn`) ";

    $arr = [];

    for ($i = 0; $i < 20; $i++) {
        $result = "('" . $faker->lastname() . "','" . $faker->firstname() . "','" . date('Y-m-d H:i:s') . "')";
        $arr[] = [$i, $result];
    }
    var_dump($query, $arr);

    $json_db = new JSONDB("./datas");
    $json_db->insert(
        'users.json',
        [
            $query => $arr,

        ]
    );
}


function getJsonQuery()
{
    $json_db = new JSONDB("./datas");
    $users = $json_db->select( '*' )
	->from( 'users.json' )
	->get();
   dump($users);
}

getJsonQuery();