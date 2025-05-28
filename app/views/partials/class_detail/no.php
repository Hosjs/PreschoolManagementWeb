<?php if (!empty($data['id_class_detail']) && ACL::is_allowed("class_detail/attendance_no")): ?>
<<<<<<< HEAD
<a href="<?= SITE_ADDR ?>class_detail/mark_attendance/<?= $data['id_class_detail'] ?>/no" class="btn btn-danger btn-sm"
    title="Vắng mặt">
    Vắng mặt
</a>
<?php endif; ?>
=======
    <a href="<?= SITE_ADDR ?>class_detail/mark_attendance/<?= $data['id_class_detail'] ?>/no" 
       class="btn btn-danger btn-sm" 
       title="Vắng mặt">
       Vắng mặt
    </a>
<?php endif; ?>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
