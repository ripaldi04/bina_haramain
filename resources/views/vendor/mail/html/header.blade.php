@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Bina Haramain')
                <img src="{{ asset('images/Logo Bina Haramain Baru.png') }}" alt="Logo Bina Haramain" class="logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
