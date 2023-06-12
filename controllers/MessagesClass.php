<?php


class MessagesClass {

    public const RED_COLOR = "alert-danger";
    public const GREEN_COLOR = "alert-success";

    /**
     * Create a session to display a success or an error message
     * @param $message
     * @param $type
     */
    public static function alertMsg($message, $type): void {
        $_SESSION['alert'][] = [
            "message" => $message,
            "type" => $type
        ];
    }
}