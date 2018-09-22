
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Mismerdetail/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Mismerdetail<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mismerdetail</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">

                        <?php is_allowed('templateuploadmismer_add', function(){?>
                        <a class="btn btn-flat btn-danger btn_add_generate" id="btn_generate"  href="<?=  site_url('administrator/mismerdetail/update_unmatch'); ?>"><i class="fa fa-gear" ></i> UPDATE UNMATCH</a>
                        <?php }) ?>
<!-- //  -->

                        <?php is_allowed('mismerdetail_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="<?= cclang('add_new_button', ['Mismerdetail']); ?>  (Ctrl+a)" href="<?=  site_url('administrator/mismerdetail/add'); ?>"><i class="fa fa-plus-square-o" ></i> <?= cclang('add_new_button', ['Mismerdetail']); ?></a>
                        <?php }) ?>
                        <?php is_allowed('mismerdetail_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> Mismerdetail" href="<?= site_url('administrator/mismerdetail/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?> XLS</a>
                        <?php }) ?>
                        <?php is_allowed('mismerdetail_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export'); ?> pdf Mismerdetail" href="<?= site_url('administrator/mismerdetail/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> <?= cclang('export'); ?> PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Mismerdetail</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', ['Mismerdetail']); ?>  <i class="label bg-yellow"><?= $mismerdetail_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_mismerdetail" id="form_mismerdetail" action="<?= base_url('administrator/mismerdetail/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>BatchID</th>
                           <th>OPEN DATE</th>
                           <th>MID</th>
                           <th>MERCHAN DBA NAME</th>
                           <th>MSO</th>
                           <th>SOURCE CODE</th>
                           <th>POS1</th>
                           <th>WILAYAH</th>
                           <th>CHANNEL</th>
                           <th>TYPE MID</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_mismerdetail">
                     <?php foreach($mismerdetails as $mismerdetail): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $mismerdetail->RowID; ?>">
                           </td>
                           
                           <td><?= _ent($mismerdetail->BatchID); ?></td> 
                           <td><?= _ent($mismerdetail->OPEN_DATE); ?></td> 
                           <td><?= _ent($mismerdetail->MID); ?></td> 
                           <td><?= _ent($mismerdetail->MERCHAN_DBA_NAME); ?></td> 
                           <td><?= _ent($mismerdetail->MSO); ?></td> 
                           <td><?= _ent($mismerdetail->SOURCE_CODE); ?></td> 
                           <td><?= _ent($mismerdetail->POS1); ?></td> 
                           <td><?= _ent($mismerdetail->WILAYAH); ?></td> 
                           <td><?= _ent($mismerdetail->CHANNEL); ?></td> 
                           <td><?= _ent($mismerdetail->TYPE_MID); ?></td> 
                           <td width="200">
                              <?php is_allowed('mismerdetail_view', function() use ($mismerdetail){?>
                              <a href="<?= site_url('administrator/mismerdetail/view/' . $mismerdetail->RowID); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <!-- <?php is_allowed('mismerdetail_update', function() use ($mismerdetail){?>
                              <a href="<?= site_url('administrator/mismerdetail/edit/' . $mismerdetail->RowID); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('mismerdetail_delete', function() use ($mismerdetail){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/mismerdetail/delete/' . $mismerdetail->RowID); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?> -->
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($mismerdetail_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Mismerdetail data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="<?= cclang('apply_bulk_action'); ?>"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                            <option <?= $this->input->get('f') == 'BatchID' ? 'selected' :''; ?> value="BatchID">BatchID</option>
                           <option <?= $this->input->get('f') == 'OPEN_DATE' ? 'selected' :''; ?> value="OPEN_DATE">OPEN DATE</option>
                           <option <?= $this->input->get('f') == 'MID' ? 'selected' :''; ?> value="MID">MID</option>
                           <option <?= $this->input->get('f') == 'MERCHAN_DBA_NAME' ? 'selected' :''; ?> value="MERCHAN_DBA_NAME">MERCHAN DBA NAME</option>
                           <option <?= $this->input->get('f') == 'MSO' ? 'selected' :''; ?> value="MSO">MSO</option>
                           <option <?= $this->input->get('f') == 'SOURCE_CODE' ? 'selected' :''; ?> value="SOURCE_CODE">SOURCE CODE</option>
                           <option <?= $this->input->get('f') == 'POS1' ? 'selected' :''; ?> value="POS1">POS1</option>
                           <option <?= $this->input->get('f') == 'WILAYAH' ? 'selected' :''; ?> value="WILAYAH">WILAYAH</option>
                           <option <?= $this->input->get('f') == 'CHANNEL' ? 'selected' :''; ?> value="CHANNEL">CHANNEL</option>
                           <option <?= $this->input->get('f') == 'TYPE_MID' ? 'selected' :''; ?> value="TYPE_MID">TYPE MID</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/mismerdetail');?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->
<script>
  $(document).ready(function(){
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_mismerdetail').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/mismerdetail/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>