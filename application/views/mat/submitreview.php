<body>
    <div align="center">

        <h1>Submit Review</h1>

        <table border="1">
            <tr>
                <td>NO</td>
                <td>TASK ID</td>
                <td>TITLE</td>
                <td>AUTHORS</td>
                <td>DATE CREATED</td> 
                <td>DATE UPDATED</td>
            <tr>
            <?php $i=0;
            if (sizeof($task)>0) 
                { foreach ($task as $item) 
                    { $i++;   ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $item ['id_penugasan']; ?></td>
                            <td><?php echo $item ['judul']; ?></td>
                            <td><?php echo $item ['penulis']; ?></td>
                            <td><?php echo $item ['date_created']; ?></td>
                            <td><?php echo $item ['date_updated']; ?></td>
                        <tr>
            <?php   }//tutup foreach 
                }//tutup if
                else {  ?>
                    <tr>
                        <td colspan="7"><?php echo "Not Found"; ?></td>
                    <tr>
                <?php }//else ?>
        </table>

        <form action="<?php echo base_url() . "index.php/manageassignedtask/addingReview" ?>" method="post" enctype="multipart/form-data">
            <h3>Submit here : </h3>
                <table>
                    <tr>
                        <td>Task ID</td>
                        <td>: </td>
                        <td><input type="number" id="idpenugasan" name="idpenugasan" width="100" /></td>
                    </tr>
                    <tr>
                        <td>Review File</td>
                        <td>:</td>
                        <td><input type="file" id="userfile" name="userfile" width="20" /></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">
            </form>
    </div>
</body>