<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('IMG_0232.JPG');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <header>
        <div id="search-bar">
            <form action="#" method="GET">
                <input type="text" name="search" placeholder="Search lyrics & more">
                <button type="submit">Search</button>
                <button class="add-button" type="button" onclick="window.location.href='add.php'">ADD</button>
            </form>
        </div>
        <h1>My Music Library</h1>
    </header>

    <section>
        <h2>Songs</h2>
        <table>
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Song Name</th>
                    <th>Release Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "sammy";
                $password = "password";
                $dbname = "MINI_PROJ_1";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // Include the functions file
                include 'dbtest.php';

                $songs = listSongs($conn);
                // Display songs in rows with three columns
                foreach ($songs as $song) {
                    echo "<tr>";
                    echo "<td><a href='song_details.php?song={$song["SongID"]}'>{$song["SongID"]}</a></td>";
                    echo "<td><a href='song_details.php?song={$song["SongID"]}'>{$song["Title"]}</a></td>";
                    echo "<td>{$song["ReleaseDate"]}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
    <!-- <div id="add-button-contianer">
            <button class="add-button" type="button" onclick="window.location.href='add.php'">ADD</button>
    </div> -->

    

</body>

</html>