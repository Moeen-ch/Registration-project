<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        body {
            /*background-color: #802626; */
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>

<body class="vh-100">
    <div class="d-flex bg-danger bg-gradient justify-content-center align-items-center ">
        <div class="form-container m-5">
            <h2 class="mb-4 text-center">Order Form</h2>
            <form action="{{ route('order.Store') }}" method="POST">
                @csrf
                <!-- Order Number -->
                <div class="mb-3">
                    <label for="orderNo" class="form-label">Order Number</label>
                    <input type="text" class="form-control" id="order_no" value="{{ old('order_no') }}" name="order_no" required>
                </div>

                <!-- User ID -->
                <div class="mb-3">
                    <label for="userId" class="form-label">User Name</label>
                    <select class="form-select" id="category" name="user_id" required>
                        <option value="" disabled selected>Select a user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->fname }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" value="{{ old('price') }}" name="price" required>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="" disabled selected>Select a category</option>
                        <option value="electronic" {{ old('status') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="clothing" {{ old('status') == 'clothing' ? 'selected' : '' }}>Clothing</option>
                        <option value="furniture" {{ old('status') == 'furniture' ? 'selected' : '' }}>Furniture</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="" disabled selected>Select status</option>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="delivered" {{ old('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-25">Place Order</button>
                <a class="btn btn-primary w-25" href="{{ route('orders') }}">back</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional but recommended for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
