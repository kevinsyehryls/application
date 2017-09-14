<title>Dokumen PKS</title>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcrudpks extends CI_Model {

	/* i. function construct */
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function selectpks(){
		$query = $this->db->query("
			select
			a.*,
			b.*,
			c.*,
			d.*
			from tb_pks a
			join tb_pimpinan_telkomsel b on a.id_pimpinan_telkomsel = b.id_pimpinan_telkomsel
			join tb_corporate c on a.`id_corporate` = c.`id_corporate`
			join `tb_pic_telkomsel` d on d.`id_pic_telkomsel` = a.`id_pic_telkomsel`
		");
		return $query;
	}

	function selectpks_ttd(){
		$query = $this->db->query("
			select
			a.*,
			b.*,
			c.*,
			d.*
			from tb_pks a
			join tb_pimpinan_telkomsel b on a.id_pimpinan_telkomsel = b.id_pimpinan_telkomsel
			join tb_corporate c on a.`id_corporate` = c.`id_corporate`
			join `tb_pic_telkomsel` d on d.`id_pic_telkomsel` = a.`id_pic_telkomsel`
		");
		return $query;
	}

	function selectpks_end(){
		$query = $this->db->query("
			select
			a.*,
			b.*,
			c.*,
			d.*
			from tb_pks a 
			join tb_pimpinan_telkomsel b on a.id_pimpinan_telkomsel = b.id_pimpinan_telkomsel
			join tb_corporate c on a.`id_corporate` = c.`id_corporate`
			join `tb_pic_telkomsel` d on d.`id_pic_telkomsel` = a.`id_pic_telkomsel`
			where a.end_date between date_sub(now(),INTERVAL 2 WEEK) and now()

		");
		return $query;
	}

	function select_chart(){
		$query = $this->db->query("select * from tb_pks");
		return $query;
	}

	// tampil cbx pimpinan telkomsel pada modal tambah PKS
	function relpimpinan(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
	
	// tampil cbx pic telkomsel pada modal tambah PKS
	function relpic(){
		$query = $this->db->query("select * from tb_pic_telkomsel");
		return $query;
	}
	
	// tampil cbx Cororate telkomsel pada modal tambah PKS
	function relcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
	
	// tampil cbx PAKET telkomsel pada modal tambah PKS
	function relpkt(){
		$query = $this->db->query("select * from tb_paket");
		return $query;
	}
	
	function insertpks(){
		$id =$this->input->post("id_pks");
		$no =$this->input->post("id_pksno");
		$pksppn =$this->input->post("id_pksppn");
		$pkspic =$this->input->post("id_pkspic");
		$pkscorp =$this->input->post("id_pkscorp");
		$pkspkt =$this->input->post("id_pkspkt");
		$pksst =$this->input->post("id_pksst");
		$pkssen =$this->input->post("id_pksen");
		$startdate = date("Y-m-d", strtotime($pksst));
		$enddate = date("Y-m-d", strtotime($pkssen));
        /* cbx val */
        $CbxSignCor1 = $this->input->post('CbxSignCor1');
        $CbxSignCor2 = $this->input->post('CbxSignCor2');
        $CbxSignTel1 = $this->input->post('CbxSignTel1');
        $CbxSignTel2 = $this->input->post('CbxSignTel2');
        if($CbxSignCor1 == ''){$CbxSignCor1 = "F";}
        if($CbxSignCor2 == ''){$CbxSignCor2 = "F";}
        if($CbxSignTel1 == ''){$CbxSignTel1 = "F";}
        if($CbxSignTel2 == ''){$CbxSignTel2 = "F";}
		$datapks =array(
			'id_pks' => $id,
			'nomor_pks' => $no,
			'id_pimpinan_telkomsel' => $pksppn,
			'id_pic_telkomsel' => $pkspic,
			'id_corporate' => $pkscorp,
			'id_paket' => $pkspkt,
			'start_date' => $startdate,
			'end_date' => $enddate,
            'sign_pimpinan_corporate' => $CbxSignCor1,
            'sign_pic_corporate' => $CbxSignCor2,
            'sign_pimpinan_telkomsel' => $CbxSignTel1,
            'sign_pic_telkomsel' => $CbxSignTel2
		);
		$this->db->insert('tb_pks', $datapks);		
	}
	
	function deletepks(){
		$id_pks=$this->input->post("id_pks");
		$this->db->where('id_pks', $id_pks);
		$this->db->delete('tb_pks');	
	}
	
	
	function select1pks(){
		$pks_id=$this->input->post('id_pks');
		$query= $this->db->query("select * from tb_pks where id_pks='$pks_id'");
		return $query;	
	}

	// untuk print pks
    function selectprintpks(){
        $id_pks = $this->input->post('id_pks');
        $query = $this->db->query("
            select
            a.`id_pks`,
            a.`nomor_pks`,
            b.`nama_pimpinan_telkomsel`,
            b.`jabatan_pimpinan_telkomsel`,
            c.`nama_corporate`,
            c.`alamat_corporate`,
            c.`nama_pimpinan_corporate`,
            c.`jabatan_pimpinan_corporate`,
            c.`nama_pic_corporate`,
			c.`jabatan_pic_corporate`,
			c.`nomor_hp_pic_corporate`,
			c.`email_pic_corporate`,
			c.`nomor_tlp_kantor`,
            d.`nama_pic_telkomsel`,
  			d.`jabatan_pic_telkomsel`,
  			d.`nomor_hp_pic_telkomsel`,
  			d.`email_pic_telkomsel`,
  			e.`nama_paket`,
            a.`start_date`
            from `tb_pks` a
            join `tb_pimpinan_telkomsel` b on a.`id_pimpinan_telkomsel` = b.`id_pimpinan_telkomsel`
            join `tb_corporate` c on a.`id_corporate` = c.`id_corporate`
            join `tb_pic_telkomsel` d on a.`id_pic_telkomsel` = d.`id_pic_telkomsel`
            join `tb_paket` e on a.`id_paket` = e.`id_paket`
            where a.id_pks = '$id_pks'
        ");
        return $query;
    }
	
	function updatepks(){
        $id_pks = $this->input->post('id_pks');
        $id_pksno = $this->input->post('id_pksno');
        $id_pksst = $this->input->post('id_pksst');
        $id_pksen = $this->input->post('id_pksen');
		/* cbx val */
        $CbxSignCor1 = $this->input->post('CbxSignCor1');
        $CbxSignCor2 = $this->input->post('CbxSignCor2');
        $CbxSignTel1 = $this->input->post('CbxSignTel1');
        $CbxSignTel2 = $this->input->post('CbxSignTel2');
        if($CbxSignCor1 == ''){$CbxSignCor1 = "F";}
        if($CbxSignCor2 == ''){$CbxSignCor2 = "F";}
        if($CbxSignTel1 == ''){$CbxSignTel1 = "F";}
        if($CbxSignTel2 == ''){$CbxSignTel2 = "F";}
		$datapks =array(
            'nomor_pks'                 => $id_pksno,
            'start_date'                => $id_pksst,
            'end_date'                  => $id_pksen,
            'sign_pimpinan_corporate'   => $CbxSignCor1,
            'sign_pic_corporate'        => $CbxSignCor2,
            'sign_pimpinan_telkomsel'   => $CbxSignTel1,
            'sign_pic_telkomsel'        => $CbxSignTel2
		);	
		$this->db->where('id_pks', $id_pks);
		$this->db->update('tb_pks', $datapks);
	}

	function updatepks_ttd(){
		$id_pks = $this->input->post('id_pks');
		/* cbx val */
        $CbxSignCor1 = $this->input->post('CbxSignCor1');
        $CbxSignCor2 = $this->input->post('CbxSignCor2');
        $CbxSignTel1 = $this->input->post('CbxSignTel1');
        $CbxSignTel2 = $this->input->post('CbxSignTel2');
        if($CbxSignCor1 == ''){$CbxSignCor1 = "F";}
        if($CbxSignCor2 == ''){$CbxSignCor2 = "F";}
        if($CbxSignTel1 == ''){$CbxSignTel1 = "F";}
        if($CbxSignTel2 == ''){$CbxSignTel2 = "F";}
		$datapks =array(
            'sign_pimpinan_corporate'   => $CbxSignCor1,
            'sign_pic_corporate'        => $CbxSignCor2,
            'sign_pimpinan_telkomsel'   => $CbxSignTel1,
            'sign_pic_telkomsel'        => $CbxSignTel2
		);	
		$this->db->where('id_pks', $id_pks);
		$this->db->update('tb_pks', $datapks);
	}

	function updatepks_pdf(){
		$id_pks = $this->input->post('id_pks');
		$inputpdf = $this->input->post('inputpdf');
		$datapks =array(
            'file_pdf'                => $inputpdf
		);	
		$this->db->where('id_pks', $id_pks);
		$this->db->update('tb_pks', $datapks);
	}

	// fill cbx edit pimpinan telkomsel
	function selectppn(){
		$query = $this->db->query("select * from tb_pimpinan_telkomsel");
		return $query;
	}
		// fill cbx edit pic telkomsel
	function selectpic(){
		$query = $this->db->query("select * from tb_pic_telkomsel");
		return $query;
	}
		// fill cbx edit corporate
	function selectcorp(){
		$query = $this->db->query("select * from tb_corporate");
		return $query;
	}
		// fill cbx edit paket
	function selectpkt(){
		$query = $this->db->query("select * from tb_paket");
		return $query;
	}
}
?>