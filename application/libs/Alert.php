<?php

class Alert
{

    public function __construct($type, $icon, $message){
        $_SESSION['message_header'][] = array("type" => $type, "icon" => $icon,"message" => $message);
    }

    public static function getNotifications(){
        $html = '';

        if(isset($_SESSION['message_header'])) {
            foreach ($_SESSION['message_header'] as $notif) {
                $html .= '<div class="alert alert-' . $notif['type'] . ' alert-dismissible" role="alert">';
                $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                $html .= '<strong><span class="fa fa-' . $notif['icon'] . ' fa-fw" aria-hidden="true"></span></strong> ' . $notif['message'];
                $html .= '</div>';
            }
            unset($_SESSION['message_header']);
        }

        return $html;
    }

}