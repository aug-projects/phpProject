<?php


/*
|--------------------------------------------------------------------------
| Pages : URL links and title
|--------------------------------------------------------------------------
|
*/

$pages = [
    'info'=>[
        'title' => 'Personal Information',
        'url' => 'info',
        'dir' => 'pages/info.php',
    ],
    [
        'title' => 'Courses Information',
        'url' => 'courses',
        'dir' => 'pages/info.php',

    ],
    [
        'title' => 'Add Courses',
        'url' => 'add-courses',
        'dir' => 'pages/addCourses.php',
    ],
    [
        'title' => 'Experiences Information',
        'url' => 'experiences',
        'dir' => 'pages/experiences.php',
    ],
    [
        'title' => 'Add Experiences',
        'url' => 'add-experiences',
        'dir' => 'pages/addExperiences.php',
    ],
];


/*
|--------------------------------------------------------------------------
| Layout
|--------------------------------------------------------------------------
|
*/

$footer = "layout/header.php";
$page = "layout/page.php";

//include      "config.php";