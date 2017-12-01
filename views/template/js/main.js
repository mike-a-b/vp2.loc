jQuery(document).ready(function($) {
//подсветка текущей страницы в меню
    $(function () {
        $('.navbar-nav a').each(function () {
            if (($(this).prop('href').toString()).indexOf((location.pathname.slice(1).toString())) !== -1) {
                $(this).parent('li').addClass('active');
                return false;
            }
        });
    });
});//doc ready