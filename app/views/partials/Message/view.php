<?php
$can_delete = ACL::is_allowed("message/delete");
$can_edit = ACL::is_allowed("message/edit");
$data = $this->view_data;
$rec_id = $this->route->page_id;
$csrf_token = Csrf::$token;
$current_page = $this->set_current_page_link();
$page_element_id = "view-page-" . random_str();
?>

<section class="page" id="<?php echo $page_element_id; ?>">
    <div class="bg-light p-3 mb-3">
        <div class="container">
            <h4 class="record-title">Chi tiết tin nhắn</h4>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($data)): ?>
            <div class="card p-3">
                <div class="media mb-3">
                    <img src="<?php echo !empty($data['sender_avatar']) ? $data['sender_avatar'] : 'assets/images/default-avatar.png'; ?>" class="rounded-circle mr-3" width="60" height="60">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo $data['sender_name']; ?></h5>
                        <small class="text-muted"><?php echo $data['sent_at']; ?></small>
                    </div>
                </div>
                <div class="border rounded p-2 bg-light">
                    <?php echo nl2br(htmlspecialchars($data['message'])); ?>
                </div>
                <div class="mt-3 d-flex">
                    <?php if ($can_edit): ?>
                        <a class="btn btn-info mr-2" href="<?php print_link("message/edit/$rec_id"); ?>">Sửa</a>
                    <?php endif; ?>
                    <?php if ($can_delete): ?>
                        <a class="btn btn-danger record-delete-btn" href="<?php print_link("message/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Xóa tin nhắn này?">Xóa</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center text-muted p-3">
                <i class="material-icons display-4">block</i>
                <h5>Không tìm thấy tin nhắn</h5>
            </div>
        <?php endif; ?>
    </div>
</section>
