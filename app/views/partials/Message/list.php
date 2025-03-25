<div class="container mt-4">
    <h4 class="mb-3">💬 Tin nhắn nhóm lớp</h4>
    <pre>
<?php print_r($this->view_data); ?>
</pre>

    <?php if (!empty($this->view_data) && is_array($this->view_data)): ?>
        <?php foreach ($this->view_data as $msg): ?>
            <div class="media mb-3 p-2 border rounded shadow-sm bg-light">
                <img src="<?php echo !empty($msg['sender_avatar']) ? $msg['sender_avatar'] : 'assets/images/default-avatar.png'; ?>" 
                     class="mr-3 rounded-circle" width="50" height="50" alt="Avatar">
                
                <div class="media-body">
                    <h6 class="mt-0 mb-1 fw-bold">
                        <?php echo htmlspecialchars($msg['sender_name']); ?>
                        <small class="text-muted float-end">
                            <?php echo date("H:i d/m/Y", strtotime($msg['sent_at'])); ?>
                        </small>
                    </h6>
                    <div><?php echo nl2br(htmlspecialchars($msg['message'])); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">Không có tin nhắn nào để hiển thị.</div>
    <?php endif; ?>
</div>
