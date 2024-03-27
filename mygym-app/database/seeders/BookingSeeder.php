<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Courses;
use App\Models\Services;
use Automattic\WooCommerce\Internal\Utilities\Users;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::factory()->count(100)->create();
    }
}