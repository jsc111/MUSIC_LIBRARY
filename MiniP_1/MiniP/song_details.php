<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Details</title>
    <link rel="stylesheet" href="s_d.css">
    
</head>

<body>
    <header>
        <h1>Song Details</h1>
    </header>

    <div>
        <main>
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

            // Retrieve song details based on the song ID in the URL
            $songId = isset($_GET['song']) ? $_GET['song'] : 1; // Default to song 1 if not provided
            
            // Fetch song details from the function
            $songDetails = getSongDetailsById($conn, $songId);
            $conn->close();
            //var_dump($songDetails);
            ?>

            <div class="song-details">
                <h2>
                    <?php echo $songDetails['title']; ?>
                </h2>
                <p><a href="<?php echo $songDetails['link']; ?>">
                        Listen Music!
                    </a>
                </p>
                <p>Artist:
                    <?php echo $songDetails['artist']; ?>
                </p>
                <p>Release Date:
                    <?php echo $songDetails['releasedate']; ?>
                </p>
                <p>Bio:
                    <?php echo $songDetails['bio']; ?>
                </p>

                <div class='song-lyrics'>
                    <?php echo $songDetails['lyrics']; ?>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p>&copy;
            <?php echo date("Y"); ?> Song Details
        </p>
    </footer>
</body>

</html>
