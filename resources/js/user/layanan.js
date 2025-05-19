document.addEventListener('DOMContentLoaded', function () {
    const searchMaskapai = document.getElementById('searchMaskapai');
    const searchBandara = document.getElementById('searchBandara');
    const searchHotelMekkah = document.getElementById('searchHotelMekkah');
    const searchHotelMadinah = document.getElementById('searchHotelMadinah');

    const paketCards = document.querySelectorAll('.paket-card');

    function filterPaket() {
        const maskapaiQuery = searchMaskapai.value.toLowerCase();
        const bandaraQuery = searchBandara.value.toLowerCase();
        const hotelMekkahQuery = searchHotelMekkah.value.toLowerCase();
        const hotelMadinahQuery = searchHotelMadinah.value.toLowerCase();

        paketCards.forEach(card => {
            const maskapai = card.getAttribute('data-maskapai');
            const bandara = card.getAttribute('data-bandara');
            const hotelMekkah = card.getAttribute('data-hotelmekkah');
            const hotelMadinah = card.getAttribute('data-hotelmadinah');

            // Cek apakah semua query ada di data masing-masing
            const isMatch = 
                maskapai.includes(maskapaiQuery) &&
                bandara.includes(bandaraQuery) &&
                hotelMekkah.includes(hotelMekkahQuery) &&
                hotelMadinah.includes(hotelMadinahQuery);

            card.style.display = isMatch ? '' : 'none';
        });
    }

    // Tambahkan event listener untuk semua input
    [searchMaskapai, searchBandara, searchHotelMekkah, searchHotelMadinah].forEach(input => {
        input.addEventListener('input', filterPaket);
    });

    // Jika mau tombol search juga:
    const searchBtn = document.getElementById('searchBtn');
    if (searchBtn) {
        searchBtn.addEventListener('click', filterPaket);
    }
});
