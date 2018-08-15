<?php

class ProductTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFindById()
    {
        $product = App\Product::find(1);
        $this->tester->seeRecord('products',
            [
                'id' => $product -> id,
                'code' => $product -> code
            ]
        );
    }
}