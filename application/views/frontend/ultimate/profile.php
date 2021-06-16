
<div class="container">
  <h2>Your Profile</h2>
  <div class="table-responsive">          
  <table class="table" style="height:700">
    <thead class="success">
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Refer Code</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo get_phrase($data[0]['firstname'])?></td>
        <td><?php echo get_phrase($data[0]['lastname'])?></td>
        <td><?php echo $data[0]['email'];?></td>
        <td><?php echo get_phrase($data[0]['ref'])?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
<br><br><br>
<div class="container">
  <h2>Your Courses</h2>
  <div class="table-responsive">          
  <table class="table" style="height:700">
    <thead class="success">
      <tr>
        <th>Coursename</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="bg-success"><?php echo get_phrase($ecourse)?></td>
        <td class="bg-success">Completed</td>
        <tr></tr>
        <td class="bg-danger">Web Development</td>
        <td class="bg-danger">Not Completed</td>
        </tr>
        <tr>
        <td class="bg-success">Marketing</td>
        <td class="bg-success">Completed</td>
        </tr>
      </tr>
    </tbody>
  </table>
  </div>
</div>