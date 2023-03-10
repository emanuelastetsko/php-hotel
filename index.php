<?php 

// Array multidimensionale con la lista degli hotel 
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Hotel</title>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Valutazione</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>

                <!-- Inizio ciclo -->
                <?php foreach($hotels as $hotel): ?>
                    
                <tr>

                    <!-- Stampa del valore di hotel con chiave "name" -->
                    <td><?php echo $hotel['name']; ?></td>

                    <!-- Stampa del valore di hotel con chiave "description" -->
                    <td><?php echo $hotel['description']; ?></td>

                    <!-- If che verifica se il valore booleano della chiave "parking ?? true oppure false -->
                    <td>
                        <?php if ($hotel['parking'] == true){
                            echo "Si";
                        }
                        else{
                            echo "No";
                        }
                        ?>
                    </td>

                    <!-- Stampa del valore di hotel con chiave "vote" -->
                    <td><?php echo $hotel['vote']; ?>/5 stelle </td>

                    <!-- Stampa del valore di hotel con chiave "distance_to_center" -->
                    <td><?php echo $hotel['distance_to_center']; ?>km</td>

                </tr>

                <!-- Fine ciclo -->
                <?php endforeach; ?>

            </tbody>
        </table>
    </body>
</html> 