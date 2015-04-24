<section>
  <h2>Events</h2>
  <?php echo anchor('admin/dashboard/edit', '<i class="icon-plus"></i> Add Event'); ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Event</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
        <?php if($access == 'ADMIN') : ?><th>Status</th> <?php endif; ?>
      </tr>
    </thead>
    <tbody>
<?php if(count($events)): foreach($events as $user): ?> 
    <tr>
      <td><?php echo anchor('admin/dashboard/edit/' . $user->event_id, $user->event_name); ?></td>
      <td><?php echo btn_view('admin/dashboard/view/' . $user->event_id); ?></td>
      <td><?php echo btn_edit('admin/dashboard/edit/' . $user->event_id); ?></td>
      <td><?php echo btn_delete('admin/dashboard/delete/' . $user->event_id); ?></td>
       <?php if($access == 'ADMIN') : ?>
          <td class="eventstatus_<?= $user->event_id;?>">
          <?php if( $user->event_status == 0 ) : ?>
            <button onclick="approveEvent(<?= $user->event_id; ?>,'approve')"> Approve </button>
          <?php else: ?>
            <button onclick="approveEvent(<?= $user->event_id; ?>,'disable')"> Disable </button>
          <?php endif; ?>  
          </td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>
<?php else: ?>
    <tr>
      <td colspan="3">We could not find any Event.</td>
    </tr>
<?php endif; ?> 
    </tbody>
  </table>
</section>