<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
        <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
        <br><br>
        <span style="font-size:25px"><i>This is to certify that</i></span>
        <br><br>
        <span style="font-size:30px"><b><?php echo get_phrase($name); ?></b></span><br /><br />
        <span style="font-size:25px"><i>has completed the course</i></span> <br /><br />
        <span style="font-size:30px"><?php echo get_phrase($cname); ?></span> <br /><br />

        <span style="font-size:25px"><i>dated</i>
            <br>
            <?php
            echo  date("Y/m/d") . "<br>";
            ?>
        </span><br>
        <span style="float:right">
            <a href="home/verifycerti/".<?php echo $name; ?>>Click Here To Verify</a>
        </span>
    </div>
</div>