<link rel="stylesheet" href="assets\js\zurb-responsive-tables\stylesheets\forms.css">

<link rel="stylesheet" type="text\css" href="assets\login\plugins-css.css'" />
<link rel="stylesheet" type="text\css" href="assets\login\typography.css" />
<link rel="stylesheet" type="text\css" href='assets\login\style.css' />
<link rel="stylesheet" type="text\css" href="assets\login\responsive.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<div class="panel panel-primary">

    <div class="container">
        <form action="institute_database.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="fname">School Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="schoolname" placeholder="Your School name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Application Title</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="apptitle" placeholder="Your Application Title..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Phone</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="phone" placeholder="Enter Phone.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">System Email</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="email" placeholder="Enter email id.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Address</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="address" placeholder="Enter Address.."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Password</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="password" placeholder="Enter password.."></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="save" value="Submit">
            </div>
        </form>
    </div>
</div>

</div>




<style>
    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: vertical;
    }

    /* Style the label to display next to the inputs */
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    /* Style the submit button */
    input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    /* Style the container */
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    /* Floating column for labels: 25% width */
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    /* Floating column for inputs: 75% width */
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
</style>