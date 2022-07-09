<body>
    <div align="center">
        <title>View Assigned Task</title>
        <h1>CONFIRM PAYMENT</h1>

        <table border="1">
            <caption>Uploaded Task</caption>
            <tr>
                <td>No</td>
                <td>Id Penugasan</td>
                <td>Judul</td>
                <td>Penulis</td>
                <td>File Artikel</td>
                <td>Tgl Dibuat</td> 
                <td>Tgl Diperbaharui</td>
                <td>Bukti Transfer</td>
                <td>Status</td> 
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
                            <td><a href="<?php echo base_url() .'index.php/ManageAllTasks/downloadFile/',$item['filename']; ?>" target="_blank"> Download </a></td>
                            <td><?php echo $item ['date_created']; ?></td>
                            <td><?php echo $item ['date_updated']; ?></td>
                            <td><a href="<?php echo base_url() .'index.php/ManageAllTasks/downloadBuktiTf/',$item['buktitf']; ?>" target="_blank"> Download </a></td>
                            <td><?php switch ($item ['sts_penugasan'])
                                {case 1 :
                                    echo "Submited";
                                    break;
                                case 2 :
                                    echo "Paid";
                                    break;
                                case 3 :
                                    echo "Confirmed Payment";
                                    break;
                                case 4 :
                                    echo "Accepted";
                                    break;
                                case 5 :
                                    echo "Rejected";
                                    break;
                                case 6 :
                                    echo "Done";
                                    break;
                                } ?></td>
                            <td><a href="<?php echo base_url() . 'index.php/ManageAllTasks/ConfirmP/', $item['id_penugasan'];?>">Confirm</a></td>
                        <tr>
            <?php   }//tutup foreach 
                }//tutup if
                else {  ?>
                    <tr>
                        <td colspan="7"><?php echo "Penugasan tidak ditemukan"; ?></td>
                    <tr>
                <?php }//else ?>
        </table>
    </div>
</body>