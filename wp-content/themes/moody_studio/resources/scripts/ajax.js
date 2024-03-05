jQuery(document).ready(function ($) {
    var page = 2; // Initial sida
    var loading = false; // Flagga för att förhindra flera samtidiga förfrågningar

    $(window).scroll(function () {
        if (!loading && $(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            loading = true; // Ange flaggan till true för att förhindra fler förfrågningar

            $.ajax({
                url: ajaxurl, // WordPress AJAX URL
                type: 'post',
                data: {
                    action: 'load_more_products',
                    page: page
                },
                success: function (response) {
                    // Hantera svaret och lägg till produkterna på sidan
                    // Exempel: $('#products-container').append(response);
                    page++; // Öka sidnumret för nästa förfrågan
                    loading = false; // Återställ flaggan till false när förfrågan är klar
                }
            });
        }
    });
});
