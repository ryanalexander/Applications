<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

error_reporting(E_ALL);

define('OAUTH2_CLIENT_ID', '434573184667353088');
define('OAUTH2_CLIENT_SECRET', 'j1So6F_pG69sNkILClP2j8RkRsAwzOTo');

$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';

session_start();

// Start the login process by sending the user to Discord's authorization page
if(get('action') == 'login') {

    $params = array(
        'client_id' => OAUTH2_CLIENT_ID,
        'redirect_uri' => 'https://app-1.stelch.net/assets/php/discord.auth.php',
        'response_type' => 'code',
        'scope' => 'identify guilds'
    );

    // Redirect the user to Discord's authorization page
    header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
    die();
}


// When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
if(get('code')) {

    // Exchange the auth code for a token
    $token = apiRequest($tokenURL, array(
        "grant_type" => "authorization_code",
        'client_id' => OAUTH2_CLIENT_ID,
        'client_secret' => OAUTH2_CLIENT_SECRET,
        'redirect_uri' => 'https://app-1.stelch.net/assets/php/discord.auth.php',
        'code' => get('code')
    ));
    $logout_token = $token->access_token;
    $_SESSION['access_token'] = $token->access_token;


    header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
    $user = apiRequest($apiURLBase);
    $userPerms = apiRequest("https://discordapp.com/api/guilds/220563856919887873/members/".$user->id);

    $_SESSION['userData']=$user;
    $_SESSION['userPerms']=$userPerms;

    header('Location: /');

}


if(get('action') == 'logout') {
    // This must to logout you, but it didn't worked(

    $params = array(
        'access_token' => $_SESSION['access_token']
    );
    unset($_SESSION['access_token']);
    session_destroy();

    // Redirect the user to Discord's revoke page
    header('Location: /');
    die();
}

function apiRequest($url, $post=FALSE, $headers=array()) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $response = curl_exec($ch);


    if($post)
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

    $headers[] = 'Accept: application/json';

    if(session('access_token'))
        $headers[] = 'Authorization: Bearer ' . session('access_token');

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    return json_decode($response);
}

function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

?>
