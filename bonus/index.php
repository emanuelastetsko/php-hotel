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

// Filtro per il parcheggio, che di base è null, ma cambia al momento in cui viene passato un dato tramite GET 
$parkingFilter = null;
if(isset($_GET["parking"])){
    $parkingFilter = $_GET["parking"];
}

// Filtro per il voto, che di base è null, ma cambia al momento in cui viene passato un dato tramite GET 
$voteFilter = 0;
if(isset($_GET["vote"])){
    $voteFilter = $_GET["vote"];
}

// Array con gli hotel filtrati per la disponibilità di parcheggio e la valutazione 
$filteredHotels = [];
foreach ($hotels as $hotel) {

    // Variabile con valore booleano che permette di aggiungere gli hotel filtrati alla relativa lista
    $addHotel = true;

    // Condizione che controlla se il filtro sul parcheggio fallisce e se fallisce fa in modo che non venga aggiunto nessun hotel alla lista
    if( 
        (
            $parkingFilter == "1"
            &&
            $hotel["parking"] == false
        )
        ||
        (
            $parkingFilter == "0"
            &&
            $hotel["parking"] == true
        )
    ) {
        $addHotel = false;
    }

    // Condizione che controlla se il filtro sulla valutazione fallisce e se fallisce fa in modo che non venga aggiunto nessun hotel alla lista
    if ($hotel["vote"] < $voteFilter) {
        $addHotel = false;
    }

    // Se entrambe le condizioni di prima non si verificano allora si procede con l'aggiunta dell'hotel alla lista
    if ($addHotel == true) {
        $filteredHotels[] = $hotel;
    }
}

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
        <header>

            <!-- Form per richiesta dei dati -->
            <form action="" method="GET">

                <!-- Sezione per filtrare per presenza o meno del parcheggio -->
                <div class="m-2 pt-2">
                    <label for="parking-input" class="form-label">Parcheggio in struttura</label>
                    <select name="parking" id="parking-input" class="form-select">
                        <option value="" selected>Indifferente</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <!-- Sezione per filtrare per valutazione -->
                <div class="m-2 pt-2">
                    <label for="vote-input" class="form-label">Valutazione</label>
                    <select name="vote" id="vote-input" class="form-select">
                        <option value="" selected>Indifferente</option>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </div>

                <!-- Bottone per l'invio dei dati -->
                <button type="submit" class="mb-2 mx-2 btn btn-dark">Filtra</button>
            </form>

        </header>
        <main>
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
                    <?php foreach($filteredHotels as $hotel): ?>
                        
                    <tr>

                        <!-- Stampa del valore di hotel con chiave "name" -->
                        <td><?php echo $hotel['name']; ?></td>

                        <!-- Stampa del valore di hotel con chiave "description" -->
                        <td><?php echo $hotel['description']; ?></td>

                        <!-- If che verifica se il valore booleano della chiave "parking è true oppure false -->
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
                        <td><?php echo $hotel['vote']; ?> </td>

                        <!-- Stampa del valore di hotel con chiave "distance_to_center" -->
                        <td><?php echo $hotel['distance_to_center']; ?>km</td>

                    </tr>

                    <!-- Fine ciclo -->
                    <?php endforeach; ?>

                </tbody>

            </table>
        </main>
    </body>
</html> 