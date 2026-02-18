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
        <li class="list-group-item bg-secondary text-white">Cras justo odio</li>
        <li class="list-group-item bg-secondary text-white">Cras justo odio</li>
    </ul>
</div>