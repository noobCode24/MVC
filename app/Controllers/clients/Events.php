<?php
// Clients
class Events extends Controller
{
    public $data = [];
    public $model_home;
    public function __construct()
    {
        $this->model_home = $this->model('EventsModel');
        $this->data['sub_content'][''] = "";
    }
    public function index()
    {
        $events = $this->model_home->getAllEvent();
        $this->data['sub_content']['events'] = $events;

        $newModel = $this->model('NewsModel');
        $page = "";
        if (!empty($_SERVER['QUERY_STRING'])) {
            $page = explode("/", $_SERVER['QUERY_STRING'])[1];
        }
        $secNew = $newModel->getSecondaryNew($page);
        $this->data['sub_content']['secNew'] = $secNew;
        $this->data['sub_content']['page'] = $page;

        $priNew = $newModel->getPrimaryNew();
        $this->data['sub_content']['priNew'] = $priNew;

        $cntSec = $newModel->countSecondaryNew();
        $this->data['sub_content']['cntSec'] = $cntSec;

        $this->data['content'] = 'clients\NewsEventsPage\NewsEvents';
        $this->data['title'] = 'Tin tức, sự kiện';
        $this->render('layouts/clients_layout', $this->data);
    }

    // public function getAddEvent()
    // {
    //     $this->data['content'] = 'admin\events\add';
    //     $this->data['title'] = 'Thêm sự kiện';
    //     $this->render('layouts/admin_layout', $this->data);
    // }

    // public function handelImage()
    // {
    //     $image = $_FILES['event_image'];
    //     if (!empty($image['name'])) {
    //         echo '<pre>';
    //         print_r($image);
    //         echo '</pre>';
    //         $extend = '.jpg';
    //         if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
    //         $fileName = time() . $extend;
    //         move_uploaded_file(
    //             $_FILES['event_image']['tmp_name'],
    //             'C:\xampp\htdocs\MVC\public\assets\admin\images\event_image\event-' . $fileName
    //         );
    //         $fileName = 'event-' . $fileName;
    //         return $fileName;
    //     }
    // }

    // public function postAddEvent()
    // {
    //     $fileName = $this->handelImage();
    //     if ($this->model_home->addEvent($fileName)) {
    //         $msg = 'Thêm sự kiện thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Thêm sự kiện thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // public function getIdEvent()
    // {
    //     $url = $_SERVER['PATH_INFO'];
    //     $arr = explode("/", $url);
    //     $arr =  $arr[count($arr) - 1];
    //     $id = explode("=", $arr)[1];
    //     return $id;
    // }

    // // Edit
    // public function getEditEvent()
    // {
    //     $id = $this->getIdEvent();
    //     $detail = $this->model_home->detailEvent($id);
    //     $this->data['sub_content']['detail'] = $detail[0];
    //     $this->data['title'] = 'Sửa sự kiện';
    //     $this->data['content'] = 'admin\events\edit';
    //     $this->render('layouts\admin_layout', $this->data);
    // }

    // public function postEditEvent()
    // {
    //     $id = $this->getIdEvent();
    //     $fileName = $this->handelImage();
    //     if ($this->model_home->updateEvent($id, $fileName)) {
    //         $msg = 'Cập nhật sự kiện thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Cập nhật sự kiện thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }

    // // Delete
    // public function handleDeleteEvent()
    // {
    //     $id = $this->getIdEvent();
    //     if ($this->model_home->deleteEvent($id)) {
    //         $msg = 'Xóa sự kiện thành công';
    //         $type_msg = 'success';
    //     } else {
    //         $msg = 'Xóa sự kiện thất bại';
    //         $type_msg = 'danger';
    //     }
    //     setFlashData('msg', $msg);
    //     setFlashData('type_msg', $type_msg);
    //     redirect($_SERVER['HTTP_REFERER']);
    // }
}
