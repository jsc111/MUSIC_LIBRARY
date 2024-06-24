CREATE DATABASE MINI_PROJ_1;
USE MINI_PROJ_1;
-- drop database mini_proj_1;
-- database connection to php
-- Drop User 'sammy'@'localhost';
 CREATE USER 'sammy'@'localhost' IDENTIFIED BY 'password';
 GRANT ALL PRIVILEGES ON * . * TO 'sammy'@'localhost' WITH GRANT OPTION;
CREATE TABLE User (
    UserID INT PRIMARY KEY AUTO_INCREMENT,
    Username VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    RegistrationDate DATE
);

CREATE TABLE Artist (
    ArtistID INT PRIMARY KEY AUTO_INCREMENT,
    ArtistName VARCHAR(255) NOT NULL,
    Genre VARCHAR(255),
    BIO TEXT
);

CREATE TABLE Song (
    SongID INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    ArtistID INT,
    ReleaseDate DATE,
    Genre VARCHAR(255),
    Url VARCHAR(255),
    FOREIGN KEY (ArtistID) REFERENCES Artist(ArtistID)
);

CREATE TABLE Lyrics (
    LyricsID INT PRIMARY KEY AUTO_INCREMENT,
    SongID INT,
    UserID INT,
    Content TEXT,
    DateUploaded DATE,
    FOREIGN KEY (SongID) REFERENCES Song(SongID),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

CREATE TABLE Review (
    ReviewID INT PRIMARY KEY AUTO_INCREMENT,
    SongID INT,
    UserID INT,
    Rating INT CHECK (Rating >= 1 AND Rating <= 5),
    Comment TEXT,
    DatePosted DATE,
    FOREIGN KEY (SongID) REFERENCES Song(SongID),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);


INSERT INTO User (UserID, Username, Email, Password, RegistrationDate)
VALUES
(1, 'user1', 'user1@example.com', 'password1', '2023-01-01'),
(2, 'user2', 'user2@example.com', 'password2', '2023-01-02');
select * from User;

INSERT INTO Artist (ArtistID, ArtistName, Genre, BIO)
VALUES
(1, 'Ed Sheeran', 'Pop', 'Edward Christopher Sheeran is an English singer, songwriter, and musician. He is widely recognized for his melodic pop and acoustic songs.'),
(2, 'Adele', 'Soul', 'Adele Laurie Blue Adkins is an English singer and songwriter. With a voice that captures the heart, she is known for her powerful and emotive ballads.'),
(3, 'Imagine Dragons', 'Rock', 'Imagine Dragons is an American pop rock band known for their energetic and anthemic sound. They gained widespread popularity with hits like "Radioactive" and "Demons".'),
(4, 'Taylor Swift', 'Pop', 'Taylor Alison Swift is an American singer-songwriter known for her narrative songwriting. She has won numerous awards and is one of the best-selling music artists.'),
(5, 'Bruno Mars', 'R&B', 'Bruno Mars is an American singer, songwriter, and record producer. His versatile musical style incorporates elements of R&B, pop, funk, and reggae.'),
(6, 'Coldplay', 'Alternative', 'Coldplay is a British rock band with a distinctive sound blending rock, pop, and electronic elements. They are known for hits like "Fix You" and "Viva la Vida".'),
(7, 'Beyoncé', 'R&B', 'Beyoncé Giselle Knowles-Carter is an American singer, actress, and producer. She is known for her powerful vocals and contributions to R&B and pop music.'),
(8, 'Eminem', 'Hip Hop', 'Eminem, also known as Slim Shady, is an American rapper, songwriter, and record producer. He is one of the best-selling music artists and is known for his lyrical prowess.'),
(9, 'Katy Perry', 'Pop', 'Katy Perry is an American singer and songwriter known for her catchy pop songs and colorful visuals. She has achieved commercial success with hits like "Firework" and "Roar".'),
(10, 'The Weeknd', 'R&B', 'The Weeknd, Abel Makkonen Tesfaye, is a Canadian singer and songwriter. He is known for his unique voice and blending of R&B, pop, and electronic music.');
select * from artist;

INSERT INTO Song (SongID, Title, ArtistID, ReleaseDate, Genre,Url)
VALUES
(1, 'Shape of You', 1, '2017-01-06', 'Pop','https://www.youtube.com/watch?v=JGwWNGJdvx8'),
(2, 'Hello', 2, '2015-10-23', 'Soul','https://www.youtube.com/watch?v=YQHsXMglC9A'),
(3, 'Radioactive', 3, '2012-11-29', 'Rock','https://www.youtube.com/watch?v=ktvTqknDobU'),
(4, 'Love Story', 4, '2008-09-12', 'Pop','https://www.youtube.com/watch?v=8xg3vE8Ie_E'),
(5, 'Uptown Funk', 5, '2014-11-10', 'R&B','https://www.youtube.com/watch?v=OPf0YbXqDm0'),
(6, 'Fix You', 6, '2005-09-05', 'Alternative','https://www.youtube.com/watch?v=k4V3Mo61fJM'),
(7, 'Single Ladies', 7, '2008-10-13', 'R&B','https://www.youtube.com/watch?v=4m1EFMoRFvY'),
(8, 'Lose Yourself', 8, '2002-10-28', 'Hip Hop','https://www.youtube.com/watch?v=_Yhyp-_hX2s'),
(9, 'Firework', 9, '2010-10-26', 'Pop','https://www.youtube.com/watch?v=QGJuMBdaqIw'),
(10, 'Blinding Lights', 10, '2019-11-29', 'R&B','https://www.youtube.com/watch?v=4NRXx6U8ABQ');
select * from song;

-- Inserting values into Lyrics table
INSERT INTO Lyrics (LyricsID, SongID, UserID, Content, DateUploaded)
VALUES
(1, 1, 1, 'The club isn''t the best place to find a lover, so the bar is where I go...', '2023-01-01'),
(2, 2, 2, 'Hello, it''s me. I was wondering if after all these years you''d like to meet...', '2023-01-02'),
(3, 3, 2, 'Whoa, oh, oh, oh, oh, whoa, oh, oh, oh, I''m radioactive, radioactive...', '2023-01-03'),
(4, 4, 1, 'We were both young when I first saw you. I close my eyes and the flashback starts...', '2023-01-04'),
(5, 5, 1, 'This hit, that ice cold Michelle Pfeiffer, that white gold...', '2023-01-05'),
(6, 6, 2, 'When you try your best but you don''t succeed...', '2023-01-06'),
(7, 7, 2, 'All the single ladies (all the single ladies). Now put your hands up...', '2023-01-07'),
(8, 8, 1, 'If you had one shot, one opportunity, to seize everything you ever wanted...', '2023-01-08'),
(9, 9, 2, 'Do you ever feel like a plastic bag, drifting through the wind, wanting to start again...', '2023-01-09'),
(10, 10, 1, 'I said, ooh, I''m blinded by the lights. No, I can''t sleep until I feel your touch...', '2023-01-10');
select * from lyrics;

-- Inserting values into Review table
INSERT INTO Review (ReviewID, SongID, UserID, Rating, Comment, DatePosted)
VALUES
(1, 1, 1, 4, 'Great song!', '2023-01-01'),
(2, 2, 2, 5, 'Awesome track!', '2023-01-02');
select * from review;

DELIMITER //
CREATE TRIGGER before_user_insert
BEFORE INSERT ON User
FOR EACH ROW
SET NEW.RegistrationDate = NOW();
//
DELIMITER ;

DELIMITER //

CREATE PROCEDURE AddSongWithLyrics(
    IN p_Title VARCHAR(255),
    IN p_ArtistID INT,
    IN p_ReleaseDate DATE,
    IN p_Genre VARCHAR(255),
    IN p_UserID INT,
    IN p_LyricsContent TEXT,
    IN p_Url varchar(255)
)
BEGIN
    DECLARE newSongID INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Handle exceptions here, you can log or print an error message
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error in AddSongWithLyrics procedure';
    END;

    -- Start a transaction
    START TRANSACTION;

    -- Insert new song
    INSERT INTO Song(Title, ArtistID, ReleaseDate, Genre,Url)
    VALUES (p_Title, p_ArtistID, p_ReleaseDate, p_Genre,p_Url);

    -- Get the newly inserted song ID
    SET newSongID = LAST_INSERT_ID();

    -- Insert lyrics for the new song
    INSERT INTO Lyrics(SongID, UserID, Content, DateUploaded)
    VALUES (newSongID, p_UserID, p_LyricsContent, NOW());

    -- Commit the transaction
    COMMIT;
END;

//

DELIMITER ;


DELIMITER //
CREATE PROCEDURE GetAllSongsWithLyrics()
BEGIN
    DECLARE done BOOLEAN DEFAULT FALSE;
    DECLARE songTitle VARCHAR(255);
    DECLARE lyricsContent TEXT;

    -- Declare cursor for selecting songs with lyrics
    DECLARE songCursor CURSOR FOR
    SELECT Song.Title, Lyrics.Content
    FROM Song
    JOIN Lyrics ON Song.SongID = Lyrics.SongID;

    -- Declare continue handler to exit loop when no more rows
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Open cursor
    OPEN songCursor;

    -- Fetch data into variables
    FETCH songCursor INTO songTitle, lyricsContent;

    -- Loop through the result set
    WHILE NOT done DO
        -- Process the data (you can modify this part based on your requirements)
        SELECT CONCAT('Song: ', songTitle, ', Lyrics: ', lyricsContent) AS Result;

        -- Fetch the next row
        FETCH songCursor INTO songTitle, lyricsContent;
    END WHILE;

    -- Close the cursor
    CLOSE songCursor;
END;
//
DELIMITER ; 	
