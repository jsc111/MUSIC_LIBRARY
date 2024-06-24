<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Song with Lyrics</title>
    <link rel="stylesheet" href="addcs.css">
    <!-- Following is the code imported from google fonts for font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <!-- it ends here, also font-family: 'Playfair Display', serif; will be added in addcs.css file-->
</head>

<body>
    <header>
        <div>
            <!-- <a href="index.php">Home</a> -->
            <button class="home-button" type="button" onclick="window.location.href='index.php'">HOME</button>
        </div>
        <div>
            <h2 class="head-title">Add New Song With Lyrics</h2>
        </div>
    </header>


    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="artist_id">Artist:</label>
        <select id="artist_id" name="artist_id" required>
            <?php
            // Fetch artists from the database
            
            $servername = "localhost";
            $username = "sammy";
            $password = "password";
            $dbname = "MINI_PROJ_1";


            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT ArtistID, ArtistName FROM Artist");

            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"{$row['ArtistID']}\">{$row['ArtistName']}</option>";
            }

            $conn->close();
            ?>
        </select><br>

        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" required><br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre"><br>

        <label for="lyrics_content">Lyrics Content:</label>
        <textarea id="lyrics_content" name="lyrics_content" rows="4" required></textarea><br>

        <label for="url">URL of music:</label>
        <input type="text" id="url" name="link"><br>

        <input type="submit" value="Add Song">
    </form>

</body>

</html>

<?php

// Database connection parameters

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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $artistID = $_POST["artist_id"];
    $releaseDate = $_POST["release_date"];
    $genre = $_POST["genre"];
    $lyricsContent = $_POST["lyrics_content"];
    $link = $_POST["link"];
    $userID = 1;

    // Call the stored procedure
    $stmt = $conn->prepare("CALL AddSongWithLyrics(?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sississ", $title, $artistID, $releaseDate, $genre, $userID, $lyricsContent, $link);
    $stmt->execute();
    $stmt->close();

    echo "New song with lyrics added successfully";
}

// Close the connection
$conn->close();

?>