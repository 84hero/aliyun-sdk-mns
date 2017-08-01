# Aliyun MNS PHP SDK

[![Latest Stable Version](https://poser.pugx.org/wushunyi/aliyun-sdk-mns/version)](https://packagist.org/packages/wushunyi/aliyun-sdk-mns)
[![Build Status](https://travis-ci.org/84hero/aliyun-sdk-mns.svg?branch=master)](https://travis-ci.org/84hero/aliyun-sdk-mns)
[![Coverage Status](https://coveralls.io/repos/github/84hero/aliyun-sdk-mns/badge.svg)](https://coveralls.io/github/84hero/aliyun-sdk-mns)
[![Total Downloads](https://poser.pugx.org/wushunyi/aliyun-sdk-mns/downloads)](https://packagist.org/packages/wushunyi/aliyun-sdk-mns)
[![Latest Unstable Version](https://poser.pugx.org/wushunyi/aliyun-sdk-mns/v/unstable)](//packagist.org/packages/wushunyi/aliyun-sdk-mns)
[![License](https://poser.pugx.org/wushunyi/aliyun-sdk-mns/license)](https://packagist.org/packages/wushunyi/aliyun-sdk-mns)

# 安装方法

- 引用composer包
```
composer require wushunyi/aliyun-sdk-mns
```

- 代码引用composer自动加载工具

```
require_once "vendor/autoload.php";

```

- 实例化客户端
```
use AliyunMNS\Client;
$client = new Client($endPoint, $accessId, $accessKey);

```

# 使用方法

## 主题操作

## 队列操作

## 消息操作

- 发送消息

    - 主题消息

    ```
    use AliyunMNS\Client;
    use AliyunMNS\Requests\PublishMessageRequest;

    $endPoint = '';
    $accessId = '';
    $accessKey = '';
    $topicName = '';

    $client = new Client($endPoint, $accessId, $accessKey);
    $topic = $client->getTopicRef($topicName);//获取Topic地址
    $messageBody = 'test message';  //消息内容
    $messageTag = 'pay_success';    //消息标签
    $request = new PublishMessageRequest($messageBody,$messageTag);
    $res = $topic->publishMessage($request);
    $res->isSucceed();
    ```

    - 队列消息
    ```
    use AliyunMNS\Client;
    use AliyunMNS\Requests\PublishMessageRequest;

    $endPoint = '';
    $accessId = '';
    $accessKey = '';
    $queueName = '';

    $client = new Client($endPoint, $accessId, $accessKey);
    $topic = $client->getQueueRef($queueName);//获取Topic地址
    $messageBody = 'test message';  //消息内容
    $request = new PublishMessageRequest($messageBody);
    $res = $topic->publishMessage($request);
    $res->isSucceed();

    ```


# SDK核心代码来自阿里云官方

- MNS SDK for PHP    
Please refer to http://www.aliyun.com/product/mns and  https://docs.aliyun.com/?spm=5176.7393424.9.6.5ki1hv#/pub/mns/api_reference/intro&intro for more API details.    

- Samples    
You must fulfill the AccessId/AccessKey/AccountID in the example before running.   
