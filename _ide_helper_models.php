<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $position
 * @property string $avatar
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @property int $id
 * @property string|null $phone_number
 * @property string|null $address
 * @property string|null $about
 * @property string|null $facebook
 * @property string|null $twitter
 * @property int|null $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\Friendship
 *
 * @property int $user_one
 * @property int $user_two
 * @property int $status
 * @property int $action_user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereActionUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereUserOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Friendship whereUserTwo($value)
 */
	class Friendship extends \Eloquent {}
}

