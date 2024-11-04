<?php
// src/models/Interest.php

require_once __DIR__ . '/Database.php';

class Interest
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($user_id, $data)
    {
        $sql = "INSERT INTO interests (user_id, about_me, favorite_shows, favorite_musics, favorite_movies, favorite_books, games, favorite_bloggers, computer_games, sports, color, figure, religion, hobby, clothing_style, favorite_vehicle, favorite_os, bad_habits, personality_type, what_add_education, money_or_happiness)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_merge([$user_id], array_values($data)));
    }

    public function find($user_id)
    {
        $sql = "SELECT * FROM interests WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(array $interestsData)
    {
        $sqlInterests = "INSERT INTO interests (
        user_id, about_me, favorite_shows, favorite_musics,
        favorite_movies, favorite_books, games, favorite_bloggers,
        computer_games, sports, color, figure, religion, hobby,
        clothing_style, favorite_vehicle, favorite_os, bad_habits,
        personality_type, what_add_education, money_or_happiness)
    VALUES (
        :user_id, :about_me, :favorite_shows, :favorite_musics,
        :favorite_movies, :favorite_books, :games, :favorite_bloggers,
        :computer_games, :sports, :color, :figure, :religion, :hobby,
        :clothing_style, :favorite_vehicle, :favorite_os, :bad_habits,
        :personality_type, :what_add_education, :money_or_happiness)
    ON DUPLICATE KEY UPDATE
        about_me = VALUES(about_me),
        favorite_shows = VALUES(favorite_shows),
        favorite_musics = VALUES(favorite_musics),
        favorite_movies = VALUES(favorite_movies),
        favorite_books = VALUES(favorite_books),
        games = VALUES(games),
        favorite_bloggers = VALUES(favorite_bloggers),
        computer_games = VALUES(computer_games),
        sports = VALUES(sports),
        color = VALUES(color),
        figure = VALUES(figure),
        religion = VALUES(religion),
        hobby = VALUES(hobby),
        clothing_style = VALUES(clothing_style),
        favorite_vehicle = VALUES(favorite_vehicle),
        favorite_os = VALUES(favorite_os),
        bad_habits = VALUES(bad_habits),
        personality_type = VALUES(personality_type),
        what_add_education = VALUES(what_add_education),
        money_or_happiness = VALUES(money_or_happiness)";

        $stmtInterests = $this->conn->prepare($sqlInterests);

        $interestsValues = [
            ':user_id' => $interestsData['user_id'],
            ':about_me' => $interestsData['about_me'] ?? null,
            ':favorite_shows' => $interestsData['favorite_shows'] ?? null,
            ':favorite_musics' => $interestsData['favorite_musics'] ?? null,
            ':favorite_movies' => $interestsData['favorite_movies'] ?? null,
            ':favorite_books' => $interestsData['favorite_books'] ?? null,
            ':games' => $interestsData['games'] ?? null,
            ':favorite_bloggers' => $interestsData['favorite_bloggers'] ?? null,
            ':computer_games' => $interestsData['computer_games'] ?? null,
            ':sports' => $interestsData['sports'] ?? null,
            ':color' => $interestsData['color'] ?? null,
            ':figure' => $interestsData['figure'] ?? null,
            ':religion' => $interestsData['religion'] ?? null,
            ':hobby' => $interestsData['hobby'] ?? null,
            ':clothing_style' => $interestsData['clothing_style'] ?? null,
            ':favorite_vehicle' => $interestsData['favorite_vehicle'] ?? null,
            ':favorite_os' => $interestsData['favorite_os'] ?? null,
            ':bad_habits' => $interestsData['bad_habits'] ?? null,
            ':personality_type' => $interestsData['personality_type'] ?? null,
            ':what_add_education' => $interestsData['what_add_education'] ?? null,
            ':money_or_happiness' => $interestsData['money_or_happiness'] ?? null,
        ];

        try {
            $stmtInterests->execute($interestsValues);
        } catch (PDOException $e) {
            error_log("Failed to update interests: " . $e->getMessage());
            throw new Exception("Unable to update interests, please try again later.");
        }
    }
    public function beginTransaction()
    {
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        $this->conn->commit();
    }

    public function rollBack()
    {
        $this->conn->rollBack();
    }

}
