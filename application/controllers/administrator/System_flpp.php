<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| System Flpp Controller
*| --------------------------------------------------------------------------
*| System Flpp site
*|
*/
use MathPHP\Finance;

class System_flpp extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_system_flpp');
	}

	/**
	* show all System Flpps
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('system_flpp_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['system_flpps'] = $this->model_system_flpp->get($filter, $field, $this->limit_page, $offset);
		$this->data['system_flpp_counts'] = $this->model_system_flpp->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/system_flpp/index/',
			'total_rows'   => $this->model_system_flpp->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('System Flpp List');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_list', $this->data);
	}
	
	/**
	* Add new system_flpps
	*
	*/
	public function add()
	{
		$this->is_allowed('system_flpp_add');

		$this->template->title('System Flpp New');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_add', $this->data);
	}

	/**
	* Add New System Flpps
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('system_flpp_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('NAMA_PEMOHON', 'NAMA PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('PEKERJAAN_PEMOHON', 'PEKERJAAN PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('JENIS_KELAMIN', 'JENIS KELAMIN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_KTP_PEMOHON', 'NO KTP PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NPWP_PEMOHON', 'NPWP PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('GAJI_POKOK', 'GAJI POKOK', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PASANGAN', 'NAMA PASANGAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_KTP_PASANGAN', 'NO KTP PASANGAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_REKENING_PEMOHON', 'NO REKENING PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('TGL_AKAD', 'TGL AKAD', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('HARGA_RUMAH', 'HARGA RUMAH', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NILAI_KPR', 'NILAI KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('SUKU_BUNGA_KPR', 'SUKU BUNGA KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('TENOR', 'TENOR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('ANGSURAN_KPR', 'ANGSURAN KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NILAI_FLPP', 'NILAI FLPP', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PENGEMBANG', 'NAMA PENGEMBANG', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PERUMAHAN', 'NAMA PERUMAHAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('ALAMAT_AGUNAN', 'ALAMAT AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('KOTA_AGUNAN', 'KOTA AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('KODE_POS_AGUNAN', 'KODE POS AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('LUAS_TANAH', 'LUAS TANAH', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('LUAS_BANGUNAN', 'LUAS BANGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('month', 'Month', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('is_generate', 'Is Generate', 'trim|required|max_length[5]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'NAMA_PEMOHON' => $this->input->post('NAMA_PEMOHON'),
				'PEKERJAAN_PEMOHON' => $this->input->post('PEKERJAAN_PEMOHON'),
				'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN'),
				'NO_KTP_PEMOHON' => $this->input->post('NO_KTP_PEMOHON'),
				'NPWP_PEMOHON' => $this->input->post('NPWP_PEMOHON'),
				'GAJI_POKOK' => $this->input->post('GAJI_POKOK'),
				'NAMA_PASANGAN' => $this->input->post('NAMA_PASANGAN'),
				'NO_KTP_PASANGAN' => $this->input->post('NO_KTP_PASANGAN'),
				'NO_REKENING_PEMOHON' => $this->input->post('NO_REKENING_PEMOHON'),
				'TGL_AKAD' => $this->input->post('TGL_AKAD'),
				'HARGA_RUMAH' => $this->input->post('HARGA_RUMAH'),
				'NILAI_KPR' => $this->input->post('NILAI_KPR'),
				'SUKU_BUNGA_KPR' => $this->input->post('SUKU_BUNGA_KPR'),
				'TENOR' => $this->input->post('TENOR'),
				'ANGSURAN_KPR' => $this->input->post('ANGSURAN_KPR'),
				'NILAI_FLPP' => $this->input->post('NILAI_FLPP'),
				'NAMA_PENGEMBANG' => $this->input->post('NAMA_PENGEMBANG'),
				'NAMA_PERUMAHAN' => $this->input->post('NAMA_PERUMAHAN'),
				'ALAMAT_AGUNAN' => $this->input->post('ALAMAT_AGUNAN'),
				'KOTA_AGUNAN' => $this->input->post('KOTA_AGUNAN'),
				'KODE_POS_AGUNAN' => $this->input->post('KODE_POS_AGUNAN'),
				'LUAS_TANAH' => $this->input->post('LUAS_TANAH'),
				'LUAS_BANGUNAN' => $this->input->post('LUAS_BANGUNAN'),
				'batch_id' => $this->input->post('batch_id'),
				'create_date' => date('Y-m-d H:i:s'),
				'month' => $this->input->post('month'),
				'year' => $this->input->post('year'),
				'is_generate' => $this->input->post('is_generate'),
			];

			
			$save_system_flpp = $this->model_system_flpp->store($save_data);

			if ($save_system_flpp) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_system_flpp;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/system_flpp/edit/' . $save_system_flpp, 'Edit System Flpp'),
						anchor('administrator/system_flpp', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/system_flpp/edit/' . $save_system_flpp, 'Edit System Flpp')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/system_flpp');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/system_flpp');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view System Flpps
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('system_flpp_update');

		$this->data['system_flpp'] = $this->model_system_flpp->find($id);

		$this->template->title('System Flpp Update');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_update', $this->data);
	}

	/**
	* Update System Flpps
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('system_flpp_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('NAMA_PEMOHON', 'NAMA PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('PEKERJAAN_PEMOHON', 'PEKERJAAN PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('JENIS_KELAMIN', 'JENIS KELAMIN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_KTP_PEMOHON', 'NO KTP PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NPWP_PEMOHON', 'NPWP PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('GAJI_POKOK', 'GAJI POKOK', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PASANGAN', 'NAMA PASANGAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_KTP_PASANGAN', 'NO KTP PASANGAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NO_REKENING_PEMOHON', 'NO REKENING PEMOHON', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('TGL_AKAD', 'TGL AKAD', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('HARGA_RUMAH', 'HARGA RUMAH', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NILAI_KPR', 'NILAI KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('SUKU_BUNGA_KPR', 'SUKU BUNGA KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('TENOR', 'TENOR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('ANGSURAN_KPR', 'ANGSURAN KPR', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NILAI_FLPP', 'NILAI FLPP', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PENGEMBANG', 'NAMA PENGEMBANG', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('NAMA_PERUMAHAN', 'NAMA PERUMAHAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('ALAMAT_AGUNAN', 'ALAMAT AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('KOTA_AGUNAN', 'KOTA AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('KODE_POS_AGUNAN', 'KODE POS AGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('LUAS_TANAH', 'LUAS TANAH', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('LUAS_BANGUNAN', 'LUAS BANGUNAN', 'trim|required|max_length[250]');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('month', 'Month', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('year', 'Year', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('is_generate', 'Is Generate', 'trim|required|max_length[5]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'NAMA_PEMOHON' => $this->input->post('NAMA_PEMOHON'),
				'PEKERJAAN_PEMOHON' => $this->input->post('PEKERJAAN_PEMOHON'),
				'JENIS_KELAMIN' => $this->input->post('JENIS_KELAMIN'),
				'NO_KTP_PEMOHON' => $this->input->post('NO_KTP_PEMOHON'),
				'NPWP_PEMOHON' => $this->input->post('NPWP_PEMOHON'),
				'GAJI_POKOK' => $this->input->post('GAJI_POKOK'),
				'NAMA_PASANGAN' => $this->input->post('NAMA_PASANGAN'),
				'NO_KTP_PASANGAN' => $this->input->post('NO_KTP_PASANGAN'),
				'NO_REKENING_PEMOHON' => $this->input->post('NO_REKENING_PEMOHON'),
				'TGL_AKAD' => $this->input->post('TGL_AKAD'),
				'HARGA_RUMAH' => $this->input->post('HARGA_RUMAH'),
				'NILAI_KPR' => $this->input->post('NILAI_KPR'),
				'SUKU_BUNGA_KPR' => $this->input->post('SUKU_BUNGA_KPR'),
				'TENOR' => $this->input->post('TENOR'),
				'ANGSURAN_KPR' => $this->input->post('ANGSURAN_KPR'),
				'NILAI_FLPP' => $this->input->post('NILAI_FLPP'),
				'NAMA_PENGEMBANG' => $this->input->post('NAMA_PENGEMBANG'),
				'NAMA_PERUMAHAN' => $this->input->post('NAMA_PERUMAHAN'),
				'ALAMAT_AGUNAN' => $this->input->post('ALAMAT_AGUNAN'),
				'KOTA_AGUNAN' => $this->input->post('KOTA_AGUNAN'),
				'KODE_POS_AGUNAN' => $this->input->post('KODE_POS_AGUNAN'),
				'LUAS_TANAH' => $this->input->post('LUAS_TANAH'),
				'LUAS_BANGUNAN' => $this->input->post('LUAS_BANGUNAN'),
				'batch_id' => $this->input->post('batch_id'),
				'create_date' => date('Y-m-d H:i:s'),
				'month' => $this->input->post('month'),
				'year' => $this->input->post('year'),
				'is_generate' => $this->input->post('is_generate'),
			];

			
			$save_system_flpp = $this->model_system_flpp->change($id, $save_data);

			if ($save_system_flpp) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/system_flpp', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/system_flpp');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/system_flpp');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete System Flpps
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('system_flpp_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'system_flpp'), 'success');
        } else {
            set_message(cclang('error_delete', 'system_flpp'), 'error');
        }

		redirect_back();
	}

		/**
	* View view System Flpps
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('system_flpp_view');

		$this->data['system_flpp'] = $this->model_system_flpp->join_avaiable()->find($id);

		$this->template->title('System Flpp Detail');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_view', $this->data);
	}
	
	/**
	* delete System Flpps
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$system_flpp = $this->model_system_flpp->find($id);

		
		
		return $this->model_system_flpp->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('system_flpp_export');

		$this->model_system_flpp->export('system_flpp', 'system_flpp');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('system_flpp_export');

		$this->model_system_flpp->pdf('system_flpp', 'system_flpp');
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////	
// dev

public function get_detail_id($ktp)
{
	
	$where = array(
		'NO_KTP_PEMOHON' => $ktp,	
	);
	
	// $this->data['system_flpp'] = $this->model_system_flpp->find($id);
	$get_single = $this->model_system_flpp->get_single($where);
	
	$nama_pemohon   = $get_single->NAMA_PEMOHON; //string
	$tgl_akad   = $get_single->TGL_AKAD; //string
	$tenor 		= $get_single->TENOR;
	$nilai_kpr = $get_single->NILAI_KPR;
	$bunga_kpr = $get_single->SUKU_BUNGA_KPR; //0,5
	// print_r($tgl_akad);die();
//===================================================
	$m_time =   strtotime($tgl_akad);	
	// $y_tenor1 		=  date('Y', strtotime($tgl_akad));
	// $m_tenor1 		=  date('m', strtotime("+1 month", $tgl_akad)); //+1 month bulan berikutnya
	$y_tenor1 =  date('Y', strtotime("+1 months",$m_time));		
	$m_tenor1 =  date('m', strtotime("+1 months",$m_time));
		// $m1 = (string)$m2;            
		// $m1 = '$m1';

	

// TENOR 1

$outstanding_t1 = $nilai_kpr;
$angsuran_pokok_t1 = $nilai_kpr * (($bunga_kpr/12)/(1-pow((($bunga_kpr/12)+1),-$tenor)))-($bunga_kpr*($nilai_kpr/12)) ;
$angsuran_bunga_t1 = $nilai_kpr * ($bunga_kpr/12); 
$angsuran_total_t1 = $angsuran_pokok_t1 + $angsuran_bunga_t1;


	$data_array[] = array(

		// 'BatchID' => $BatchID,
		'NO_KTP_PEMOHON' => $ktp,
		'NO' => 1,
		'Y' => $y_tenor1, 
		'M' => baca_bulan($m_tenor1), //helper baca bulan 
		'OUTSTANDING' => $outstanding_t1,
		'ANGSURAN_POKOK' => $angsuran_pokok_t1,
		'ANGSURAN_BUNGA' => $angsuran_bunga_t1,
		'ANGSURAN_TOTAL' => $angsuran_total_t1
		
				 
	);

// print_r($data_array[0]['OUTSTANDING'] - $data_array[0]['ANGSURAN_POKOK'] );die();

// TENOR NEXT LOOP
		$no=2;
		// $tenor_loop = $tenor - 1;
	for ($x = 1; $x < $tenor; $x++):
		
		$no = $x+1;
		$z  = $x-1;

		// $date = '25/05/2010';
		// $date = str_replace('/', '-', $date);
		// $y =  date('Y', strtotime($date));

		// $m_time =   strtotime($date);

		$y 		=  date('Y', strtotime($tgl_akad));
		$m_time =   strtotime($tgl_akad);


		$m2 =  date('m', strtotime("+".$no." months",$m_time));
		$m1 = (string)$m2;            
		// $m1 = '$m1';
		$y1 =  date('Y', strtotime("+".$no." months",$m_time));		


$outstanding_before	   = $data_array[$z]['OUTSTANDING'];
$angsuran_pokok_before = $data_array[$z]['ANGSURAN_POKOK'];

//------- 
$outstanding_loop    =((float)$outstanding_before  - (float)$angsuran_pokok_before);
$angsuran_bunga_loop = $outstanding_loop * ($bunga_kpr/12);
$angsuran_pokok_loop =$angsuran_total_t1 - $angsuran_bunga_loop;

		$data_array[] = array(


			
			// 'BatchID' => $BatchID,
			'NO_KTP_PEMOHON' => $ktp,
			'NO' => $no,
			'Y' => $y1, 
			'M' => baca_bulan($m1), //helper baca bulan 
			'OUTSTANDING' => $outstanding_loop,
			'ANGSURAN_POKOK' => $angsuran_pokok_loop,
			'ANGSURAN_BUNGA' => $angsuran_bunga_loop,
			'ANGSURAN_TOTAL' => $angsuran_total_t1
			
			 		
		);
	endfor;

	// print_r($data_array);die();

	$this->data['data_array'] = $data_array;
	$this->data['nama_pemohon'] = $nama_pemohon;
	$this->data['no_ktp'] = $ktp;

	$this->template->title('System Flpp Detail');
	$this->render('backend/standart/administrator/system_flpp/system_flpp_detail', $this->data);


}

//export excel detail
public function export_detail_id($ktp)
{
	
	$where = array(
		'NO_KTP_PEMOHON' => $ktp,	
	);
	
	// $this->data['system_flpp'] = $this->model_system_flpp->find($id);
	$get_single = $this->model_system_flpp->get_single($where);
	
	$nama_pemohon   = $get_single->NAMA_PEMOHON; //string
	$tgl_akad   = $get_single->TGL_AKAD; //string
	$tenor 		= $get_single->TENOR;
	$nilai_kpr = $get_single->NILAI_KPR;
	$bunga_kpr = $get_single->SUKU_BUNGA_KPR; //0,5
	// print_r($tgl_akad);die();
//===================================================
	$m_time =   strtotime($tgl_akad);	
	// $y_tenor1 		=  date('Y', strtotime($tgl_akad));
	// $m_tenor1 		=  date('m', strtotime("+1 month", $tgl_akad)); //+1 month bulan berikutnya
	$y_tenor1 =  date('Y', strtotime("+1 months",$m_time));		
	$m_tenor1 =  date('m', strtotime("+1 months",$m_time));
		// $m1 = (string)$m2;            
		// $m1 = '$m1';

	

// TENOR 1

$outstanding_t1 = $nilai_kpr;
$angsuran_pokok_t1 = $nilai_kpr * (($bunga_kpr/12)/(1-pow((($bunga_kpr/12)+1),-$tenor)))-($bunga_kpr*($nilai_kpr/12)) ;
$angsuran_bunga_t1 = $nilai_kpr * ($bunga_kpr/12); 
$angsuran_total_t1 = $angsuran_pokok_t1 + $angsuran_bunga_t1;


	$data_array[] = array(

		// 'BatchID' => $BatchID,
		'NO_KTP_PEMOHON' => $ktp,
		'NO' => 1,
		'Y' => $y_tenor1, 
		'M' => baca_bulan($m_tenor1), //helper baca bulan 
		'OUTSTANDING' => $outstanding_t1,
		'ANGSURAN_POKOK' => $angsuran_pokok_t1,
		'ANGSURAN_BUNGA' => $angsuran_bunga_t1,
		'ANGSURAN_TOTAL' => $angsuran_total_t1
		
				 
	);

// print_r($data_array[0]['OUTSTANDING'] - $data_array[0]['ANGSURAN_POKOK'] );die();

// TENOR NEXT LOOP
		$no=2;
		// $tenor_loop = $tenor - 1;
	for ($x = 1; $x < $tenor; $x++):
		
		$no = $x+1;
		$z  = $x-1;

		// $date = '25/05/2010';
		// $date = str_replace('/', '-', $date);
		// $y =  date('Y', strtotime($date));

		// $m_time =   strtotime($date);

		$y 		=  date('Y', strtotime($tgl_akad));
		$m_time =   strtotime($tgl_akad);


		$m2 =  date('m', strtotime("+".$no." months",$m_time));
		$m1 = (string)$m2;            
		// $m1 = '$m1';
		$y1 =  date('Y', strtotime("+".$no." months",$m_time));		


$outstanding_before	   = $data_array[$z]['OUTSTANDING'];
$angsuran_pokok_before = $data_array[$z]['ANGSURAN_POKOK'];

//------- 
$outstanding_loop    =((float)$outstanding_before  - (float)$angsuran_pokok_before);
$angsuran_bunga_loop = $outstanding_loop * ($bunga_kpr/12);
$angsuran_pokok_loop =$angsuran_total_t1 - $angsuran_bunga_loop;

		$data_array[] = array(


			
			// 'BatchID' => $BatchID,
			'NO_KTP_PEMOHON' => $ktp,
			'NO' => $no,
			'Y' => $y1, 
			'M' => baca_bulan($m1), //helper baca bulan 
			'OUTSTANDING' => $outstanding_loop,
			'ANGSURAN_POKOK' => $angsuran_pokok_loop,
			'ANGSURAN_BUNGA' => $angsuran_bunga_loop,
			'ANGSURAN_TOTAL' => $angsuran_total_t1
			
			 		
		);
	endfor;

	//print_r($data_array);die();


// foreach($data_array as $r):
// 	print_r($r['NO_KTP_PEMOHON']);
// 	print_r('<hr>');	
// endforeach;	




$this->data['data_array'] = $data_array;
$this->data['nama_file'] = $nama_pemohon.'_'.$ktp;
$this->data['no_ktp'] = $ktp;
$this->data['nama_pemohon'] = $nama_pemohon;
// $this->data['nama_pemohon'] = $nama_pemohon;
	// $this->data['no_ktp'] = $ktp;

	// $this->template->title('System Flpp Detail');
	$this->load->view('backend/standart/administrator/system_flpp/system_flpp_export_detail', $this->data);


}


// generate bulk
public function generate($id = null)
{
	// $this->is_allowed('system_flpp_delete');

	// $this->load->helper('file');

	$arr_id = $this->input->get('id');
	$remove = false;

	if (!empty($id)) {
		$remove = $this->_gen($id);
	} elseif (count($arr_id) >0) {
		foreach ($arr_id as $id) {
			$remove = $this->_gen($id);
		}
	}

	if ($remove) {
		set_message(cclang('has_been_deleted', 'system_flpp'), 'success');
	} else {
		set_message(cclang('error_delete', 'system_flpp'), 'error');
	}

	redirect_back();

}

//form generte
public function gen(){


	// $this->data['no_ktp'] = $ktp;

	$this->template->title('System Flpp Report Generate');
	$this->render('backend/standart/administrator/system_flpp/system_flpp_generate', $this->data);



}



// all generate batch
public function generate_all($batch_id)
{
	// $this->is_allowed('system_flpp_delete');

	// $this->load->helper('file');


	// $arr_id = $this->input->get('id');
	$arr_id = $this->db->query("
	SELECT ID FROM system_flpp WHERE batch_id=$batch_id

	")->result();

	// print_r($arr_id);die();	
	foreach ($arr_id as $id) {
		$remove = $this->_gen($id->ID);
	}	

	// print_r($remove);die();
	// $remove = false;

	// if (!empty($id)) {
	// 	$remove = $this->_gen($id);
	// } elseif (count($arr_id) >0) {
	// 	foreach ($arr_id as $id) {
	// 		$remove = $this->_gen($id);
	// 	}
	// }

	// print_r($remove);
	if ($remove) {
	// 	// set_message(cclang('has_been_deleted', 'system_flpp'), 'success');
		echo'<script>
		alert("succes");
		window.history.back();
		</script>';
	} else {
	// 	// set_message(cclang('error_delete', 'system_flpp'), 'error');
		echo'<script>
		alert("error")
		window.history.back()
		</script>';
	}

	redirect_back();

}
//all=====

private function _gen($id)
	{
		
		//insert table pengembalian
		$cek['insert_batch1'] =	$this->insert_batch1($id);
		//insert table total
		$cek['insert_batch3'] =	$this->insert_batch3($id);

	$cek['update_generate'] =	$this->model_system_flpp->change($id,$data=array('is_generate'=>99));

	return $cek;		
		// print_r($cek);
		// die();

		// return $this->model_system_flpp->remove($id);
	}

	//INSERT BATCH PENGEMBALIAN
	private function insert_batch1($id){

		$system_flpp = $this->model_system_flpp->find($id);

		// print_r($system_flpp);die();
		
		$batch_id= $system_flpp->batch_id;

		$nama_pemohon = $system_flpp->NAMA_PEMOHON;
		$no_ktp_pemohon = $system_flpp->NO_KTP_PEMOHON;
		
		$tenor= $system_flpp->TENOR;
		$nilai_flpp= $system_flpp->NILAI_FLPP;
		$nilai_kpr= $system_flpp->NILAI_KPR;
		
		// $detail_data = $this->model_app->getSelectedData('upload_verivikasi',$id)->result();
		//============
		//$tenor =10;
		
		$nilai_kpr = $system_flpp->NILAI_KPR; //nama_pemohon
		$tgl_akad = $system_flpp->TGL_AKAD; //tgl_akad
		
		
		
		$bunga_kpr =$system_flpp->SUKU_BUNGA_KPR; //bunga

		// print_r($no_ktp_pemohon);
		// print_r('<hr>');
		// print_r($tgl_akad);
		// print_r('<hr>');
		// print_r($tenor);

//        $tenor=120;
        $no=1;
        for ($x = 0; $x < $tenor; $x++):
            $no=$x+1;
			// print_r($no);
			// print_r('<hr>');

            // $date = '25/05/2010';
            // $date = str_replace('/', '-', $date);
            // $y =  date('Y', strtotime($date));
    
            // $m_time =   strtotime($date);

            $y =  date('Y', strtotime($tgl_akad));
            $m_time =   strtotime($tgl_akad);


            $m2 =  date('m', strtotime("+".$no." months",$m_time));
            $m1 = (string)$m2;            
            // $m1 = '$m1';
            $y1 =  date('Y', strtotime("+".$no." months",$m_time));

            $rate          = ($bunga_kpr/100) / 12; // 3.5% interest paid at the end of every month
            $periods       = ($tenor/12) * 12;    // 30-year mortgage

            $present_value_ipmt = -1 * abs($nilai_kpr); //IPMT NILAI_KPR    // Mortgage note of $265,000.00
            $present_value_ppmt = -1 * abs($nilai_flpp); //PPMT NILAI_FLPP    // Mortgage note of $265,000.00

            
            $future_value  = 0;
            $beginning     = false;      // Adjust the payment to the beginning or end of the period
            // $pmt           = Finance::pmt($rate, $periods, $present_value, $future_value, $beginning);
            
            // Interest on a financial payment for a loan or annuity with compound interest.
            $period = $no; // First payment period
            $ipmt   = Finance::ipmt($rate, $period, $periods, $present_value_ipmt, $future_value, $beginning);
            
//$ipmt = round($ipmt,0);
// Principle on a financial payment for a loan or annuity with compound interest

// $present_value = -115200000; //PPMT
            $ppmt = Finance::ppmt($rate, $period, $periods, $present_value_ppmt, $future_value = 0, $beginning);            
  
//$ppmt = round($ppmt,0);
//------------------------
            
            // print_r(round($ipmt,0));
            // print_r('<hr>');


//========array loop
$data_array[] = array(

    'BatchID' => $batch_id,
    'NO_KTP_PEMOHON' => $no_ktp_pemohon,
    'NO' => $no,
    'Y' => $y1, 
    'M' => $m1,
    'PPMT' =>$ppmt,
    'IPMT' =>$ipmt
     

);
//========


		endfor;

	return	$cek = $this->db->insert_batch('pengembalian', $data_array);

	}


//INSERT BATCH table total
//berdasarkan ID system_flpp
public function insert_batch3($id){

	$system_flpp = $this->model_system_flpp->find($id);

	// print_r($system_flpp);die();
	
	$batch_id= $system_flpp->batch_id;

	$nama_pemohon = $system_flpp->NAMA_PEMOHON;
	$no_ktp_pemohon = $system_flpp->NO_KTP_PEMOHON;
	
	$tenor= $system_flpp->TENOR;
	$nilai_flpp= $system_flpp->NILAI_FLPP;
	$nilai_kpr= $system_flpp->NILAI_KPR;
	
	// $detail_data = $this->model_app->getSelectedData('upload_verivikasi',$id)->result();
	//============
	//$tenor =10;
	
	$nilai_kpr = $system_flpp->NILAI_KPR; //nama_pemohon
	$tgl_akad = $system_flpp->TGL_AKAD; //tgl_akad
	
	
	
	$bunga_kpr =$system_flpp->SUKU_BUNGA_KPR; //bunga
//----------------
//===================================================
$m_time =   strtotime($tgl_akad);	
// $y_tenor1 		=  date('Y', strtotime($tgl_akad));
// $m_tenor1 		=  date('m', strtotime("+1 month", $tgl_akad)); //+1 month bulan berikutnya
$y_tenor1 =  date('Y', strtotime("+1 months",$m_time));		
$m_tenor1 =  date('m', strtotime("+1 months",$m_time));

$outstanding_tenor1 = $nilai_kpr;
$angsuran_pokok_tenor1 = $nilai_kpr*(($bunga_kpr/12)/(1-pow((($bunga_kpr/12)+1),-$tenor)))-($bunga_kpr*($nilai_kpr/12)) ; //=====5
$angsuran_bunga_tenor1=$nilai_kpr*$bunga_kpr/12; 
$angsuran_total_tenor1 = $angsuran_pokok_tenor1+$angsuran_bunga_tenor1; 

$data_array[] = array(
	"no" => 1,
	"tahun" => $y_tenor1,
  //  "bulan" =>$nama_bln[$bulan],
	"bulan" =>$m_tenor1,
	"outstanding" =>$outstanding_tenor1,
	"angsuran_pokok" =>$angsuran_pokok_tenor1,
	"angsuran_bunga" =>$angsuran_bunga_tenor1,
	"angsuran_total" =>$angsuran_total_tenor1,
	"no_ktp_pemohon" =>$no_ktp_pemohon,
	"batch_id" =>$batch_id,
  
	);
//--------------

// print_r($data_array);die();

// TENOR NEXT LOOP
$no=2;
// $tenor_loop = $tenor - 1;
for ($x = 1; $x < $tenor; $x++):

$no = $x+1;
$z  = $x-1;

// $date = '25/05/2010';
// $date = str_replace('/', '-', $date);
// $y =  date('Y', strtotime($date));

// $m_time =   strtotime($date);

$y 		=  date('Y', strtotime($tgl_akad));
$m_time =   strtotime($tgl_akad);


$m2 =  date('m', strtotime("+".$no." months",$m_time));
$m1 = (string)$m2;            
// $m1 = '$m1';
$y1 =  date('Y', strtotime("+".$no." months",$m_time));		


$outstanding_before	   = $data_array[$z]['outstanding'];
$angsuran_pokok_before = $data_array[$z]['angsuran_pokok'];

//------- 
$outstanding_loop    =((float)$outstanding_before  - (float)$angsuran_pokok_before);
$angsuran_bunga_loop = $outstanding_loop * ($bunga_kpr/12);
$angsuran_pokok_loop =$angsuran_total_tenor1 - $angsuran_bunga_loop;
$angsuran_total_loop = $angsuran_total_tenor1;
// $outstanding_loop='outstanding_loop';
// $angsuran_pokok_loop='angsuran_pokok_loop'; ///
// $angsuran_bunga_loop='angsuran_bunga_loop';
// $angsuran_total_loop='angsuran_total_loop';

$data_array[] = array(
	"no" => $no,
	"tahun" => $y1,
  //  "bulan" =>$nama_bln[$bulan],
	"bulan" =>$m1,
	"outstanding" =>$outstanding_loop,
	"angsuran_pokok" =>$angsuran_pokok_loop,
	"angsuran_bunga" =>$angsuran_bunga_loop,
	"angsuran_total" =>$angsuran_total_loop,
	"no_ktp_pemohon" =>$no_ktp_pemohon,
	"batch_id" =>$batch_id,
  
	);





// $data_array[] = array(	
// 	// 'BatchID' => $BatchID,
// 	'NO_KTP_PEMOHON' => $ktp,
// 	'NO' => $no,
// 	'Y' => $y1, 
// 	'M' => baca_bulan($m1), //helper baca bulan 
// 	'OUTSTANDING' => $outstanding_loop,
// 	'ANGSURAN_POKOK' => $angsuran_pokok_loop,
// 	'ANGSURAN_BUNGA' => $angsuran_bunga_loop,
// 	'ANGSURAN_TOTAL' => $angsuran_total_t1
	
			 
// );
endfor;

// print_r($data_array);die();
$sum_outstanding=0;
$sum_pokok=0;
$sum_bunga=0;
$sum_total=0;
foreach ($data_array as $name => $value) {



$outstanding = $value['outstanding'];
$angsuran_pokok = $value['angsuran_pokok'];
$angsuran_bunga = $value['angsuran_bunga'];
$angsuran_total = $value['angsuran_total'];

$sum_outstanding += $value['outstanding'];
$sum_pokok += $value['angsuran_pokok'];
$sum_bunga += $value['angsuran_bunga'];
$sum_total += $value['angsuran_total'];


// $sum_outstanding1 = number_format(round($sum_outstanding,0),0,',','.');
// $sum_pokok1 = number_format(round($sum_pokok,0),0,',','.');
// $sum_bunga1 = number_format(round($sum_bunga,0),0,',','.');
// $sum_total1 = number_format(round($sum_total,0),0,',','.');



 $temp_array_detail[] = array(

  "tahun" => $value['tahun'],
  "bulan" => $value['bulan'],
  "outstanding" => $outstanding,
  "angsuran_pokok" => $angsuran_pokok,
  "angsuran_bunga" => $angsuran_bunga,
  "angsuran_total" => $angsuran_total,
  "no_ktp_pemohon" =>$no_ktp_pemohon,
  "batch_id" =>$batch_id,



  );


}

//cek array
//print_r($temp_array_detail);
//die();

// $insert = $this->db->insert_batch('total',$temp_array_detail);
// ----

	$cek = $this->db->insert_batch('total', $temp_array_detail);
// print_r($cek);
return $cek;
}




	public function report(){


		// $this->data['no_ktp'] = $ktp;

		$this->template->title('System Flpp Report pengembalian');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_report', $this->data);
	


	}

	public function report_total($batch_id){

		$data_generate=$this->db->query("
SELECT
batch_id,
bulan,
tahun,
sum(outstanding) as outstanding ,
sum(angsuran_pokok) as angsuran_pokok,
sum(angsuran_bunga) as angsuran_bunga,
sum(angsuran_total) as angsuran_total
FROM total
WHERE batch_id=$batch_id
group by batch_id,tahun,bulan
order by batch_id,tahun

")->result();
// print_r($data_generate);die();

foreach($data_generate as $value){

	$temp_array_total[] = array(
	//$angsuran_total = $value->angsuran_total;
	//$total_dana = 0,9 * $angsuran_total;
	//$no_ktp_pemohon
	//  "no" => $no,
	  "tahun" => $value->tahun,
	  "bulan" => $value->bulan,
	  "sum_outstanding" => $value->outstanding,
	  "sum_angsuran_pokok" => $value->angsuran_pokok,
	  "sum_angsuran_bunga" => $value->angsuran_bunga,
	  "total_dana" => bunga() * $value->angsuran_pokok , //---->by (bunga/100) where MONTH AND YEAR from table total
	//  "angsuran_sisa" => $value->angsuran_sisa,
	  "batch_id" =>$value->batch_id,
	
	  //  "no_ktp_pemohon" => $value['outstanding'],
	
	//  "sum_outstanding1" => $angsuran_total,
	  //"sum_pokok1" => $sum_pokok1,
	  //"sum_bunga1" => $sum_bunga1,
	  //"sum_total1" => $sum_total1,
	
	  );
	
	}


	print_r($temp_array_total);die();
	$table = '';
	$table .= '
<table class="table table-bordered table-striped">

    <thead style="background-color: grey;"  >
	<tr>
	<td>NO</td>
	<td colspan="2">BULAN</td>
	<td>OUTSTANDING POKOK</td>
	<td>ANGSURAN POKOK</td>
	<td>ESTIMASI ANGSURAN TARIF</td>
	<td>SISA POKOK</td>
	</tr>

	<tr>
	<td>1</td>
	<td colspan="2">2</td>
	<td>3</td>
	<td>4</td>
	<td>5</td>
	<td>6=3-4</td>
	</tr>

	</thead>

	
	
	';
	// $table .= '';



	echo $table;
	

	}

	public function export_pengembalian($batch_id,$type){

		$results=$this->db->query("SELECT * FROM pengembalian WHERE BatchID=$batch_id ORDER BY Y,M,BatchID ")->result();
		$results_sf =$this->db->query("SELECT * FROM system_flpp WHERE batch_id=$batch_id  ")->result();
		// print_r($results_sf);die();
		$this->data['results'] = $results;
		$this->data['results_sf'] = $results_sf;


		$table = '';
		$table .= '<table border=1 >';
		
		
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th>NO</th>';
		$table .= '<th>NAMA_PEMOHON</th>';
		$table .= '<th>NILAI_KPR</th>';
		$table .= '<th>SUKU_BUNGA_KPR</th>';
		$table .= '<th>TENOR</th>';
		$table .= '<th>ANGSURAN_KPR</th>';
		$table .= '<th>NILAI_FLPP</th>';
		$table .= '<th>TGL_AKAD</th>';

$max_tenor=240;		
for($i=1;$i<=$max_tenor;$i++){
			$table .= '<th>'.$i.'</th>';


}
		// if($type='PPMT'){
		// 	$table .= '<th>PPMT</th>';
		// }else{
		// 	$table .= '<th>IPMT</th>';
		// }

		// foreach($results_sf as $sf):
		// 	$detail_loop = $this->db->query("SELECT * FROM pengembalian WHERE NO_KTP_PEMOHON=$sf->NO_KTP_PEMOHON")->row();
		// 	$loop='XXXX';
		// 	// print_r($detail_loop);
		// // $table .= '<th>LOOP</th>';
		// 		// foreach($detail_loop as $loop):
		// 			$table .= '<th>'.$loop.'</th>';
		// 		// endforeach;
		// endforeach;

		$table .= '</tr>';
		$table .= '</thead>';
		
		$no=1;		
		foreach($results_sf as $sf):
		$table .= '<tbody>';
		$table .= '<tr>';
		$table .= '<td>'.$no++.'</td>';
		$table .= '<td>'.$sf->NAMA_PEMOHON.'</td>';
		$table .= '<td>'.$sf->NILAI_KPR.'</td>';
		$table .= '<td>'.$sf->SUKU_BUNGA_KPR.'</td>';
		$table .= '<td>'.$sf->TENOR.'</td>';
		$table .= '<td>'.$sf->ANGSURAN_KPR.'</td>';
		$table .= '<td>'.$sf->NILAI_FLPP.'</td>';
		$table .= '<td>'.$sf->TGL_AKAD.'</td>';
		

					$detail_loop = $this->db->query("SELECT * FROM pengembalian WHERE NO_KTP_PEMOHON=$sf->NO_KTP_PEMOHON")->result();

					foreach($detail_loop as $loop):
//Tarif FLPP = 75% * (Bunga FLPP/Bunga KPR Sejahtera) * Tarif KPR Sejahtera
$tarif_flpp = 	(75/100) * ((0.5/100)/(5/100)) * $loop->IPMT;					
if($type == 'PPMT'){
	$table .= '<td>'.$loop->PPMT.'</td>';
}elseif($type == 'IPMT'){
	$table .= '<td>'.$loop->IPMT.'</td>';
}else{
	$table .= '<td>'.$tarif_flpp.'</td>';
}
// $table .= '<td>'.$loop->IPMT.'</td>';

					endforeach;

							$table .= '</tr>';
		$table .= '</tbody>';		
		endforeach;

		
		$table .= '</table>';

		// echo $table;die();


		// $data['table'] = $table;

		$this->data['table'] = $table;
		$this->data['nama_file'] = $batch_id.'_'.$type;

		$this->load->view('backend/standart/administrator/system_flpp/system_flpp_export_pengembalian', $this->data);

		

	}

}


/* End of file system_flpp.php */
/* Location: ./application/controllers/administrator/System Flpp.php */