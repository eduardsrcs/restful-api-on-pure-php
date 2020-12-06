# RESTful API на чистом PHP

[video](https://www.youtube.com/watch?v=COb-KpOfCSw)

## About HTTP methods

- GET: retrieve data
- POST: send data, create record
- PUT, PATCH: update data
- DELETE: delete record(s)

### GET

api.blog.ru/posts - returns allposts as array

api.blog.ru/posts/2 - returns one post as object

#### Response

api.blog.ru/posts/777

```json
{
  "status": false,
  "message": "Post not found"
}
```

404 Not found



### POST

**adding record**

api.blog.ru/posts +FormData:

title => 'Post title'
body => 'Post body'

#### Response

api.blog.ru/posts

```json
{
  "status": true,
  "post_id": 3
}
```

#### Status

201 Created

### PUT, PATCH

api.blog.ru/posts/1

title => 'Post title'
body => 'Post body'

**updates record**

### DELETE

api.blog.ru/posts/1

**deletes record**

## Use that tools

Postman

[Fake JSON service](https://jsonplaceholder.typicode.com)

Time 45:34 / 1:01:14