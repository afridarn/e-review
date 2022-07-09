<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baru extends CI_Controller {

	public function index()
	{	
		//deklarasi variabel
		$a = 1;
		$b = "Afrida";
		$c = 0.2;
		$f = "Tom";

		//array
		$d = array("Bella", "Yoga", "Eva"); 
		//indexed-array
		$idx_e = array("g"=>"Ghea", "y"=>"Yoyo", "e"=>"Eca"); 

		//print
		echo "$a <br/>";
		echo "Nilai variabel a : $a <br/>";
		echo "Nilai variabel b : $b <br/>";
		echo "Nilai variabel c : $c <br/>";
		echo "Nilai array d-1 : $d[0] <br/>";
		echo "Nilai indexed-array e-1 : ". $idx_e["g"];

		//operasi
		$ap = $a + 1;
		$bp = $a + $c;
		$cp = $b . $f; //concatination
		echo "<br/>Penjumlahan integer : $ap, penjumlahan float+integer : $bp, penjumlahan string : $cp <br/>";


		//operasi array
		echo "Sebelum disort <br/>";
		echo "Nilai array d-1 : $d[0] <br/>";
		echo "Nilai array d-2 : $d[1] <br/>";
		echo "Nilai array d-3 : $d[2] <br/>";

		echo "Setelah disort <br/>";
		$g = sort($d);
		echo "Nilai array d-1 : $d[0] <br/>";
		echo "Nilai array d-2 : $d[1] <br/>";
		echo "Nilai array d-3 : $d[2] <br/>";

		//looping
		echo "Fungsi iterasi <br/>";
		for ($i=0; $i<count($d); $i++){
			echo "Nilai array d-$i : $d[$i] <br/>";
		}
		
		//cara lain iterasi
		$i=0;
		foreach ($d as $item) {
			echo "Nilai array d-$i : $item . <br/>";
			$i++;
		}

		echo "foreach untuk indexed-array <br/>";
		foreach ($idx_e as $idx=>$value) {
			echo "Nilai array d-$idx : $value . <br/>";
			$i++;
		}

		//$this->load->view("baru/index");
	}

	public function pemanggilCetak($first_name="Firstname", $last_name="Lastname")
	{
		//echo "Untuk memanggil fungsi private <br/>";
		//echo "Passing Parameter <br/>";
		//$nama = "Afrida Rohmatin";
		$nama = "$first_name $last_name";
		$this->cetak($nama);
	}

	private function cetak($cetak_nama="")
	{
		//echo "Nama yang dicetak : $cetak_nama <br/>";
		$this->load->view("baru/cetak", array("nama_yang_dicetak"=>$cetak_nama));
	}
	
	public function viewListReviewers()
	{
		$this->load->model('master');
		$results = $this->master->getListReviewers();

//		echo 'ukuran array : ' . sizeof($results) . '<br>';

//		foreach ($results as $item){
//			echo $item['id_reviewer'] . ' ' . $item['nama'] . ' ' . $item['email'] . ' ' . $item['bidang_ilmu'] . ' ' . $item['Pendidikan'] . ' ' . $item['date_created'] .' ' . $item['date_updated'] . ' ' . $item['sts_reviewer'] . '<br>';
//			echo $item[0] . ' ' . echo $item[1] . ' ' . echo $item[2] . ' ' . echo $item[3] . ' ' . echo $item[4] . ' ' . echo $item[5] . ' ' . echo $item[6] . ' ' . echo $item[7];
//		}

		$this->load->view("template/kepala");
		$this->load->view("baru/select_reviewers", array('reviewers' => $results));
		$this->load->view("template/kaki");
	}
}
