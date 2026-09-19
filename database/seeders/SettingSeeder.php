<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General & Branding
            [
                'group' => 'general',
                'key' => 'site_title',
                'value' => 'Raghuvir Atta - 100% Pure Sharbati Whole Wheat Flour',
                'type' => 'text',
                'label' => 'Site Title',
                'description' => 'Main title displayed across web pages and browser tabs.',
            ],
            [
                'group' => 'general',
                'key' => 'site_tagline',
                'value' => 'Farm-Fresh Direct to Your Kitchen',
                'type' => 'text',
                'label' => 'Site Tagline',
                'description' => 'Short slogan or brand positioning statement.',
            ],
            [
                'group' => 'general',
                'key' => 'header_logo',
                'value' => '',
                'type' => 'image',
                'label' => 'Header Brand Logo',
                'description' => 'Primary logo used in navigation header (leave empty for default).',
            ],
            [
                'group' => 'general',
                'key' => 'footer_logo',
                'value' => '',
                'type' => 'image',
                'label' => 'Footer / Dark Logo',
                'description' => 'White/Contrast version for dark backgrounds.',
            ],
            [
                'group' => 'general',
                'key' => 'site_favicon',
                'value' => '',
                'type' => 'image',
                'label' => 'Site Favicon',
                'description' => 'Browser tab favicon icon (PNG or ICO).',
            ],

            // Contact Information
            [
                'group' => 'contact',
                'key' => 'contact_phone',
                'value' => '+91 97254 27727',
                'type' => 'text',
                'label' => 'Primary Phone / Customer Care',
                'description' => 'Primary phone number shown on the website and header.',
            ],
            [
                'group' => 'contact',
                'key' => 'contact_email',
                'value' => 'info@raghuviratta.com',
                'type' => 'email',
                'label' => 'Customer Care Email',
                'description' => 'Official email address for inquiries and support.',
            ],
            [
                'group' => 'contact',
                'key' => 'whatsapp_number',
                'value' => '+919725427727',
                'type' => 'text',
                'label' => 'WhatsApp Number',
                'description' => 'Number for direct WhatsApp inquiries (e.g. +919725427727).',
            ],
            [
                'group' => 'contact',
                'key' => 'company_address',
                'value' => 'Plot No 182, Vibrant Prime Industrial Park, kadadara, GIDC Area, Dehgam, Gandhinagar, Gujarat, 382305',
                'type' => 'textarea',
                'label' => 'Factory & Office Address',
                'description' => 'Full physical address of the manufacturing plant.',
            ],
            [
                'group' => 'contact',
                'key' => 'working_hours',
                'value' => 'Monday - Saturday: 9:00 AM - 7:00 PM (Sunday Closed)',
                'type' => 'text',
                'label' => 'Working / Support Hours',
                'description' => 'Customer service and mill operating hours.',
            ],
            [
                'group' => 'contact',
                'key' => 'google_map_embed',
                'value' => 'https://maps.google.com/maps?q=Kadadara%2C+Dehgam%2C+Gujarat&t=&z=13&ie=UTF8&iwloc=&output=embed',
                'type' => 'textarea',
                'label' => 'Google Maps Embed Link',
                'description' => 'Embed source URL for the contact page map.',
            ],

            // Social Media
            [
                'group' => 'social',
                'key' => 'facebook_url',
                'value' => 'https://facebook.com',
                'type' => 'url',
                'label' => 'Facebook Page URL',
                'description' => 'Direct link to Facebook brand page.',
            ],
            [
                'group' => 'social',
                'key' => 'instagram_url',
                'value' => 'https://instagram.com',
                'type' => 'url',
                'label' => 'Instagram Profile URL',
                'description' => 'Direct link to Instagram account.',
            ],
            [
                'group' => 'social',
                'key' => 'linkedin_url',
                'value' => 'https://linkedin.com',
                'type' => 'url',
                'label' => 'LinkedIn Page URL',
                'description' => 'Company LinkedIn profile link.',
            ],
            [
                'group' => 'social',
                'key' => 'youtube_url',
                'value' => 'https://youtube.com',
                'type' => 'url',
                'label' => 'YouTube Channel URL',
                'description' => 'Official YouTube channel link.',
            ],
            [
                'group' => 'social',
                'key' => 'twitter_url',
                'value' => 'https://x.com',
                'type' => 'url',
                'label' => 'X / Twitter Profile URL',
                'description' => 'Link to Twitter/X profile.',
            ],
            [
                'group' => 'social',
                'key' => 'whatsapp_url',
                'value' => 'https://wa.me/919725427727?text=' . rawurlencode('Hello Raghuvir Atta, I would like to inquire about your products.'),
                'type' => 'url',
                'label' => 'WhatsApp Direct Chat Link',
                'description' => 'Pre-formatted wa.me URL for one-tap WhatsApp messages.',
            ],

            // Footer & Copyright
            [
                'group' => 'footer',
                'key' => 'footer_about',
                'value' => 'We are committed to sustainable farming, nurturing healthy soil, and providing pure, organic produce straight from our fields to your table.',
                'type' => 'textarea',
                'label' => 'Footer About Text',
                'description' => 'Short mission statement shown in the website footer.',
            ],
            [
                'group' => 'footer',
                'key' => 'copyright_text',
                'value' => 'Copyright © 2025 Raghuvir Atta. All Rights Reserved. Designed & Developed by Twixel Media',
                'type' => 'text',
                'label' => 'Copyright Notice',
                'description' => 'Copyright text displayed at the bottom of every page.',
            ],

            // SEO & Meta
            [
                'group' => 'seo',
                'key' => 'meta_title',
                'value' => 'Raghuvir Atta | Premium Stone-Ground Whole Wheat & Bati Flour',
                'type' => 'text',
                'label' => 'Default Meta Title',
                'description' => 'Title tag used for search engines when no page-specific title exists.',
            ],
            [
                'group' => 'seo',
                'key' => 'meta_description',
                'value' => 'Experience pure, traditional stone-ground chakki fresh atta from Raghuvir. 100% natural, unadulterated wheat flours direct from certified farms.',
                'type' => 'textarea',
                'label' => 'Default Meta Description',
                'description' => 'Summary snippet displayed by Google in search results.',
            ],
            [
                'group' => 'seo',
                'key' => 'meta_keywords',
                'value' => 'raghuvir atta, whole wheat flour, bati atta, chakki fresh flour, organic atta gujarat, premium atta dehgam',
                'type' => 'textarea',
                'label' => 'Meta Keywords',
                'description' => 'Comma-separated SEO keywords.',
            ],
            [
                'group' => 'seo',
                'key' => 'custom_header_scripts',
                'value' => '',
                'type' => 'textarea',
                'label' => 'Custom Header / Analytics Scripts',
                'description' => 'Custom Google Tag Manager, Google Analytics, or Meta Pixel code to inject in <head>.',
            ],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(
                ['key' => $s['key']],
                $s
            );
        }

        Setting::clearCache();
    }
}
