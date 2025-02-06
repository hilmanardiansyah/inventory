<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase; // Menggunakan refresh database untuk memastikan database bersih setiap tes

    /**
     * Test login dengan data valid.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Jalankan seeder secara manual
        $this->artisan('db:seed', ['--class' => 'RoleSeeder']);
    }
    public function test_login_with_valid_credentials()
    {
        // Membuat user dengan password yang sudah di-hash
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
            'email_verified_at' => now(), // Menandai email sudah diverifikasi
        ]);

        // Menetapkan role ke user yang baru dibuat
        $user->assignRole('admin'); // Misalnya role admin

        // Melakukan login dengan POST request ke route '/login' dengan email dan password yang valid
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123', // Pastikan password sesuai dengan yang di-hash
        ]);

        // Memastikan user diarahkan setelah login ke halaman yang sesuai
        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);
    }



    /**
     * Test login dengan kredensial yang invalid.
     *
     * @return void
     */
    public function test_login_with_invalid_credentials()
    {

        $response = $this->post('/login', [
            'email' => 'wrong@example.com', // Email yang tidak ada
            'password' => 'wrongpassword',  // Password yang salah
        ]);

        // Memastikan bahwa login gagal dengan error yang muncul di session
        $response->assertSessionHasErrors(); // Memastikan ada error di session
        $this->assertGuest(); // Memastikan tidak ada user yang terautentikasi
    }

    /**
     * Test login sebagai admin.
     *
     * @return void
     */
    public function test_login_as_admin()
    {
        // Membuat user dan menetapkan role admin
        $adminUser = User::factory()->create([
            'password' => Hash::make('password123')
        ]);
        $adminUser->assignRole('admin');

        // Melakukan login dengan email dan password user admin
        $response = $this->post('/login', [
            'email' => $adminUser->email,
            'password' => 'password123',
        ]);

        // Memastikan admin diarahkan ke halaman dashboard admin
        $response->assertRedirect('/admin/dashboard'); // Sesuaikan dengan route dashboard admin yang digunakan
        $this->assertAuthenticatedAs($adminUser); // Memastikan admin yang login adalah admin yang benar
    }

    /**
     * Test login sebagai staff.
     *
     * @return void
     */
    public function test_login_as_staff()
    {
        // Membuat user dan menetapkan role staff
        $staffUser = User::factory()->create([
            'password' => Hash::make('password123')
        ]);
        $staffUser->assignRole('staff');

        // Melakukan login dengan email dan password user staff
        $response = $this->post('/login', [
            'email' => $staffUser->email,
            'password' => 'password123',
        ]);

        // Memastikan staff diarahkan ke halaman dashboard staff
        $response->assertRedirect('/staff/dashboard'); // Sesuaikan dengan route dashboard staff yang digunakan
        $this->assertAuthenticatedAs($staffUser); // Memastikan staff yang login adalah staff yang benar
    }

    /**
     * Test login sebagai customer.
     *
     * @return void
     */
    public function test_login_as_customer()
    {
        // Membuat user dan menetapkan role customer
        $customerUser = User::factory()->create([
            'password' => Hash::make('password123')
        ]);
        $customerUser->assignRole('customer');

        // Melakukan login dengan email dan password user customer
        $response = $this->post('/login', [
            'email' => $customerUser->email,
            'password' => 'password123',
        ]);

        // Memastikan customer diarahkan ke halaman customer
        $response->assertRedirect('/customer/dashboard'); // Sesuaikan dengan route dashboard customer yang digunakan
        $this->assertAuthenticatedAs($customerUser); // Memastikan customer yang login adalah customer yang benar
    }

    /**
     * Test login dengan email yang belum terverifikasi.
     *
     * @return void
     */
    public function test_login_with_unverified_email()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
            'email_verified_at' => null,
        ]);

        $user->assignRole('admin'); // Tambahkan ini

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($user);

    }

}
