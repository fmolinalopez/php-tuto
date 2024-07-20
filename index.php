<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL: ch = cURl handle;
$ch = curl_init(API_URL);
// Indicar que queremos recivir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejcutar la petición
    y guardamos el resultado
*/
$result = curl_exec($ch);
// Una alternativa sería utilizar file_get_contents
// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una API
$data = json_decode($result, true);

curl_close($ch);
?>

<head>
    <meta charset="UTF-8">
    <title>La próxima película de Marvel</title>
    <!-- Centered viewport --> 
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <pre style="font-size: 8px; overflow: scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente película es: <?= $data["following_production"]["title"]?></p>
    </hgroup>

    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"] ?>"
        style="border-radius: 16px;">
    </section>

</main>

<h1>
    <?= $name ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>