<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\KaryaSantri;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicFormSubmitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test public can submit a contact message.
     */
    public function test_public_can_submit_contact_message(): void
    {
        $payload = [
            'nama' => 'Budi Sudarsono',
            'email' => 'budi@example.com',
            'pesan' => 'Assalamualaikum, apakah masih ada kuota santri?',
            'website' => '', // Honeypot field must be empty
        ];

        $response = $this->post(route('kontak.kirim'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        
        $this->assertDatabaseHas('contact_messages', [
            'nama' => 'Budi Sudarsono',
            'email' => 'budi@example.com',
            'pesan' => 'Assalamualaikum, apakah masih ada kuota santri?',
        ]);
    }

    /**
     * Test honeypot protection blocks spam on contact message.
     */
    public function test_honeypot_blocks_spam_submission(): void
    {
        $payload = [
            'nama' => 'Bot Spammer',
            'email' => 'spam@bot.com',
            'pesan' => 'Buy cheap bitcoins!',
            'website' => 'http://spam-link.com', // Filled honeypot should fail
        ];

        $response = $this->post(route('kontak.kirim'), $payload);

        $response->assertStatus(422);
        
        $this->assertDatabaseEmpty('contact_messages');
    }

    /**
     * Test registration submission and status checking.
     */
    public function test_registration_and_status_check(): void
    {
        $payload = [
            'nama_santri' => 'Ahmad Fauzi',
            'jenjang' => 'mts',
            'ttl' => 'Jombang, 12 Agustus 2013',
            'nama_ortu' => 'Slamet',
            'hp' => '08998887776',
            'alamat' => 'Tambakberas, Jombang',
            'website' => '',
        ];

        $response = $this->post(route('pendaftaran.kirim'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('registrations', [
            'nama_santri' => 'Ahmad Fauzi',
            'jenjang' => 'mts',
            'hp' => '08998887776',
            'status' => 'pending', // Default status
        ]);

        // Cek status pendaftaran menggunakan HP
        $statusResponse = $this->get(route('pendaftaran.status', ['hp' => '08998887776']));
        $statusResponse->assertStatus(200);
        $statusResponse->assertSee('Ahmad Fauzi');
        $statusResponse->assertSee('Menunggu Peninjauan');

        // Cek status dengan nomor format lain (e.g. akhiran 9 angka yang sama)
        $statusResponse2 = $this->get(route('pendaftaran.status', ['hp' => '+628998887776']));
        $statusResponse2->assertStatus(200);
        $statusResponse2->assertSee('Ahmad Fauzi');
    }

    /**
     * Test santri can submit works (Karya Santri) which stays unapproved by default.
     */
    public function test_santri_can_submit_karya_unapproved_by_default(): void
    {
        $payload = [
            'title' => 'Indahnya Al-Qur\'an',
            'author' => 'Zainuddin',
            'class' => 'X MA',
            'category' => 'Puisi',
            'content' => 'Lantunan indah ayat suci menggetarkan hati...',
            'website' => '',
        ];

        $response = $this->post(route('karya.kirim'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('karya_santri', [
            'title' => 'Indahnya Al-Qur\'an',
            'author' => 'Zainuddin',
            'is_approved' => false, // Default should be false
        ]);

        // Pastikan tidak muncul di halaman depan karya santri publik karena belum disetujui
        $indexResponse = $this->get(route('karya'));
        $indexResponse->assertStatus(200);
        $indexResponse->assertDontSee('Indahnya Al-Qur\'an');
    }
}
