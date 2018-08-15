<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('create new product');

$I->amOnPage('product/create');
$I->see('Create New Product');
