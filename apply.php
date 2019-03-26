<?php
@SESSION_START();

$logged_in=true;
if(!$_SESSION['access_token']){
    $logged_in=false;
    die("You must be logged in to view this page");
}
?>
<head>
    <title>Applications Test</title>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<div class="nav">
    <div class="content-inner">
        <div class="col title">FakeJake Moderator Application</div>
        <div class="col user">
            Applying as <?php echo $_SESSION['userData']->username."#".$_SESSION['userData']->discriminator ?>
        </div>
    </div>
</div>

<body>
<div class="main-content-inner">
    <form>
        <input type="text" placeholder="First name" />
        <input type="text" placeholder="Last name" />
        <input type="text" placeholder="Discord" value="<?php echo $_SESSION['userData']->username."#".$_SESSION['userData']->discriminator ?>" disabled />
        <input type="text" placeholder="Discord" value="<?php echo $_SESSION['userData']->id ?>" hidden disabled />
    </form>
</div>

<div class="watermark">
    Software by <i>Stelch</i>
</div>
</body>