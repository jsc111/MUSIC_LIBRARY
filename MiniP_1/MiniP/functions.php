<?php

// Function to fetch song details by ID
function getSongDetassilsById($id)
{
    // This is a placeholder; replace with your actual data retrieval logic
    $songs = [
        1 => [
            'title' => 'Song 1',
            'artist' => 'Artist 1',
            'rating' => '4.5/5',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'lyrics' => "Verse 1\nThis is the first verse of the song.\n\nChorus\nThis is the chorus of the song."
        ],
        2 => [
            'title' => 'Song 2',
            'artist' => 'Artist 2',
            'rating' => '4.2/5',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'lyrics' => "Verse 1\nThis is the first verse of the song.\n\nChorus\nThis is the chorus of the song."
        ],
        3 => [
            'title' => 'Song 2',
            'artist' => 'Artist 2',
            'rating' => '4.2/5',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'lyrics' => "Verse 1\nThis is the first verse of the song.\n\nChorus\nThis is the chorus of the song."
        ],
        // Add more songs as needed
    ];

    return isset($songs[$id]) ? $songs[$id] : null;
}

?>
