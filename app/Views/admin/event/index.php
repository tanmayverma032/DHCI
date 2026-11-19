<form method="post" action="<?= base_url('admin/event/store') ?>" enctype="multipart/form-data">
<?= csrf_field(); ?>

<input type="text" name="title" placeholder="Event Title" required class="form-control mb-2">

<textarea name="description" placeholder="Description" required class="form-control mb-2"></textarea>

<input type="date" name="event_date" required class="form-control mb-2">

<input type="file" name="image" class="form-control mb-2">

<select name="status" class="form-control mb-2">
    <option value="1">Active</option>
    <option value="0">Inactive</option>
</select>

<button class="btn btn-primary">Add Event</button>
</form>

<hr>

<?php foreach($events as $row): ?>
    <h4><?= $row['title'] ?></h4>
    <p><?= $row['description'] ?></p>
    <img src="<?= base_url('uploads/events/'.$row['image']) ?>" width="150">
    <hr>
<?php endforeach; ?>