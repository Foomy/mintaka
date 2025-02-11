const Role = {
    init: function () {
        this.initAddBtn();
        this.initDetailBtns();
        this.initEditBtns();
        this.initDeleteBtns();
    },

    initAddBtn: function () {
        const button = document.querySelectorAll('button[data-js]').item(0);

        button.addEventListener('click', function () {
            location.href = '/role/add';
        });
    },

    initDetailBtns: function () {
        const buttons = document.querySelectorAll('button[data-js]');

        for (let btn of buttons) {
            if ('detail-btn' === btn.dataset.js) {
                btn.addEventListener('click', function () {
                    location.href = '/role/details/' + btn.dataset.id;
                });
            }
        }
    },

    initEditBtns: function () {
        const buttons = document.querySelectorAll('button[data-js]');

        for (let btn of buttons) {
            if ('edit-btn' === btn.dataset.js) {
                btn.addEventListener('click', function () {
                    location.href = '/role/edit/' + btn.dataset.id;
                });
            }
        }
    },

    initDeleteBtns: function () {
        const buttons = document.querySelectorAll('button[data-js]');

        for (let btn of buttons) {
            if ('delete-btn' === btn.dataset.js) {
                btn.addEventListener('click', function () {
                    location.href = '/role/delete/' + btn.dataset.id;
                });
            }
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {
    Role.init();
});