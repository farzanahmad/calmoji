<?php

namespace Ahmad\Calmoji;

use Exception;

class Calmoji
{

    /**
     * @param  string  $expression
     * @return string
     * @throws Exception
     */
    public function evaluate($expression): string
    {
        $translatedExpression = $this->translateEmojis($expression);
        $this->validateExpression($translatedExpression);
        eval('$result =' . $translatedExpression . ';');
        /** @var int $result */
        return $this->translateResult($result);
    }

    /**
     * @param  string  $translatedExpression
     * @throws Exception
     */
    public function validateExpression($translatedExpression): void
    {
        if (!preg_match('/^[\d\s\+\-\/\*]*$/', $translatedExpression)) {
            throw new Exception('Expression contains invalid characters.');
        }
        if (preg_match('/\d\s\d/', $translatedExpression)) {
            throw new Exception('Number can not have a space in it.');
        }
        if (!preg_match('/^\d+(\s*[\+\-\/\*]\s*\d+)*$/', $translatedExpression)) {
            throw new Exception('Missing operands.'.' '.$translatedExpression);
        }
    }

    /**
     * @param  int  $result
     * @return string
     */
    private function translateResult($result): string
    {
        foreach (config('calmoji.mapping.number') as $number => $numberMapping) {
            $result = str_replace($number, reset($numberMapping), $result);
        }
        return $result;
    }

    /**
     * @param  string  $expression
     * @return string
     */
    private function translateEmojis($expression): string
    {
        foreach (config('calmoji.mapping.number') as $number => $numberMapping) {
            $expression = str_replace($numberMapping, $number, $expression);
        }
        foreach (config('calmoji.mapping.symbol') as $symbol => $symbolMapping) {
            $expression = str_replace($symbolMapping, $symbol, $expression);
        }
        return $expression;
    }
}