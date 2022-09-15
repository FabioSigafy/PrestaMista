import './bootstrap';
import $ from "jquery";
import swal from 'sweetalert';
import 'jquery-mask-plugin';


$(function () {
    $('.mask-money').mask('000.000.000.000.000,00', { reverse: true });
    $('.mask-cpf').mask('000.000.000-00');

    $('form[role="ajax"]').on('submit', function () {
        var route = $(this).attr('action');

        swal('Deseja realizar esta ação?', '', 'warning').then((willDelete) => {
            if (willDelete) {
                $.post(route, $(this).serialize(), function (data) {
                    globalActionReturnAjax(data);
                });
            }
        });

        return false;
    });

    $('.btn-remove[role="ajax"]').on('click', function () {
        var route = $(this).attr('route');
        var requests = {
            _method: "DELETE",
            _token: $(this).attr('csrf')
        };

        $.post(route, requests, function (data) {
            globalActionReturnAjax(data)
        });
    });
});

function globalActionReturnAjax(data) {
    if (!data.status) {
        swal('Ops!', data.errors[0], 'warning');
    } else {
        swal('Concluído!', data.message, 'success')
            .then(() => {
                window.location.href = data.redirect;
            });
    }
}
