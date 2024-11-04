<?php
// src/models/UserProfile.php

require_once __DIR__ . '/Database.php';

class UserProfile
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($user_id, $date_of_birth = null, $place_of_birth = null, $residence = null, $gender = 'other', $marital_status = 'single', $blood_type = null)
    {
        $sql = "INSERT INTO user_profiles (user_id, date_of_birth, place_of_birth, residence, gender, marital_status, blood_type)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$user_id, $date_of_birth, $place_of_birth, $residence, $gender, $marital_status, $blood_type]);
    }

    public function find($user_id)
    {
        $sql = "SELECT * FROM user_profiles WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $userId, array $profileData)
    {
        // Prepare the SQL statement with named placeholders
        $sqlProfile = "INSERT INTO user_profiles (
            user_id, 
            date_of_birth, 
            place_of_birth, 
            residence, 
            gender, 
            marital_status, 
            blood_type, 
            school, 
            university, 
            additional_education, 
            additional_organization, 
            profession, 
            workplace, 
            languages, 
            driving_license, 
            about_me
        ) VALUES (
            :user_id, :date_of_birth, :place_of_birth, :residence, 
            :gender, :marital_status, :blood_type, :school, 
            :university, :additional_education, :additional_organization, 
            :profession, :workplace, :languages, :driving_license, 
            :about_me
        )
        ON DUPLICATE KEY UPDATE 
            date_of_birth = VALUES(date_of_birth), 
            place_of_birth = VALUES(place_of_birth), 
            residence = VALUES(residence), 
            gender = VALUES(gender), 
            marital_status = VALUES(marital_status), 
            blood_type = VALUES(blood_type), 
            school = VALUES(school), 
            university = VALUES(university), 
            additional_education = VALUES(additional_education), 
            additional_organization = VALUES(additional_organization), 
            profession = VALUES(profession), 
            workplace = VALUES(workplace), 
            languages = VALUES(languages), 
            driving_license = VALUES(driving_license), 
            about_me = VALUES(about_me)";

        // Prepare the statement
        $stmtProfile = $this->conn->prepare($sqlProfile);

        // Prepare the values with null as default for optional fields
        $profileValues = [
            ':user_id' => $userId,
            ':date_of_birth' => $profileData['date_of_birth'] ?? null,
            ':place_of_birth' => $profileData['place_of_birth'] ?? null,
            ':residence' => $profileData['residence'] ?? null,
            ':gender' => $profileData['gender'] ?? null,
            ':marital_status' => $profileData['marital_status'] ?? null,
            ':blood_type' => $profileData['blood_type'] ?? null,
            ':school' => $profileData['school'] ?? null,
            ':university' => $profileData['university'] ?? null,
            ':additional_education' => $profileData['additional_education'] ?? null,
            ':additional_organization' => $profileData['additional_organization'] ?? null,
            ':profession' => $profileData['profession'] ?? null,
            ':workplace' => $profileData['workplace'] ?? null,
            ':languages' => $profileData['languages'] ?? null,
            ':driving_license' => $profileData['driving_license'] ?? null,
            ':about_me' => $profileData['about_me'] ?? null,
        ];

        try {
            // Execute the prepared statement with named parameters
            $stmtProfile->execute($profileValues);
        } catch (PDOException $e) {
            // Handle errors, e.g., log them
            error_log("Failed to update profile: " . $e->getMessage());
            throw new Exception("Unable to update profile, please try again later.");
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
