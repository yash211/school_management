
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: yellow;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <h4 class="alert result"><?php echo $_SESSION['status']; ?></h4>
    <?php
        unset($_SESSION['status']);
    }

    ?>
    <?php echo form_open(site_url('Ecom/addquestion'), array('class' => 'form-horizontal form-groups validate', 'target' => '_top')); ?>
        <?php
        $con = new mysqli('localhost', 'root', '', 'e_commerce');
        $squery = "SELECT  `name` FROM `courses` WHERE 1";
        $r = $con->query($squery);
        $row = [];
        //$row1 = mysqli_fetch_array($r);
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">Courses</label>
            <select name="testname">
                <option value="">SELECT</option>
                <?php while ($row = mysqli_fetch_array($r)) { ?>

                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="container">
            <p>Please add your question</p>
            <hr>

            <label for=""><b>Question</b></label>
            <input type="text" placeholder="Enter Question" name="ques" id="question" required>


            <label for="psw"><b>Option 1</b></label>
            <input type="text" placeholder="" name="ans1" id="a1" required>

            <label for="psw"><b>Option 2</b></label>
            <input type="text" placeholder="" name="ans2" id="a2" required>

            <label for="psw"><b>Option 3</b></label>
            <input type="text" placeholder="" name="ans3" id="a3" required>

            <label for="psw"><b>Option 4</b></label>
            <input type="text" placeholder="" name="ans4" id="a4" required>

            <label for="psw"><b>CorrectAns</b></label>
            <input type="text" placeholder="" name="cans" id="ca" required>
            <label for="psw"><b>Mark</b></label>
            <input type="text" placeholder="" name="mark" id="mark" required>

        </div>
        <div class="generate"></div>
        <button type="submit" name="save_in_to_database">SUBMIT</button>
</body>

</html>