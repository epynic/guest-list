<h3><?php echo empty($event->id) ? 'Add a new event' : 'Edit event ' . $event->event_name; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td>Event Name</td>
		<td><?php echo form_input('event_name', set_value('event_name', $event->event_name)); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo form_textarea('event_desc', set_value('event_desc', $event->event_desc)); ?></td>
	</tr>
	<tr>
		<td>Start Time</td>
		<td><?php echo form_input('start_time', set_value('start_time', $event->start_time), 'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>End Time</td>
		<td><?php echo form_input('end_time', set_value('end_time', $event->end_time), 'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>Event Location</td>
		<td><?php echo form_input('event_location', set_value('event_location', $event->event_location)); ?></td>
	</tr>
	<tr>
		<td>Facebook URL</td>
		<td><?php echo form_input('facebook_url', set_value('facebook_url', $event->facebook_url)); ?></td>
	</tr>
	<tr>
		<td>Picture</td>
		<td><input type="file" value="upload" name="event_picture" /> <img src="<?= site_url(); ?>uploads/<?= $event->event_picture; ?>"> </td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
