/**
 * Theme: Highdmin - Responsive Bootstrap 4 Admin Dashboard
 * Author: Coderthemes
 * Form Advanced
 */


jQuery(document).ready(function(){$(".select2").select2(),$(".select2-limiting").select2({maximumSelectionLength:2}),$(".selectpicker").selectpicker(),$(":file").filestyle({input:!1})}),$("input#defaultconfig").maxlength({warningClass:"badge badge-success",limitReachedClass:"badge badge-danger"}),$("input#thresholdconfig").maxlength({threshold:20,warningClass:"badge badge-success",limitReachedClass:"badge badge-danger"}),$("input#alloptions").maxlength({alwaysShow:!0,separator:" out of ",preText:"You typed ",postText:" chars available.",validate:!0,warningClass:"badge badge-success",limitReachedClass:"badge badge-danger"}),$("textarea#textarea").maxlength({alwaysShow:!0,warningClass:"badge badge-success",limitReachedClass:"badge badge-danger"}),$("input#placement").maxlength({alwaysShow:!0,placement:"top-left",warningClass:"badge badge-success",limitReachedClass:"badge badge-danger"});



