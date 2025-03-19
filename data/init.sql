CREATE DATABASE SportsDB;
USE SportsDB;

-- Players Table
CREATE TABLE Players (
    Player_Id INT PRIMARY KEY,
    team_id VARCHAR(45),
    position VARCHAR(45),
    weight VARCHAR(45),
    height VARCHAR(45),
    nationality VARCHAR(45),
    date_of_birth VARCHAR(45),
    draft_year VARCHAR(45),
    draft_pick VARCHAR(45)
);

-- Users Table
CREATE TABLE Users (
    user_id INT PRIMARY KEY,
    username VARCHAR(45),
    email VARCHAR(45),
    password_hash VARCHAR(45),
    favourite_team_id VARCHAR(45),
    Players_Player_Id INT,
    Teams_team_id INT,
    FOREIGN KEY (Players_Player_Id) REFERENCES Players(Player_Id),
    FOREIGN KEY (Teams_team_id) REFERENCES Teams(team_id)
);

-- PlayerStats Table
CREATE TABLE PlayerStats (
    stat_id INT PRIMARY KEY,
    player_id INT,
    game_id INT,
    points VARCHAR(45),
    assists VARCHAR(45),
    rebounds VARCHAR(45),
    steals VARCHAR(45),
    blocks VARCHAR(45),
    turnovers VARCHAR(45),
    FOREIGN KEY (player_id) REFERENCES Players(Player_Id)
);

-- UserFavouritePlayer Table
CREATE TABLE UserFavouritePlayer (
    id INT PRIMARY KEY,
    user_id INT,
    player_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (player_id) REFERENCES Players(Player_Id)
);

-- Games Table
CREATE TABLE Games (
    game_id INT PRIMARY KEY,
    home_team_id VARCHAR(45),
    away_team_id VARCHAR(45),
    game_date VARCHAR(45),
    home_score VARCHAR(45),
    away_score VARCHAR(45)
);

-- Teams Table
CREATE TABLE Teams (
    team_id INT PRIMARY KEY,
    location VARCHAR(45),
    arena VARCHAR(45)
);
