
<content>
    <h1>Memilih Calon Reviewer</h1>

    <table border="1">
        <tr>
            <td>No</td>
            <td>Id Reviewer</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Bidang Ilmu</td>
            <td>Pendidikan</td>
            <td>Date Created</td>
            <td>Date Updated</td>
            <td>Status Reviewer</td>
        </tr>
        <?php $i=0;
            if (sizeof($reviewers)>0){
                foreach ($reviewers as $item) { 
            $i++; ?> 
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $item['id_reviewer']; ?></td>
            <td><?php echo $item['nama']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['bidang_ilmu']; ?></td>
            <td><?php echo $item['Pendidikan']; ?></td>
            <td><?php echo $item['date_created']; ?></td>
            <td><?php echo $item['date_updated']; ?></td>
            <td><?php echo $item['sts_reviewer']; ?></td>
        </tr>
        <?php }  //foreach
            }  else {    ?>  
        <tr>
            <td colspan="5"><? php echo 'Not Found'; ?></td>
        </tr>
        <?php 
            } //else
            ?> 
    </table>
</content>