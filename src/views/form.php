<?php
// user_form.php
use services\UserService;

$userController = new UserService();
$user = $userController->getUserWithDetails(1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Form</title>
</head>
<body>

<div class="container account-hub-content">

    <div class="user-block">
        <div class="user-cover"></div>
        <div class="user-preview-info">
            <div class="user-short-description small">
                <div class="user-avatar-circle user-short-description-avatar">
                    <img class="user-avatar-circle-image"
                         src="https://localhost/wp-content/uploads/avatars/1/1673536642-bpfull.jpg" alt="user-avatar">
                    <div class="edit-avatar-btn">Редагувати</div>
                    <input type="file" id="avatar-input" class="hidden-input" accept="image/*">
                    <div class="user-avatar-circle-progress">
                        <svg viewBox="0 0 100 100" style="width: 90px; height: 90px;">
                            <path d="M 50,50 m 0,-47.5 a 47.5,47.5 0 1 1 0,95 a 47.5,47.5 0 1 1 0,-95" stroke="#262741"
                                  stroke-width="5" fill-opacity="0"></path>
                            <path d="M 50,50 m 0,-47.5 a 47.5,47.5 0 1 1 0,95 a 47.5,47.5 0 1 1 0,-95"
                                  stroke="url(#vk-avatar-gradient)" stroke-width="5" fill-opacity="0"
                                  style="stroke-dasharray: 298.493, 298.493; stroke-dashoffset: 248.744;"></path>
                        </svg>
                    </div>
                    <div class="user-avatar-circle-badge">
                        <div class="user-avatar-circle-badge-content">
                            <p class="user-avatar-circle-badge-content-text">2</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Контейнер для слайдера з іконками соціальних мереж -->
            <div class="user-box slider">
                <div class="user-box-content">
                    <form method="POST">
                        <div class="form-input small" style="display: flex; grid-column-gap: 20px;">
                            <label for="nickname">Ім’я користувача</label>
                            <input type="text" id="nickname" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>

                            <!-- Слайдер з іконками соціальних мереж -->
                            <nav class="section-navigation social">
                                <div id="section-navigation-slider"
                                     class="section-menu-wrap swiper-container swiper-container-initialized swiper-container-horizontal">
                                    <div class="section-menu swiper-wrapper">
                                        <a class="section-menu-item swiper-slide swiper-slide-active">
                                            <svg class="icon-facebook section-menu-item-icon">
                                                <use href="#svg-facebook"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Facebook</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide swiper-slide-next">
                                            <svg class="icon-instagram section-menu-item-icon">
                                                <use href="#svg-instagram"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Instagram</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-twitter section-menu-item-icon">
                                                <use href="#svg-twitter"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Twitter</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-telegram section-menu-item-icon">
                                                <use href="#svg-telegram"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Telegram</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-twitch section-menu-item-icon">
                                                <use href="#svg-twitch"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Twitch</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-youtube section-menu-item-icon">
                                                <use href="#svg-youtube"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Youtube</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-patreon section-menu-item-icon">
                                                <use href="#svg-patreon"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Patreon</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-discord section-menu-item-icon">
                                                <use href="#svg-discord"></use>
                                            </svg>
                                            <p class="section-menu-item-text">Discord</p>
                                        </a>
                                        <a class="section-menu-item swiper-slide">
                                            <svg class="icon-artstation section-menu-item-icon">
                                                <use href="#svg-artstation"></use>
                                            </svg>
                                            <p class="section-menu-item-text">ArtStation</p>
                                        </a>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <div class="slider-controls">
                                    <div id="section-navigation-control-prev"
                                         class="slider-control left swiper-button-disabled" tabindex="0" role="button"
                                         aria-label="Previous slide" aria-disabled="true">
                                        <svg class="icon-small-arrow slider-control-icon">
                                            <use href="#svg-small-arrow"></use>
                                        </svg>
                                    </div>
                                    <div id="section-navigation-control-next" class="slider-control right" tabindex="0"
                                         role="button" aria-label="Next slide" aria-disabled="false">
                                        <svg class="icon-small-arrow slider-control-icon">
                                            <use href="#svg-small-arrow"></use>
                                        </svg>
                                    </div>
                                </div>
                            </nav>
                        </div><!-- Модальне вікно для введення посилання -->
                        <div id="social-modal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>Введіть посилання на <span id="social-name"></span>:</p>
                                <input type="text" id="social-link-input" name="social-link-input"
                                       placeholder="https://" value="">
                                <button id="save-link" class="button primary">Зберегти</button>
                            </div>
                        </div>

                        <div class="account-hub-content-options">
                            <input type="hidden" id="xprofile_nonce" name="xprofile_nonce" value="da33aa8cef">
                            <input type="hidden" name="_wp_http_referer"
                                   value="/members/hmh/settings/account-settings/">
                            <input type="hidden" name="user_id" value="1">
                            <input type="hidden" name="action" value="edit_profile">
                            <input type="submit" class="button primary" value="Зберегти">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container account-hub-content about-me">
        <div class="section-header"></div>

        <form method="post"
              action="/save_profile.php"
              id="profile-settings-form">
            <div class="widget-box">
                <h2 class="widget-box-title">Персональна інформація</h2>
                <div class="widget-box-content">
                    <div class="form">
                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="username">Ім’я</label>
                                    <input type="text" class="form-control" name="first_name" id="username"
                                           value="<?php echo htmlspecialchars($user['first_name'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="surname">Прізвище</label>
                                    <input type="text" class="form-control" name="last_name" id="surname"
                                           value="<?php
                                           echo htmlspecialchars($user['last_name'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <?php
                        // Assume $user is the result from getUserWithDetails()
                        $day = isset($user['day_of_birth']) ? $user['day_of_birth'] : '';
                        $month = isset($user['month_of_birth']) ? $user['month_of_birth'] : '';
                        $year = isset($user['year_of_birth']) ? $user['year_of_birth'] : '';
                        ?>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small active">
                                    <label for="date_of_birth">Народжений(-а)</label>
                                    <input type="hidden" name="date_of_birth" id="date_of_birth" value="">
                                    <div class="form-select-wrap">
                                        <div class="form-select">
                                            <label for="birthday">День</label>
                                            <select class="datebox-date-selector" name="birthday" id="birthday">
                                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                                    <option value="<?= $i ?>" <?= ($i == $day) ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <svg class="icon-small-arrow form-select-icon">
                                                <use href="#svg-small-arrow"></use>
                                            </svg>
                                        </div>
                                        <div class="form-select">
                                            <label for="month_of_birth">Місяць</label>
                                            <select class="datebox-date-selector" name="month_of_birth" id="month_of_birth">
                                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                                    <option value="<?= $i ?>" <?= ($i == $month) ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <svg class="icon-small-arrow form-select-icon">
                                                <use href="#svg-small-arrow"></use>
                                            </svg>
                                        </div>
                                        <div class="form-select">
                                            <label for="year_of_birth">Рік народження</label>
                                            <select class="datebox-date-selector" name="year_of_birth" id="year_of_birth">
                                                <?php for ($i = 1900; $i <= date('Y'); $i++): ?>
                                                    <option value="<?= $i ?>" <?= ($i == $year) ? 'selected' : '' ?>><?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <svg class="icon-small-arrow form-select-icon">
                                                <use href="#svg-small-arrow"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="place_of_birth">Місце народження</label>
                                    <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" value="<?= htmlspecialchars($user['place_of_birth'] ?? '') ?>">
                                </div>
                            </div>
                        </div>


                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="residence">Місце проживання</label>
                                    <input type="text" class="form-control" name="residence"
                                           id="place_of_residence" value="<?php echo htmlspecialchars($user['residence'] ?? ''); ?>">
                                </div>
                            </div>

                            <div class="form-item">
                                <div class="form-input small active">
                                    <label for="gender">Стать або гендер</label>
                                    <div class="form-select-wrap">
                                        <div class="form-select">
                                            <select class="selectbox-selector" name="gender" id="gender">
                                                <option value="" <?php echo (isset($user['gender']) && $user['gender'] == 'Не вибрано') ? 'selected' : ''; ?>>Не вибрано</option>
                                                <option value="Чоловік" <?php echo (isset($user['gender']) && $user['gender'] == 'Чоловік') ? 'selected' : ''; ?>>Чоловік</option>
                                                <option value="Жінка" <?php echo (isset($user['gender']) && $user['gender'] == 'Жінка') ? 'selected' : ''; ?>>Жінка</option>
                                            </select>
                                            <svg class="icon-small-arrow form-select-icon">
                                                <use href="#svg-small-arrow"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small active">
                                    <label for="marital_status">Сімейний стан</label>
                                    <div class="form-select-wrap">
                                        <div class="form-select">
                                            <select class="selectbox-selector" name="marital_status" id="marital_status">
                                                <option value="" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'Не вибрано') ? 'selected' : ''; ?>>Не вибрано</option>
                                                <option value="Неодружений" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'Неодружений') ? 'selected' : ''; ?>>Неодружений</option>
                                                <option value="Одружений" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'Одружений') ? 'selected' : ''; ?>>Одружений</option>
                                                <option value="В цивільному шлюбі" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'В цивільному шлюбі') ? 'selected' : ''; ?>>В цивільному шлюбі</option>
                                                <option value="У відносинах" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'У відносинах') ? 'selected' : ''; ?>>У відносинах</option>
                                                <option value="Заручений" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'Заручений') ? 'selected' : ''; ?>>Заручений</option>
                                                <option value="Розлучена" <?php echo (isset($user['marital_status']) && $user['marital_status'] === 'Розлучена') ? 'selected' : ''; ?>>Розлучена</option>
                                            </select>
                                            <svg class="icon-small-arrow form-select-icon">
                                                <use href="#svg-small-arrow"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="blood_type">Група крові</label>
                                    <input type="text" class="form-control" name="blood_type" id="blood_type"
                                           value="<?php echo htmlspecialchars($user['blood_type'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="school">Школа</label>
                                    <input type="text" class="form-control" name="school" id="school"
                                           value="<?php echo htmlspecialchars($user['school'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="university">ВНЗ</label>
                                    <input type="text" class="form-control" name="university" id="university"
                                           value="<?php echo htmlspecialchars($user['university'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="additional_education">Додаткова освіта</label>
                                    <input type="text" class="form-control" name="additional_education"
                                           id="additional_education" value="<?php echo htmlspecialchars($user['additional_education'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="additional_organization">Додаткова організація</label>
                                    <input type="text" class="form-control" name="additional_organization"
                                           id="additional_organization" value="<?php echo htmlspecialchars($user['additional_organization'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="profession">Професія</label>
                                    <input type="text" class="form-control" name="profession" id="profession"
                                           value="<?php echo htmlspecialchars($user['profession'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="place_of_work">Місце роботи</label>
                                    <input type="text" class="form-control" name="workplace" id="place_of_work"
                                           value="<?php echo htmlspecialchars($user['workplace'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="languages">Мови</label>
                                    <input type="text" class="form-control" name="languages" id="languages"
                                           value="<?php echo htmlspecialchars($user['languages'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="driving_license">Водійські права</label>
                                    <input type="text" class="form-control" name="driving_license" id="driving_license"
                                           value="<?php echo htmlspecialchars($user['driving_license'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="widget-box">
                <h2 class="widget-box-title">Інтереси</h2>
                <div class="widget-box-content">
                    <div class="form">
                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="about_me">Про мене</label>
                                    <input type="text" class="form-control" name="about_me" id="about_me"
                                           value="<?php echo htmlspecialchars($user['about_me'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_shows">Улюблені шоу</label>
                                    <input type="text" class="form-control" name="favorite_shows" id="favorite_shows"
                                           value="<?php echo htmlspecialchars($user['favorite_shows'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_musics">Улюблена музика</label>
                                    <input type="text" class="form-control" name="favorite_musics" id="favorite_musics"
                                           value="<?php echo htmlspecialchars($user['favorite_musics'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_movies">Улюблені фільми</label>
                                    <input type="text" class="form-control" name="favorite_movies" id="favorite_movies"
                                           value="<?php echo htmlspecialchars($user['favorite_movies'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_books">Улюблені книги</label>
                                    <input type="text" class="form-control" name="favorite_books" id="favorite_books"
                                           value="<?php echo htmlspecialchars($user['favorite_books'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="games">Ігри</label>
                                    <input type="text" class="form-control" name="games" id="games"
                                           value="<?php echo htmlspecialchars($user['games'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_bloggers">Блогери</label>
                                    <input type="text" class="form-control" name="favorite_bloggers"
                                           id="favorite_bloggers"
                                           value="<?php echo htmlspecialchars($user['favorite_bloggers'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="computer_games">Комп'ютерні ігри</label>
                                    <input type="text" class="form-control" name="computer_games" id="computer_games"
                                           value="<?php echo htmlspecialchars($user['computer_games'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="sports">Спорт</label>
                                    <input type="text" class="form-control" name="sports" id="sports"
                                           value="<?php echo htmlspecialchars($user['sports'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="color">Колір</label>
                                    <input type="text" class="form-control" name="color" id="color"
                                           value="<?php echo htmlspecialchars($user['color'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="figure">Цифра</label>
                                    <input type="text" class="form-control" name="figure" id="figure"
                                           value="<?php echo htmlspecialchars($user['figure'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="religion">Релігія</label>
                                    <input type="text" class="form-control" name="religion" id="religion"
                                           value="<?php echo htmlspecialchars($user['religion'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="hobby">Хобі</label>
                                    <input type="text" class="form-control" name="hobby" id="hobby"
                                           value="<?php echo htmlspecialchars($user['hobby'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="clothing_style">Стиль одягу</label>
                                    <input type="text" class="form-control" name="clothing_style" id="clothing_style"
                                           value="<?php echo htmlspecialchars($user['clothing_style'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_vehicle">Улюблений транспортний засіб</label>
                                    <input type="text" class="form-control" name="favorite_vehicle"
                                           id="favorite_vehicle"
                                           value="<?php echo htmlspecialchars($user['favorite_vehicle'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="favorite_os">Улюблена операційна система</label>
                                    <input type="text" class="form-control" name="favorite_os" id="favorite_os"
                                           value="<?php echo htmlspecialchars($user['favorite_os'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="bad_habits">Шкідливі звички</label>
                                    <input type="text" class="form-control" name="bad_habits" id="bad_habits"
                                           value="<?php echo htmlspecialchars($user['bad_habits'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="personality_type">Тип особистості</label>
                                    <input type="text" class="form-control" name="personality_type"
                                           id="personality_type"
                                           value="<?php echo htmlspecialchars($user['personality_type'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="what_add_education">Яку додаткову освіту Ви хотіли б отримати?</label>
                                    <input type="text" class="form-control" name="what_add_education"
                                           id="what_add_education"
                                           value="<?php echo htmlspecialchars($user['what_add_education'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="money_or_happiness">Гроші чи щастя? В чому ваше щастя?</label>
                                    <input type="text" class="form-control" name="money_or_happiness"
                                           id="money_or_happiness"
                                           value="<?php echo htmlspecialchars($user['money_or_happiness'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="widget-box">
                <h2 class="widget-box-title">Безпека та конфіденційність</h2>
                <div class="widget-box-content">
                    <div class="form">

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="phone_number">Номер телефону</label>
                                    <input type="text" class="form-control" name="phone" id="phone_number"
                                           value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="current_mail">Поточна пошта</label>
                                    <input type="text" class="form-control" name="email" id="current_mail"
                                           value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="current_pass">Поточний пароль</label>
                                    <input type="text" class="form-control" name="current_pass" id="current_pass"
                                           value="">
                                </div>
                            </div>
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="new_pass">Новий пароль</label>
                                    <input type="text" class="form-control" name="password" id="new_pass" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row split">
                            <div class="form-item">
                                <div class="form-input small">
                                    <label for="confirm_pass">Підтвердіть пароль</label>
                                    <input type="text" class="form-control" name="confirm_pass" id="confirm_pass"
                                           value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttons-block">
                <div class="account-hub-content-options">
                    <input type="hidden" id="xprofile_nonce" name="xprofile_nonce" value="cdfd754551">
                    <input type="hidden" name="_wp_http_referer" value="/members/hmh/settings/personal/">
                    <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="action" value="edit_profile">
                    <button type="submit" class="button primary">Зберегти</button>
                </div>

                <div class="account-hub-content-options">
                    <input type="hidden" id="account_delete_nonce" name="account_delete_nonce" value="c1106da195">
                    <input type="hidden" name="_wp_http_referer" value="/members/hmh/settings/personal/">
                    <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="action" value="delete_account">
                    <button type="submit" class="button danger"
                            onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                        Delete Account
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
</body>
</html>