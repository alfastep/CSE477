<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
class SiteTest extends \PHPUnit_Framework_TestCase
{
//	public function test1() {
//		//$this->assertEquals($expected, $actual);
//	}

	public function test_emailGetterSetter(){
        $site = new Felis\Site();

        $site->setEmail('alfastep@msu.edu');
        $this->assertContains('alfastep@msu.edu', $site->getEmail());
	}

    public function test_rootGetterSetter(){
        $site = new Felis\Site();

        $site->setRoot('arctic.cse.msu.edu');
        $this->assertContains('arctic.cse.msu.edu', $site->getRoot());
    }

    public function test_getTablePrefix(){
        $site = new Felis\Site();

        $site->dbConfigure('a','b','c','d');
        $this->assertContains('d', $site->getTablePrefix());

	}

    public function test_localize() {
        $site = new Felis\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test8_', $site->getTablePrefix());
    }
}

/// @endcond
?>
