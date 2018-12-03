<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [
            [
                'name' => 'Trà sữa trân châu trắng',
                'price' => 12345,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 4,
            ], [
                'name' => 'Trà sữa Oreo Cake Cream',
                'price' => 312312,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 1,
            ], [
                'name' => 'Trà sữa trân châu đường nâu',
                'price' => 123,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 3,
            ], [
                'name' => 'Trà xoài kem cheese',
                'price' => 123213,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 2,
            ], [
                'name' => 'Trà sữa khoai môn',
                'price' => 4234324,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 4,
            ], [
                'name' => 'Trà sữa matcha đậu đỏ',
                'price' => 12312,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 1,
            ], [
                'name' => 'Trà sữa matcha ca phê',
                'price' => 23234324,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 2,
            ], [
                'name' => 'Trà sữa cà chua',
                'price' => 23234324,
                'brief' => $faker->text(300),
                'description' => 'Nếu món đá bào cao ngất được rưới lên một vài ngọt si rô thơm ngọt, thêm một tí sữa gắn liền với tuổi thơ của rất nhiều thế hệ, thì trà sữa lại là món khoái khẩu của các bạn trẻ thế hệ 9X. Vẫn giữ nguyên sức hút của mình, siro đá bào và trà sữa luôn là món giải khát được yêu thích nhất là trong tiết trời nóng nực của Sài Gòn. Với voucher từ Hotdeal lần này, bạn sẽ được thỏa mãn cơn khát với combo gồm 2 ly trà sữa trân châu/Syro đá bào (31 hương vị tự chọn) và 1 dĩa khoai tây chiên (200gr) tại Bee Quán.Syro đá bào là thức uống giải khát tuyệt vời cho những ngày nắng nóng được chế biến từ đá xay mịn mát lạnh kết hợp với vị ngọt ngào của các loại syro trái cây thơm ngon. Tại Bee quán có tới gần 30 hương vị cho bạn lựa chọn. Syro nho, mật ong, việt quất, phúc bồn tử… không chỉ ngọt ngào mà còn rất tốt cho sức khỏe và sắc đẹp của bạn gái. Còn nếu bạn thích thêm một chút vị chua nhẹ nhàng thì đã có hương vị của chanh, chanh dây, sơ ri thơm, me…. Mang đến cảm giác sảng khoáng, the mát, mới lạ là sự góp mặt của syro bạc hà, cocktail, vải, sầu riêng, khoai môn….',
                'category_id' => 3,
            ],
        ];


        $limit = 19;

        for ($i = 0 ; $i < $limit ; $i++) {
            $data[] = [
                'name' => $faker->lexify('Trà Sữa ??? ???? ??#?'),
                'price' => $faker->numberBetween(1, 9999),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => random_int(1, 4),
            ];
        }

        for ($i = 0 ; $i < $limit ; $i++) {
            $data[] = [
                'name' => $faker->lexify('Nước ???? ????? ##?#?'),
                'price' => $faker->numberBetween(1, 400),
                'brief' => $faker->text(300),
                'description' => $faker->text($maxNbChars = 2000),
                'category_id' => random_int(1, 4),
            ];
        }
        DB::table('products')->insert($data);
    }
}
