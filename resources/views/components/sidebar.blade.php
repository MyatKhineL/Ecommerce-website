<div class="col-md-4">
    @auth
    <div class="card mb-3">
        <div class="card-body">
            <ul class="list-group">
                <a href="{{ route('showCart') }}" class="text-decoration-none ">
                    <li class="list-group-item border border-2 border-primary  text-primary mb-2 rounded">
                        Your Cart
                    </li>
                </a>
                <a href="{{ route('pending') }}" class="text-decoration-none">
                    <li class="list-group-item border border-2 border-warning text-warning mb-2 rounded">
                        Your Pending Order Lists
                    </li>
                </a>
                <a href="{{ route('complete') }}" class="text-decoration-none">
                    <li class="list-group-item border border-2 border-success text-success mb-2 rounded">
                        Your Complete Order Lists
                    </li>
                </a>
                <a href="{{ route('user.profile') }}" class="text-decoration-none">
                    <li class="list-group-item bg-info text-white mb-2 rounded">
                        Your Profile
                    </li>
                </a>
            </ul>
        </div>
    </div>
    @endauth
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item bg-primary text-white fw-bold text-center">
                    All Category
                </li>
                @foreach( $categories as $cat)
                    <a href="{{ route('filter.category', $cat->slug) }}" class="text-decoration-none">
                        <li class="list-group-item mt-1 rounded border border-2">
                            <div class="d-flex justify-content-between">
                                {{ $cat->name }}
                                <span class="badge bg-primary rounded-circle d-flex justify-content-center align-items-center">{{ $cat->product_info_count }}</span>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
