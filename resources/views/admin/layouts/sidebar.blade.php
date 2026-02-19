<div class="col-md-2 col-lg-2 bg-secondary vh-100">
    <ul class="list-group list-group-flush">
        <li class="list-group-item bg-secondary text-white">
            <span class="text-white">Name: {{Auth::user()->name}}</span>
        </li>
        <li class="list-group-item bg-secondary text-white">
            <span class="text-white">E-mail: {{Auth::user()->email}}</span>
        </li>
        <li class="list-group-item bg-dark">
        </li>
    </ul>
    <ul class="list-group list-group-flush">
        <a href="{{route('admin.categories.index')}}" class="text-decoration-none"><li class="list-group-item bg-secondary text-white">Categories</li></a>
        <a href="{{route('admin.keywords.index')}}" class="text-decoration-none"><li class="list-group-item bg-secondary text-white">Keywords</li></a>
        <a href="{{route('admin.articles.index')}}" class="text-decoration-none"><li class="list-group-item bg-secondary text-white">Articles</li></a>
        
    </ul>
</div>