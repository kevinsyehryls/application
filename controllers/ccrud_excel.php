<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccrud_excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("PHPExcel");
		$this->load->model("phpexcel_model");
	}

	public function export(){ 
            //membuat objek
            $select = $this->db->get('tb_pks')->result();

            $objPHPExcel = new PHPExcel();

            // Nama Field Baris Pertama
        	$objPHPExcel->setActiveSheetIndex(0)
		        ->setCellValue('A1', 'No.')
		        ->setCellValue('B1', 'Nama')
		        ->setCellValue('C1', 'Alamat')
		        ->setCellValue('D1', 'Kontak');
	 
	        // Mengambil Data
	        $row = 2;
	        foreach($data->result() as $data)
	        {
	            $col = 0;
	            foreach ($fields as $field)
	            {
	                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
	                $col++;
	            }
	 
	            $row++;
	        }
	        $objPHPExcel->setActiveSheetIndex();

            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Data PKS');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            //Nama File
            header('Content-Disposition: attachment;filename="absen.xlsx"');

            //Download
            $objWriter->save("php://output");
 
        }

}

/* End of file Phpexcel.php */
/* Location: ./application/controllers/Phpexcel.php */