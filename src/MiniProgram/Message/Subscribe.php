<?php

/**
 * Subscribe.php  小程序订阅消息
 *
 * @author    Xiaok
 * @copyright 2020 Xiaok
 * @see      https://github.com/luxiaok
 *
 */

namespace EasyWeChat\MiniProgram\Message;

use EasyWeChat\Core\AbstractAPI;

class Subscribe extends AbstractAPI
{
    const API_SUBSCRIBE = 'https://api.weixin.qq.com/cgi-bin/message/subscribe/send';

    /*
     * 发送订阅消息
     * https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/subscribe-message/subscribeMessage.send.html
     * */
    public function send($msg)
    {
        return $this->parseJSON('json', [self::API_SUBSCRIBE, $msg]);
    }

}