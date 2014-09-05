<?php
    namespace Aozora0000\HeaderGenerator\Tests;
    use Aozora0000\HeaderGenerator\Header;
    
    class HeaderTest extends \PHPUnit_Framework_TestCase {
        public function TestsetStatus() {
            Header::setStatus(404);
            $headers = headers_list();
            var_dump($headers);
        }
    }
