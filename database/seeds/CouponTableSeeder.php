<?php

use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder {

	public function run()
	{

		\App\Coupon::create([
			'id' => md5(microtime()),
			'code' => 'blackfriday25',
			'type' => 'onetime',
			'description' => 'whole store 25 percentage off on black friday.',
			'percent_off' => 25,
            'amount_off' => 0.00,
			'expire_at' => date('Y-m-d H:i:s', time() + (365 * 24 * 60 * 60)),
			'times_redeemed' => 0,
		]);

		\App\Coupon::create([
				'id' => md5(microtime()),
				'code' => 'cybermonday10',
				'type' => 'repeating',
				'description' => 'whole store 10 percentage off on cyber monday.',
				'percent_off' => 10,
				'amount_off' => 0.00,
				'expire_at' => date('Y-m-d H:i:s', time() + (365 * 24 * 60 * 60)),
				'times_redeemed' => 0,
		]);

	}

}
