$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.btn-logout', function (e) {
    e.preventDefault();
    $.ajax({
        url: '/logout',
        method: 'POST',
        complete: function () {
            window.location.reload();
        }
    });
});
