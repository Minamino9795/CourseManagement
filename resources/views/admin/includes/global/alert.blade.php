@if (session('success') || session('error'))
<div class="card-header pt-2 pb-0">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-success').remove();
                }, 3000); // Thay đổi thời gian hiển thị ở đây (đơn vị: milliseconds)
            </script>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-danger').remove();
                }, 3000); // Thay đổi thời gian hiển thị ở đây (đơn vị: milliseconds)
            </script>
        </div>
    @endif
</div>
@endif