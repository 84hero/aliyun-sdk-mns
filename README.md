# 安装方法

composer require wushunyi/aliyun-sdk-mns

require_once "vendor/autoload.php";

# 使用方法

- 主题消息

```
use AliyunMNS\Client;
use AliyunMNS\Requests\PublishMessageRequest;

$endPoint = '';
$accessId = '';
$accessKey = '';
$topicName = '';

$client = new Client($endPoint, $accessId, $accessKey);
$topic = $client->getTopicRef($topicName);
$messageBody = 'test message';
$messageTag = 'pay_success';
// 1. 生成PublishMessageRequest
// 1.1 如果是推送到邮箱，还需要设置MessageAttributes，可以参照Tests/TopicTest.php里面的testPublishMailMessage
$request = new PublishMessageRequest($messageBody,$messageTag);
try
{
    $res = $topic->publishMessage($request);
    // 2. PublishMessage成功
    echo "MessagePublished! \n";
}
catch (MnsException $e)
{
    // 3. 可能因为网络错误等原因导致PublishMessage失败，这里CatchException并做对应处理
    echo "PublishMessage Failed: " . $e . "\n";
    echo "MNSErrorCode: " . $e->getMnsErrorCode() . "\n";
    return;
}
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
$topic = $client->getQueueRef($queueName);//唯一不同之处
$messageBody = 'test message';
$messageTag = 'pay_success';
// 1. 生成PublishMessageRequest
// 1.1 如果是推送到邮箱，还需要设置MessageAttributes，可以参照Tests/TopicTest.php里面的testPublishMailMessage
$request = new PublishMessageRequest($messageBody,$messageTag);
try
{
    $res = $topic->publishMessage($request);
    // 2. PublishMessage成功
    echo "MessagePublished! \n";
}
catch (MnsException $e)
{
    // 3. 可能因为网络错误等原因导致PublishMessage失败，这里CatchException并做对应处理
    echo "PublishMessage Failed: " . $e . "\n";
    echo "MNSErrorCode: " . $e->getMnsErrorCode() . "\n";
    return;
}
```

# 核心代码来自阿里云官方

## MNS SDK for PHP    
Please refer to http://www.aliyun.com/product/mns and  https://docs.aliyun.com/?spm=5176.7393424.9.6.5ki1hv#/pub/mns/api_reference/intro&intro for more API details.    

### Samples    
You must fulfill the AccessId/AccessKey/AccountID in the example before running.   
