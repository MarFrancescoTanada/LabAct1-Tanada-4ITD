<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<h1>Create New Post</h1>

  <form method="POST" action="{{ route('newCategory') }}">
    @csrf

    <div class="form-group">
      <label for="category">Category Name</label>
      <input type="text" class="form-control" id="category" name="category">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</x-app-layout>
