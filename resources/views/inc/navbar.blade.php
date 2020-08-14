<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/">{{ config('app.name', 'CrudApp') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">خانه <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">درباره ما</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/services" tabindex="-1" aria-disabled="true">خدمات ما</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts" tabindex="-1" aria-disabled="true">وبلاگ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="nav navbar-nav justify-content-center">
      <li class="nav-item"><a href="/posts/create" class="nav-link">ایجاد پست</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="form-group">
        <input class="form-control ml-sm-2" type="text" placeholder="جست و جوی موضوع مورد نظر ..." aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">جست و جو</button>
      </div>
    </form>
  </div>
</nav>