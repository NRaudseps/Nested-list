<?php


namespace Feature;

use App\Bootstrap\Database;
use Faker\Factory;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function a_register_page_exists()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $response = $client->request('GET', '/register');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function a_registered_user_will_be_saved_in_the_database()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $info = [
            'username' => 'jon',
            'email' => 'jon@example.com',
            'password' => 'password'
        ];

        $response = $client->request('POST', '/register', [
            'form_params' => $info,
            'allow_redirects' => false
        ]);

        $db = (new Database())
            ->query('../../')
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetch();

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals($db['username'], 'jon');

        $this->deleteTestInputFromDatabase('jon');
    }

    /** @test */
    public function a_users_password_is_hashed()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $info = [
            'username' => 'jon',
            'email' => 'jon@example.com',
            'password' => 'password'
        ];

        $response = $client->request('POST', '/register', [
            'form_params' => $info,
            'allow_redirects' => false
        ]);

        $db = (new Database())
            ->query('../../')
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetch();

        $this->assertTrue(password_verify('password', $db['password']));

        $this->deleteTestInputFromDatabase('jon');
    }

    protected function deleteTestInputFromDatabase(string $username): void
    {
        $db = (new Database())
            ->query('../../')
            ->delete('users')
            ->where('username = :username')
            ->setParameter('username', $username)
            ->execute();
    }
}