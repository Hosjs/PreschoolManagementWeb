<?php
$event = $view_data['event'] ?? [];
$parent = $view_data['parent'] ?? [];
$pupils = $view_data['pupils'] ?? [];
?>
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-7 comp-grid">
                <div class="card animated fadeIn">
                    <form id="event-register-form" role="form" novalidate enctype="multipart/form-data"
                          class="form page-form form-horizontal needs-validation"
                          action="<?php print_link("event/confirm_register") ?>">
                        <div class="card-body">
                            <?php if (!empty($success_message)): ?>
                            <div class="alert alert-success animated fadeIn">
                                <?= $success_message ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($this->page_error)): ?>
                            <div class="alert alert-danger animated shake">
                                <?= $this->page_error ?>
                            </div>
                            <?php endif; ?>
                            <h4 class="form-title">Đăng ký sự kiện</h4>

                            <!-- Mã sự kiện -->
                            <div class="form-group">
                                <label class="control-label">Mã sự kiện</label>
                                <input readonly type="text" name="event_id" value="<?= $event['id'] ?? ''; ?>"
                                       class="form-control" required>
                            </div>

                            <!-- Tiêu đề sự kiện -->
                            <div class="form-group">
                                <label class="control-label">Tiêu đề sự kiện</label>
                                <input readonly type="text" name="event_title" value="<?= $event['title'] ?? ''; ?>"
                                       class="form-control" required>
                            </div>

                            <!-- Mã phụ huynh -->
                            <div class="form-group">
                                <label class="control-label">Mã phụ huynh</label>
                                <input readonly type="text" name="parent_id" value="<?= $parent['id_parent'] ?? ''; ?>"
                                       class="form-control" required>
                            </div>

                            <!-- Mã học sinh -->
                            <div class="form-group">
                                <label>Chọn học sinh</label>                       
                                <!-- Dropdown -->
                                <select name="pupil_id" class="form-control" required>
                                    <option value="">-- Chọn học sinh --</option>
                                    <?php foreach ($pupils as $p): ?>
                                        <option value="<?php echo $p['id_pupils']; ?>">
                                            <?php echo $p['full_name']; ?> (ID: <?php echo $p['id_pupils']; ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                                <i class="material-icons">check_circle</i> Xác nhận đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
