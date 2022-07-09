<body align="center">
        <title>View Potential Reviewer</title>
        <h1>View Potential Reviewer</h1>

        <table border="1" align="center">
            <tr>
                <td>NO</td>
                <td>REVIEWER'S USER ID</td>
                <td>NAME</td>
                <td>EMAIL</td>
                <td>DATE CREATED</td> 
                <td>DATE UPDATED</td> 
            <tr>
            <?php $i=0;
                if (sizeof($reviewer)>0) {
                    foreach ($reviewer as $item) {
                        $i++;   ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $item ['id_user']; ?></td>
                <td><?php echo $item ['nama']; ?></td>
                <td><?php echo $item ['email']; ?></td>
                <td><?php echo $item ['date_created']; ?></td>
                <td><?php echo $item ['date_updated']; ?></td>
            <tr>
            <?php   }//tutup foreach 
            }//tutup if
                else {  ?>
            <tr>
                <td colspan="7"><?php echo "Not Found"; ?></td>
            <tr>
            <?php
            }//else  ?>
        </table>

    </body>