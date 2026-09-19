<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'The True Benefits of Choosing 100% Sharbati Whole Wheat Atta for Your Family',
                'slug' => 'benefits-of-choosing-100-percent-sharbati-whole-wheat-atta',
                'excerpt' => 'Explore why unadulterated Sharbati whole wheat grain delivers richer natural sweetness, premium dietary fibre, and fluffier rotis for your loved ones.',
                'content' => '<p>Choosing 100% pure whole wheat flour is one of the most impactful dietary decisions you can make for your family. Unlike refined flour (maida) or commercial flours stripped of wheat germ and bran, authentic Sharbati wheat flour preserves every micronutrient that nature packaged into the golden grain.</p>
<h3>1. Natural Sharbati Sweetness & Higher Water Absorption</h3>
<p>Cultivated in the sun-drenched, nutrient-rich soils of Central India and selected Gujarat agrarian belts, Sharbati wheat grains are renowned as the "Golden Grains of India." The natural glucose and sucrose levels in genuine Sharbati wheat give freshly puffed phulkas and rotis a delicate natural aroma and sweet taste without any artificial additives.</p>
<p>Moreover, Sharbati flour possesses exceptional water absorption capacity. This means dough kneaded with pure Raghuvir Atta retains high moisture content for hours, ensuring your rotis remain delightfully soft, tender, and fresh from morning tiffins to late-night dinners.</p>
<blockquote>
<p>"When whole wheat is milled cold on traditional stone chakki stones, its natural oil extracts, vitamin E reserves, and soluble dietary fibres stay completely intact."</p>
</blockquote>
<h3>2. Rich in Insoluble Dietary Fibre & Balanced Digestion</h3>
<p>A single serving of pure whole wheat atta provides a substantial portion of your daily recommended dietary fibre. This aids smooth digestive motility, supports gut microbiome biodiversity, and promotes long-lasting satiety, helping regulate blood sugar spikes after meals.</p>
<h3>3. Unadulterated, Chemical-Free Milling</h3>
<p>At Raghuvir Atta, our state-of-the-art facility in Kadadara, Dehgam employs slow stone-grinding principles combined with strict multi-stage pneumatic cleaning. Every grain is destoned, magnetic-separated, and air-washed before gentle milling—free of artificial whiteners, benzoyl peroxide, or preservatives.</p>',
                'image' => 'images/post-1.jpg',
                'category' => 'Health & Nutrition',
                'tags' => 'Sharbati Wheat, Whole Wheat, Healthy Diet, Soft Rotis, Nutrition',
                'author_name' => 'Raghuvir Agronomist Team',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(12),
                'views_count' => 1420,
                'meta_title' => 'Benefits of 100% Sharbati Whole Wheat Atta | Raghuvir Atta',
                'meta_description' => 'Discover the health benefits of authentic stone-ground Sharbati whole wheat atta. Rich in dietary fibre, natural vitamins, and unbeatable roti softness.',
                'meta_keywords' => 'sharbati atta, whole wheat flour benefits, healthy rotis, stone ground atta',
            ],
            [
                'title' => 'Traditional Stone-Ground Chakki Milling vs Modern High-Heat Commercial Rollers',
                'slug' => 'stone-ground-chakki-milling-vs-high-heat-commercial-rollers',
                'excerpt' => 'Discover how low-temperature stone milling prevents starch damage and preserves vital wheat germ enzymes compared to high-speed commercial roller mills.',
                'content' => '<p>The way wheat is milled into flour has just as profound an effect on your health as the quality of the wheat grain itself. Over the last century, industrial food manufacturing pivoted toward high-speed metallic roller mills to maximize production speed. However, this process sacrifices the most nourishing parts of the wheat grain.</p>
<h3>What Happens During High-Speed Roller Milling?</h3>
<p>Commercial roller mills operate at intense speeds that generate friction temperatures exceeding 75°C (167°F). This excessive thermal stress breaks down heat-sensitive B-complex vitamins, denatures delicate wheat germ proteins, and damages delicate starch granules. To achieve long shelf-life, roller mills systematically discard the nutrient-dense wheat germ (embryo) and fibrous bran.</p>
<h3>The Stone-Ground (Chakki) Advantage</h3>
<p>In contrast, traditional slow-speed chakki stone milling shears the whole grain between dense, natural emery stones at low rotation speeds. The heat generated remains low, guaranteeing that:</p>
<ul>
    <li><strong>The Wheat Germ Stays Intact:</strong> Natural vitamin E, essential fatty acids, and zinc remain evenly integrated throughout the flour.</li>
    <li><strong>Natural Bran Preservation:</strong> Micro-fine bran particles are distributed evenly, ensuring natural roughness without feeling coarse on your palate.</li>
    <li><strong>Authentic Golden Hue:</strong> No artificial bleaches or bromates are ever needed because the natural carotenoids of the wheat remain unoxidized.</li>
</ul>
<blockquote>
<p>Modern consumers are rediscovering what our ancestors always knew: slow stone-milled flour digests easier, smells heavenly on the tawa, and sustains holistic vitality.</p>
</blockquote>
<p>At Raghuvir Atta, our milling operations combine time-honoured stone chakki wisdom with modern hygienic stainless-steel conveyance, giving you the best of both worlds.</p>',
                'image' => 'images/post-2.jpg',
                'category' => 'Chakki Milling',
                'tags' => 'Chakki Milling, Stone Ground, Roller Mills, Wheat Germ, Healthy Living',
                'author_name' => 'Raghuvir Technical Team',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(8),
                'views_count' => 985,
                'meta_title' => 'Stone Ground Chakki vs Roller Mills | Raghuvir Atta',
                'meta_description' => 'Understand why stone ground chakki fresh atta retains wheat germ and natural vitamins better than commercial high-speed roller mills.',
                'meta_keywords' => 'stone ground atta, chakki fresh flour, roller mill vs chakki, pure wheat flour',
            ],
            [
                'title' => 'How Sustainable Wheat Farming in Kadadara Supports Soil Health & Nutrient Richness',
                'slug' => 'sustainable-wheat-farming-in-kadadara-supports-soil-health',
                'excerpt' => 'Learn about our conscious sourcing partnerships, organic soil enrichment, and responsible water management across fertile Gujarat farming tracts.',
                'content' => '<p>Great flour does not start at the mill—it begins deep inside the living earth. In the agricultural regions surrounding Dehgam and Kadadara in Gujarat, our partner farming communities employ regenerative practices that respect soil microbiology and groundwater tables.</p>
<h3>Nurturing Soil with Living Nutrients</h3>
<p>Healthy wheat plants require well-structured, humified soil rich in nitrogen, phosphorus, potash, and micronutrients such as iron and boron. By utilizing natural crop rotation (alternating wheat harvests with green manure and nitrogen-fixing legumes), the soil avoids the exhaustion caused by chemical monoculture.</p>
<h3>Precision Harvesting & Moisture Calibration</h3>
<p>Harvesting wheat at the exact right moment is essential to flour quality. Grains harvested too damp can develop fungal mycotoxins, while over-dried grains become brittle during milling. Our agronomy team monitors field humidity rigorously so every grain is harvested at prime 11-12% natural moisture content.</p>
<ul>
    <li>Clean well-water drip irrigation to conserve regional ground aquifers</li>
    <li>Non-toxic biological pest controls and neem-based soil enrichers</li>
    <li>Zero post-harvest chemical fumigation inside state-certified silos</li>
</ul>
<p>When you bring home a bag of Raghuvir Atta, you are supporting hundreds of diligent farming families committed to honest, sustainable agricultural stewardship.</p>',
                'image' => 'images/post-3.jpg',
                'category' => 'Wheat & Farming',
                'tags' => 'Sustainable Farming, Kadadara, Gujarat Agriculture, Soil Health, Farm Fresh',
                'author_name' => 'Raghuvir Agronomist Team',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(5),
                'views_count' => 760,
                'meta_title' => 'Sustainable Wheat Farming & Soil Health | Raghuvir Atta',
                'meta_description' => 'Explore how Raghuvir Atta partners with local farmers in Kadadara, Gujarat to implement sustainable wheat agriculture and healthy soils.',
                'meta_keywords' => 'wheat farming gujarat, dehgam wheat, sustainable agriculture, soil nutrition',
            ],
            [
                'title' => 'Golden Wheat to Softest Rotis: The Science of Fibre, Protein, and Natural Moisture',
                'slug' => 'golden-wheat-to-softest-rotis-science-of-fibre-and-protein',
                'excerpt' => 'Master the secrets of kneading, resting dough, and tawa heat control to produce pillowy soft phulkas that stay tender all day long.',
                'content' => '<p>Making the perfect, balloon-puffed, meltingly soft roti is both an art and a fascinating scientific process. Every step—from flour-to-water ratio to the temperature of your cast-iron tawa—plays a pivotal role.</p>
<h3>Step 1: The Chemistry of Water & Protein Hydration</h3>
<p>Wheat contains two natural storage proteins: gliadin (which provides elasticity) and glutenin (which provides strength). When you add lukewarm water to Raghuvir Atta, these proteins hydrate and cross-link to form an elastic network. Because stone-ground Sharbati flour possesses high natural water absorption, use approximately <strong>60% to 65% water by weight</strong> of flour.</p>
<h3>Step 2: The Importance of Dough Resting (Autolyse)</h3>
<p>Never rush straight from kneading to rolling. Allowing your dough to rest under a damp cloth for <strong>15 to 20 minutes</strong> allows wheat enzymes (amylases) to gently break down starches into sweet maltose, while giving the gluten network time to relax. This makes rolling effortless and prevents dough from shrinking back.</p>
<h3>Step 3: High Tawa Heat & Instant Steam Expansion</h3>
<p>To achieve that signature balloon puff:</p>
<ol>
    <li>Roll with uniform thickness—avoid pressing too hard on the edges.</li>
    <li>Place the rolled roti on a properly heated tawa. Wait until tiny micro-bubbles appear on the top surface (about 20-25 seconds).</li>
    <li>Flip and cook the second side until faint golden spots emerge.</li>
    <li>Flip directly onto an open flame or press gently with a clean cloth. The trapped steam vaporizes instantly, forcing the layers apart into a heavenly puffed cloud!</li>
</ol>
<p>Brush with pure desi ghee while warm, and store in a ventilated casserole lined with cotton muslin for perfection that lasts all day.</p>',
                'image' => 'images/post-1.jpg',
                'category' => 'Recipes & Tips',
                'tags' => 'Roti Making Tips, Soft Phulkas, Wheat Science, Cooking Guide, Kitchen Secrets',
                'author_name' => 'Culinary Kitchen Team',
                'is_published' => true,
                'published_at' => Carbon::now()->subDays(2),
                'views_count' => 1890,
                'meta_title' => 'Secrets to Softest Rotis and Phulkas | Raghuvir Atta',
                'meta_description' => 'Learn the science behind kneading, resting, and baking rotis that puff up like balloons and stay remarkably soft for hours.',
                'meta_keywords' => 'soft roti recipe, how to make soft phulka, sharbati wheat rotis, dough kneading tips',
            ],
            [
                'title' => 'Hearty Whole Wheat Flour Recipes: From Traditional Bati to Nutritious Breads',
                'slug' => 'hearty-whole-wheat-flour-recipes-traditional-bati-to-breads',
                'excerpt' => 'Expand your culinary repertoire beyond standard rotis with crispy Rajasthani Dal Baati, flaky lachha parathas, and rustic wholesome bread loaves.',
                'content' => '<p>While the humble roti remains an indispensable daily staple in millions of Indian households, high-grade whole wheat atta is remarkably versatile across baking and festive traditional cooking.</p>
<h3>1. Authentic Rajasthani Bati (Hard Wheat Dumplings)</h3>
<p>Traditional bati requires a slightly coarser granulation that holds up to baking over charcoal or in tandoor ovens. Kneaded with a touch of semolina, ajwain seeds, and generous desi ghee, these golden baked spheres soak in warm clarified butter and pair exquisitely with spiced panchmel dal.</p>
<h3>2. Crispy Multi-Layered Lachha Paratha</h3>
<p>Using the fan-pleating or spiral technique, roll out whole wheat dough laminated with light ghee and toasted cumin powder. When cooked on medium heat, the distinct layers separate into crisp, flaky ribbons that rival any fine restaurant offering.</p>
<h3>3. Artisanal 100% Whole Wheat Sandwich Loaf</h3>
<p>Ditch commercial store-bought sliced bread laced with palm oil and chemical emulsifiers. With simple active dry yeast, warm water, honey, and Raghuvir Atta, you can bake a nutty, golden-brown rustic sandwich loaf with clean crumb structure and superior wholesome aroma.</p>
<p>Stay tuned to our blog for detailed step-by-step culinary videos and printable recipe cards!</p>',
                'image' => 'images/post-2.jpg',
                'category' => 'Recipes & Tips',
                'tags' => 'Dal Bati, Lachha Paratha, Whole Wheat Bread, Healthy Recipes, Traditional Food',
                'author_name' => 'Culinary Kitchen Team',
                'is_published' => true,
                'published_at' => Carbon::now()->subDay(),
                'views_count' => 640,
                'meta_title' => 'Whole Wheat Flour Recipes: Bati, Paratha & Breads | Raghuvir Atta',
                'meta_description' => 'Explore creative culinary recipes using Raghuvir whole wheat atta, from crispy traditional bati to artisanal home-baked sandwich bread.',
                'meta_keywords' => 'wheat flour recipes, dal baati recipe, lachha paratha, healthy homemade bread',
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
