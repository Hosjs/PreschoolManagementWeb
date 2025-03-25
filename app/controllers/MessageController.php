<?php
/**
 * MessagesController - Quản lý tin nhắn nhóm
 */
class MessageController extends SecureController {
    function index($field_name = null, $field_value = null) {
        $db = $this->GetModel();
        $this->tablename = "messages";

        $db->join("users u", "messages.sender_id = u.id", "LEFT");
        $db->orderBy("messages.sent_at", "DESC");

        if ($field_name && $field_value) {
            $db->where("messages.$field_name", $field_value);
        }

        $fields = [
            "messages.id",
            "messages.message",
            "messages.sent_at",
            "u.last_name AS sender_name",
            "u.photo AS sender_avatar"
        ];

        $messages = $db->get("messages", null, $fields);

        // Debug: In kết quả SQL và dữ liệu
        echo "<pre style='background:#f0f0f0;padding:10px'>";
        echo " DEBUG - KẾT QUẢ SQL:\n";
        print_r($db->getLastQuery());
        echo "\n DEBUG - DỮ LIỆU:\n";
        print_r($messages);
        echo "\n LỖI (nếu có): " . $db->getLastError();
        echo "</pre>";

        $this->view_data = $messages ?? [];
        $this->render_view("Message/list.php");

    }

    function group() {
        $db = $this->GetModel();
        $this->tablename = "messages";

        $db->join("users u", "messages.sender_id = u.id", "LEFT");
        $db->orderBy("messages.sent_at", "DESC");

        $fields = [
            "messages.id",
            "messages.message",
            "messages.sent_at",
            "u.last_name AS sender_name",
            "u.photo AS sender_avatar"
        ];

        $messages = $db->get("messages", null, $fields);

        // DEBUG để kiểm tra dữ liệu được trả ra
        echo "<pre style='background:#f0f0f0;padding:10px'>";
        echo "DEBUG - KẾT QUẢ SQL:\n";
        print_r($db->getLastQuery());
        echo "\n DEBUG - DỮ LIỆU:\n";
        print_r($messages);
        echo "\n LỖI (nếu có): " . $db->getLastError();
        echo "</pre>";

        $this->view_data = $messages ?? [];
        $this->render_view("Message/list.php");
    }

    function sendgroup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = $this->GetModel();
            $this->tablename = "messages";

            $data = [
                "sender_id" => Auth::user_id(),
                "message" => trim($_POST['message'])
            ];

            if (!empty($data['message'])) {
                $insert_id = $db->insert($this->tablename, $data);
                if (!$insert_id) {
                    echo "<pre style='color:red'>Lỗi khi chèn tin nhắn: " . $db->getLastError() . "</pre>";
                }
            }

            redirect_to("Message/group");
        }
    }

    function delete($id = null) {
        $db = $this->GetModel();

        if (!empty($id)) {
            $db->where("id", $id);
            $delete = $db->delete("messages");

            if ($delete) {
                set_flash_msg("Tin nhắn đã được xóa!", "success");
            } else {
                set_flash_msg("Lỗi khi xóa tin nhắn!", "danger");
            }
        } else {
            set_flash_msg("ID tin nhắn không hợp lệ!", "danger");
        }
        redirect_to("Message");
    }
}
