<?php
/**
 * Created by PhpStorm.
 * User: fathur
 * Date: 18/08/18
 * Time: 13.27
 */

namespace Tests\Unit;


use App\Libraries\LanguageProcess\Extract;
use Tests\TestCase;

/**
 * Class ObtainLocationTest
 * @package Tests\Unit
 *
 * Hari ini makan siang di Lotteria bareng teman kantor habis 100 ribu
 * Gw abis gajian 10 jt tanggal 25 kemarin.
 */
class ObtainLocationTest extends TestCase
{
    public function test_location_one_word()
    {
        $x = Extract::sentence("Aku di Pekanbaru");
        $this->assertEquals('Pekanbaru', $x['location']);
    }

    public function test_location_two_words()
    {
        $x = Extract::sentence("Aku di Pantai Kartini");
        $this->assertEquals('Pantai Kartini', $x['location']);

    }

    public function test_3()
    {
        $x = Extract::sentence("Hari ini makan siang di Lotteria bareng teman kantor habis 100 ribu");
        $this->assertEquals('Lotteria', $x['location']);

    }


}
