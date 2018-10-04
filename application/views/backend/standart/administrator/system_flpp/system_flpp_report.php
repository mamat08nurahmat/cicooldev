<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 80%;
  text-align: left;

}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 1px 1px;
}
table.blueTable tbody td {
  font-size: 15px;
  font-weight: bold;  
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  /* 
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;    
  */
  font-size: 14px;
  font-weight: bold;
  color:#070B00;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444; 
}
table.blueTable tfoot td {
  font-size: 14px;
}
/* table.blueTable tfoot .links {
  text-align: right;
} */
/* table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
} */

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Mismerdetail<small>Report></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mismerdetail Report</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

		
		
<!---
    <div class="page-header">
        <h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
    </div>
-->
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Pengembalian All Batch</a></li>
                            <!-- <li><a href="#tab2default" data-toggle="tab">Pengembalian Perbulan</a></li>    	 -->
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">

 <!--TAB 1 Active  -->
<div class="tab-pane fade in active" id="tab1default">
<form class="form-inline">

<div class="form-group mx-sm-3 mb-2">
<label for="batch">Batch</label>
     <select  class="form-control" name="batch_id" id="batch_id" data-placeholder="Select batch" >
      <option value=""></option>
      <?php foreach (db_get_all_data_distinct_batch('system_flpp') as $row): ?>
        <option value="<?= $row->batch_id ?>"><?= $row->batch_id; ?></option>
      <?php endforeach; ?>  
    </select>
</div>

<div class="form-group mx-sm-3 mb-2">

<label for="batch">Type</label>
     <select  class="form-control" name="type" id="type"  >
     <option value="FLPP">Tarif FLPP</option>
     <option value="IPMT">IPMT</option>
     <option value="PPMT">PPMT</option>
    </select>

</div>
<button type="button" id="export_batch" class="btn btn-primary">Export</button>
</form>
						


<hr>

<!-- RESULT  -->
<!-- <div id='result1'></div> -->

<!-- <table class="blueTable">
<thead>
<tr>
<th>NO_KTP</th>
<th>NAMA_PEMOHON</th>
<th>PERIODE</th>
<th>M</th>
<th>Y</th>
<th>PPMT(POKOK)</th>
<th>IPMT(BUNGA)</th>
</tr>
</thead>

<tbody>

<tr>
<td>cell1_1</td>
<td>cell2_1</td>
<td>cell1_1</td>
<td>cell2_1</td>
<td>cell3_1</td>
<td>cell4_1</td>
<td>cell5_1</td>
</tr>

</tbody>
</table> -->

<!-- /RESULT  -->
						</div>
 <!--/TAB 1 Active  -->

 <!--TAB 2  -->
 <div class="tab-pane fade" id="tab2default">
	
 <form class="form-inline">

<div class="form-group mx-sm-3 mb-2">
  <label for="tahun">Tahun</label>

  <select name="tahun" id="tahun" class="form-control">
    <option value="2017">2017</option>
    <option value="2018">2018</option>
  </select>

</div>

<div class="form-group mx-sm-3 mb-2">
  <label for="bulan" >Bulan</label>
  <select name="bulan" id="bulan" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            </select>


</div>
<button type="button" id="generate2" class="btn btn-primary">Generate</button>
</form>



<hr>
<!-- RESULT  -->
<div id="result2"></div>


        </div>
<!-- /TAB 2  -->
					
                    </div>
                </div>
            </div>
        </div>

	</div>
		
		
<!--------------->


</section><!-- /.content -->
<!-- Main content -->




<!-- Page script -->
<script>
  $(document).ready(function(){

// EXPORT ALL BATCH
const export_batch = document.getElementById('export_batch');

export_batch.addEventListener('click',function(e){
  let export_batch = document.getElementById('batch_id').value;
  let type = document.getElementById('type').value;
let url='<?= site_url('administrator/system_flpp/export_pengembalian/') ?>'+export_batch+'/'+type;

// console.log(url);
// console.log(type);
location.href = url;
// alert(export_batch.value);
// windows.open(url,"_self");

});


// tab 1
const generate1 = document.getElementById('generate1');
generate1.addEventListener('click',function(e){
let TglAwal = document.getElementById('tgl_awal').value;   
let TglAkhir = document.getElementById('tgl_akhir').value;


var url='<?= site_url('administrator/mismerdetail/getResult1/') ?>'+TglAwal+'/'+TglAkhir;
$('#result1').load(url);
/*
//ajax--------
$.ajax({

  type:"POST",
  url:"<?=site_url('administrator/mismerdetail/getfilter1')?>",
  dataType:"html",
  data:{
    TglAwal:TglAwal,
    TglAkhir:TglAkhir
  },
  cache:false,
// before
beforeSend : function(data){

console.log('beforeSend');

},
// success
success : function(data){
  console.log('success');

$('#result1').html(data);

},
// complete
complete : function(data){
  console.log('complete');


}


});
//ajax--------
*/

});



// tab 2

const generate2 = document.getElementById('generate2');

generate2.addEventListener('click',function(e){

let Bulan = document.getElementById('bulan').value;   
let Tahun = document.getElementById('tahun').value;

// console.log('klikkkkkkkkkk generate 2');
// console.log(Bulan);
// console.log(Tahun);
var url='<?= site_url('administrator/mismerdetail/getResult2/') ?>'+Tahun+'/'+Bulan;
$('#result2').load(url);

});



  }); /*end doc ready*/


// detail1 click
$(document).on('click', '#detail1', function (e) {


let TglAwal = $(this).attr('dataTglAwal');
let TglAkhir = $(this).attr('dataTglAkhir');
let Wilayah = $(this).attr('dataWilayah');

// console.log(TglAwal);
// console.log(TglAkhir);
// console.log(Wilayah);

$('#myModal').modal('show');

// var url='<?= site_url('administrator/report/getModal_between/') ?>'+TglAwal+'/'+TglAkhir+'/'+Wilayah;
var url='<?= site_url('administrator/mismerdetail/getModalResult1/') ?>'+TglAwal+'/'+TglAkhir+'/'+Wilayah;

$('#result_modal').load(url);


});


$(document).on('click', '#detail2', function (e) {

// console.log('klikkkkk');

var dataTahun = $(this).attr('dataTahun');
var dataBulan = $(this).attr('dataBulan');
var Wilayah = $(this).attr('dataWilayah');

console.log(dataTahun);
console.log(dataBulan);
console.log(Wilayah);

$('#myModal').modal('show');

//  var url='<?= site_url('administrator/report/getModal/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;
var url='<?= site_url('administrator/mismerdetail/getModalResult2/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;

$('#result_modal').load(url);


});



</script>