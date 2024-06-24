<?php
function getSongDetailsById($conn, $id)
{
    $sql = "SELECT Song.Title as title, Song.ReleaseDate as releasedate, Song.Url AS link, Artist.ArtistName AS artist, Artist.BIO AS bio, Lyrics.Content AS lyrics
FROM Song
JOIN Artist ON Song.ArtistID = Artist.ArtistID
JOIN Lyrics ON Song.SongID = Lyrics.SongID
WHERE Song.SongID =" . $id;
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}


function listSongs($conn)
{
    $sql = "SELECT * FROM Song";
    $result = $conn->query($sql);
    $songs = $result->fetch_all(MYSQLI_ASSOC);
    return $songs;
}

?>
