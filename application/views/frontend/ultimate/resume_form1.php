<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<?php echo form_open(site_url('users/rform/1')); ?>
<div class="form-row">
    <h3>Users Details</h3>
    <div class="form-group col-md-6">
        <label for="inputEmail4">Full name</label>
        <input type="text" class="form-control" name="fullname" id="inputEmail4" placeholder="Full Name">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">Title</label>
        <input type="text" class="form-control" name="title" id="inputPassword4" placeholder="Title">
    </div>
</div>
<h3>Users Contact Details</h3>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputAddress">Email id</label>
        <input type="text" class="form-control" name="email" id="inputAddress" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Phone Number</label>
        <input type="text" class="form-control" name="phno" id="inputAddress" placeholder="Phone number">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Website Link</label>
        <input type="text" class="form-control" name="websitelink" id="inputAddress" placeholder="Any Yours Website Link">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">LinkedIn Url</label>
        <input type="text" class="form-control" name="linkedin" id="inputAddress" placeholder="Linked In">
    </div>
</div>
<div class="form-row">
    <h3>Education Details</h3>
    <div class="form-group col-md-3">
        <label for="inputAddress">Duration</label>
        <input type="text" class="form-control" name="dur" id="inputAddress" placeholder="Starting year : Ending Year">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Degree</label>
        <input type="text" class="form-control" name="degree" id="inputAddress" placeholder="Degree">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">University Name</label>
        <input type="text" class="form-control" name="uname" id="inputAddress" placeholder="University Name">
    </div>
</div>
<br><br><br><br>
<div class="form-row">
    <h3>Languages</h3>
    <div class="form-group col-md-4">
        <label for="inputAddress">Language 1</label>
        <input type="text" class="form-control" name="l1" id="inputAddress" placeholder="Language-1">
    </div>
    <div class="form-group col-md-4">
        <label for="inputAddress">Lnaguage 2</label>
        <input type="text" class="form-control" name="l2" id="inputAddress" placeholder="Language-2">
    </div>
</div>
<br><br><br><br><br>
<div class="form-row">
    <h3>Projects</h3>
    <div class="form-group col-md-2">
        <label for="inputAddress">Project Title</label>
        <input type="text" class="form-control" name="ptitle" id="inputAddress" placeholder="Project Title">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Project Description</label>
        <input type="textarea" class="form-control" name="pdes" id="inputAddress" placeholder="Project Description">
    </div>
</div>
<br><br><br><br><br>
<div class="form-row">
    <h3>Experience</h3>
    <div class="form-group col-md-2">
        <label for="inputAddress">Duration</label>
        <input type="text" class="form-control" name="edur" id="inputAddress" placeholder="Duration">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Title</label>
        <input type="textarea" class="form-control" name="etitle" id="inputAddress" placeholder="Title">
    </div>
    <div class="form-group col-md-2">
        <label for="inputAddress">Company Name</label>
        <input type="text" class="form-control" name="ename" id="inputAddress" placeholder="Name of Company">
    </div>
    <div class="form-group col-md-6">
        <label for="inputAddress">Description</label>
        <input type="textarea" class="form-control" name="edes" id="inputAddress" placeholder="Project Description">
    </div>
</div>
<br><br><br><br><br><br><br>
<div class="form-row">
    <h3>Skills</h3>
    <div class="form-group col-md-2">
        <label for="inputAddress">First</label>
        <input type="text" class="form-control" name="s1" id="inputAddress" placeholder="">
    </div>
    <div class="form-group col-md-2">
        <label for="inputAddress">Second</label>
        <input type="text" class="form-control" name="s2" id="inputAddress" placeholder="">
    </div>
    <div class="form-group col-md-2">
        <label for="inputAddress">Third</label>
        <input type="text" class="form-control" name="s3" id="inputAddress" placeholder="">
    </div>
    <div class="form-group col-md-2">
        <label for="inputAddress">Fourth</label>
        <input type="text" class="form-control" name="s4" id="inputAddress" placeholder="">
    </div>
</div>
<br><br><br><br><br>
<button type="submit" class="btn btn-success">Submit</button>
<?php echo form_close(); ?>