<body>
    <div align="center">
    
        <h1>Confirm Task Completion</h1>

        <table border="1">
            <tr>
                <td>NO</td>
                <td>TASK ID</td>
                <td>REVIEWER'S USER ID</td>
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
                            <Td><?php echo $item ['id_user']; ?></td>
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

        <form action="<?php echo base_url() . "index.php/managemytasks/confirmingtaskcompletion" ?>" method="post" enctype="multipart/form-data">
            <h3>Confirm here : </h3>
                <table>
                    <tr>
                        <td>ID Task</td>
                        <td>: </td>
                        <td><input type="number" id="idpenugasan2" name="idpenugasan2" width="100" /></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">
            </form>
    </div>
</body>