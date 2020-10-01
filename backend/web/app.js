$(function () {
    'use strict';
    $('#musicFile').change(ev=>{
        $(ev.target).closest('form').trigger('submit');
    })
});