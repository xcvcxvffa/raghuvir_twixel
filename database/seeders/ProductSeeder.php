<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Whole Wheat Atta',
                'slug' => 'atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'category' => 'Wheat Flour',
                'quote' => 'From Carefully Selected Wheat to Your Everyday Kitchen.',
                'short_description' => 'Raghuvir Hygienic Whole Wheat Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients. We process our wheat hygienically to keep the moisture low, ensuring fresh, soft, and healthy rotis for your family.',
                'detailed_description' => 'Raghuvir Whole Wheat Atta brings the goodness of carefully selected wheat to your kitchen. The wheat goes through a careful cleaning and grinding process to create quality atta suitable for everyday Indian meals. It retains dietary fiber and natural goodness, ensuring your rotis, parathas, and theplas stay wonderfully soft and wholesome throughout the day.',
                'sizes' => ['5kg', '30kg'],
                'image' => 'images/product_atta_white.jpg',
                'image_alt' => 'Raghuvir Whole Wheat Atta 100% Pure Stone Ground',
                'gallery_images' => [
                    'images/product_atta_white.jpg',
                    'images/product_atta.jpg',
                    'images/product-image-1.jpg',
                    'images/ideal_roti.jpg',
                    'images/ideal_paratha.jpg',
                ],
                'main_ingredient' => 'Selected Pure Wheat',
                'processing' => 'Traditional Slow Chakki Ground',
                'suitable_for' => 'Everyday Indian Cooking (Roti, Paratha, Thepla)',
                'packaging' => 'Hygienic & Moisture-Proof Food-Grade Bag',
                'shelf_life' => 'Best before 3 months from packing date',
                'storage' => 'Store in a cool, dry place in an airtight container',
                'energy_kcal' => '355.50',
                'protein_g' => '11.40',
                'carbs_g' => '75.90',
                'fat_g' => '0.70',
                'nutrition_details' => [
                    'serving_size' => '100 gm',
                    'per_pack' => '1',
                    'saturated_fat' => '0',
                    'trans_fat' => '0',
                    'cholesterol' => '0',
                    'sodium' => '20.1',
                    'sugar' => '0.8',
                    'added_sugar' => '0',
                ],
                'ideal_for' => ['Roti / Chapati', 'Paratha', 'Puri', 'Thepla', 'Everyday Cooking'],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'meta_title' => 'Raghuvir Whole Wheat Atta - 100% Pure Stone Ground Chakki Atta',
                'meta_description' => 'Experience soft, nutritious rotis with Raghuvir 100% Whole Wheat Chakki Atta. Stone-ground from golden wheat with zero maida and natural fiber.',
                'meta_keywords' => 'whole wheat atta, chakki atta, pure wheat flour, soft roti atta, raghuvir atta',
            ],
            [
                'name' => 'Bati Atta',
                'slug' => 'bati',
                'subtitle' => 'Specially Milled for Crispy, Soft & Authentic Batis',
                'category' => 'Coarse Wheat Flour',
                'quote' => 'Specially Milled for Crispy, Soft & Authentic Batis.',
                'short_description' => 'Raghuvir Bati Atta is specially milled to the perfect texture for making delicious, authentic Batis. Ground from handpicked premium wheat grains, it ensures your Batis are crispy on the outside and soft on the inside.',
                'detailed_description' => 'Raghuvir Bati Atta is specially milled to the perfect coarse texture required for making authentic Rajasthani & Malwi Batis, Baflas, and Churma. Ground from handpicked premium golden wheat grains, it provides excellent crust crispiness while keeping the inside delightfully soft and fragrant.',
                'sizes' => ['5kg', '30kg'],
                'image' => 'images/product_bati_transparent.png',
                'image_alt' => 'Raghuvir Bati Atta Traditional Coarse Ground',
                'gallery_images' => [
                    'images/product_bati_transparent.png',
                    'images/ideal_dal_bati.jpg',
                    'images/ideal_churma.jpg',
                    'images/ideal_bafla.jpg',
                ],
                'main_ingredient' => 'Handpicked Premium Golden Wheat',
                'processing' => 'Traditional Coarse Stone Ground',
                'suitable_for' => 'Dal Bati, Churma, Bafla & Traditional Breads',
                'packaging' => 'Hygienic & Secure Packaging',
                'shelf_life' => 'Best before 3 months from packing date',
                'storage' => 'Store in a cool, dry place in an airtight container',
                'energy_kcal' => '360.00',
                'protein_g' => '12.10',
                'carbs_g' => '74.80',
                'fat_g' => '0.85',
                'nutrition_details' => [
                    'serving_size' => '100 gm',
                    'per_pack' => '1',
                    'saturated_fat' => '0.10',
                    'trans_fat' => '0',
                    'cholesterol' => '0',
                    'sodium' => '18.5',
                    'sugar' => '0.9',
                    'added_sugar' => '0',
                ],
                'ideal_for' => ['Dal Bati', 'Churma', 'Bafla', 'Traditional Breads'],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'meta_title' => 'Raghuvir Bati Atta - Coarse Ground Flour for Dal Bati & Churma',
                'meta_description' => 'Authentic coarse ground Bati Atta for traditional Rajasthani Dal Bati, Churma and Bafla. Crispy outside, delightfully soft inside.',
                'meta_keywords' => 'bati atta, dal bati flour, coarse wheat flour, churma atta, raghuvir bati atta',
            ],
            [
                'name' => 'Wheat Bran',
                'slug' => 'wheat',
                'subtitle' => 'Consistent Quality & Superior Performance in Every Bag',
                'category' => 'Wheat Bran',
                'quote' => 'Consistent Quality & Superior Performance in Every Bag.',
                'short_description' => 'Raghuvir Wheat Bran is high-quality, fiber-rich flour ideal for bulk baking, catering, and commercial kitchens. Milled under strict quality controls to maintain its nutritional integrity and excellent baking properties.',
                'detailed_description' => 'Raghuvir Wheat Bran is commercial-grade high-yield flour formulated specifically for bulk cooking, industrial catering, restaurants, and active kitchens. Processed under stringent moisture and hygiene controls, it delivers consistent dough elasticity, high water absorption, and superior puffing.',
                'sizes' => ['49kg'],
                'image' => 'images/product_wheat_bran_transparent.png',
                'image_alt' => 'Raghuvir Wheat Bran Commercial Grade High Dietary Fiber',
                'gallery_images' => [
                    'images/product_wheat_bran_transparent.png',
                    'images/ideal_commercial.jpg',
                    'images/ideal_baking.jpg',
                    'images/why-choose-image-2.jpg',
                ],
                'main_ingredient' => 'Pure Golden Wheat',
                'processing' => 'Chakki Ground & Roller Processed',
                'suitable_for' => 'Bulk Baking, Catering & Commercial Kitchens',
                'packaging' => 'Hygienic & Heavy Duty Packaging',
                'shelf_life' => 'Best before 3 months from packing date',
                'storage' => 'Store in a cool, dry place off the ground',
                'energy_kcal' => '348.00',
                'protein_g' => '13.20',
                'carbs_g' => '71.50',
                'fat_g' => '1.10',
                'nutrition_details' => [
                    'serving_size' => '100 gm',
                    'per_pack' => '1',
                    'saturated_fat' => '0',
                    'trans_fat' => '0',
                    'cholesterol' => '0',
                    'sodium' => '20.1',
                    'sugar' => '0.8',
                    'added_sugar' => '0',
                ],
                'ideal_for' => ['Commercial Kitchens', 'Bulk Catering', 'High-Fiber Baking'],
                'is_active' => true,
                'is_featured' => true,
                'sort_order' => 3,
                'meta_title' => 'Raghuvir Wheat Bran - High Dietary Fiber Commercial Grade Flour',
                'meta_description' => 'Premium high-fiber wheat bran for commercial kitchens, bakers, and health-focused food preparation. Bulk supply available.',
                'meta_keywords' => 'wheat bran, commercial atta, bulk flour, dietary fiber wheat, raghuvir bran',
            ],
        ];

        foreach ($products as $data) {
            Product::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
