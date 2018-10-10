<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Mismerdetail Controller
*| --------------------------------------------------------------------------
*| Mismerdetail site
*|
*/
class Mismerdetail extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_Report');
		$this->load->model('model_mismerdetail');
	}

	/**
	* show all Mismerdetails
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('mismerdetail_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mismerdetails'] = $this->model_mismerdetail->get($filter, $field, $this->limit_page, $offset);
		$this->data['mismerdetail_counts'] = $this->model_mismerdetail->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/mismerdetail/index/',
			'total_rows'   => $this->model_mismerdetail->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mismerdetail List');
		$this->render('backend/standart/administrator/mismerdetail/mismerdetail_list', $this->data);
	}
	
	/**
	* Add new mismerdetails
	*
	*/
	public function add()
	{
		$this->is_allowed('mismerdetail_add');

		$this->template->title('Mismerdetail New');
		$this->render('backend/standart/administrator/mismerdetail/mismerdetail_add', $this->data);
	}

	/**
	* Add New Mismerdetails
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('mismerdetail_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[45]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
			];

			
			$save_mismerdetail = $this->model_mismerdetail->store($save_data);

			if ($save_mismerdetail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mismerdetail;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/mismerdetail/edit/' . $save_mismerdetail, 'Edit Mismerdetail'),
						anchor('administrator/mismerdetail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/mismerdetail/edit/' . $save_mismerdetail, 'Edit Mismerdetail')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismerdetail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismerdetail');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Mismerdetails
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('mismerdetail_update');

		$this->data['mismerdetail'] = $this->model_mismerdetail->find($id);

		$this->template->title('Mismerdetail Update');
		$this->render('backend/standart/administrator/mismerdetail/mismerdetail_update', $this->data);
	}

	/**
	* Update Mismerdetails
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('mismerdetail_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[45]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
			];

			
			$save_mismerdetail = $this->model_mismerdetail->change($id, $save_data);

			if ($save_mismerdetail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/mismerdetail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismerdetail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismerdetail');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Mismerdetails
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('mismerdetail_delete');

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
            set_message(cclang('has_been_deleted', 'mismerdetail'), 'success');
        } else {
            set_message(cclang('error_delete', 'mismerdetail'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Mismerdetails
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('mismerdetail_view');

		$this->data['mismerdetail'] = $this->model_mismerdetail->join_avaiable()->find($id);

		$this->template->title('Mismerdetail Detail');
		$this->render('backend/standart/administrator/mismerdetail/mismerdetail_view', $this->data);
	}
	
	/**
	* delete Mismerdetails
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$mismerdetail = $this->model_mismerdetail->find($id);

		
		
		return $this->model_mismerdetail->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('mismerdetail_export');

		$this->model_mismerdetail->export('mismerdetail', 'mismerdetail');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('mismerdetail_export');

		$this->model_mismerdetail->pdf('mismerdetail', 'mismerdetail');
	}

	public function update_unmatch(){

		$res = 			$this->db->query("
		
		UPDATE
		mismerdetail
		SET CHANNEL='EXH'
		WHERE MERCHAN_DBA_NAME like'%EXH%';

		");

	if($res){
		echo '<script>alert("generate succes");</script>';

		// delete templateuploadmismer
		$this->db->query(" 
		INSERT INTO mismerunmatch
		
		SELECT 
		RowID,
		BatchID,
		OPEN_DATE,
		MID,
		MERCHAN_DBA_NAME,
		MSO,
		SOURCE_CODE,
		POS1,
		WILAYAH,
		CHANNEL,
		TYPE_MID,
		0 IS_UPDATE
		
		FROM mismerdetail
		WHERE TYPE_MID='EDC'
		AND CHANNEL IS NULL
		;
		");		
		// redirect mismerdetail
		redirect(site_url('administrator/mismerdetail'),'refresh');
	}

	}
// 
//dev report
public function report()
{


	$tahun = $this->input->get('tahun');
	$bulan 	= $this->input->get('bulan');
	
	$this->data['query'] = $this->model_mismerdetail->get_report($bulan, $tahun);
	
	$this->data['tahun'] = $tahun;
	$this->data['bulan'] = $bulan;

	$this->template->title('Mismerdetail Report List');
	$this->render('backend/standart/administrator/mismerdetail/mismerdetail_list_report', $this->data);
// dev	//alt 
	// $this->render('backend/standart/administrator/Report/Report_list_dev', $this->data);
}


public function getReport($tgl_awal,$tgl_akhir){

	$tgl_awal= date("Y-m-d",strtotime($tgl_awal));
	$tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));

	$report = $this->model_mismerdetail->get_report_between($tgl_awal,$tgl_akhir);

	// echo"RESULTXXXXXXXXXXXXXXXXX".$tgl_awal."---------".$tgl_akhir;
	// print_r($report);
	$output_tabel='';

	$output_tabel.='

	<table class="table table-bordered table-striped" id="mytable">
		<thead>
		<tr>
			<th width="80px">WILAYAH</th>
			<th>EDC</th>
			<th>YAP</th>
			<th>TOTAL</th>
			<th>ACT</th>
			
		</tr>
		</thead>
	<tbody>';
//---------------
	 $start = 1;
		foreach ($report as $r)
	   {

$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;			
$output_tabel.='
		<tr>
		<td>'.$r->WILAYAH.'</td>
		<td>'.$r->JUMLAH_EDC.'</td>
		<td>'.$r->JUMLAH_YAP.'</td>
		<td>'.$jumlah.'</td>
		<td>
		<button type="button" id="detail" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" class=" btn btn-primary"   >Detail</button>			
		</td>
		</tr>
';            
// <button type="button" id="detail" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" class=" btn btn-primary"   Onclick="get_detail()">Detail</button>			


}

//---------------	
	
$output_tabel.='
	</tbody>
	

	
	</table>	
';

// $output_tabel.='
//         <script type="text/javascript">
//             $(document).ready(function () {

// 				// function get_detail($tgl_awal,$tgl_akhir){
// 					// // alert('detail');
// 					// var d=new Date($tgl_awal);
// 					// console.log(d);
// 					// console.log(typeof $tgl_akhir);
// 					// console.log($tgl_akhir);
// 					// }				

//             });
//         </script>
// ';		

//$output_tabel.='<br/> AgencyID : '.$AgencyID;
//$output_tabel.='</br> SalesCenterID : '.$SalesCenterID;
	
	
	
	echo $output_tabel;



}
// 
//dev
public function getModal_between($tgl_awal,$tgl_akhir,$wilayah){

	return $this->db->query("
	
	select
	
	WILAYAH,
	CASE
	WHEN CHANNEL IS NULL THEN  '?'
	ELSE CHANNEL
	END as CHANNEL,
	SUM(IFNULL(JUMLAH_YAP,0)) JUMLAH_YAP,
	SUM(IFNULL(JUMLAH_EDC,0)) JUMLAH_EDC,
	BULAN,
	TAHUN
	from
	(
	
		select
		a.WILAYAH,
		a.CHANNEL,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_YAP,
		0 JUMLAH_EDC,
		a.BULAN,
		a.TAHUN
		 ,a.OPEN_DATE
		from
		VW_YAP2 a left join VW_EDC2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE
		group by a.WILAYAH,a.CHANNEL,a.BULAN,a.TAHUN ,a.OPEN_DATE
		
		union
		
		select
		a.WILAYAH,
		a.CHANNEL,
		sum(IFNULL(b.JUMLAH,0)) JUMLAH_YAP,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_EDC,
		a.BULAN,
		a.TAHUN,
		a.OPEN_DATE
		from
		VW_EDC2 a left join VW_YAP2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE
		group by a.WILAYAH,a.CHANNEL,a.BULAN,a.TAHUN ,a.OPEN_DATE
	
	
	-- UNION UNMATCH
	
	
	
	)a
	where
	OPEN_DATE  
	between '$tgl_awal' AND '$tgl_akhir'
    AND WILAYAH='$wilayah'
	GROUP BY WILAYAH,CHANNEL,BULAN,TAHUN;	
	
	")->result();
// 	union
	
// 	  SELECT 
// 	tu.WILAYAH AS WILAYAH,
// 	ch.CHANNEL AS CHANNEL,
// 	0 JUMLAH_YAP,
// 	COUNT(tu.MID) AS JUMLAH_EDC,
// 	EXTRACT(MONTH FROM tu.OPEN_DATE) AS BULAN,
// 	EXTRACT(YEAR FROM tu.OPEN_DATE) AS TAHUN,
// 	tu.OPEN_DATE
// FROM
// 	templateunmatch tu
// LEFT JOIN channel ch ON tu.CHANNEL = ch.ID 
// GROUP BY tu.WILAYAH ,tu.CHANNEL ,tu.OPEN_DATE   
	
}



// ==================
public function get_report_unmatch($bulan,$tahun){

	return $this->db->query("
	
	SELECT * FROM mismerunmatch
	WHERE EXTRACT(YEAR FROM OPEN_DATE)='$tahun'
	AND EXTRACT(MONTH FROM OPEN_DATE)='$bulan'	
	")->result();

}




	public function getModal($tahun,$bulan,$wilayah){

		return $this->db->query("
		

		select
        
		WILAYAH,
		CASE
		WHEN CHANNEL IS NULL THEN  '?'
		ELSE CHANNEL
		END as CHANNEL,
		SUM(IFNULL(JUMLAH_YAP,0)) JUMLAH_YAP,
		SUM(IFNULL(JUMLAH_EDC,0)) JUMLAH_EDC,
		BULAN,
		TAHUN
		from
		(
        
		select
		a.WILAYAH,
		a.CHANNEL,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_YAP,
		0 JUMLAH_EDC,
		a.BULAN,
		a.TAHUN
		from
		VW_YAP2 a left join VW_EDC2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.CHANNEL,a.BULAN,a.TAHUN
        
		union
        
		select
		a.WILAYAH,
		a.CHANNEL,
		sum(IFNULL(b.JUMLAH,0)) JUMLAH_YAP,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_EDC,
		a.BULAN,
		a.TAHUN
		from
		VW_EDC2 a left join VW_YAP2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.CHANNEL,a.BULAN,a.TAHUN


-- UNION UNMATCH

		union
		
		  SELECT 
        tu.WILAYAH AS WILAYAH,
        ch.CHANNEL AS CHANNEL,
        0 JUMLAH_YAP,
        COUNT(tu.MID) AS JUMLAH_EDC,
        EXTRACT(MONTH FROM tu.OPEN_DATE) AS BULAN,
        EXTRACT(YEAR FROM tu.OPEN_DATE) AS TAHUN
    FROM
        templateunmatch tu
	LEFT JOIN channel ch ON tu.CHANNEL = ch.ID 
    GROUP BY tu.WILAYAH , ch.CHANNEL,tu.OPEN_DATE    


		)a
		where
		bulan = '$bulan' and tahun = '$tahun' AND WILAYAH='$wilayah'
		GROUP BY WILAYAH,CHANNEL,BULAN,TAHUN;	

		
		")->result();

	}

// ----------------
 public function getResult1($tgl_awal,$tgl_akhir){


	$tgl_awal= date("Y-m-d",strtotime($tgl_awal));
	$tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));

	// $report = $this->model_Report->get_report_between($tgl_awal,$tgl_akhir);
	$report = $this->model_mismerdetail->getResult1($tgl_awal,$tgl_akhir);



	$tabel_result1='';
	// $tabel_result1.='';
	$tabel_result1.='
	<table class="blueTable">
	<thead>
	<tr>
	<th width="10%">WILAYAH</th>
	<th width="10%">EDC</th>
	<th width="10%">YAP</th>
	<th width="10%">TOTAL</th>
	<th width="10%">#</th>
	</tr>
	</thead>
	
	<tbody>

	';


	$tot=0;
	$tot1=0;
	$tot2=0;
	$total=0;	
// 
	foreach ($report as $r)
	{

// total
$tot1+=$r->JUMLAH_EDC;
$tot2+=$r->JUMLAH_YAP;
$total =$tot1+$tot2;
// total


$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

	$tabel_result1.='
	<tr>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->JUMLAH_EDC.'</td>
	<td>'.$r->JUMLAH_YAP.'</td>
	<td>'.$jumlah.'</td>
	<td>
	<button type="button" id="detail1" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" class=""   >Detail</button>			
	</td>
	</tr>
	';

}
// end forech

	$tabel_result1.='
	<tfoot>
	<tr >
	<td >TOTAL</td>
	<td>'.$tot1.'</td>
	<td>'.$tot2.'</td>
	<td>'.$total.'</td>
	<td></td>
	</tr>
	</tfoot>
	';
	
	$tabel_result1.='
	</tbody>
	</table>

	
	';

	echo $tabel_result1;

 }

// result 2

// ----------------
public function getResult2($tahun,$bulan){


	// $report = $this->model_Report->get_report($bulan,$tahun);
	$report = $this->model_mismerdetail->getresult2($bulan,$tahun);



	$tabel_result2='';
	// $tabel_result1.='';
	$tabel_result2.='
	<table class="blueTable">
	<thead>
	<tr>
	<th width="10%">WILAYAH</th>
	<th width="10%">EDC</th>
	<th width="10%">YAP</th>
	<th width="10%">TOTAL</th>
	<th width="10%">#</th>
	</tr>
	</thead>
	
	<tbody>

	';


	$tot=0;
	$tot1=0;
	$tot2=0;
	$total=0;	

	foreach ($report as $r)
	{

// total
$tot1+=$r->JUMLAH_EDC;
$tot2+=$r->JUMLAH_YAP;
$total =$tot1+$tot2;
// total


$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

	$tabel_result2.='
	<tr>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->JUMLAH_EDC.'</td>
	<td>'.$r->JUMLAH_YAP.'</td>
	<td>'.$jumlah.'</td>
	<td>
	<button type="button" id="detail2" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
	</td>
	</tr>
	';

}
// end forech

	$tabel_result2.='
	<tfoot>
	<tr >
	<td >TOTAL</td>
	<td>'.$tot1.'</td>
	<td>'.$tot2.'</td>
	<td>'.$total.'</td>
	<td></td>
	</tr>
	</tfoot>
	';
	
	$tabel_result2.='
	</table>

	
	';

	echo $tabel_result2;

// 	$tabel_result2='';
// 	// $tabel_result1.='';
// 	$tabel_result2.='
// 	<table class="blueTable">
// <thead>
// <tr>
// <th>WILAYAH</th>
// <th>EDC</th>
// <th>YAP</th>
// <th>TOTAL</th>
// <th>#</th>
// </tr>
// </thead>

// <tbody>
// <tr>
// <td>cell1_1</td>
// <td>cell2_1</td>
// <td>cell3_1</td>
// <td>cell4_1</td>
// <td>cell5_1</td>
// </tr>
// <tr>
// <td>cell1_2</td>
// <td>cell2_2</td>
// <td>cell3_2</td>
// <td>cell4_2</td>
// <td>cell5_2</td>
// </tr>
// <tr>
// <td>cell1_3</td>
// <td>cell2_3</td>
// <td>cell3_3</td>
// <td>cell4_3</td>
// <td>cell5_3</td>
// </tr>
// </tbody>
// </table>
// 	';

// 	echo $tabel_result2;

 }

// MODAL result1
	public function getModalResult1($tgl_awal,$tgl_akhir,$wilayah){

		// $query = $this->model_Report->getModal_between($tgl_awal,$tgl_akhir,$wilayah);
		$query = $this->model_mismerdetail->getModalResult1($tgl_awal,$tgl_akhir,$wilayah);
		//print_r($query);die();
		
		$tabel='';
		
		
		
		// -------------
		$tabel.='
		<div class="modal-content">
	
				<div class="modal-header">
	<center>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
	<h5 class="modal-title" id="myModalLabel">Periode :  '.$tgl_awal.'  s/d : '.$tgl_akhir.'</h5>
	</center>
				</div>
				<div class="modal-body">
		 ';
	// -------------
	
		$tabel.='
		<center>
		<table class="blueTable">
		<thead>
			 <tr>
	
					<th>CHANNEL</th>
					<th>JUMLAH YAP</th>
					<th>JUMLAH EDC</th>
					<th>TOTAL</th>
	
			 </tr>
		</thead>';
	
	
		$tabel.='
				<tbody>';
	
				$tot=0;
				$tot1=0;
				$tot2=0;
				$total=0;
	
	
		foreach ($query as $q) {
	$jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;
	
	$tot1+=$q->JUMLAH_EDC;
	$tot2+=$q->JUMLAH_YAP;
	
	$total =$tot1+$tot2;
	
				$tabel.='
	<tr>
	
				<td>'.$q->CHANNEL.'</td>
				<td></td>
				<td>'.$q->JUMLAH_EDC.'</td>
				<td></td>
	</tr>';
	
	}
	
	
	$tabel.='</tbody>';
	
	$tabel.='
	<tfoot>
	<tr>
	<td>TOTAL</td>
	<td>'.$tot2.'</td>
	<td>'.$tot1.'</td>
	<td>'.$total.'</td>
	</tr>
	</tfoot>
	';
	
	$tabel.='
		</table>
		</center>		
		';
	// ------------
	
	$tabel.='
	
	</div>
	
	
	</div>
		';
	
	
	echo $tabel;
	}	


// MODAL Result2
public function getModalResult2($tahun,$bulan,$wilayah){

	// $query = $this->model_Report->getModal($tahun,$bulan,$wilayah);
	$query = $this->model_mismerdetail->getModalResult2($tahun,$bulan,$wilayah);
		// print_r($query);die();
		
		$tabel='';
		
		
		
		// -------------
		$tabel.='
		<div class="modal-content">
	
				<div class="modal-header">
	<center>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
	<h5 class="modal-title" id="myModalLabel">Bulan :  '.baca_bulan($bulan).'  Tahun : '.$tahun.'</h5>
	</center>
				</div>
				<div class="modal-body">
		 ';
	// -------------
	
		$tabel.='
		<center>
		<table class="blueTable">		
		<thead>
			 <tr>
	
					<th>CHANNEL</th>
					<th>JUMLAH YAP</th>
					<th>JUMLAH EDC</th>
					<th>TOTAL</th>
	
			 </tr>
		</thead>';
	
	
		$tabel.='
				<tbody>';
	
				$tot=0;
				$tot1=0;
				$tot2=0;
				$total=0;
	
	
		foreach ($query as $q) {
	$jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;
	
	$tot1+=$q->JUMLAH_EDC;
	$tot2+=$q->JUMLAH_YAP;
	
	$total =$tot1+$tot2;
	
				$tabel.='
	<tr>
	
				<td>'.$q->CHANNEL.'</td>
				<td></td>
				<td>'.$q->JUMLAH_EDC.'</td>
				<td></td>
	</tr>';
	
	}
	
	
	$tabel.='</tbody>';
	
	$tabel.='
	<tfoot>
	<tr>
	<td>TOTAL</td>
	<td>'.$tot2.'</td>
	<td>'.$tot1.'</td>
	<td>'.$total.'</td>
	</tr>
	</tfoot>
	';
	
	$tabel.='
		</table>
		</center>		
		';
	// ------------
	
	$tabel.='
	
	</div>
	
	
	</div>
		';
	
	
	echo $tabel;
	}
<<<<<<< HEAD
	

// EXPORT
public function getExport2($tahun,$bulan){


	// $report = $this->model_Report->get_report($bulan,$tahun);
	$report = $this->model_mismerdetail->getresult2($bulan,$tahun);


// print_r($report);die();

	$tabel_result2='';
	// $tabel_result1.='';
	$tabel_result2.='
	<table class="blueTable">
	<thead>
	<tr>
	<th width="10%">WILAYAH</th>
	<th width="10%">EDC</th>
	<th width="10%">YAP</th>
	<th width="10%">TOTAL</th>

	</tr>
	</thead>
	
	<tbody>

	';


	$tot=0;
	$tot1=0;
	$tot2=0;
	$total=0;	

	foreach ($report as $r)
	{

// total
$tot1+=$r->JUMLAH_EDC;
$tot2+=$r->JUMLAH_YAP;
$total =$tot1+$tot2;
// total


$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

	$tabel_result2.='
	<tr>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->JUMLAH_EDC.'</td>
	<td>'.$r->JUMLAH_YAP.'</td>
	<td>'.$jumlah.'</td>

	</tr>
	';

}
// end forech

	$tabel_result2.='
	<tfoot>
	<tr >
	<td >TOTAL</td>
	<td>'.$tot1.'</td>
	<td>'.$tot2.'</td>
	<td>'.$total.'</td>
	</tr>
	</tfoot>
	';
	
	$tabel_result2.='
	</table>

	
	';

	echo $tabel_result2;

// 	$tabel_result2='';
// 	// $tabel_result1.='';
// 	$tabel_result2.='
// 	<table class="blueTable">
// <thead>
// <tr>
// <th>WILAYAH</th>
// <th>EDC</th>
// <th>YAP</th>
// <th>TOTAL</th>
// <th>#</th>
// </tr>
// </thead>

// <tbody>
// <tr>
// <td>cell1_1</td>
// <td>cell2_1</td>
// <td>cell3_1</td>
// <td>cell4_1</td>
// <td>cell5_1</td>
// </tr>
// <tr>
// <td>cell1_2</td>
// <td>cell2_2</td>
// <td>cell3_2</td>
// <td>cell4_2</td>
// <td>cell5_2</td>
// </tr>
// <tr>
// <td>cell1_3</td>
// <td>cell2_3</td>
// <td>cell3_3</td>
// <td>cell4_3</td>
// <td>cell5_3</td>
// </tr>
// </tbody>
// </table>
// 	';

// 	echo $tabel_result2;

 }

=======

	
// DASHBOARD
	public function getDashboard(){



		$query = $this->db->query('

		SELECT
				
		WILAYAH,
		SUM(IFNULL(JUMLAH_YAP,0)) JUMLAH_YAP,
		SUM(IFNULL(JUMLAH_EDC,0)) JUMLAH_EDC,
		-- 		BULAN,
		-- 		TAHUN
		EXTRACT(MONTH FROM OPEN_DATE) AS BULAN,
		EXTRACT(YEAR FROM OPEN_DATE) AS TAHUN,
		OPEN_DATE
		
		from
		(
		
		select
		a.WILAYAH,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_YAP,
		0 JUMLAH_EDC,
		-- 		a.BULAN,
		-- 		a.TAHUN
		a.OPEN_DATE
		
		from
		VW_YAP2 a left join VW_EDC2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE -- a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.OPEN_DATE -- a.BULAN,a.TAHUN
		
		union
		
		select
		a.WILAYAH,
		sum(IFNULL(b.JUMLAH,0)) JUMLAH_YAP,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_EDC,
		-- 		a.BULAN,
		-- 		a.TAHUN
		a.OPEN_DATE
		from
		VW_EDC2 a left join VW_YAP2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE -- a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.OPEN_DATE -- a.BULAN,a.TAHUN
		
		
		-- UNION UNMATCH
		
		union
		
		SELECT 
		mu.WILAYAH AS WILAYAH,
		0 JUMLAH_YAP,
		SUM(mu.POS1) AS JUMLAH_EDC,
		-- EXTRACT(MONTH FROM mu.OPEN_DATE) AS BULAN,
		--  EXTRACT(YEAR FROM mu.OPEN_DATE) AS TAHUN
		mu.OPEN_DATE
		FROM
		mismerunmatch mu
		-- LEFT JOIN channel ch ON tu.CHANNEL = ch.ID 
		WHERE mu.IS_UPDATE=1
		GROUP BY mu.WILAYAH ,mu.OPEN_DATE 
		
		
		
		
		)a
		GROUP BY WILAYAH
		')->result();
		
		
		$table = array();
		$table['cols'] = array(
			/* Disini kita mendefinisikan fata pada tabel database
			 * masing-masing kolom akan kita ubah menjadi array
			 * Kolom tersebut adalah parameter (string) dan nilai (integer/number)
			 * Pada bagian ini kita juga memberi penamaan pada hasil chart nanti
			 */
			// array('label' => 'npp', 'type' => 'string'),
			// array('label' => 'performance', 'type' => 'number')
			array('label' => 'WILAYAH', 'type' => 'string'),
			array('label' => 'JUMLAH_EDC', 'type' => 'number'),
			array('label' => 'JUMLAH_YAP', 'type' => 'number')
			
		);
		// melakukan query yang akan menampilkan array data
		$rows = array();
		// while($r = mysql_fetch_assoc($query)) {
			
			foreach($query as $r){			
				$temp = array();
				// masing-masing kolom kita masukkan sebagai array sementara
				$temp[] = array('v' => $r->WILAYAH);
				$temp[] = array('v' => (int) $r->JUMLAH_EDC);
				$temp[] = array('v' => (int) $r->JUMLAH_YAP);
				$rows[] = array('c' => $temp);
			}
			// mempopulasi row tabel
			$table['rows'] = $rows;
			/*
			*/		
		



// encode tabel ke bentuk json
$jsonTable = json_encode($table);
// set up header untuk JSON, wajib.
// header('Cache-Control: no-cache, must-revalidate');
// header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
// header('Content-type: application/json');
// menampilkan data h
echo $jsonTable;



	}


// --------------
public function getdata() 
        { 
        // $data = $this->Our_chart_model->get_all_fruits(); 
 
		$data = $this->db->query('

		SELECT
				
		WILAYAH,
		SUM(IFNULL(JUMLAH_YAP,0)) JUMLAH_YAP,
		SUM(IFNULL(JUMLAH_EDC,0)) JUMLAH_EDC,
		-- 		BULAN,
		-- 		TAHUN
		EXTRACT(MONTH FROM OPEN_DATE) AS BULAN,
		EXTRACT(YEAR FROM OPEN_DATE) AS TAHUN,
		OPEN_DATE
		
		from
		(
		
		select
		a.WILAYAH,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_YAP,
		0 JUMLAH_EDC,
		-- 		a.BULAN,
		-- 		a.TAHUN
		a.OPEN_DATE
		
		from
		VW_YAP2 a left join VW_EDC2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE -- a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.OPEN_DATE -- a.BULAN,a.TAHUN
		
		union
		
		select
		a.WILAYAH,
		sum(IFNULL(b.JUMLAH,0)) JUMLAH_YAP,
		sum(IFNULL(a.JUMLAH,0)) JUMLAH_EDC,
		-- 		a.BULAN,
		-- 		a.TAHUN
		a.OPEN_DATE
		from
		VW_EDC2 a left join VW_YAP2 b
		on a.wilayah = b.wilayah and a.channel = b.channel and a.OPEN_DATE=b.OPEN_DATE -- a.bulan = b.bulan and a.tahun = b.tahun
		group by a.WILAYAH,a.OPEN_DATE -- a.BULAN,a.TAHUN
		
		
		-- UNION UNMATCH
		
		union
		
		SELECT 
		mu.WILAYAH AS WILAYAH,
		0 JUMLAH_YAP,
		SUM(mu.POS1) AS JUMLAH_EDC,
		-- EXTRACT(MONTH FROM mu.OPEN_DATE) AS BULAN,
		--  EXTRACT(YEAR FROM mu.OPEN_DATE) AS TAHUN
		mu.OPEN_DATE
		FROM
		mismerunmatch mu
		-- LEFT JOIN channel ch ON tu.CHANNEL = ch.ID 
		WHERE mu.IS_UPDATE=1
		GROUP BY mu.WILAYAH ,mu.OPEN_DATE 
		
		
		
		
		)a
		GROUP BY WILAYAH
		')->result();


        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "WILAYAH", 
            "pattern" => "", 
            "type" => "string" 
		);
		 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "JUMLAH_YAP", 
            "pattern" => "", 
            "type" => "number" 
		); 
		
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "JUMLAH_EDC", 
            "pattern" => "", 
            "type" => "number" 
		); 
		
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->WILAYAH", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->JUMLAH_YAP, 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->JUMLAH_EDC, 
                    "f" => null 
                ) 
            ); 
            } 
 
		echo json_encode($responce);
		 
		// header('Cache-Control: no-cache, must-revalidate');
		// header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		// header('Content-type: application/json');
		
        } 

// ----------
		public function dashboard(){

			$this->template->title('Mismerdetail DASHBOARD');
			$this->render('backend/standart/administrator/mismerdetail/dashboard', $this->data);
		}


		public function map(){

			$this->template->title('Mismerdetail DASHBOARD');
			$this->render('backend/standart/administrator/mismerdetail/map', $this->data);
		}
>>>>>>> ada2f086ef4ab2d082bf2654696547dae4ee75a1



}


/* End of file mismerdetail.php */
/* Location: ./application/controllers/administrator/Mismerdetail.php */