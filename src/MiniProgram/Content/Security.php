<?php

/**
 * Security.php  内容安全检查
 *
 * @author    Xiaok
 * @copyright 2020 Xiaok
 * @see      https://github.com/luxiaok
 *
 */

namespace EasyWeChat\MiniProgram\Content;

use EasyWeChat\Core\AbstractAPI;
use EasyWeChat\Support\Collection;
use EasyWeChat\Core\Exceptions\InvalidArgumentException;

class Security extends AbstractAPI
{
    const API_CHECK_TEXT = 'https://api.weixin.qq.com/wxa/msg_sec_check';
    const API_CHECK_IMG = 'https://api.weixin.qq.com/wxa/img_sec_check';


    /**
     * Parse JSON from response and check error.
     *
     * @param string $method
     * @param array  $args
     *
     * @return \EasyWeChat\Support\Collection | null
     *
     * @throws \EasyWeChat\Core\Exceptions\HttpException
     */
    public function parseJSON($method, array $args)
    {
        $http = $this->getHttp();

        $contents = $http->parseJSON(call_user_func_array([$http, $method], $args));

        if (empty($contents)) {
            return null;
        }

        //$this->checkAndThrow($contents);

        return new Collection($contents);
    }

    /*
     * 检测文本
     * */
    public function checkText($text)
    {
        $params = [
            'content' => $text,
        ];

        return $this->parseJSON('json', [self::API_CHECK_TEXT, $params]);
    }


    /*
     * 检测图片
     * */
    public function checkImage($img)
    {
        $params = [
            'media' => $img,
        ];

        if (!file_exists($img) || !is_readable($img)) {
            throw new InvalidArgumentException("File does not exist, or the file is unreadable: '$img'");
        }

        return $this->parseJSON('upload', [self::API_CHECK_IMG, $params]);
    }
}
