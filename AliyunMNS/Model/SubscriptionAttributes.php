<?php
namespace AliyunMNS\Model;

use AliyunMNS\Constants;

class SubscriptionAttributes
{
    private $endpoint;
    private $strategy;
    private $contentFormat;

    # may change in AliyunMNS\Topic
    private $topicName;

    # the following attributes cannot be changed
    private $subscriptionName;
    private $topicOwner;
    private $createTime;
    private $lastModifyTime;

    #by wushunyi@vip.qq.com
    private $FilterTag;//描述了该订阅中消息过滤的标签（仅标签一致的消息才会被推送）
    private $Subscriber;// Subscription 订阅者的 AccountId
    private $NotifyContentFormat;//向 Endpoint 推送的消息内容格式
    private $NotifyStrategy;//向 Endpoint 推送消息错误时的重试策略


    public function __construct(
        $subscriptionName = null,
        $endpoint = null,
        $strategy = null,
        $contentFormat = null,
        $topicName = null,
        $topicOwner = null,
        $createTime = null,
        $lastModifyTime = null,
        $filterTag = null,
        $Subscriber = null,
        $NotifyContentFormat = null,
        $NotifyStrategy = null
    ) {
        $this->endpoint = $endpoint;
        $this->strategy = $strategy;
        $this->contentFormat = $contentFormat;
        $this->subscriptionName = $subscriptionName;

        //cloud change in AliyunMNS\Topic
        $this->topicName = $topicName;

        $this->topicOwner = $topicOwner;
        $this->createTime = $createTime;
        $this->lastModifyTime = $lastModifyTime;
        $this->FilterTag = $filterTag;
        $this->Subscriber = $Subscriber;
        $this->NotifyStrategy = $NotifyStrategy;
        $this->NotifyContentFormat = $NotifyContentFormat;
    }

    static public function fromXML(\XMLReader $xmlReader)
    {
        $endpoint = null;
        $strategy = null;
        $contentFormat = null;
        $topicOwner = null;
        $topicName = null;
        $createTime = null;
        $lastModifyTime = null;
        $filterTag = null;
        $Subscriber = null;
        $NotifyContentFormat = null;
        $NotifyStrategy = null;
        while ($xmlReader->read()) {
            if ($xmlReader->nodeType == \XMLReader::ELEMENT) {
                switch ($xmlReader->name) {
                    case 'TopicOwner':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $topicOwner = $xmlReader->value;
                        }
                        break;
                    case 'TopicName':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $topicName = $xmlReader->value;
                        }
                        break;
                    case 'SubscriptionName':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $subscriptionName = $xmlReader->value;
                        }
                    case 'Endpoint':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $endpoint = $xmlReader->value;
                        }
                        break;
                    case 'NotifyStrategy':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $strategy = $xmlReader->value;
                        }
                        break;
                    case 'NotifyContentFormat':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $contentFormat = $xmlReader->value;
                        }
                        break;
                    case 'CreateTime':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $createTime = $xmlReader->value;
                        }
                        break;
                    case 'LastModifyTime':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $lastModifyTime = $xmlReader->value;
                        }
                        break;
                    case 'FilterTag':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $filterTag = $xmlReader->value;
                        }
                        break;
                    case 'Subscriber':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $Subscriber = $xmlReader->value;
                        }
                        break;
                    case 'NotifyStrategy':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $NotifyStrategy = $xmlReader->value;
                        }
                        break;
                    case 'NotifyContentFormat':
                        $xmlReader->read();
                        if ($xmlReader->nodeType == \XMLReader::TEXT) {
                            $NotifyContentFormat = $xmlReader->value;
                        }
                        break;
                }
            }
        }

        $attributes = new SubscriptionAttributes(
            $subscriptionName,
            $endpoint,
            $strategy,
            $contentFormat,
            $topicName,
            $topicOwner,
            $createTime,
            $lastModifyTime,
            $filterTag,
            $Subscriber,
            $NotifyContentFormat,
            $NotifyStrategy
        );

        return $attributes;
    }

    public function __call( $method, $arg_array)
    {

        if(strpos($method,'get') === 0){
            $properlyName = substr($method,3);
            if(isset($this->$properlyName)){
                return $this->$properlyName;
            }
        }
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getStrategy()
    {
        return $this->strategy;
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    public function getContentFormat()
    {
        return $this->contentFormat;
    }

    public function setContentFormat($contentFormat)
    {
        $this->contentFormat = $contentFormat;
    }

    public function getTopicName()
    {
        return $this->topicName;
    }

    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
    }

    public function getTopicOwner()
    {
        return $this->topicOwner;
    }

    public function getSubscriptionName()
    {
        return $this->subscriptionName;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function getLastModifyTime()
    {
        return $this->lastModifyTime;
    }

    public function writeXML(\XMLWriter $xmlWriter)
    {
        if ($this->endpoint != null) {
            $xmlWriter->writeElement(Constants::ENDPOINT, $this->endpoint);
        }
        if ($this->strategy != null) {
            $xmlWriter->writeElement(Constants::STRATEGY, $this->strategy);
        }
        if ($this->contentFormat != null) {
            $xmlWriter->writeElement(Constants::CONTENT_FORMAT,
                $this->contentFormat);
        }
    }
}

?>
