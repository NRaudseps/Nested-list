<?php


namespace Feature;

use App\Bootstrap\Database;
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
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $client->request('POST', '/register', [
            'form_params' => $info,
            'allow_redirects' => false
        ]);

        $db = (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetch();

        $this->deleteTestInputFromDatabase('jon');

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals($db['username'], 'jon');
    }

    /** @test */
    public function a_users_password_is_hashed()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $info = [
            'username' => 'jon',
            'email' => 'jon@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $client->request('POST', '/register', [
            'form_params' => $info,
            'allow_redirects' => false
        ]);

        $db = (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetch();

        $this->deleteTestInputFromDatabase('jon');

        $this->assertTrue(password_verify('password', $db['password']));
    }

    /** @test */
    public function the_password_has_to_be_confirmed()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $info = [
            'username' => 'jon',
            'email' => 'jon@example.com',
            'password' => 'password',
            'password_confirmation' => 'incorrect'
        ];

        $response = $client->request('POST', '/register', [
            'form_params' => $info,
            'allow_redirects' => false
        ]);

        $db = (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetch();

        $this->deleteTestInputFromDatabase('jon');

        $this->assertFalse($db);
    }

    /** @test */
    public function a_user_cannot_register_twice()
    {
        $client = new Client(['base_uri' => 'http://localhost:8000']);

        $info = [
            'username' => 'jon',
            'email' => 'jon@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        for($i = 0; $i < 2; $i++){
            $response = $client->request('POST', '/register', [
                'form_params' => $info,
                'allow_redirects' => false
            ]);
        }

        $db = (new Database())
            ->query()
            ->select('*')
            ->from('users')
            ->where('username = :username')
            ->setParameter('username', 'jon')
            ->execute()
            ->fetchAll();

        $this->deleteTestInputFromDatabase('jon');

        $this->assertEquals(1, (int) count($db));
    }

    protected function deleteTestInputFromDatabase(string $username): void
    {
        (new Database())
            ->query()
            ->delete('users')
            ->where('username = :username')
            ->setParameter('username', $username)
            ->execute();
    }
}