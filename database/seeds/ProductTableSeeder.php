<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

	public function run()
	{

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'ice',
				'slug' => 'ice',
				'description' => 'Ice was a Valyrian steel greatsword and an heirloom of House Stark. It was used both in war and on ceremonial occasions by the Lord of Winterfell.',
				'unitPrice' => 13.99,
				'quantity' => 1,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'wildfire',
				'slug' => 'wildfire',
				'description' => 'Wildfire is a dangerous liquid which is created and controlled by the Alchemists\' Guild, an ancient society of learned men boasting arcane knowledge now based in the city of King\'s Landing. It is a highly volatile material which can explode with tremendous force and burns with a fire that water cannot extinguish, only large quantities of sand.',
				'unitPrice' => 29.99,
				'quantity' => 5,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'oathkeeper',
				'slug' => 'oathkeeper',
				'description' => 'Oathkeeper is one of two Valyrian steel longswords made from Ice, the greatsword of House Stark, under orders of Lord Tywin Lannister. While initially given to Jaime Lannister by Lord Tywin with the intention of making it an heirloom of their house, Jaime instead gave it to Brienne of Tarth for the task of rescuing Sansa Stark. Its sister blade is Widow\'s Wail.',
				'unitPrice' => 4.99,
				'quantity' => 1,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'iceblade',
				'slug' => 'iceblade',
				'description' => 'The mysterious White Walkers carry blades made out of crystallized ice. They have been observed wielded as swords and as long spearheads.',
				'unitPrice' => 14.00,
				'quantity' => 2,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'dragonglass',
				'slug' => 'dragonglass',
				'description' => 'Dragonglass is a common name in Westeros for the substance known as obsidian, a form of volcanic glass. Along with Valyrian steel, it is one of the two known substances capable of killing White Walkers.',
				'unitPrice' => 19.99,
				'quantity' => 8,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'longclaw',
				'slug' => 'longclaw',
				'description' => 'Longclaw is a Valyrian steel sword, in the possession of House Mormont for five centuries. When Lord Jeor Mormont retired from his lordship to take the black and command the Night\'s Watch, he passed it to his son and heir, Ser Jorah Mormont. When Jorah went into exile after trying to sell some poachers into slavery, he had the sword sent back to his father on the Wall. Years later, Jeor gave Longclaw to Jon Snow as a reward for saving his life from a wight. Before giving it to Jon he had the pommel remade, replacing the bear with a direwolf, the sigil of House Stark.',
				'unitPrice' => 29.99,
				'quantity' => 1,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'valyrian steel',
				'slug' => 'valyrian-steel',
				'description' => 'Valyrian steel is a form of metal that was forged in the days of the mighty Valyrian Freehold. It is exceptionally sharp and tremendously strong, yet light, keeping its edge and requiring no maintenance.',
				'unitPrice' => 9.99,
				'quantity' => 5,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'dark sister',
				'slug' => 'dark-sister',
				'description' => 'Dark Sister was the name of the Valyrian steel sword belonging to Visenya Targaryen, the sister-wife of Aegon the Conqueror. A great warrior, she used it in battle as well as riding her dragon during the War of Conquest. The sword was ultimately lost during the Blackfyre Rebellion.',
				'unitPrice' => 13.99,
				'quantity' => 1,
		]);

		\App\Product::create([
				'id' => md5(microtime()),
				'name' => 'widow\'s wail',
				'slug' => 'widows-wail',
				'description' => 'Widow\'s Wail is the second Valyrian steel blade made from Ice, the blade of House Stark. It is given by Tywin Lannister as a wedding gift to his grandson King Joffrey Baratheon at the breakfast prior to the wedding ceremony.[1] Its sister blade is Oathkeeper.',
				'unitPrice' => 13.99,
				'quantity' => 1,
		]);
	}

}
