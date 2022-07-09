<body>
	<div align="center">
		<title>View Task</title>
		<h1>View Task</h1>

		<table border="1">
			<caption>Uploaded Task</caption>
			<tr>
			<td>NO</td>
				<td>TASK ID</td>
				<td>TITLE</td>
				<td>AUTHORS</td>
				<td>ARTICLE FILE</td>
				<td>DATE CREATED</td> 
				<td>DATE UPDATED</td>
				<td>STATUS</td>  
			<tr>
			<?php $i=0;
			if (sizeof($task1)>0) 
				{ foreach ($task1 as $item) 
					{ $i++;   ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $item ['id_penugasan']; ?></td>
							<td><?php echo $item ['judul']; ?></td>
							<td><?php echo $item ['penulis']; ?></td>
							<td><a href="<?php echo base_url() .'index.php/ManageMyTask/downloadFile/',$item['filename']; ?>" target="_blank"> Download </a></td>
							<td><?php echo $item ['date_created']; ?></td>
							<td><?php echo $item ['date_updated']; ?></td>
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
						<tr>
			<?php   }//tutup foreach 
				}//tutup if
				else {  ?>
					<tr>
						<td colspan="7"><?php echo "Penugasan tidak ditemukan"; ?></td>
					<tr>
				<?php }//else ?>
		</table>
		<table border="1">
			<caption>Accepted Task</caption>
			<tr>
			<td>NO</td>
				<td>TASK ID</td>
				<td>TITLE</td>
				<td>AUTHORS</td>
				<td>ARTICLE FILE</td>
				<td>DATE CREATED</td> 
				<td>DATE UPDATED</td>
				<td>STATUS</td>  
			<tr>
			<?php $i=0;
			if (sizeof($task2)>0) 
				{ foreach ($task2 as $item) 
					{ $i++;   ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $item ['id_penugasan']; ?></td>
							<td><?php echo $item ['judul']; ?></td>
							<td><?php echo $item ['penulis']; ?></td>
							<td><a href="<?php echo base_url() .'index.php/ManageMyTask/downloadFile/',$item['filename']; ?>" target="_blank"> Download </a></td>
							<td><?php echo $item ['date_created']; ?></td>
							<td><?php echo $item ['date_updated']; ?></td>
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
							<td><a href="<?php echo base_url() .'index.php/ManageMyTask/downloadReviewedFile/',$item['reviewfile']; ?>" target="_blank"> Download </a></td>
						<tr>
			<?php   }//tutup foreach 
				}//tutup if
				else {  ?>
					<tr>
						<td colspan="9"><?php echo "NOT FOUND"; ?></td>
					<tr>
				<?php }//else ?>
		</table>
		<table border="1">
			<caption>Rejected Task</caption>
			<tr>
			<td>NO</td>
				<td>TASK ID</td>
				<td>TITLE</td>
				<td>AUTHORS</td>
				<td>ARTICLE FILE</td>
				<td>DATE CREATED</td> 
				<td>DATE UPDATED</td>
				<td>STATUS</td>  
			<tr>
			<?php $i=0;
			if (sizeof($task3)>0) 
				{ foreach ($task3 as $item) 
					{ $i++;   ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $item ['id_penugasan']; ?></td>
							<td><?php echo $item ['judul']; ?></td>
							<td><?php echo $item ['penulis']; ?></td>
							<td><a href="<?php echo base_url() .'index.php/ManageMyTask/downloadFile/',$item['filename']; ?>" target="_blank"> Download </a></td>
							<td><?php echo $item ['date_created']; ?></td>
							<td><?php echo $item ['date_updated']; ?></td>
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
						<tr>
			<?php   }//tutup foreach 
				}//tutup if
				else {  ?>
					<tr>
						<td colspan="8"><?php echo "Penugasan tidak ditemukan"; ?></td>
					<tr>
				<?php }//else ?>
		</table>
	</div>
</body>