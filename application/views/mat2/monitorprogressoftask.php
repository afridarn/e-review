<body>
    <div align="center">
        <title>View Task</title>
        <h1>View Task</h1>

        <table border="1">
            <tr>
                <td>No</td>
                <td>Id Penugasan</td>
                <td>Judul</td>
                <td>Penulis</td>
                <td>Tgl Dibuat</td> 
                <td>Tgl Diperbaharui</td>
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
                            <td><?php echo $item ['date_created']; ?></td>
                            <td><?php echo $item ['date_updated']; ?></td>
                            <td><?php switch ($item ['sts_penugasan'])
                                {case 1 :
                                    echo "Assigned";
                                    break;
                                case 2 :
                                    echo "Paid";
                                    break;
                                case 3 :
                                    echo "Payment Confirmed";
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
                        <tr>
            <?php   }//tutup foreach 
                }//tutup if
                else {  ?>
                    <tr>
                        <td colspan="7"><?php echo "Not Found"; ?></td>
                    <tr>
                <?php }//else ?>
        </table>
    </div>
</body>