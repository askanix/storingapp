<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie))
{
    $errors[] = "vul de attractie-naam in.";
}
//type
$type = $_POST['type'];
if(empty($attractie))
{
    $errors[] = "geef hier aan bij wat voor soort attractie het probleem zich voordoen";
}
//capaciteit
$capaciteit = $_POST['capaciteit']; 
if(!is_numeric($capaciteit))
{
    $errors[] = "vul voor de capaciteit een geldig getal in.";
}
//prioriteit
$prioriteit = isset($_POST['prioriteit']);
// {
//     $prioriteit = true;
// }
// else
// {
//     $prioriteit = false;
// }
//melder
$melder = $_POST['melder'];
if(empty($melder))
{
    $errors[] = "vul hier uw naam in";
}
//overige
$overige = $_POST['overige'];

// if(isset($errors))
{
    var_dump($prioriteit);
    die();
}


echo $attractie . " / " . $type . " / " . $capaciteit.  " / " . $prioriteit. " / " . $melder. " / " . $overige ;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen(attractie, type, capaciteit, prioriteit, melder, overige_info)
VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit"=> $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overige
]);
header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
