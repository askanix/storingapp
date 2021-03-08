<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
if(empty($attractie))
{
    $errors[] = 'Vul de attracie naam in';
}
$capaciteit = $_POST['capaciteit']; 
if(!is_numeric($attractie))
{
    $errors[] = "vul voor capaciteit een geldig getal in";
}
$melder = $_POST['melder'];
if(empty($melder))
{
    $errors = 'noteer hier uw naam zodat we weten wie de melder van deze ticket is';
}
$type = $_POST['type'];
if(empty($type))
{
    $errors = 'kies een type attractie';
}
if(isset($_POST['prioriteit']))
    {
        $prioriteit = True;
    }
    else
    {
        $prioriteit = false;
    }
$overige = $_POST['overige'];

if(isset($errors))
{
    var_dump($errors);
    die();
}
// echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once 'conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige_info) 
VALUES(:attractie, :capaciteit, :melder, :type, :prioriteit, :overige_info)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":capaciteit" => $capaciteit,
    ":melder" => $melder,
    ":type" => $type,
    ":prioriteit" => $prioriteit,
    ":overige_info" => $overige
]);

//ga terug naar index
header("Location: ../meldingen/index.php?msg=Melding opgeslagen");