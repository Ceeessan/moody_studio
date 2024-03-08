//Ajax-kall för knappen i listing-page.
jQuery(document).ready(function ($) {
    var page = 1;
    var loading = false;
    var noMoreProducts = false;


    $('#load-more').on('click', function () {
        if (!noMoreProducts && !loading) {
            loadMoreProducts();
        }
    });

    function loadMoreProducts() {
        loading = true;
        page++;
        var data = {
            action: 'load_more_products',
            page: page
        };
        $.post(ajaxurl, data, function (response) {
            if (response.trim()) {
                $('.products').append(response);
                loading = false;
                console.log('AJAX-anrop lyckades!'); // Loggar AJAX-anropet för att se om det har lyckats.
            } else {
                noMoreProducts = true;
                $('.load-more-button').hide();
                $('.products').append('<p>All products loaded</p>');
            }
        });
    }
});
