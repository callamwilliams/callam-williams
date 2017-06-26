'use strict';

var version = '1.2.4';

function slickForms() {

    this.reSkin = function (element) {

        if (element) {

            core_funcs[element].handler();

        } else {

            core_funcs.initialise();

        }

        return 'All wrapped up, slick!';

    }

    var core_funcs = {

        initialise: function () {

            for (var type in core_funcs) {

                if (core_funcs[type]['handler']) core_funcs[type]['handler']();

            }

        },

        select: {

            handler: function () {

                var elements = document.getElementsByTagName('select');

                for (var i = 0; i < elements.length; i++) {

                    if (elements[i].parentNode.classList ? (elements[i].parentNode.classList.contains('select-wrap')) : (new RegExp('(^| )' + 'select-wrap' + '( |$)', 'gi').test(elements[i].parentNode.className))) continue;

                    core_funcs['select'].wrap(elements[i]);
                    if (elements[i].getAttribute('data-label')) {

                        core_funcs['select'].setLabel(elements[i], elements[i].getAttribute('data-label'));

                    } else {

                        core_funcs['select'].check(elements[i]);

                    }
                    core_funcs['select'].bind(elements[i]);

                }

            },

            wrap: function (element) {

                element.outerHTML = '<div class="select-wrap">' + element.outerHTML + '<div class="select">' + element.value + '</div></div>';

            },

            bind: function (element) {

                element.onchange = function () {

                    core_funcs['select'].check(element);

                }

            },

            check: function (element) {

                var elementValue = element.value;
                var selectedOption = element.getElementsByTagName('option');

                for (var i = 0; i < selectedOption.length; i++) {

                    if (selectedOption[i].value != elementValue) {

                        continue;

                    } else {

                        var optionText = selectedOption[i].textContent || selectedOption[i].innerText;

                    }

                }

                core_funcs['select'].setLabel(element, optionText);

            },

            setLabel: function (element, value) {

                element.parentNode.querySelectorAll('.select')[0].innerHTML = value;

            }

        },

        checkbox: {

            handler: function () {

                var elements = document.getElementsByTagName('input');

                for (var i = 0; i < elements.length; i++) {

                    if ((elements[i].getAttribute('type') != 'checkbox') || (elements[i].parentNode.classList ? (elements[i].parentNode.classList.contains('checkbox-wrap')) : (new RegExp('(^| )' + 'checkbox-wrap' + '( |$)', 'gi').test(elements[i].parentNode.className)))) continue;

                    core_funcs['checkbox'].wrap(elements[i]);
                    core_funcs['checkbox'].check(elements[i]);
                    core_funcs['checkbox'].bind(elements[i]);

                }

            },

            wrap: function (element) {

                element.outerHTML = '<div class="checkbox-wrap">' + element.outerHTML + '<div class="checkbox-mark"></div></div>';

            },

            bind: function (element) {

                element.onchange = function () {

                    core_funcs['checkbox'].check(element);

                }

            },

            check: function (element) {

                var marker = element.parentNode.querySelectorAll('.checkbox-mark')[0];

                if (element.checked) {

                    marker.classList.add('active');

                } else {

                    marker.classList.remove('active');

                }

            }

        },

        radio: {

            handler: function () {

                var elements = document.getElementsByTagName('input');

                for (var i = 0; i < elements.length; i++) {

                    if ((elements[i].getAttribute('type') != 'radio') || (elements[i].parentNode.classList ? (elements[i].parentNode.classList.contains('radio-wrap')) : (new RegExp('(^| )' + 'radio-wrap' + '( |$)', 'gi').test(elements[i].parentNode.className)))) continue;

                    core_funcs['radio'].wrap(elements[i]);
                    core_funcs['radio'].check(elements[i]);
                    core_funcs['radio'].bind(elements[i]);

                }

            },

            wrap: function (element) {

                element.outerHTML = '<div class="radio-wrap">' + element.outerHTML + '<div class="radio-mark"></div></div>';

            },

            bind: function (element) {

                var elementGroup = document.getElementsByName(element.getAttribute('name'));

                element.onchange = function () {

                    for (var i = 0; i < elementGroup.length; i++) {

                        core_funcs['radio'].check(elementGroup[i]);

                    }

                }

            },

            check: function (element) {

                var marker = element.parentNode.querySelectorAll('.radio-mark')[0];

                if (element.checked) {

                    marker.classList.add('active');

                } else {

                    marker.classList.remove('active');

                }

            }

        },

        file: {

            handler: function () {

                var elements = document.getElementsByTagName('input');

                for (var i = 0; i < elements.length; i++) {

                    if ((elements[i].getAttribute('type') != 'file') || (elements[i].parentNode.classList ? (elements[i].parentNode.classList.contains('file-wrap')) : (new RegExp('(^| )' + 'file-wrap' + '( |$)', 'gi').test(elements[i].parentNode.className)))) continue;

                    core_funcs['file'].wrap(elements[i]);
                    core_funcs['file'].check(elements[i]);
                    core_funcs['file'].bind(elements[i]);

                }

            },

            wrap: function (element) {

                element.outerHTML = '<div class="file-wrap">' + element.outerHTML + '<div class="file-button">Choose file(s)</div><div class="file-label"></div></div>';

            },

            bind: function (element) {

                element.onchange = function () {

                    core_funcs['file'].check(element);

                }

            },

            check: function (element) {

                var label = element.parentNode.querySelectorAll('.file-label')[0];
                var button = element.parentNode.querySelectorAll('.file-button')[0]

                if (!element.value) {

                    label.innerHTML = 'Please select a file(s)';
                    button.innerHTML = 'Choose file(s)';

                } else {

                    label.innerHTML = '';
                    button.innerHTML = (element.files.length > 1 ? 'Change file(s)' : 'Change file');

                    for (var i = 0; i < element.files.length; i++) {

                        var fileLabel = document.createElement('span');
                        fileLabel.innerHTML = element.files[i].name + (i != element.files.length - 1 ? ', ' : '');

                        label.appendChild(fileLabel);

                    }

                }


            }

        }

    }

    core_funcs.initialise();

}


export default slickForms;

