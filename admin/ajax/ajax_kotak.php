<?php 
require_once '../koneksi.php';

if($_GET['action'] == "table_data"){


		$columns = array( 
	                            0 =>'id_user', 
	                            1 =>'nama_lengkap',
	                            2=> 'nomor',
	                            4=> 'email',
	                            5=> 'id_user',
	                        );

		$querycount = $mysqli->query("SELECT count(id_user) as jumlah FROM user");
		$datacount = $querycount->fetch_array();
	
  
        $totalData = $datacount['jumlah'];
            
        $totalFiltered = $totalData; 

        $limit = $_POST['length'];
        $start = $_POST['start'];
        $order = $columns[$_POST['order']['0']['column']];
        $dir = $_POST['order']['0']['dir'];
            
        if(empty($_POST['search']['value']))
        {            
        	$query = $mysqli->query("SELECT id_user,nama_lengkap,nomor,email FROM user order by $order $dir 
        																LIMIT $limit 
        																OFFSET $start");
        }
        else {
            $search = $_POST['search']['value']; 
            $query = $mysqli->query("SELECT id_user,nama_lengkap,nomor,email FROM user WHERE nama_lengkap LIKE '%$search%' 
            															or nomor LIKE '%$search%' 
            															order by $order $dir 
            															LIMIT $limit 
            															OFFSET $start");
           $querycount = $mysqli->query("SELECT count(id_user) as jumlah FROM user WHERE nama_lengkap LIKE '%$search%' 
       																						or nomor LIKE '%$search%'");
		   $datacount = $querycount->fetch_array();
           $totalFiltered = $datacount['jumlah'];
        }
        $data = array();
        if(!empty($query))
        {
            $no = $start + 1;
            while ($r = $query->fetch_array())
            {
                $nestedData['no'] = $no;
                $nestedData['nama_lengkap'] = $r['nama_lengkap'];
                $nestedData['nomor'] = $r['nomor'];
                $nestedData['email'] = $r['email'];
                $nestedData['aksi'] = "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
                $data[] = $nestedData;
                $no++;
            }
        }
        $json_data = array(
                    "draw"            => intval($_POST['draw']),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 

}