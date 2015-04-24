<section>
  <h2>Guest List</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Guest Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php if(count($guestList)): foreach($guestList as $user): ?> 
    <tr>
      <td><?php echo anchor('admin/dashboard/user/' . $user->id, $user->name, 'data-toggle="modal" data-target="#myModal"'); ?></td>
      <td class="status_<?= $user->pass_id; ?>"><?php echo ( $user->approval_status == 0 )? '<span class="label label-primary">Pending</span>' : '<span class="label label-success">Approved</span>' ?></td>
      <td><button onclick="approve(<?= $user->pass_id; ?>)"> Approve </button> </td>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
      <td colspan="3">We could not find any Requests.</td>
    </tr>
<?php endif; ?> 
    </tbody>
  </table>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->