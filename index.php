<head>
    <title>Applications Test</title>
    <link rel="stylesheet" href="assets/stylesheets/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<div class="nav">
    <div class="content-inner">
        <div class="col title">Applications</div>
        <div class="col user">
            Logged in as {%user%} <i class="fa fa-caret-down"></i>
            <div class="dropdown">
                <ul>
                    <!-- Simplify with JavaScript (At some point) -->
                    <a href="?pg=applications"><li>My Applications</li></a>
                    <a href="?pg=help"><li>Help</li></a>
                    <a href="?action=logout"><li>Logout</li></a>
                </ul>
            </div>
        </div>
    </div>
</div>

<body>
    <div class="main-content-inner">

        <div class="applications">
            <div class="header">
                <!--<p class="label">Welcome to your Applications homepage!</p>-->
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
                    You have no open applications
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
                    <div class="application-box">
                        <div class="title">FakeJake Moderator Application</div>
                        <div class="title">Do you have what it takes to represent FakeJake's Discord server as a Moderator? Why not try out for the position?</div>
                        <div class="closes">
                            <p>Closes</p>
                            <p>30/03/2019</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<div class="watermark">
    Software by <i>Stelch</i>
</div>
</body>

<script>
    document.getElementById("opn-app-container").onmousedown=(e)=>{
        e.preventDefault();
        document.getElementById("opn-app-container").classList.toggle("active");
    }
    document.getElementById("my-app-container").onmousedown=(e)=>{
        e.preventDefault();
        document.getElementById("my-app-container").classList.toggle("active");
    }
</script>