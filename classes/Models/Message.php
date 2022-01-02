<?php

namespace UserSystem\Classes\Models;

class Message
{
    // alert Message
    public function showMessage($type, $message)
    {
        return
            '<div class="p-3">
                <div class="alert alert-' . $type . '" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                    <strong class="text-center">
                            ' . $message . '
                    </strong>
                </div>
            </div>';
    }
    public function timeInAgo($timestamp)
    {
        date_default_timezone_set('Africa/Cairo');
        $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;
        $time = time() - $timestamp;
        switch ($time) {
                // Seconds 
            case $time <= 60;
                return 'Just Now!';
                //Minutes 
            case $time >= 60 && $time < 3600;
                return (round($time / 60) == 1) ? 'a minuts ago' : round($time / 60) . ' minuts ago';
                // Hours 
            case $time >= 3600 && $time < 86400;
                return (round($time / 3600) == 1) ? 'an hour ago' : round($time / 3600) . ' hours ago';
                // Days 
            case $time >= 86400 && $time < 604800;
                return (round($time / 86400) == 1) ? 'a day ago' : round($time / 86400) . ' days ago';
                // Weeks 
            case $time >= 604800 && $time < 2600640;
                return (round($time / 604800) == 1) ? 'a week ago' : round($time / 604800) . ' weeks ago';

                // Months 
            case $time >= 2600640 && $time < 31207680;
                return (round($time / 2600640) == 1) ? 'a month ago' : round($time / 2600640) . ' months ago';
                // Days 
            case $time >= 31207680;
                return (round($time / 31207680) == 1) ? 'a year ago' : round($time / 31207680) . ' years ago';
        }
    }
}
