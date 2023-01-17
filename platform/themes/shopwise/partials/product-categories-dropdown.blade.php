<ul>
    @foreach($categories as $category)
        @if ($loop->index < 10)
            <li @if ($category->activeChildren->count() > 0) class="dropdown dropdown-mega-menu" @endif>
                <a class="dropdown-item nav-link @if ($category->activeChildren->count() > 0) dropdown-toggler @endif" href="{{ $category->url }}" @if ($category->activeChildren->count() > 0) data-toggle="dropdown" @endif>
                    @if ($category->getMetaData('icon_image', true))
                        <img src="{{ RvMedia::getImageUrl($category->getMetaData('icon_image', true)) }}" alt="{{ $category->name }}" width="22" height="22">
                    @elseif ($category->getMetaData('icon', true))
                        <i class="{{ $category->getMetaData('icon', true) }}"></i>
                    @endif
                    <span>{{ $category->name }}</span>
                </a>
                @if ($category->activeChildren->count() > 0)
                    <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">
                            <li class="mega-menu-col">
                                <ul>
                                    @foreach($category->activeChildren as $childCategory)
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ $childCategory->url }}">{{ $childCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
            </li>
        @else
            @if ($loop->index == 10)
                <li>
                    <ul class="more_slide_open" style="display: none;">
                        @endif
                        <li @if ($category->activeChildren->count() > 0) class="dropdown dropdown-mega-menu" @endif>
                            <a class="dropdown-item nav-link nav_item @if ($category->activeChildren->count() > 0) dropdown-toggler @endif" href="{{ $category->url }}" @if ($category->activeChildren->count() > 0) data-toggle="dropdown" @endif>
                                @if ($category->getMetaData('icon_image', true))
                                    <img src="{{ RvMedia::getImageUrl($category->getMetaData('icon_image', true)) }}" alt="{{ $category->name }}" width="22" height="22">
                                @elseif ($category->getMetaData('icon', true))
                                    <i class="{{ $category->getMetaData('icon', true) }}"></i>
                                @endif
                                <span>{{ $category->name }}</span>
                            </a>
                            @if ($category->activeChildren->count() > 0)
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col">
                                            <ul>
                                                @foreach($category->activeChildren as $childCategory)
                                                    <li><a class="dropdown-item nav-link nav_item" href="{{ $childCategory->url }}">{{ $childCategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </li>
                        @if ($loop->last)
                    </ul>
                </li>
            @endif
        @endif
    @endforeach
</ul>
