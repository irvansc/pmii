<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\User;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
});

// Home > Users > Edit > [User Name]
Breadcrumbs::for('edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', $user->username));
    $trail->push($user->username, route('users.edit', $user->username));
});
// Home > Posts

Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Posts', route('posts.all_posts'));
});

Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('category', route('posts.categories'));
});

// Home > Posts > [Category]
// Breadcrumbs::for('categories', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('posts');
//     $trail->push($category, route('posts.categories'));
// });

