Change Logs
===========

#### v3.3.34

* 新增内容安全接口

```php
<?php
use EasyWeChat\Foundation\Application;

$options = [
    // ...
    'mini_program' => [
        'app_id'   => 'component-app-id',
        'secret'   => 'component-app-secret',
        'token'    => 'component-token',
        'aes_key'  => 'component-aes-key'
        ],
    // ...
    ];

$app = new Application($options);
$miniProgram = $app->mini_program;
//$result = $miniProgram->content_security->checkText($text);
//$result = $miniProgram->content_security->checkImage($img_file_path);
/*
 * $result
 * 正常内容
 * $result->errcode = 0; //Int
 * $result->errmsg = 'ok';
 *
 * 风险内容
 * $result->errcode = 87014; //Int
 * $result->errmsg = 'risky content';
 * */
```
