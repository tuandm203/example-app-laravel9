@if ($categoryParent->categoryChildrent->count())
<ul role="menu" class="sub-menu">
    @foreach ($categoryParent->categoryChildrent as $categoryChild)

    <li>
        <a href="shop.html">{{$categoryChild->name}}</a>
        @include('home.components.child_menu',['categoryParent'=> $categoryChild])
    </li>

    @endforeach
</ul>
@endif