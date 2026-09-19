<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $media = [
            // --- PHOTOS (Images) ---
            [
                'title' => 'Traditional Stone Chakki Milling',
                'type' => 'image',
                'category' => 'Factory & Milling',
                'image' => 'images/gallery-1.jpg',
                'video_url' => null,
                'caption' => 'Slow-grinding stone chakkis that preserve all essential germ nutrients and natural wheat bran.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Golden Sharbati Wheat Harvest',
                'type' => 'image',
                'category' => 'Wheat & Harvest',
                'image' => 'images/gallery-2.jpg',
                'video_url' => null,
                'caption' => 'Hand-picked premium Sharbati wheat grains sourced directly from lush fertile farms.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Hygienic Multistage Grain Cleaning',
                'type' => 'image',
                'category' => 'Factory & Milling',
                'image' => 'images/gallery-3.jpg',
                'video_url' => null,
                'caption' => 'Advanced destoning and multi-sieve aspiration systems ensuring 100% dust-free wheat.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Automatic Moisture-Sealed Packaging',
                'type' => 'image',
                'category' => 'Packaging & Storage',
                'image' => 'images/gallery-4.jpg',
                'video_url' => null,
                'caption' => 'High-speed automated bagging for 5kg and 30kg tamper-proof, airtight flour packaging.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Quality Assurance & Grain Inspection',
                'type' => 'image',
                'category' => 'Quality & Testing',
                'image' => 'images/gallery-5.jpg',
                'video_url' => null,
                'caption' => 'Daily lab testing of moisture content, gluten strength, and fineness before milling.',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Coarse Bati Atta Granulation Milled',
                'type' => 'image',
                'category' => 'Products',
                'image' => 'images/gallery-6.jpg',
                'video_url' => null,
                'caption' => 'Specially milled coarse stone texture designed for authentic Rajasthani Dal Bati and Churma.',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Bulk Logistics & Pan-Gujarat Dispatch',
                'type' => 'image',
                'category' => 'Packaging & Storage',
                'image' => 'images/gallery-7.jpg',
                'video_url' => null,
                'caption' => 'Reliable logistics network dispatching wholesale consignments across Gujarat within 24-48 hours.',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Modern Dehgam Manufacturing Plant',
                'type' => 'image',
                'category' => 'Factory & Milling',
                'image' => 'images/gallery-8.jpg',
                'video_url' => null,
                'caption' => 'Our state-of-the-art facility at Vibrant Prime Industrial Park, Kadadara, Dehgam.',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Fresh Stone Ground Atta Finished Batch',
                'type' => 'image',
                'category' => 'Products',
                'image' => 'images/gallery-9.jpg',
                'video_url' => null,
                'caption' => 'Chakki-fresh 100% whole wheat flour ready for kitchens, restaurants, and supermarkets.',
                'sort_order' => 9,
                'is_active' => true,
            ],

            // --- VIDEOS ---
            [
                'title' => 'Raghuvir Foods: Factory Walkthrough & Milling Process',
                'type' => 'video',
                'category' => 'Factory & Milling',
                'image' => 'images/gallery-1.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'Experience how our traditional stone chakki mill operates with modern hygiene standards.',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'title' => 'From Farm to Flour: Handpicked Sharbati Wheat',
                'type' => 'video',
                'category' => 'Wheat & Harvest',
                'image' => 'images/gallery-2.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'Follow the journey of premium golden wheat grains from fertile fields to our cleaning plant.',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'title' => 'Secret to Authentic Soft Rotis & Fluffy Phulkas',
                'type' => 'video',
                'category' => 'Recipes & Cooking',
                'image' => 'images/gallery-3.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'Master chefs reveal dough kneading tips using Raghuvir 100% Stone-Ground Whole Wheat Atta.',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'title' => 'Traditional Dal Bati & Churma Recipe Guide',
                'type' => 'video',
                'category' => 'Recipes & Cooking',
                'image' => 'images/gallery-6.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'Learn how coarse granulation Bati Atta creates crisp golden bati crust with soft interior.',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'title' => 'Quality Testing & Purity Verification Standards',
                'type' => 'video',
                'category' => 'Quality & Testing',
                'image' => 'images/gallery-5.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'Our strict quality control procedures certifying zero chemical additives and zero maida.',
                'sort_order' => 14,
                'is_active' => true,
            ],
            [
                'title' => 'Commercial Packing & Wholesale Logistics Overview',
                'type' => 'video',
                'category' => 'Packaging & Storage',
                'image' => 'images/gallery-4.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=Y-x0efG1seA',
                'caption' => 'High-capacity dispatches serving retail superstores, hotels, and caterers across Gujarat.',
                'sort_order' => 15,
                'is_active' => true,
            ],
        ];

        foreach ($media as $item) {
            Gallery::updateOrCreate(
                ['title' => $item['title'], 'type' => $item['type']],
                $item
            );
        }
    }
}
