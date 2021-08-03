<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use WithFaker;
//todo: Тестирование сброса пароля https://medium.com/@brice_hartmann/testing-laravel-password-resets-858c58c16b79
    public const ROUTE_PASSWORD_EMAIL = 'password.email';
    public const ROUTE_PASSWORD_REQUEST = 'password.request';
    public const ROUTE_PASSWORD_RESET = 'password.reset';
    public const ROUTE_PASSWORD_RESET_SUBMIT = 'password.reset.submit';

    public const USER_ORIGINAL_PASSWORD = 'secret';

    /**
     * Тестирование, показывающее страницу запроса сброса пароля.
     */
    public function testShowPasswordResetRequestPage(): void
    {
        $this
            ->get(route(self::ROUTE_PASSWORD_REQUEST))
            ->assertSuccessful()
            ->assertSee('Reset Password')
            ->assertSee('E-Mail Address')
            ->assertSee('Send Password Reset Link');
    }
    /**
     * Тестирование отправки запроса на сброс пароля с novalidate email address.
     */
    public function testSubmitPasswordResetRequestInvalidEmail(): void
    {
        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), [
                'email' => $this->faker->word,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.email', [
                'attribute' => 'E-mail',
            ]));
    }
    /**
     * Testing submitting a password reset request.
     */
    public function testSubmitPasswordResetRequest(): void
    {
        $user = User::factory()->create();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), [
                'email' => $user->email,
            ])
            ->assertSuccessful()
            ->assertSee(__('passwords.sent'));

        Notification::assertSentTo($user, ResetPassword::class);
    }
    /**
     * Testing showing the reset password page.
     */
    public function testShowPasswordResetPage(): void
    {
        $user = User::factory()->create();

        $token = Password::broker()->createToken($user);

        $this
            ->get(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->assertSuccessful()
            ->assertSee('Reset Password')
            ->assertSee('E-Mail Address')
            ->assertSee('Password')
            ->assertSee('Confirm Password')
        ;
    }
    /**
     * Testing submitting the password reset page with an email
     * address not in the database.
     */
    public function testSubmitPasswordResetEmailNotFound(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker->password(8);

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $this->faker->unique()->safeEmail,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful()
            ->assertSee((__('passwords.user')));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }
    /**
     * Testing submitting the password reset page with a password
     * that doesn't match the password confirmation.
     */
    public function testSubmitPasswordResetPasswordMismatch(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker()->password(8);
        $password_confirmation = $this->faker()->password(8);

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password_confirmation,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.confirmed', [
                'attribute' => 'password',
            ]));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }
    /**
     * Testing submitting the password reset page with a password
     * that is not long enough.
     */
    public function testSubmitPasswordResetPasswordTooShort(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker()->word(5);

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.min.string', [
                'attribute' => 'password',
                'min' => 8,
            ]));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }
    /**
     * Testing submitting the password reset page.
     */
    public function testSubmitPasswordReset()
    {
        $user = User::factory()->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker()->createToken($user);

        $password = $this->faker()->password;

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful()
            ->assertSee(__('passwords.reset'));

        $user->refresh();

        $this->assertFalse(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));

        $this->assertTrue(Hash::check($password, $user->password));
    }

}
