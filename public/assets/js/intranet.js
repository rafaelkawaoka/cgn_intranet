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

 $(document).ready(function(){
    $('.mask-cpf').mask('000.000.000-00');
    $('.mask-celular').mask('(000) 0000-0000');
    $('.mask-telefone').mask('000 000-0000');
    $('.mask-protocolo').mask('000000-0000');

    $('.mask-matricula').each(function () {
        const $input = $(this);
        const prefixo = $input.data('prefixo');
        const tamanho = 8;
        const mask = prefixo + '0'.repeat(tamanho);
        $input.mask(mask, {
            translation: {
                '0': { pattern: /[0-9]/ }
            },
            onKeyPress: function (value, e, field) {
                if (value === prefixo) {
                    field.val('');
                return;
                }
                if (value.length > 0 && !value.startsWith(prefixo)) {
                    field.val(prefixo + value.replace(/\D/g, ''));
                }
            }
        });
    });
});

document.addEventListener('livewire:init', () => {

    const notyf = new Notyf({
        duration: 3500,
        position: {
            x: 'right',
            y: 'bottom',
        },
        ripple: true,
        dismissible: true,
    });

    Livewire.on('notify', ({ type = 'success', message }) => {
        if (!message) return;
        if (type === 'error') {
            notyf.error(message);
        } else if (type === 'warning') {
            notyf.open({
                type: 'warning',
                message: message,
                background: '#f59e0b',
            });
        } else {
            notyf.success(message);
        }
    });

    Livewire.on('set-city-after-load', ({ cidadeId }) => {
        setTimeout(() => {
            const select = document.querySelector(
                '#modal-cadastro select[wire\\:model="cidade_id"]'
            );
            if (!select) return;

            select.value = cidadeId;
            select.dispatchEvent(new Event('change', { bubbles: true }));
        }, 50); // 50ms é suficiente
    });

    Livewire.on('reapply-masks', () => {
        $('.mask-cpf').unmask().mask('000.000.000-00');
        $('.mask-celular').unmask().mask('(000) 0000-0000');
        $('.mask-telefone').unmask().mask('000 000-0000');
        $('.mask-protocolo').unmask().mask('000000-0000');
    });

    document.addEventListener('livewire:init', () => {
        Livewire.hook('message.processed', () => {
            //$('.mask-cpf').unmask().mask('000.000.000-00');
        });
    });


    Livewire.on('open-modal', ({ id }) => {
        const el = document.getElementById(id)
        if (!el) return
        const modal = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el)
        modal.show()
    })

    Livewire.on('close-modal', ({ id }) => {
        const modalEl = document.getElementById(id)
        if (!modalEl) return
        const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl)
        modal.hide()
    })
})
