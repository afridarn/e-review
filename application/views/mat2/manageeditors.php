<content>
    <div align="center">
    <h1>MANAGE EDITOR</h1>

    <table border="1">
        <tr>
            <td>NO</td>
            <td>EDITOR'S USER ID</td>
            <td>NAME</td>
            <td>DATE JOINED</td>
            <td>ACTION</td>

        <tr>
            <?php $i = 0;
            $sts_user = '';
            foreach ($editor as $item) {

                $i++;
            ?>

        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $item->id_user ?></td>
            <td><?php echo $item->nama ?></td>
            <td><?php echo $item->date_created ?></td>
            <td> <?php if ($item->sts_user == 1) {
                        echo anchor('ManageAllTasks/disable/' . $item->id_user, ' <div class="btn btn-warning"> Disable');
                    } else if ($item->sts_user == 0) {
                        echo anchor('ManageAllTasks/enable/' .  $item->id_user, ' <div class="btn btn-success"> Enable');
                    }




                    ?>
            </td>






        <tr>
        <?php } ?>
    </table>
</div>
</content>