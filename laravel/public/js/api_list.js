/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/api_list.js":
/*!**********************************!*\
  !*** ./resources/js/api_list.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener('DOMContentLoaded', function () {
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
  var view_modal = null;
  var youtube_channel_index_modal = $('#youtube-channel-index-modal').modal({
    keyboard: false,
    show: false
  });
  var youtube_channel_bat_modal = $('#youtube-channel-bat-modal').modal({
    keyboard: false,
    show: false
  });
  var youtube_channel_create_modal = $('#youtube-channel-create-modal').modal({
    keyboard: false,
    show: false
  });
  var youtube_channel_update_modal = $('#youtube-channel-update-modal').modal({
    keyboard: false,
    show: false
  });
  var youtube_video_index_modal = $('#youtube-video-index-modal').modal({
    keyboard: false,
    show: false
  });
  var element_btn_api_modal_close = document.querySelectorAll('.btn-api-modal-close');

  for (var i = 0, length = element_btn_api_modal_close.length; i < length; i++) {
    element_btn_api_modal_close[i].addEventListener('click', function (e) {
      view_modal.modal('hide');
    });
  }

  var a_api_url = document.querySelectorAll('.button_api_url');
  var send_api_url = "";

  for (var _i = 0, _length = a_api_url.length; _i < _length; _i++) {
    a_api_url[_i].addEventListener('click', function (e) {
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

  var element_btn_youtube_channel_index_model_send = document.querySelector('.btn-youtube-channel-index-modal-send');
  element_btn_youtube_channel_index_model_send.addEventListener('click', function () {
    console.log(send_api_url);
    element_btn_youtube_channel_index_model_send.disabled = true;
    axios({
      method: 'GET',
      headers: {
        Authorization: "Bearer " + document.querySelector('#hidden_api_token').value
      },
      url: send_api_url + '?yc_name=' + document.querySelector('#youtube_channel_index_yc_name').value + '&sort_direction=' + document.querySelector('#youtube_channel_index_sort_direction').value + '&page_unit=' + document.querySelector('#youtube_channel_index_page_unit').value
    }).then(function (response) {
      document.querySelector('#youtube-channel-index-modal .modal_result').textContent = JSON.stringify(response.data);
    })["catch"](function (error) {
      document.querySelector('#youtube-channel-index-modal .modal_result').textContent = JSON.stringify(error.response);
    })["finally"](function () {
      element_btn_youtube_channel_index_model_send.disabled = false;
    });
  });
  var element_btn_youtube_channel_bat_model_send = document.querySelector('.btn-youtube-channel-bat-modal-send');
  element_btn_youtube_channel_bat_model_send.addEventListener('click', function () {
    console.log(send_api_url);
    element_btn_youtube_channel_bat_model_send.disabled = true;
    axios({
      method: 'GET',
      headers: {
        Authorization: "Bearer " + document.querySelector('#hidden_api_token').value
      },
      url: send_api_url
    }).then(function (response) {
      document.querySelector('#youtube-channel-bat-modal .modal_result').textContent = JSON.stringify(response.data);
    })["catch"](function (error) {
      document.querySelector('#youtube-channel-bat-modal .modal_result').textContent = JSON.stringify(error.response);
    })["finally"](function () {
      element_btn_youtube_channel_bat_model_send.disabled = false;
    });
  });
  var element_btn_youtube_channel_create_modal_send = document.querySelector('.btn-youtube-channel-create-modal-send');
  element_btn_youtube_channel_create_modal_send.addEventListener('click', function () {
    console.log(send_api_url);
    element_btn_youtube_channel_create_modal_send.disabled = true;
    axios({
      method: 'POST',
      headers: {
        Authorization: "Bearer " + document.querySelector('#hidden_api_token').value
      },
      url: send_api_url,
      data: {
        'yc_name': document.querySelector('#youtube_channel_create_yc_name').value,
        'yc_id': document.querySelector('#youtube_channel_create_yc_id').value
      }
    }).then(function (response) {
      document.querySelector('#youtube-channel-create-modal .modal_result').textContent = JSON.stringify(response.data);
    })["catch"](function (error) {
      console.log(error);
      document.querySelector('#youtube-channel-create-modal .modal_result').textContent = JSON.stringify(error.response);
    })["finally"](function () {
      element_btn_youtube_channel_create_modal_send.disabled = false;
    });
  });
  var element_btn_youtube_channel_update_modal_send = document.querySelector('.btn-youtube-channel-update-modal-send');
  element_btn_youtube_channel_update_modal_send.addEventListener('click', function () {
    console.log(send_api_url);
    element_btn_youtube_channel_update_modal_send.disabled = true;
    axios({
      method: 'POST',
      headers: {
        Authorization: "Bearer " + document.querySelector('#hidden_api_token').value
      },
      url: send_api_url,
      data: {
        'id': document.querySelector('#youtube_channel_update_main_id').value,
        'yc_name': document.querySelector('#youtube_channel_update_yc_name').value,
        'yc_id': document.querySelector('#youtube_channel_update_yc_id').value
      }
    }).then(function (response) {
      document.querySelector('#youtube-channel-update-modal .modal_result').textContent = JSON.stringify(response.data);
    })["catch"](function (error) {
      console.log(error);
      document.querySelector('#youtube-channel-update-modal .modal_result').textContent = JSON.stringify(error.response);
    })["finally"](function () {
      element_btn_youtube_channel_update_modal_send.disabled = false;
    });
  });
  var element_btn_youtube_video_index_model_send = document.querySelector('.btn-youtube-video-index-modal-send');
  element_btn_youtube_video_index_model_send.addEventListener('click', function () {
    console.log(send_api_url);
    element_btn_youtube_video_index_model_send.disabled = true;
    axios({
      method: 'GET',
      headers: {
        Authorization: "Bearer " + document.querySelector('#hidden_api_token').value
      },
      url: send_api_url + '?video_name=' + document.querySelector('#youtube_video_index_video_name').value + '&sort_direction=' + document.querySelector('#youtube_video_index_sort_direction').value + '&page_unit=' + document.querySelector('#youtube_video_index_page_unit').value
    }).then(function (response) {
      document.querySelector('#youtube-video-index-modal .modal_result').textContent = JSON.stringify(response.data);
    })["catch"](function (error) {
      document.querySelector('#youtube-video-index-modal .modal_result').textContent = JSON.stringify(error.response);
    })["finally"](function () {
      element_btn_youtube_video_index_model_send.disabled = false;
    });
  });
});

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/api_list.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/resources/js/api_list.js */"./resources/js/api_list.js");


/***/ })

/******/ });