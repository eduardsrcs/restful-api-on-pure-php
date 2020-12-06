<?php
include './base.php';
include './funcs.php';

$res = [];

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

if($r_method === 'GET'){
  if(!empty($params[1] && $params[1] != 0)){
    $res =  getPost($myPosts, $params[1]);
  } else {
    $res = getPosts($myPosts);
  }
}
else if ($r_method === 'POST'){
  $title = $_POST['title'];
  $body = $_POST['body'];
  if(!empty($title) && !empty($body)) {
    $id = count($myPosts) + 1;
    array_push($myPosts, compact('id', "title", 'body' ));
    $res['status'] = true;
    $res['text'] = 'Post rceated';
    $res['id'] = $id;
    http_response_code(201);
    // $res['posts'] = $myPosts;
  } else {
    $res['status'] = false;
    $res['text'] = 'Data missing';

  }
}
else if ($r_method === 'PATCH') {
    if(!empty($params[1])){
      $data = json_decode(file_get_contents('php://input'));
      $num = intval($params[1]);
      if($num <= count($myPosts) && $num != 0){
        $myPosts[$num - 1]->title = $data->title;
        $myPosts[$num - 1]->body = $data->body;
      }
      else {
        $res['status'] = false;
        $res['text'] = 'invalid index';
      }
      
      // $res['patch'] = $data;
      // $res['id'] = $params[1];
    }
}

// DELETE
else if ($r_method === 'DELETE') {
  if(!empty($params[1])){
    $data = json_decode(file_get_contents('php://input'));
    $num = intval($params[1]);
    if($num <= count($myPosts) && $num != 0){
      unset($myPosts[$num - 1]);
      $myPosts = array_values($myPosts);
      $res['status'] = true;
      $res['text'] = "Post $num deleted";
    }
    else {
      $res['status'] = false;
      $res['text'] = 'invalid index';
    }
    
    // $res['patch'] = $data;
    // $res['id'] = $params[1];
  }
}


// echo json_encode($myPosts);
file_put_contents('posts.json', json_encode($myPosts));
echo json_encode($res);