<?php if (!empty($data['id_class_detail']) && ACL::is_allowed("class_detail/attendance_yes")): ?>
    <a href="<?= SITE_ADDR ?>class_detail/mark_attendance/<?= $data['id_class_detail'] ?>/yes" 
       class="btn btn-success btn-sm" 
       title="Đi học">
       Đi học
    </a>
<?php endif; ?>
