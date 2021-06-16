<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profiles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/dataTables/css/dataTables.bootstrap.css'); ?>" />
</head>


<body>
    <?php
    $data_keys = array_keys($data[0]);
    //print_r($data_keys);
    $c = 0;
    //print_r($data);
    /*while($data){
        echo $data[$data_keys[$c]];
        $c=$c+1;
    }*/
    ?>
    <div class="container">
        <table class="table table-hover table-bordered" style="height:70px">
            <thead class="thead-dark">
                <?php foreach ($data_keys as $keys) { ?>


                    <th><?php echo get_phrase($keys) ?></th>


                <?php } ?>
            </thead>
            <tbody>
                <?php foreach ($data as $val) { ?>
                    <tr class="table-success">
                        <?php while ($c < count($data_keys)) { ?>
                            <td><?php echo $val[$data_keys[$c]]; ?>

                            </td>
                        <?php
                            $c++;
                        } ?>
                    </tr>
                    <div id="id">
                    <?php
                    $c = 0;
                    //echo $c;
                }
                    ?>
                    </div>
            </tbody>
        </table>
    </div>

</body>

</html>