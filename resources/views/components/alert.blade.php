@php
    $bgColor = session('success') ? 'bg-green-500' : 'bg-red-100';
    $iconColor = session('success') ? 'text-white' : 'text-red-600';
@endphp

@if ($errors->any() || session('success') || session('loginError') || session('error'))
    <div id="alertDismiss" class="relative {{ $bgColor }} rounded-md p-4 mb-4">
        <div class="flex items-center justify-between">
            @if ($errors->any())
                <p class="text-red-600 text-sm">
                    Please fill all the requirements below!
                </p>
            @elseif(session('success'))
                <p class="text-white text-sm">
                    {{ session('success') }}
                </p>
            @elseif(session('loginError'))
                <p class="text-red-600 text-sm">
                    {{ session('loginError') }}
                </p>
            @elseif(session('error'))
                <p class="text-red-600 text-sm">
                    {{ session('error') }}
                </p>
            @endif
            <button id="dismissBtn" type="button" class="{{ $iconColor }} focus:outline-none">
                <span class="sr-only">Dismiss</span>
                <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 10.586l4.95-4.95a1 1 0 111.414 1.414L13.414 12l4.95 4.95a1 1 0 11-1.414 1.414L12 13.414l-4.95 4.95a1 1 0 11-1.414-1.414L10.586 12 5.636 7.05a1 1 0 111.414-1.414L12 10.586z" />
                </svg>
            </button>
        </div>
    </div>
@endif

<script>
    const dismissBtn = document.getElementById('dismissBtn');
    const alertDismiss = document.getElementById('alertDismiss');

    if (dismissBtn && alertDismiss) {
        dismissBtn.addEventListener('click', () => {
            alertDismiss.style.display = 'none';
        });
    }
</script>
