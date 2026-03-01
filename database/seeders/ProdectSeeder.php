<?php

namespace Database\Seeders;

use App\Models\Prodect;
use Illuminate\Database\Seeder;

class ProdectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Apple iPhone 15', 'descripshin' => '6.1-inch OLED smartphone with A16 Bionic and dual camera.', 'price' => 799.00],
            ['name' => 'Apple iPhone 15 Plus', 'descripshin' => '6.7-inch OLED smartphone with long battery life and USB-C.', 'price' => 899.00],
            ['name' => 'Apple iPhone 15 Pro', 'descripshin' => 'Premium titanium iPhone with A17 Pro and ProMotion display.', 'price' => 999.00],
            ['name' => 'Apple iPhone 15 Pro Max', 'descripshin' => 'Flagship iPhone with 5x telephoto camera and titanium body.', 'price' => 1199.00],
            ['name' => 'Apple iPhone 14', 'descripshin' => 'Reliable iPhone with A15 Bionic and strong camera quality.', 'price' => 699.00],
            ['name' => 'Apple iPhone 14 Plus', 'descripshin' => 'Large-screen iPhone 14 model with all-day battery.', 'price' => 799.00],
            ['name' => 'Apple iPhone 14 Pro', 'descripshin' => 'Pro iPhone with Dynamic Island and 48MP main camera.', 'price' => 999.00],
            ['name' => 'Apple iPhone SE (3rd generation)', 'descripshin' => 'Compact iPhone with Touch ID and A15 Bionic chip.', 'price' => 429.00],
            ['name' => 'Samsung Galaxy S24', 'descripshin' => 'Android flagship with bright AMOLED display and AI features.', 'price' => 799.00],
            ['name' => 'Samsung Galaxy S24+', 'descripshin' => 'Large Galaxy S24 model with QHD+ screen and bigger battery.', 'price' => 999.00],
            ['name' => 'Samsung Galaxy S24 Ultra', 'descripshin' => 'Top-tier Galaxy with S Pen, 200MP camera and titanium frame.', 'price' => 1299.00],
            ['name' => 'Samsung Galaxy Z Flip5', 'descripshin' => 'Foldable clamshell phone with compact design and Flex Window.', 'price' => 999.00],
            ['name' => 'Samsung Galaxy Z Fold5', 'descripshin' => 'Book-style foldable phone with tablet-like inner display.', 'price' => 1799.00],
            ['name' => 'Google Pixel 8', 'descripshin' => 'Google phone with Tensor chip and strong computational photography.', 'price' => 699.00],
            ['name' => 'Google Pixel 8 Pro', 'descripshin' => 'Pro Pixel with telephoto lens and advanced AI camera tools.', 'price' => 999.00],
            ['name' => 'Google Pixel 7a', 'descripshin' => 'Mid-range Pixel delivering clean Android and excellent camera.', 'price' => 499.00],
            ['name' => 'OnePlus 12', 'descripshin' => 'High-performance Android phone with fast charging and LTPO display.', 'price' => 799.00],
            ['name' => 'OnePlus 11', 'descripshin' => 'Flagship OnePlus with smooth AMOLED screen and fast charging.', 'price' => 699.00],
            ['name' => 'Xiaomi 14', 'descripshin' => 'Compact flagship phone with Leica camera tuning and Snapdragon chip.', 'price' => 749.00],
            ['name' => 'Xiaomi Redmi Note 13 Pro', 'descripshin' => 'Popular mid-range phone with high-resolution camera and OLED panel.', 'price' => 299.00],

            ['name' => 'Apple MacBook Air 13-inch (M3)', 'descripshin' => 'Thin and light laptop with Apple M3 chip and all-day battery.', 'price' => 1099.00],
            ['name' => 'Apple MacBook Air 15-inch (M3)', 'descripshin' => 'Larger MacBook Air with M3 performance and silent fanless design.', 'price' => 1299.00],
            ['name' => 'Apple MacBook Pro 14-inch (M3 Pro)', 'descripshin' => 'Professional laptop for coding and creative workflows.', 'price' => 1999.00],
            ['name' => 'Apple MacBook Pro 16-inch (M3 Max)', 'descripshin' => 'High-end MacBook Pro built for intensive pro applications.', 'price' => 3499.00],
            ['name' => 'Dell XPS 13', 'descripshin' => 'Premium Windows ultrabook with compact design and sharp display.', 'price' => 1199.00],
            ['name' => 'Dell XPS 15', 'descripshin' => 'Powerful creator-friendly laptop with large display options.', 'price' => 1799.00],
            ['name' => 'HP Spectre x360 14', 'descripshin' => 'Convertible 2-in-1 laptop with OLED option and premium build.', 'price' => 1399.00],
            ['name' => 'HP Envy 16', 'descripshin' => 'Performance laptop suited for productivity and content work.', 'price' => 1299.00],
            ['name' => 'Lenovo ThinkPad X1 Carbon Gen 11', 'descripshin' => 'Business ultrabook known for keyboard quality and durability.', 'price' => 1699.00],
            ['name' => 'Lenovo Legion Pro 5', 'descripshin' => 'Gaming laptop with high refresh display and RTX graphics.', 'price' => 1499.00],
            ['name' => 'ASUS ROG Zephyrus G14', 'descripshin' => 'Portable gaming laptop with strong GPU performance.', 'price' => 1599.00],
            ['name' => 'ASUS Zenbook 14 OLED', 'descripshin' => 'Lightweight ultrabook featuring vibrant OLED screen.', 'price' => 999.00],
            ['name' => 'Acer Swift Go 14', 'descripshin' => 'Slim productivity laptop with modern Intel processor.', 'price' => 849.00],
            ['name' => 'Acer Predator Helios Neo 16', 'descripshin' => 'Gaming notebook with high thermal headroom and RTX GPU.', 'price' => 1399.00],
            ['name' => 'Microsoft Surface Laptop 5', 'descripshin' => 'Elegant Windows laptop with touchscreen and premium finish.', 'price' => 999.00],
            ['name' => 'Microsoft Surface Pro 9', 'descripshin' => 'Tablet-laptop hybrid for flexible work and study use.', 'price' => 1099.00],
            ['name' => 'MSI Katana 15', 'descripshin' => 'Entry gaming laptop balancing price and gaming power.', 'price' => 1199.00],
            ['name' => 'Razer Blade 14', 'descripshin' => 'Compact premium gaming laptop with CNC aluminum chassis.', 'price' => 2399.00],
            ['name' => 'LG Gram 16', 'descripshin' => 'Large-screen yet lightweight laptop for mobility.', 'price' => 1499.00],
            ['name' => 'Samsung Galaxy Book4 Pro', 'descripshin' => 'Thin AMOLED Windows laptop optimized for ecosystem use.', 'price' => 1349.00],

            ['name' => 'Apple iPad (10th generation)', 'descripshin' => 'Mainstream iPad for study, browsing and daily tasks.', 'price' => 449.00],
            ['name' => 'Apple iPad Air 11-inch (M2)', 'descripshin' => 'Powerful thin tablet with Apple Pencil support.', 'price' => 599.00],
            ['name' => 'Apple iPad Air 13-inch (M2)', 'descripshin' => 'Large iPad Air model for multitasking and creativity.', 'price' => 799.00],
            ['name' => 'Apple iPad Pro 11-inch (M4)', 'descripshin' => 'Professional OLED tablet with top-tier performance.', 'price' => 999.00],
            ['name' => 'Apple iPad Pro 13-inch (M4)', 'descripshin' => 'Largest iPad Pro with tandem OLED display and M4 chip.', 'price' => 1299.00],
            ['name' => 'Samsung Galaxy Tab S9', 'descripshin' => 'Premium Android tablet with AMOLED display and S Pen.', 'price' => 799.00],
            ['name' => 'Samsung Galaxy Tab S9+', 'descripshin' => 'Mid-size premium tablet focused on entertainment and work.', 'price' => 999.00],
            ['name' => 'Samsung Galaxy Tab S9 Ultra', 'descripshin' => 'Ultra-large Android tablet for advanced multitasking.', 'price' => 1199.00],
            ['name' => 'Lenovo Tab P12', 'descripshin' => 'Affordable large Android tablet for media and study.', 'price' => 379.00],
            ['name' => 'Xiaomi Pad 6', 'descripshin' => 'Value Android tablet with smooth display and good battery.', 'price' => 349.00],

            ['name' => 'Apple Watch Series 9', 'descripshin' => 'Advanced smartwatch for fitness tracking and notifications.', 'price' => 399.00],
            ['name' => 'Apple Watch Ultra 2', 'descripshin' => 'Rugged high-end smartwatch for outdoor and sports use.', 'price' => 799.00],
            ['name' => 'Samsung Galaxy Watch6', 'descripshin' => 'Wear OS smartwatch with health and sleep tracking features.', 'price' => 299.00],
            ['name' => 'Samsung Galaxy Watch6 Classic', 'descripshin' => 'Watch6 model with rotating bezel and classic design.', 'price' => 399.00],
            ['name' => 'Google Pixel Watch 2', 'descripshin' => 'Google smartwatch with Fitbit integration and Wear OS.', 'price' => 349.00],
            ['name' => 'Garmin Forerunner 265', 'descripshin' => 'GPS running watch for athletes with training metrics.', 'price' => 449.00],
            ['name' => 'Garmin Fenix 7', 'descripshin' => 'Premium multisport watch for endurance and navigation.', 'price' => 699.00],
            ['name' => 'Huawei Watch GT 4', 'descripshin' => 'Smartwatch with long battery life and health sensors.', 'price' => 249.00],
            ['name' => 'Amazfit GTR 4', 'descripshin' => 'Stylish fitness-focused smartwatch with strong battery.', 'price' => 199.00],
            ['name' => 'Fitbit Sense 2', 'descripshin' => 'Health-centric smartwatch with stress and sleep tools.', 'price' => 249.00],

            ['name' => 'Apple AirPods Pro (2nd generation)', 'descripshin' => 'True wireless earbuds with ANC and transparent mode.', 'price' => 249.00],
            ['name' => 'Apple AirPods (3rd generation)', 'descripshin' => 'Open-fit Apple earbuds with spatial audio support.', 'price' => 179.00],
            ['name' => 'Samsung Galaxy Buds2 Pro', 'descripshin' => 'Compact Samsung earbuds with high-quality ANC.', 'price' => 229.00],
            ['name' => 'Sony WF-1000XM5', 'descripshin' => 'Flagship Sony earbuds with excellent sound isolation.', 'price' => 299.00],
            ['name' => 'Sony WH-1000XM5', 'descripshin' => 'Top noise-canceling over-ear headphones by Sony.', 'price' => 399.00],
            ['name' => 'Bose QuietComfort Ultra Headphones', 'descripshin' => 'Premium comfort-focused ANC over-ear headphones.', 'price' => 429.00],
            ['name' => 'JBL Tune 770NC', 'descripshin' => 'Budget-friendly wireless ANC headphones for daily use.', 'price' => 129.00],
            ['name' => 'Beats Studio Pro', 'descripshin' => 'Wireless ANC headphones with Apple and Android compatibility.', 'price' => 349.00],
            ['name' => 'Anker Soundcore Liberty 4 NC', 'descripshin' => 'Value earbuds with adaptive noise cancellation.', 'price' => 99.00],
            ['name' => 'Sennheiser Momentum 4 Wireless', 'descripshin' => 'Audiophile-oriented wireless ANC headphones.', 'price' => 379.00],

            ['name' => 'Sony PlayStation 5 Slim Disc Edition', 'descripshin' => 'Current PlayStation console model with disc drive.', 'price' => 499.00],
            ['name' => 'Sony PlayStation 5 Digital Edition', 'descripshin' => 'Disc-free PlayStation 5 variant for digital games.', 'price' => 449.00],
            ['name' => 'Microsoft Xbox Series X', 'descripshin' => 'High-performance Xbox console targeting 4K gaming.', 'price' => 499.00],
            ['name' => 'Microsoft Xbox Series S', 'descripshin' => 'Compact digital Xbox console with strong value.', 'price' => 299.00],
            ['name' => 'Nintendo Switch OLED', 'descripshin' => 'Hybrid handheld-console with vibrant OLED display.', 'price' => 349.00],
            ['name' => 'Valve Steam Deck OLED', 'descripshin' => 'Portable PC gaming handheld with OLED panel.', 'price' => 549.00],
            ['name' => 'ASUS ROG Ally', 'descripshin' => 'Windows gaming handheld for PC libraries on the go.', 'price' => 699.00],
            ['name' => 'Meta Quest 3', 'descripshin' => 'Standalone mixed-reality headset for gaming and media.', 'price' => 499.00],
            ['name' => 'Sony DualSense Wireless Controller', 'descripshin' => 'PlayStation controller with haptics and adaptive triggers.', 'price' => 69.00],
            ['name' => 'Microsoft Xbox Wireless Controller', 'descripshin' => 'Official Xbox controller for console and PC.', 'price' => 59.00],

            ['name' => 'Samsung QN90C 55-inch QLED TV', 'descripshin' => '4K mini-LED TV with high brightness for HDR.', 'price' => 1299.00],
            ['name' => 'LG C3 55-inch OLED TV', 'descripshin' => 'Popular 4K OLED TV with strong gaming features.', 'price' => 1399.00],
            ['name' => 'Sony A80L 55-inch OLED TV', 'descripshin' => 'Premium OLED TV with excellent color and motion.', 'price' => 1599.00],
            ['name' => 'TCL QM8 65-inch Mini-LED TV', 'descripshin' => 'High-value bright 4K TV with mini-LED backlight.', 'price' => 1199.00],
            ['name' => 'Hisense U8K 65-inch Mini-LED TV', 'descripshin' => 'Feature-rich mini-LED TV for movies and gaming.', 'price' => 1099.00],
            ['name' => 'Samsung Odyssey G7 32-inch Monitor', 'descripshin' => 'Curved gaming monitor with high refresh rate.', 'price' => 699.00],
            ['name' => 'LG UltraGear 27GP850 Monitor', 'descripshin' => '27-inch QHD gaming monitor with 165Hz refresh.', 'price' => 399.00],
            ['name' => 'Dell UltraSharp U2723QE Monitor', 'descripshin' => 'Professional 27-inch 4K monitor with USB-C hub.', 'price' => 649.00],
            ['name' => 'ASUS ProArt PA278QV Monitor', 'descripshin' => 'Color-accurate monitor targeted at creative professionals.', 'price' => 329.00],
            ['name' => 'BenQ PD2705U Monitor', 'descripshin' => '4K design monitor with calibrated color profile.', 'price' => 549.00],

            ['name' => 'Canon EOS R50', 'descripshin' => 'Entry mirrorless camera for creators and vloggers.', 'price' => 679.00],
            ['name' => 'Canon EOS R6 Mark II', 'descripshin' => 'Full-frame mirrorless camera for photo and video.', 'price' => 2499.00],
            ['name' => 'Sony Alpha a6700', 'descripshin' => 'APS-C mirrorless camera with strong autofocus.', 'price' => 1399.00],
            ['name' => 'Sony ZV-E10', 'descripshin' => 'Vlogging-focused mirrorless camera with interchangeable lens.', 'price' => 699.00],
            ['name' => 'Nikon Z6 II', 'descripshin' => 'Full-frame hybrid mirrorless camera with dual processors.', 'price' => 1999.00],
            ['name' => 'Fujifilm X-S20', 'descripshin' => 'Compact mirrorless camera with film simulation modes.', 'price' => 1299.00],
            ['name' => 'Panasonic Lumix GH6', 'descripshin' => 'Video-focused Micro Four Thirds camera body.', 'price' => 1999.00],
            ['name' => 'DJI Osmo Pocket 3', 'descripshin' => 'Pocket gimbal camera for stabilized video capture.', 'price' => 519.00],
            ['name' => 'GoPro HERO12 Black', 'descripshin' => 'Rugged action camera for sports and travel shoots.', 'price' => 399.00],
            ['name' => 'Insta360 X3', 'descripshin' => '360-degree action camera for immersive content.', 'price' => 449.00],
        ];

        foreach ($products as $product) {
            Prodect::updateOrCreate(
                ['name' => $product['name']],
                [
                    'descripshin' => $product['descripshin'],
                    'price' => $product['price'],
                    'image' => null,
                ]
            );
        }
    }
}
