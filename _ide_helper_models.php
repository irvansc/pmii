<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $tujuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|About newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About query()
 * @method static \Illuminate\Database\Eloquent\Builder|About whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereTujuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereUpdatedAt($value)
 */
	class About extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $album_name
 * @property string|null $slug
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Foto> $Foto
 * @property-read int|null $foto_count
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereAlbumName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 */
	class Album extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $category_name
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SubCategory> $subcategories
 * @property-read int|null $subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $telp
 * @property string|null $url
 * @property string $pesan
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUrl($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $mail_mailer
 * @property string $mail_host
 * @property string $mail_port
 * @property string $mail_username
 * @property string $mail_password
 * @property string $mail_encryption
 * @property string $mail_from_address
 * @property string $mail_from_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailMailer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereMailUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailConfiguration whereUpdatedAt($value)
 */
	class EmailConfiguration extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $file_name
 * @property string|null $file_size
 * @property string|null $file_ext
 * @property string|null $file_type
 * @property string|null $file_ket
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Folder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Folder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Folder query()
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereFileExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereFileKet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Folder whereUpdatedAt($value)
 */
	class Folder extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $album_id
 * @property string|null $title
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Album|null $Album
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto search($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereUpdatedAt($value)
 */
	class Foto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HeaderSection whereUpdatedAt($value)
 */
	class HeaderSection extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name_jabatan
 * @property string $name_periode
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserOrganization> $userOrganization
 * @property-read int|null $user_organization_count
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereNameJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereNamePeriode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereUpdatedAt($value)
 */
	class Jabatan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $logo_utama
 * @property string|null $logo_email
 * @property string|null $logo_favicon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Logo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereLogoEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereLogoFavicon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereLogoUtama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logo whereUpdatedAt($value)
 */
	class Logo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $icon
 * @property string|null $color
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Misi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Misi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Misi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misi whereUpdatedAt($value)
 */
	class Misi extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $category_id
 * @property string|null $post_title
 * @property string|null $slug
 * @property string|null $post_content
 * @property string|null $post_tags
 * @property string|null $featured_image
 * @property string|null $meta_desc
 * @property string|null $meta_keywords
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\SubCategory|null $subcategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 */
	class Post extends \Eloquent implements \CyrildeWit\EloquentViewable\Contracts\Viewable, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $created_att
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role withoutPermission($permissions)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $web_name
 * @property string|null $web_url
 * @property string|null $web_tagline
 * @property string|null $web_email
 * @property string|null $web_email_noreply
 * @property string|null $web_telp
 * @property string|null $web_maps
 * @property string|null $web_desc
 * @property string|null $web_alamat
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebEmailNoreply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebMaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebTagline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereWebUrl($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $youtube
 * @property string|null $twitter
 * @property string|null $web
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereWeb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialMedia whereYoutube($value)
 */
	class SocialMedia extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $subcategory_name
 * @property string|null $slug
 * @property int|null $parent_category
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $parentcategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereParentCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereSubcategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 */
	class SubCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $blocked
 * @property int $isActive
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\UserProfile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property int|null $jabatan_id
 * @property string|null $email
 * @property string|null $telp
 * @property string|null $jenkel
 * @property string|null $alamat
 * @property string|null $fb
 * @property string|null $ig
 * @property string|null $linkedin
 * @property string|null $twitter
 * @property string|null $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Jabatan|null $jabatan
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereFb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereIg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereJabatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereJenkel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereTelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserOrganization whereUsername($value)
 */
	class UserOrganization extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $no_hp
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $alamat
 * @property string|null $picture
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 */
	class UserProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Visi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visi whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visi whereUpdatedAt($value)
 */
	class Visi extends \Eloquent {}
}

