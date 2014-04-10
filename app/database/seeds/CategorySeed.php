<?php
class CategorySeed extends Seeder {

	public function run() {
		$category = new Category;
		$category -> name = 'HTML';
		$category -> save();
		
		$category = new Category;
		$category -> name = 'CSS';
		$category -> save();
		
		$category = new Category;
		$category -> name = 'PHP';
		$category -> save();
		
		$category = new Category;
		$category -> name = 'JavaScript';
		$category -> save();
		
		$category = new Category;
		$category -> name = 'Misc';
		$category -> save();
	}

}