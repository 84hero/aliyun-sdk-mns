<?php
namespace AliyunMNS\Traits;

trait AttributesToArray
{
    public function attributesToArray($object){
        $attributes = [];
        $refClass = new \ReflectionClass($object);
        foreach ($refClass->getProperties() as $Properties){
            $propertieName = $Properties->getName();
            $method = 'get' . $propertieName;
            $attributes[$propertieName] = $object->$method();
        }
        return $attributes;
    }
}

?>

