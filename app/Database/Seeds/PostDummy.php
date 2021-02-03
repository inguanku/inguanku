<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \Faker\Factory;
use \CodeIgniter\I18n\Time;

class PostDummy extends Seeder
{
	public function run()
	{
		$faker = Factory::create('id_ID');
		for ($i = 0; $i < 20; $i++){
		    $post = [
		        'user_id' => $faker->biasedNumberBetween( 1,  3, 'sqrt'),
                'pet_name' => Factory::create('en_US')->firstName,
                'date' => Time::now(),
                'description' => $faker->realText(100),
                'sex' => ($i % 2 == 0)? 'male': 'female',
                'category' => ($i % 2 == 0)? 'adopt': 'breed',
                'status' => 'available',
                'type' => ($i % 2 == 0)? 'dog': 'cat',
                'breed' => 'Persia'
            ];
            $picture = [
                'post_id' => $i,
                'file_name' => ($i % 2 == 0)?'dummy1.jpg': 'dummy2.jpg'
            ];
            $this->db->table('tbl_post')->insert($post);
            $this->db->table('tbl_picture')->insert($picture);
        }
	}
}
