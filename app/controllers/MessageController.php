<?php
/**
 * MessageController - Quản lý tin nhắn nhóm
 */
class MessageController extends SecureController
{
    // Hiển thị danh sách tin nhắn (phân trang, tìm kiếm nếu cần)
    function index($field_name = null, $field_value = null)
    {
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

        $this->view_data = $messages ?? [];
        $this->render_view("Message/list.php");
    }

    // Phòng chat nhóm công khai
    function group()
    {
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

        $this->view_data = $messages ?? [];
        $this->render_view("Message/list.php");
    }

    // Gửi tin nhắn vào nhóm
    function sendgroup()
    {
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

    // Xem chi tiết một tin nhắn
    function view($id = null)
    {
        $db = $this->GetModel();
        $this->tablename = "messages";

        if (!empty($id)) {
            $db->join("users u", "messages.sender_id = u.id", "LEFT");
            $db->where("messages.id", $id);

            $fields = [
                "messages.id",
                "messages.message",
                "messages.sent_at",
                "u.last_name AS sender_name",
                "u.photo AS sender_avatar"
            ];

            $data = $db->getOne("messages", $fields);

            if ($data) {
                $this->view_data = $data;
                $this->render_view("Message/view.php");
            } else {
                $this->set_page_error("Không tìm thấy tin nhắn!");
                $this->render_view("Message/view.php");
            }
        } else {
            $this->set_page_error("ID tin nhắn không hợp lệ!");
            $this->render_view("Message/view.php");
        }
    }

    function delete($id = null)
    {
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
?>
