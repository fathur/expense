<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 12.07
 */

namespace App\Libraries\LanguageProcess;


class Extract
{
    protected $sentence;

    public function __construct()
    {
        // ...
    }

    public static function sentence(string $sentence)
    {
        $extract = new self();
        $extract->setSentence($sentence);

        return $extract->concentrate();
    }

    public function setSentence(string $sentence)
    {
        $this->sentence = $sentence;
        return $this;
    }

    public function concentrate(): array
    {
        return [
            'location' => (new ObtainLocation($this->sentence))->extract(),
            'source' => (new ObtainGiver($this->sentence))->extract(),
            'destination' => (new ObtainReceiver($this->sentence))->extract(),
            'nominal' => (new ObtainMoney($this->sentence))->extract(),
            'time'  => (new ObtainDateTime($this->sentence))->extract(),
            'reason' => (new ObtainReason($this->sentence))->extract()
        ];
    }
}

