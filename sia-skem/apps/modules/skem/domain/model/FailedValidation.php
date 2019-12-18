<?php

namespace SiaSkem\Skem\Domain\Model;

class FailedValidation extends \Exception{
    private $failedRequierments;

    public function __construct($message,array $failedRequierments,$code = 0,Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->failedRequierments = $failedRequierments;
    }

    public function getFailedRequierments()
    {
        return $this->failedRequierments;
    }
}