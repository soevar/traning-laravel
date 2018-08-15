<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see list of products');

$I->amOnPage('/product');
$I->see('Product List');
$I->see('P-779');
$I->see('Nobis veniam et qui.');

$I->seeLink('Add New Product', 'product/create');
$I->seeLink('edit');
$I->seeLink('delete');

