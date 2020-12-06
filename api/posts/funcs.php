<?php

$r_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$params = explode('/', $uri);
if(in_array('posts', $params)){
  while($params[0] !== 'posts') {
    array_shift($params);
  }  
}


function dd($arr, $die){
  echo '<pre>'.print_r($arr, true).'</pre>';
  if($die) die();
}

function getPosts($posts) {
  return $posts;
}

function getPost($posts, $pid) {
  $id = intval($pid) - 1;
  if (isset($posts[$id])){
    return $posts[$id];
  }
  else {
    // $err =   
    http_response_code(404);
    return [
      'status' => false,
      'text' => 'Post not found'
    ];
  }
}

