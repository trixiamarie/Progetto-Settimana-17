<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('role_id', '!=', 1)->inRandomOrder()->pluck('id')->first();
        $courseId = Courses::inRandomOrder()->pluck('id')->first();
    
        do {
            $existingBooking = Booking::where('user_id', $userId)
                                      ->where('course_id', $courseId)
                                      ->where('stato', 'negato')
                                      ->exists();
        } while ($existingBooking);
    
        return [
            'user_id' => $userId,
            'course_id' => $courseId,
            'stato' => $this->faker->randomElement(['pending', 'accettato', 'negato']),
        ];
    }
    

}
