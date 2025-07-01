<?php
//These are functions which does not directly exist in PHP syntaxes, therefore it is custom made.
// Function to redirect to a different page
function redirect($path) {
    header('Location: /' . basename(BASE_PATH) . '/' . $path); // Adjust if not in a subfolder
    exit();
}

// Function to set a flash message
function flash($type, $message) {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][$type] = $message;
}

// Function to display and clear flash messages
function display_flash_messages() {
    if (isset($_SESSION['flash_messages']) && !empty($_SESSION['flash_messages'])) {
        foreach ($_SESSION['flash_messages'] as $type => $message) {
            echo '<div class="alert container-' . $type .'"><div class="alert alert-' . $type . '">' . htmlspecialchars($message) . '</div></div>';
        }
        unset($_SESSION['flash_messages']); // Clear messages after displaying
    }
}
