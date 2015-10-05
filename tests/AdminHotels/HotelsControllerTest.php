<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use HotelBooking\Hotel;

class HotelsControllerTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Test create action, GET method
     *
     * @return void
     */
    public function testCreateStatus()
    {
        $response = $this->call('GET', route('admin.hotels.create'));
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test edit action, GET method
     *
     * @return void
     */
    public function testEditStatus()
    {
        $faker = Faker\Factory::create();
        $request = [
            'name' => $faker->name,
            'city_id' => 1,
            'quality' => 1,
            'address' => $faker->address,
            'phone' => $faker->phonenumber,
            'email' => $faker->email,
            'description' => $faker->text,
        ];
        $hotel = Hotel::create($request);
        $response = $this->call('GET', route('admin.hotels.edit', $hotel->id));
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test store action, POST method
     *
     * @return void
     */
    public function testStoreStatus()
    {
        $this->WithoutMiddleware();
        $response = $this->call('POST', route('admin.hotels.store'));
        $this->assertEquals(302, $response->status());
    }

    /**
     * Test update action, PUT method
     *
     * @return void
     */
    public function testUpdateStatus()
    {
        $this->WithoutMiddleware();
        $response = $this->call('PUT', route('admin.hotels.update'));
        $this->assertEquals(302, $response->status());
    }
}
