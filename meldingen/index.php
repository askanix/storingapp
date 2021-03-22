<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>
    
    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <!-- <div style="height: 300px; background: #ededed; display: flex; justify-content: center; align-items: center; color: #666666;">(hier komen de storingsmeldingen)</div> -->
        <?php
        require_once '../backend/conn.php';
        $query = "SELECT * FROM meldingen";
        $statement = $conn->prepare($query);
        $statement->execute();
        $meldingen = $statement->fetchALL(PDO::FETCH_ASSOC);
        ?>

        <!-- <pre><?php print_r($meldingen) ?></pre> -->

         <!-- <?php 
        foreach($meldingen as $item)
        
        {
            echo "<p>" . $item['attractie'] . ", type = " . $item['type'] . ", capaciteit = " . $item['capaciteit'] . ", prioriteit = " . $item['prioriteit'] . ", melder = " . $item['melder'] . "</p>";
        }
        ?> -->

        <table>
            <tr>
                <th>attractie</th>
                <th>type</th>
                <th>capaciteit</th>
                <th>prioriteit</th>
                <th>melder</th>
                <th>aanpassen</th>
            </tr>
        

        <?php foreach($meldingen as $melding):?>
        <tr>
            <td><?php echo $melding['attractie']; ?></td>
            <td><?php echo $melding['type']; ?></td>
            <td><?php echo $melding['capaciteit']; ?></td>
            <td><?php echo $melding['prioriteit']; ?></td>
            <td><?php echo $melding['melder']; ?></td>
             <td><a href="edit.php?id=<?php echo $melding['id']; ?>">aanpassen</a></td>
        </tr>
        <?php endforeach; ?>

        </table>


    </div>  

</body>

</html>