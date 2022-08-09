<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b><?php echo lang('footer_version'); ?></b> Development
    </div>
    Copyright &copy 2019 <a href="<?= base_url('/')?>">Ngiklan Yuh</a>
    <strong><?php echo lang('footer_copyright'); ?> &copy; 2019-<?php echo date('Y'); ?> Kegiatan Magang Mahasiswa <a style="color:white;" href="http://almsaeedstudio.com" target="_blank">Almsaeed Studio</a> <a style="color:white;" href="https://domprojects.com" target="_blank">domProjects</a></strong> <?php echo lang('footer_all_rights_reserved'); ?>
</footer>
</div>

<script src="<?php echo base_url($frameworks_dir . '/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
<?php if ($mobile == TRUE): ?>
    <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php //if ($admin_prefs['transition_page'] == TRUE): ?>
<!-- <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script> -->
<?php //endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
<script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
<script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
<script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
<script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
<script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>


<!-- bootstrap datepicker -->
<script src="<?php echo base_url($frameworks_dir . '/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>

<!-- DataTables -->
<script src="<?php echo base_url($frameworks_dir . '/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url($frameworks_dir . '/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<!-- <script >alert('test');</script> -->

<script>
            $('#example1').DataTable()        
    </script>

<script>
    $('#tanggal_mulai').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
</script>
</body>
</html>