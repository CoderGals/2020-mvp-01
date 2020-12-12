<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Celebration;
use App\Models\Gift;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
             'name' => 'example',
             'email' => 'example@gmail.com',
             'password' => Hash::make('password')
        ]);
        $birthday = Celebration::create([
            'name' => 'Birthday'
        ]);

        $fathers_day = Celebration::create([
            'name' => 'Fathers Day'
        ]);

        $mothers_day = Celebration::create([
            'name' => 'Mothers Day'
        ]);

        $birthday = Celebration::create([
            'name' => 'Birthday'
        ]);

        $christmas = Celebration::create([
            'name' => 'Christmas'
        ]);

        $new_year = Celebration::create([
            'name' => 'New Year'
        ]);

        $kids_day = Celebration::create([
            'name' => 'Kids Day'
        ]);

        $men = Category::create([
            'name' => 'Men'
        ]);

        $men->celebrations()->sync([$new_year->id, $christmas->id, $birthday->id, $fathers_day->id]);

        $women = Category::create([
            'name' => 'Women'
        ]);
        $women->celebrations()->sync([$new_year->id, $christmas->id, $birthday->id, $mothers_day->id]);

        $kids = Category::create([
            'name' => 'Kids'
        ]);

        $kids->celebrations()->sync([$new_year->id, $christmas->id, $birthday->id, $kids_day->id]);



        $gifts =  Gift::factory(9)->create();

        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/bdaycakek.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/bdaycakeki.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/bdaycakem.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/chance-anderson-0asxk09hKrk-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/ellieelien-Rejlvd47WjI-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/jon-tyson-bIW3MaMPqNA-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/natalia-rudisuli-8fKqjimU3Ws-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/natallia-nagorniak-tA3sJ4u09eU-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/birthday/natasha-welingkar-6N-PvrURkZE-unsplash.jpg')),
        ];
        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$men->id, $women->id, $kids->id]);
            $gift->celebrations()->sync([$birthday->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }

        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/christmas/anastasia-gubarieva-hlKOJon80uA-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/christmas/markus-spiske-wWbqcT14mEE-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/christmas/markus-spiske-yeLhfgaylzY-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/christmas/sincerely-media-Iuy1f7xi5yg-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/christmas/sincerely-media-qOaH8d6eono-unsplash.jpg')),
        ];
        $gifts =  Gift::factory(5)->create();

        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$men->id, $women->id, $kids->id]);
            $gift->celebrations()->sync([$christmas->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }


        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/fathersday/photo-1549122728-f519709caa9c.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/fathersday/photo-1598618443855-232ee0f819f6.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/fathersday/revolt-6V2vCZ2hYtY-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/fathersday/tim-mossholder-m-ylhkTHv6Q-unsplash.jpg')),
        ];
        $gifts =  Gift::factory(4)->create();

        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$men->id]);
            $gift->celebrations()->sync([$fathers_day->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }

        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/momday/bestmom.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/momday/biscuit.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/momday/flowers.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/momday/flowerwallet.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/momday/momgift.jpg')),
        ];
        $gifts =  Gift::factory(5)->create();

        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$women->id]);
            $gift->celebrations()->sync([$mothers_day->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }

        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/newyear/fotografierende-AtpB4X5iZeo-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/newyear/immo-wegmann-U2sp_4k9gIc-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/newyear/monika-grabkowska-yuAEcsAe4lk-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/newyear/rodion-kutsaev-ySNkCkdKyTY-unsplash.jpg')),
        ];
        $gifts =  Gift::factory(4)->create();

        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$women->id, $men->id, $kids->id]);
            $gift->celebrations()->sync([$new_year->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }

        $url = [
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/freestocks-PuYPLH0BQq0-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/hello-i-m-nik-Oklzj82ffsQ-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/josh-applegate-p_KJvKVsH14-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/markus-spiske-yftrRWzcSPU-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/mon-petit-chou-photography-b2ADHvvhC5Y-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/serg-antonov-VYVp_vONi40-unsplash.jpg')),
            str_replace('localhost', 'localhost:8000', asset('img/giftshopimages/kidsday/sincerely-media-u-VD_27I7zI-unsplash.jpg')),

        ];
        $gifts =  Gift::factory(7)->create();

        $index = 0;
        foreach($gifts as $gift) {
            $gift->categories()->sync([$kids->id]);
            $gift->celebrations()->sync([$new_year->id, $christmas->id, $birthday->id, $kids_day->id]);
            if (isset($url[$index])):
                $gift->update(['pic_url' => $url[$index]]);
            endif;
            $index++;
        }
    }
}
