<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 13.05
 */

namespace App\Libraries\LanguageProcess;


abstract class AbstractObtainer
{
    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function extract()
    {
        $splits = explode(' ', $this->string);

        $expectedWords = [];
        if (!array_diff($this->startKey(), $splits)) {
            $indexKey = null;

            foreach ($splits as $i => $item) {
                if (in_array($item, $this->startKey())) {

                    $indexKey = $i;
                }
            }

            for ($i = $indexKey + 1; $i < count($splits); $i++) {

                if (in_array($splits[$i], $this->stopKey()))
                    break;

                $expectedWords[] = $splits[$i];
            }
        }

        return implode(' ', $expectedWords);
    }
}
