<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'Ihtiandiko',
            'username' => 'ihtiandiko',
            'email' => 'wihtiandiko@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        // User::create([
        //     'name' => 'Wicaksono',
        //     'email' => 'wihtiandiko@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Diko',
        //     'email' => 'ihti@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Gaming',
            'slug' => 'gaming'
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Post::factory(100)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor",
        //     'body' => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor eveniet? Quidem error, in cum cupiditate quas tenetur possimus libero asperiores quia, delectus tempora necessitatibus eaque laborum temporibus, dolores quod corporis! Error.</p><p>Molestias libero, ducimus obcaecati fugit odio exercitationem hic mollitia corrupti accusantium molestiae commodi tempora sint facilis eligendi veniam ea deleniti, consequatur nam? Error, tempore magni? Velit eum saepe distinctio molestiae dolorum modi nostrum, qui sapiente natus aliquam ipsa quisquam quam molestias perferendis? Doloribus quibusdam vero labore maiores cumque aperiam exercitationem, aspernatur quia? Cum delectus recusandae adipisci corrupti officiis hic eius id ipsam temporibus voluptatibus.</p>",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor",
        //     'body' => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor eveniet? Quidem error, in cum cupiditate quas tenetur possimus libero asperiores quia, delectus tempora necessitatibus eaque laborum temporibus, dolores quod corporis! Error.</p><p>Molestias libero, ducimus obcaecati fugit odio exercitationem hic mollitia corrupti accusantium molestiae commodi tempora sint facilis eligendi veniam ea deleniti, consequatur nam? Error, tempore magni? Velit eum saepe distinctio molestiae dolorum modi nostrum, qui sapiente natus aliquam ipsa quisquam quam molestias perferendis? Doloribus quibusdam vero labore maiores cumque aperiam exercitationem, aspernatur quia? Cum delectus recusandae adipisci corrupti officiis hic eius id ipsam temporibus voluptatibus.</p>",
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor",
        //     'body' => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor eveniet? Quidem error, in cum cupiditate quas tenetur possimus libero asperiores quia, delectus tempora necessitatibus eaque laborum temporibus, dolores quod corporis! Error.</p><p>Molestias libero, ducimus obcaecati fugit odio exercitationem hic mollitia corrupti accusantium molestiae commodi tempora sint facilis eligendi veniam ea deleniti, consequatur nam? Error, tempore magni? Velit eum saepe distinctio molestiae dolorum modi nostrum, qui sapiente natus aliquam ipsa quisquam quam molestias perferendis? Doloribus quibusdam vero labore maiores cumque aperiam exercitationem, aspernatur quia? Cum delectus recusandae adipisci corrupti officiis hic eius id ipsam temporibus voluptatibus.</p>",
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor",
        //     'body' => "<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quae ad vitae minus dolor eveniet? Quidem error, in cum cupiditate quas tenetur possimus libero asperiores quia, delectus tempora necessitatibus eaque laborum temporibus, dolores quod corporis! Error.</p><p>Molestias libero, ducimus obcaecati fugit odio exercitationem hic mollitia corrupti accusantium molestiae commodi tempora sint facilis eligendi veniam ea deleniti, consequatur nam? Error, tempore magni? Velit eum saepe distinctio molestiae dolorum modi nostrum, qui sapiente natus aliquam ipsa quisquam quam molestias perferendis? Doloribus quibusdam vero labore maiores cumque aperiam exercitationem, aspernatur quia? Cum delectus recusandae adipisci corrupti officiis hic eius id ipsam temporibus voluptatibus.</p>",
        //     'category_id' => 3,
        //     'user_id' => 3
        // ]);
    }
}
