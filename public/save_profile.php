<?php
// save_profile.php

require_once __DIR__ . '../../src/models/User.php';
require_once __DIR__ . '../../src/models/Interest.php';
require_once __DIR__ . '../../src/models/UserProfile.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data

    $userId = $_POST['user_id'];

    // Construct the date of birth
    if (!empty($_POST['year_of_birth']) && !empty($_POST['month_of_birth']) && !empty($_POST['birthday'])) {
        $dateOfBirth = sprintf('%04d-%02d-%02d', $_POST['year_of_birth'], $_POST['month_of_birth'], $_POST['birthday']);
    } else {
        $dateOfBirth = null; // or set to a default date if necessary
    }
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Retrieve other profile fields from the form
    $placeOfBirth = $_POST['place_of_birth'];
    $residence = $_POST['residence'] ?? null; // Add more fields as necessary
    $gender = $_POST['gender'] ?? null; // Default value
    $maritalStatus = $_POST['marital_status'] ?? null; // Default value
    $bloodType = $_POST['blood_type'] ?? null; // Add blood type field if present
    $school = $_POST['school'] ?? null; // Add school field if present
    $university = $_POST['university'] ?? null; // Add university field if present
    $additionalEducation = $_POST['additional_education'] ?? null; // Add if needed
    $additionalOrganization = $_POST['additional_organization'] ?? null; // Add if needed
    $profession = $_POST['profession'] ?? null; // Add profession field if present
    $workplace = $_POST['workplace'] ?? null; // Add workplace field if present
    $languages = $_POST['languages'] ?? null; // Add languages field if present
    $drivingLicense = $_POST['driving_license'] ?? null; // Convert to boolean
    $aboutMe = $_POST['about_me'] ?? null; // Add about me field if present

    // Prepare profile data array
    $profileData = [
        'date_of_birth' => $dateOfBirth,
        'place_of_birth' => $placeOfBirth,
        'residence' => $residence,
        'gender' => $gender,
        'marital_status' => $maritalStatus,
        'blood_type' => $bloodType,
        'school' => $school,
        'university' => $university,
        'additional_education' => $additionalEducation,
        'additional_organization' => $additionalOrganization,
        'profession' => $profession,
        'workplace' => $workplace,
        'languages' => $languages,
        'driving_license' => $drivingLicense,
        'about_me' => $aboutMe,
    ];

    // Prepare interests data (example fields; adjust as necessary)
    $interestsData = [
        'user_id' => $userId,
        'about_me' => $_POST['about_me'] ?? null,
        'favorite_shows' => $_POST['favorite_shows'] ?? null,
        'favorite_musics' => $_POST['favorite_musics'] ?? null,
        'favorite_movies' => $_POST['favorite_movies'] ?? null,
        'favorite_books' => $_POST['favorite_books'] ?? null,
        'games' => $_POST['games'] ?? null,
        'favorite_bloggers' => $_POST['favorite_bloggers'] ?? null,
        'computer_games' => $_POST['computer_games'] ?? null,
        'sports' => $_POST['sports'] ?? null,
        'color' => $_POST['color'] ?? null,
        'figure' => $_POST['figure'] ?? null,
        'religion' => $_POST['religion'] ?? null,
        'hobby' => $_POST['hobby'] ?? null,
        'clothing_style' => $_POST['clothing_style'] ?? null,
        'favorite_vehicle' => $_POST['favorite_vehicle'] ?? null,
        'favorite_os' => $_POST['favorite_os'] ?? null,
        'bad_habits' => $_POST['bad_habits'] ?? null,
        'personality_type' => $_POST['personality_type'] ?? null,
        'what_add_education' => $_POST['what_add_education'] ?? null,
        'money_or_happiness' => $_POST['money_or_happiness'] ?? null,
    ];

    $userData = [
        'user_id' => $userId,
        'phone' => $_POST['phone'] ?? null,
        'email' => $_POST['email'] ?? null,
        'first_name' => $_POST['first_name'] ?? null,
        'last_name' => $_POST['last_name'] ?? null,
    ];


    // Create User object and update profile

    try {
        $user = new User();
        $interest = new Interest();
        $profile = new UserProfile();

        // Start transaction
        $user->beginTransaction();
        $user->update($userId, $userData);
        $user->commit();

        $profile->beginTransaction();
        $profile->update($userId, $profileData);
        $profile->commit();

        // Update or create user interests
        $interest->beginTransaction();
        $interest->update($interestsData);
        $interest->commit();

        // Commit the transaction

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } catch (Exception $e) {
        // Rollback the transaction if something failed
        $user->rollBack();
        echo "Failed to update profile: " . $e->getMessage();
    }
}
