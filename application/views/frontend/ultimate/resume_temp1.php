<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive CV </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/data.css">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/data.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', SansSerif;
        }

        body {
            background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 1000px;
            min-height: 1000px;
            background-color: #fff;
            margin: 50px;
            display:grid;
            grid-template-columns: 1fr 2fr;
            box-shadow: 0 35px 55px rgba(0, 0, 0, 0.1);
        }

        .container .left_Side {
            position: relative;
            background-color: #003147;
            padding: 40px;
        }

        .profileText {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .profileText .imgBx {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
        }

        .profileText .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo {
            width: 100%;
            height: auto;
        }

        .profileText h2 {
            color: #fff;
            font-size: 1.5em;
            margin-top: 20px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 600;
            line-height: 1.4em;
        }

        .profileText h2 span {
            font-size: 0.8em;
            font-weight: 300;
        }

        .contactInfo {
            padding-top: 40px;
        }

        .title {
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .contactInfo ul {
            position: relative;
        }

        .contactInfo ul li {
            list-style: none;
            position: relative;
            margin: 10px 0;
            cursor: pointer;
        }

        .contactInfo ul li .icon {
            display: inline-block;
            width: 30px;
            font-size: 18px;
            color: #03a9f4;
        }

        .contactInfo ul li span {
            color: #fff;
            font-weight: 300;
        }

        .contactInfo.education li {
            margin-bottom: 15px;
        }

        .contactInfo.education h5 {
            color: #03a9f4;
            font-weight: 500;
        }

        .contactInfo.education h4:nth-child(2) {
            color: #fff;
            font-weight: 500;
        }

        .contactInfo.education h4 {
            color: #fff;
            font-weight: 300;
        }

        .contactInfo.language .percent {
            position: relative;
            width: 100%;
            height: 6px;
            background-color: #081921;
            display: block;
            margin-top: 5px;
        }

        .contactInfo.language .percent div {
            position: relative;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #03a9f4;
        }

        .container .right_Side {
            position: relative;
            background-color: #fff;
            padding: 40px;
        }

        .about {
            margin-bottom: 50px;
        }

        .about:last-child {
            margin-bottom: 0;
        }

        .about h4{
            text-transform: uppercase;
            color: blue;
        }

        .title2 {
            color: #003147;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        p {
            color: #081921;
        }

        .about .box {
            display: flex;
            flex-direction: row;
            margin: 20px 0;
        }

        .about .box .year_company {
            min-width: 150px;
        }

        .about .box .year_company h5 {
            text-transform: uppercase;
            color: #848c90;
            font-weight: 600;
        }

        .about .box .text h4 {
            text-transform: uppercase;
            color: #2a7da2;
            font-size: 16px;
        }

        .skills .box {
            position: relative;
            width: 100%;
            display: grid;
            grid-template-columns: 150px 1fr;
            justify-content: center;
            align-items: center;
        }

        .skills .box h4 {
            text-transform: uppercase;
            color: #848c90;
            font-weight: 500;
        }

        .skills .box .percent {
            position: relative;
            width: 100%;
            height: 10px;
            background-color: #f0f0f0;
        }

        .skills .box .percent div {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #03a9f4;
        }

        .interest ul {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .interest ul li {
            list-style: none;
            color: black;
            font-weight: 500;
            margin: 10px 0;
        }

        .interest ul li .fa {
            color: #03a9f4;
            font-size: 18px;
            width: 20px;
        }

        @media (max-width: 1000px) {
            .container {
                margin: 10px;
                grid-template-columns: repeat(1, 1fr);
            }

            .interest ul {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .about .box {
                flex-direction: column;
            }

            .about .box .year_company {
                margin-bottom: 5px;
            }

            .interest ul {
                grid-template-columns: repeat(1, 1fr);
            }

            .skills .box {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .englishw50 {
            width: 60%;
        }

        .russianw90 {
            width: 90%;
        }

        .frenchw30 {
            width: 30%;
        }

        .htmlws30 {
            width: 50%;
        }

        .cssws45 {
            width: 45%;
        }

        .jsws70 {
            width: 70%;
        }

        .phws40 {
            width: 40%;
        }

        .ilws60 {
            width: 60%;
        }

        .adw70 {
            width: 70%;
        }
    </style>

</head>
<script>
    let skills = {
        knowledge: {
            html: 60,
            css: 50,
            js: 20,
            photoshop: 30,
            illustrator: 20,
            adobexd: 50
        },
        languages: {
            english: 70,
            russian: 90,
            french: 40
        }
    };

    $(function() {
        let languageObjects = $('div[data-language]'); 
        let knowledgeObjects = $('div[data-knowledge]');
        
        $.each(languageObjects, function() {
            $(this).css({
                width: skills.languages[$(this).data('language')] + '%'
            });
        });
        $.each(knowledgeObjects, function() {
            $(this).css({
                width: skills.knowledge[$(this).data('knowledge')] + '%'
            });
        });
    });
</script>

<body>
    <div class="container">
        <div class="left_Side">
            <div class="profileText">
                <div class="imgBx">
                    <img class="photo" src="assets/images/faces/profile.jpg">
                </div>
                <br>
                <h2><?php echo($fullname);?><br><span><?php echo($title);?></span> </h2>
            </div>

            <div class="contactInfo">
                <h3 class="title">Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="text"><?php echo($phno);  ?></span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <span class="text"><?php echo($email);  ?></span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                        <span class="text"><?php echo($websitelink);  ?></span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                        <span class="text"><?php echo($linkedin);  ?></span>
                    </li>
                </ul>
            </div>
            <div class="contactInfo education">
                <h3 class="title">Education</h3>
                <ul>
                    <li>
                        <h5><?php echo($dur); ?></h5>
                        <h4><?php echo($degree); ?></h4>
                        <h4><?php echo($uname); ?></h4>
                    </li>
                    <li>
                        <h5>2007 - 2013</h5>
                        <h4>Bachelor Degree Computer Science</h4>
                        <h4>University Name</h4>
                    </li>
                    <li>
                        <h5>1997 - 2007</h5>
                        <h4>Matriculation </h4>
                        <h4>University Name</h4>
                    </li>
                </ul>
            </div>
            <div class="contactInfo language">
                <h3 class="title">Languages</h3>
                <ul>
                    <li>
                        <span class="text"><?php echo($l1); ?></span>
                        <span class="percent">
                            <div data-language="<?php echo($l1); ?>"></div>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li>
                        <span class="text"><?php echo($l2); ?></span>
                        <span class="percent">
                            <div data-language="<?php echo($l2); ?>"></div>
                        </span>
                    </li>
                </ul>
                <ul>
                    <li>
                        <span class="text">French</span>
                        <span class="percent">
                            <div data-language="french"></div>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right_Side">
            <div class="about">
                <h2 class="title2">Projects</h2>
                <h4><?php echo($ptitle); ?></h4>
                <p><?php echo($pdes); ?></p>
            </div>
            <div class="about">
                <h2 class="title2">Experience</h2>
                <div class="box">
                    <div class="year_company">
                        <h5><?php echo($edur); ?></h5>
                        <h5><?php echo($ename); ?></h5>
                    </div>
                    <div class="text">
                        <h4><?php echo($etitle); ?></h4>
                        <p><?php echo($edes); ?></p>
                    </div>
                </div>

                <div class="box">
                    <div class="year_company">
                        <h5>2018 - 2020</h5>
                        <h5>Company Name</h5>
                    </div>
                    <div class="text">
                        <h4>UX Developer</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <div class="box">
                    <div class="year_company">
                        <h5>2016 - 2018</h5>
                        <h5>Company Name</h5>
                    </div>
                    <div class="text">
                        <h4>Junior UX Developer</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="about skills">
                <h2 class="title2">Professionals skills</h2>
                <div class="box">
                    <h4><?php echo($s1); ?></h4>
                    <div class="percent">
                        <div data-knowledge="<?php echo($s1); ?>"></div>
                    </div>
                </div>
                <div class="box">
                    <h4><?php echo($s2); ?></h4>
                    <div class="percent">
                        <div data-knowledge="<?php echo($s2); ?>"></div>
                    </div>
                </div>
                <div class="box">
                    <h4><?php echo($s3); ?></h4>
                    <div class="percent">
                        <div data-knowledge="<?php echo($s3); ?>"></div>
                    </div>
                </div>
                <div class="box">
                    <h4><?php echo($s4); ?></h4>
                    <div class="percent">
                        <div data-knowledge="<?php echo($s4); ?>"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>Illustrator</h4>
                    <div class="percent">
                        <div data-knowledge="illustrator""></div>
                </div>
            </div>
            <div class=" box">
                            <h4>Adobe XD</h4>
                            <div class="percent">
                                <div data-knowledge="adobexd"></div>
                            </div>
                        </div>
                    </div>
                    <div class="about interest">
                        <h2 class="title2">Interests</h2>
                        <ul>
                            <li><i class="fa fa-book" aria-hidden="true"></i> Reading</li>
                            <li><i class="fa fa-gamepad" aria-hidden="true"></i> Gaming</li>
                            <li><i class="fa fa-cutlery" aria-hidden="true"></i> Cooking</li>
                            <li><i class="fa fa-microphone" aria-hidden="true"></i> Singing</li>
                        </ul>
                    </div>


                </div>
            </div>
</body>

</html>