const form = document.forms[0]

async function getPosts(){
  let res = await fetch('http://localhost:81/api/posts/')
  let posts = await res.json()

  // console.log(posts);

  posts.forEach(element => {
    document.querySelector('#posts').innerHTML += `
      <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">${element.title}</h5>
        <p class="card-text">${element.body}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    `
  });
}

getPosts()

async function addPost() {
  let formData = new FormData()
  formData.append('title', form.title.value)
  formData.append('body', form.body.value)
  let res = await fetch('http://localhost:81/api/posts', {
    method: 'post',
    body: formData
  })
  const data = await res.json()
  console.log(data);
}