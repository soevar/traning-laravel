<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('create edit product');

$I->amOnPage('product/1/edit');
$I->see('Edit Product');
