document.addEventListener('DOMContentLoaded', function() {
    // let bat_confirm_modal = $('#bat-confirm-modal').modal({
    //     keyboard: false,
    //     show:     false
    // })

    // document.querySelector('#btn_kick_bat').addEventListener('click', function() {
    //     console.log('#btn_kick_bat');
    //     bat_confirm_modal.modal('show')
    // });

    // let elements_btn_modal_close = document.querySelectorAll('.btn-bat-confirm-modal-close');
    // for (let i = 0, length = elements_btn_modal_close.length; i < length; i++) {
    //     elements_btn_modal_close[i].addEventListener('click', function() {
    //         // bat_confirm_modal.hide()
    //         bat_confirm_modal.modal('hide')
    //     })
    // }

    // let element_btn_bat_confirm_modal_ok = document.querySelector('.btn-bat-confirm-modal-ok');
    // element_btn_bat_confirm_modal_ok.addEventListener('click', function() {
    //     element_btn_bat_confirm_modal_ok.disabled = true;
    //     axios({
    //         method : 'GET',
    //         headers: {
    //             Authorization : "Bearer edpklfKb1hEYaU7ibsFZlfJtOE70JozxW0oF1QEfwkNU1wb0NiptFSieLMk0",
    //         },
    //         url    : 'http://localhost/api/youtube_channel/kick_bat'
    //     })
    //     .then((response) => {
    //         console.log('キック');
    //         // bat_confirm_modal.hide()
    //         bat_confirm_modal.modal('hide')
    //         element_btn_bat_confirm_modal_ok.disabled = false;
    //     });
    // });

    let view_modal = null;

    let youtube_channel_index_modal = $('#youtube-channel-index-modal').modal({
        keyboard: false,
        show:     false
    });
    let youtube_channel_bat_modal = $('#youtube-channel-bat-modal').modal({
        keyboard: false,
        show:     false
    });
    let youtube_channel_create_modal = $('#youtube-channel-create-modal').modal({
        keyboard: false,
        show:     false
    });
    let youtube_channel_update_modal = $('#youtube-channel-update-modal').modal({
        keyboard: false,
        show:     false
    });
    let youtube_video_index_modal = $('#youtube-video-index-modal').modal({
        keyboard: false,
        show:     false
    });

    let element_btn_api_modal_close = document.querySelectorAll('.btn-api-modal-close');
    for (let i = 0, length = element_btn_api_modal_close.length; i < length; i++) {
        element_btn_api_modal_close[i].addEventListener('click', function(e) {
            view_modal.modal('hide');
        });
    }

    let a_api_url = document.querySelectorAll('.button_api_url');
    let send_api_url = "";
    for (let i = 0, length = a_api_url.length; i < length; i++) {
        a_api_url[i].addEventListener('click', function(e) {
            send_api_url = this.textContent;
            if (this.dataset.modal_key === 'youtube_channel_index_modal') {
                view_modal = youtube_channel_index_modal;
                youtube_channel_index_modal.modal('show');
            } else if (this.dataset.modal_key === 'youtube_channel_bat_modal') {
                view_modal = youtube_channel_bat_modal;
                youtube_channel_bat_modal.modal('show');
            } else if (this.dataset.modal_key === 'youtube_channel_create_modal') {
                view_modal = youtube_channel_create_modal;
                youtube_channel_create_modal.modal('show');
            } else if (this.dataset.modal_key === 'youtube_channel_update_modal') {
                view_modal = youtube_channel_update_modal;
                youtube_channel_update_modal.modal('show');
            } else {
                view_modal = youtube_video_index_modal;
                youtube_video_index_modal.modal('show');
            }
        });
    }

    let element_btn_youtube_channel_index_model_send = document.querySelector('.btn-youtube-channel-index-modal-send');
    element_btn_youtube_channel_index_model_send.addEventListener('click', function() {
        console.log(send_api_url);

        element_btn_youtube_channel_index_model_send.disabled = true;
        axios({
            method : 'GET',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : send_api_url + '?yc_name=' + document.querySelector('#youtube_channel_index_yc_name').value +
                '&sort_direction=' + document.querySelector('#youtube_channel_index_sort_direction').value +
                '&page_unit=' + document.querySelector('#youtube_channel_index_page_unit').value,
        })
        .then((response) => {
            document.querySelector('#youtube-channel-index-modal .modal_result').textContent = JSON.stringify(response.data);
        }).catch(error => {
            document.querySelector('#youtube-channel-index-modal .modal_result').textContent = JSON.stringify(error.response)
        }).finally(() => {
            element_btn_youtube_channel_index_model_send.disabled = false;
        });
    });

    let element_btn_youtube_channel_bat_model_send = document.querySelector('.btn-youtube-channel-bat-modal-send');
    element_btn_youtube_channel_bat_model_send.addEventListener('click', function() {
        console.log(send_api_url);

        element_btn_youtube_channel_bat_model_send.disabled = true;
        axios({
            method : 'GET',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : send_api_url,
        })
        .then((response) => {
            document.querySelector('#youtube-channel-bat-modal .modal_result').textContent = JSON.stringify(response.data);
        }).catch(error => {
            document.querySelector('#youtube-channel-bat-modal .modal_result').textContent = JSON.stringify(error.response)
        }).finally(() => {
            element_btn_youtube_channel_bat_model_send.disabled = false;
        });
    });

    let element_btn_youtube_channel_create_modal_send = document.querySelector('.btn-youtube-channel-create-modal-send');
    element_btn_youtube_channel_create_modal_send.addEventListener('click', function() {
        console.log(send_api_url);

        element_btn_youtube_channel_create_modal_send.disabled = true;
        axios({
            method : 'POST',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : send_api_url,
            data   : {
                'yc_name' : document.querySelector('#youtube_channel_create_yc_name').value,
                'yc_id'   : document.querySelector('#youtube_channel_create_yc_id').value
            }
        })
        .then((response) => {
            document.querySelector('#youtube-channel-create-modal .modal_result').textContent = JSON.stringify(response.data);
        }).catch(error => {
            console.log(error);
            document.querySelector('#youtube-channel-create-modal .modal_result').textContent = JSON.stringify(error.response);
        }).finally(() => {
            element_btn_youtube_channel_create_modal_send.disabled = false;
        });
    });

    let element_btn_youtube_channel_update_modal_send = document.querySelector('.btn-youtube-channel-update-modal-send');
    element_btn_youtube_channel_update_modal_send.addEventListener('click', function() {
        console.log(send_api_url);

        element_btn_youtube_channel_update_modal_send.disabled = true;
        axios({
            method : 'POST',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : send_api_url,
            data   : {
                'id'      : document.querySelector('#youtube_channel_update_main_id').value,
                'yc_name' : document.querySelector('#youtube_channel_update_yc_name').value,
                'yc_id'   : document.querySelector('#youtube_channel_update_yc_id').value
            }
        })
        .then((response) => {
            document.querySelector('#youtube-channel-update-modal .modal_result').textContent = JSON.stringify(response.data);
        }).catch(error => {
            console.log(error);
            document.querySelector('#youtube-channel-update-modal .modal_result').textContent = JSON.stringify(error.response);
        }).finally(() => {
            element_btn_youtube_channel_update_modal_send.disabled = false;
        });
    });

    let element_btn_youtube_video_index_model_send = document.querySelector('.btn-youtube-video-index-modal-send');
    element_btn_youtube_video_index_model_send.addEventListener('click', function() {
        console.log(send_api_url);

        element_btn_youtube_video_index_model_send.disabled = true;
        axios({
            method : 'GET',
            headers: {
                Authorization : "Bearer " + document.querySelector('#hidden_api_token').value,
            },
            url    : send_api_url + '?video_name=' + document.querySelector('#youtube_video_index_video_name').value +
                '&sort_direction=' + document.querySelector('#youtube_video_index_sort_direction').value +
                '&page_unit=' + document.querySelector('#youtube_video_index_page_unit').value,
        })
        .then((response) => {
            document.querySelector('#youtube-video-index-modal .modal_result').textContent = JSON.stringify(response.data);
        }).catch(error => {
            document.querySelector('#youtube-video-index-modal .modal_result').textContent = JSON.stringify(error.response)
        }).finally(() => {
            element_btn_youtube_video_index_model_send.disabled = false;
        });
    });
});
