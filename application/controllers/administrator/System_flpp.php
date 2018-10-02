<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| System Flpp Controller
*| --------------------------------------------------------------------------
*| System Flpp site
*|
*/
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

	public function report(){


		// $this->data['no_ktp'] = $ktp;

		$this->template->title('System Flpp Report pengembalian');
		$this->render('backend/standart/administrator/system_flpp/system_flpp_report', $this->data);
	


	}


}


/* End of file system_flpp.php */
/* Location: ./application/controllers/administrator/System Flpp.php */