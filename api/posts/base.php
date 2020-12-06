<?php
/*
$myPosts = [
  [
    'id' => 1,
    'title' => 'Post 1',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, sequi.'
  ],
  [
    'id' => 2,
    'title' => 'Post 2',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, sequi.'
  ],
  [
    'id' => 3,
    'title' => 'Post 3',
    'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, sequi.'
  ]
];

*/

$myPosts = json_decode(file_get_contents('posts.json'));
