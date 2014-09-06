<?php
    //namespace Aozora0000\HeaderGenerator\Tests;
    use Aozora0000\HeaderGenerator\Header;

    ob_start();
    class HeaderTest extends PHPUnit_Framework_TestCase {
        /*
         * @runInSeparateProcess
         */
        public function testSetStatus404() {
            $returnString = Header::setStatus(404);
            $this->assertEquals(Header::CODE404,$returnString);
        }

        public function testSetStatus403() {
            $returnString = Header::setStatus(403);
            $this->assertEquals(Header::CODE403,$returnString);
        }

        public function testRedirect302to307() {
            $returnString = Header::redirect(302,"/index.html");
            $this->assertEquals(
                ["code"=>Header::CODE307,"url"=>"/index.html"],
                $returnString
            );
        }

        public function testRedirect303to308IgnoreCase() {
            $returnString = Header::redirect(308,"/index.html");
            $this->assertNotEquals(
                ["code"=>Header::CODE307,"url"=>"/index.html"],
                $returnString
            );
        }

        public function testsetContentTypeJPG() {
            $returnString = Header::setContentType("jpg");
            $this->assertEquals(Header::TYPEJPG,$returnString);
        }
        public function testsetContentTypeNotJPG() {
            $returnString = Header::setContentType("jpg");
            $this->assertNotEquals(Header::TYPEPNG,$returnString);
        }


    }