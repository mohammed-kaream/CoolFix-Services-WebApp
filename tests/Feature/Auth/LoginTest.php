<?php

use App\Models\User;

test('user can login with mobile number', function () {
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'mobile' => '+966500000000',
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => '966500000000',
        'password' => 'password123',
    ]);

    $response->assertSessionHasNoErrors();
    $this->assertAuthenticatedAs($user);
});
