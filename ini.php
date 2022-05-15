<?php

/*
|--------------------------------------------------------------------------
| Header : URL links and title
|--------------------------------------------------------------------------
|
*/

$headerMenus = [
    [
        'title' => 'Personal Information',
        'url' => '/pages/home.php',
    ],
    [
        'title' => 'Courses Information',
        'url' => '/pages/viewCourses.php',
    ],
    [
        'title' => 'Experiences Information',
        'url' => '/pages/viewExperience.php',
    ],
    [
        'title' => 'Add Courses',
        'url' => '/pages/addCourse.php',
    ],
    [
        'title' => 'Add Experiences',
        'url' => '/pages/AddExperience.php',
    ],
];

/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/

$pages = [
    'home'=>[
        'title' => 'Personal Information',
        'image' => '/assets/images/info.png',
    ],
    'course'=>[
        'title' => 'Courses Information',
    ],
    'courses'=>[
        'title' => 'All Courses Information',
        'image' => '/assets/images/info.png',
    ],
    'add-courses'=>[
        'title' => 'Add Courses',
        'image' => '/assets/images/add-course.png',
    ],
    'experience'=>[
        'title' => 'All Experiences Information',
    ],
    'add-experiences'=>[
        'title' => 'Add Experiences',
        'image' => '/assets/images/add-experience.png',
    ],
];


/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
|
*/

$layout = [
    'head' => __DIR__.'/layout/head.php',
    'header' =>  __DIR__.'/layout/header.php',
    'home' =>  __DIR__.'/pages/home.php',
];



/*
|--------------------------------------------------------------------------
| Data and Sql
|--------------------------------------------------------------------------
|
*/


$categories = [
    'job',
    'training',
];


include "config.php";
// user
$properties = $connection->prepare("select * from properties");
$user = $connection->prepare("select * from users limit 1");
// experiences
$experiences = $connection->prepare("select * from experiences");
$addExperience = $connection->prepare("insert into experiences(category, title, start_month, end_month, institution, description) values ( ? ,? ,?,?,?,?)");
// courses
$courses = $connection->prepare("select * from courses");
$course = $connection->prepare("select * from courses where id=?");
$addCourse = $connection->prepare("insert into courses(title, total_hours, date_start, date_end, institution, attachment_type, attachment, note) values (?, ? ,? ,?,?,?,?,?)");
