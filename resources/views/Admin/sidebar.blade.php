<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                <a class="text-decoration-none mb-2">
                    <li class="list-group-item  text-white border border-2 border-primary rounded">
                        <h4 class="text-primary fw-bold text-center mb-0">Admin Management</h4>
                    </li>
                </a>
                <a href="{{ route('admin.index') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        Dashboard
                    </li>
                </a>
                <a href="{{ route('category.index') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        Category
                    </li>
                </a>
                <a href="{{ route('product.index') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        Product
                    </li>
                </a>
                <a href="{{ route('order.pending') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        Pending Order
                    </li>
                </a>
                <a href="{{ route('order.complete') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        Complete Order
                    </li>
                </a>
                <a href="{{ route('admin.users') }}" class="text-decoration-none mb-2">
                    <li class="list-group-item border border-2 rounded">
                        User Lists
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>
