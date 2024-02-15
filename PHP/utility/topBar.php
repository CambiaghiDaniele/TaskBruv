<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
header("Access-Control-Allow-Credentials: true");

echo '<div class="topBar">
    <div class="homeButton">
        <button id="homeBtn">
            <img id="imageButton" src="" alt="Home" width="50px" height="50px">
        </button>
    </div>
    <div class="brandTitle">
        TaskBruv
    </div>
</div>
<div class="accountButton">
    <button id="accountBtn">
        <img id="imageButton" src="https://cdn.pixabay.com/photo/2021/07/25/08/03/account-6491185_1280.png" alt="Profile Image" width="50px" height="50px">
    </button>
</div>

<div class="accountMenu" id="accountMenu">
    <div class="topAccountMenu">
        <div class="accountPicture">
            <img id="imageButton" src="https://cdn.pixabay.com/photo/2021/07/25/08/03/account-6491185_1280.png" alt="Account Picture" width="50px" height="50px">
        </div>
        <div class="accountInformations">
            <div class="accountName">
                Nome Account
            </div>
            <div class="accountEmail">
                Email Account
            </div>
        </div>
    </div>
    <div class="accountMenuContent">
        links
    </div>
    <link rel="stylesheet" href="../style/utility/topBar.css">
    <script src="../scripts/utility/topBar.js" type="module" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
</div>';
?>