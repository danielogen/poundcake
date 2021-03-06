<?php
/**
 * @copyright	Copyright 2006-2013, Miles Johnson - http://milesj.me
 * @license		http://opensource.org/licenses/mit-license.php - Licensed under the MIT License
 * @link		http://milesj.me/code/php/decoda
 */

namespace Decoda\Hook;

use Decoda\Decoda;
use Decoda\Hook\CodeHook;
use Decoda\Test\TestCase;

class CodeHookTest extends TestCase {

	/**
	 * Set up Decoda.
	 */
	protected function setUp() {
		parent::setUp();

		$this->object = new CodeHook();
		$this->object->setParser(new Decoda());
	}

	/**
	 * Test that beforeParse() encodes code data so that it wont be converted, then afterParse() decodes the data.
	 */
	public function testConversion() {
		$this->assertEquals('[code="php]VGVzdCBbYl1jb2RlWy9iXSE=[/code]', $this->object->beforeParse('[code="php]Test [b]code[/b]![/code]'));
		$this->assertEquals('<pre class="decoda-code php">Test [b]code[/b]!</pre>', $this->object->beforeParse('<pre class="decoda-code php">Test [b]code[/b]!</pre>'));
	}

}