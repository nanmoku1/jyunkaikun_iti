document.addEventListener('DOMContentLoaded', function() {
    console.log('Hello youtube_channel.js');
    // let bat_confirm_modal = new bootstrap.Modal(document.getElementById('bat-confirm-modal'), {
    //     keyboard: false
    // })
    let bat_confirm_modal = $('#bat-confirm-modal').modal({
        keyboard: false,
        show:     false
    })

    document.querySelector('#btn_kick_bat').addEventListener('click', function() {
        console.log('#btn_kick_bat');
        // bat_confirm_modal.show()
        bat_confirm_modal.modal('show')
    });

    let elements_btn_modal_close = document.querySelectorAll('.btn-bat-confirm-modal-close');
    for (let i = 0, length = elements_btn_modal_close.length; i < length; i++) {
        elements_btn_modal_close[i].addEventListener('click', function() {
            // bat_confirm_modal.hide()
            bat_confirm_modal.modal('hide')
        })
    }

    let element_btn_bat_confirm_modal_ok = document.querySelector('.btn-bat-confirm-modal-ok');
    element_btn_bat_confirm_modal_ok.addEventListener('click', function() {
        element_btn_bat_confirm_modal_ok.disabled = true;
        axios({
            method : 'GET',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : element_btn_bat_confirm_modal_ok.dataset.url
        })
        .then((response) => {
            // bat_confirm_modal.hide()
            bat_confirm_modal.modal('hide')
            element_btn_bat_confirm_modal_ok.disabled = false;
        });
    });
});
