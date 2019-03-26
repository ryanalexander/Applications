<?php
@SESSION_START();

$logged_in=true;
if(!$_SESSION['access_token']){
    $logged_in=false;
}
?>
<head>
    <title>Applications Test</title>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<div class="nav">
    <div class="content-inner">
        <div class="col title">Applications</div>
        <div class="col user">
            <?php
            if($logged_in){
                ?>
                Logged in as <?php echo $_SESSION['userData']->username ?> <i class="fa fa-caret-down"></i>
                <div class="dropdown">
                    <ul>
                        <!-- Simplify with JavaScript (At some point) -->
                        <a href="?pg=applications"><li>My Applications</li></a>
                        <a href="?pg=help"><li>Help</li></a>
                        <a href="/assets/php/discord.auth.php?action=logout"><li>Logout</li></a>
                    </ul>
                </div>
                <?php
            }else {
                ?>
                <a href="/assets/php/discord.auth.php?action=login">Login</a>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php if(!$logged_in){return;} ?>

<body>
    <div class="main-content-inner">

        <div class="applications">
            <div class="header">
                <!--<p class="label">Welcome to your Applications homepage!</p>-->
            </div>

            <div id="test-app-container" class="content-holder">
                <div class="title">
                    <span class="left">Application Debug</span>
                    <span class="right">
                        <i class="fa fa-caret-right"></i>
                        <i class="fa fa-caret-down"></i>
                    </span>
                </div>
                <div class="content">
                    <?php
                        print_r($_SESSION['userData']);
                        print_r($_SESSION['userPerms']);
                    ?>
                    <br/>
                </div>
            </div>

            <div id="my-app-container" class="content-holder">
                <div class="title">
                    <span class="left">My Applications</span>
                    <span class="right">
                        <i class="fa fa-caret-right"></i>
                        <i class="fa fa-caret-down"></i>
                    </span>
                </div>
                <div class="content">
                    <div style="margin:auto;text-align:center;display:block;">You have no open applications</div>
                    <table style="display:none;">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>FakeJake Moderator Applications</td>
                            <td>Testing post - Do not apply</td>
                            <td>27/03/2019</td>
                            <td style="color:red;">Denied</td>
                        </tr>
                    </table>
                    <br/>
                </div>
            </div>

            <div id="opn-app-container" class="content-holder">
                <div class="title">
                    <span class="left">Open Applications</span>
                    <span class="right">
                        <i class="fa fa-caret-right"></i>
                        <i class="fa fa-caret-down"></i>
                    </span>
                </div>
                <div class="content">
                    <div style="margin:auto;text-align:center;display:none;">There are no open Applications at this moment.</div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Close Date</th>
                        </tr>
                        <tr>
                            <td>FakeJake Moderator Applications</td>
                            <td>Testing post - Do not apply</td>
                            <td>27/03/2019</td>
                        </tr>
                    </table>
                    <br/>
                </div>
            </div>

        </div>

    </div>

<div class="watermark">
    Software by <i>Stelch</i>
</div>
</body>

<script>
    document.getElementById("test-app-container").getElementsByClassName("title")[0].onmousedown=(e)=>{
        e.preventDefault();
        document.getElementById("test-app-container").classList.toggle("active");
    }
    document.getElementById("opn-app-container").getElementsByClassName("title")[0].onmousedown=(e)=>{
        e.preventDefault();
        document.getElementById("opn-app-container").classList.toggle("active");
    }
    document.getElementById("my-app-container").getElementsByClassName("title")[0].onmousedown=(e)=>{
        e.preventDefault();
        document.getElementById("my-app-container").classList.toggle("active");
    }
</script>