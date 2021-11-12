<?php

namespace Huang\HelloWorld\Block;

/**
 * 在构造函数里定义规则
 */
class MyValidator
{
    protected $errors;

    protected $validators;

    public function __construct()
    {
        $nameValidator = new \Magento\Framework\Validator();

        $nameValidator->addValidator(
            new \Magento\Framework\Validator\StringLength([
                'min' => 2,
                'max' => 10,
            ])
        );

        $contentValidator = new \Magento\Framework\Validator();
        $contentValidator->addValidator(
            new \Magento\Framework\Validator\StringLength([
                'min' => 5,
                'max' => 20,
            ])
        );

        $this->validators["name"] = $nameValidator;
        $this->validators["content"] = $contentValidator;
    }

    public function validate(array $data)
    {
        foreach ($data as $k => $v)
        {
            if (!isset($this->validators[$k])) {
                continue;
            }

            $res = $this->validators[$k]->isValid($v);

            if (!$res) {
                $this->errors[$k] = $this->validators[$k]->getMessages();
            }

        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}