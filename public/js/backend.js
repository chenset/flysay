function newAlert(t){"use strict";var n=void 0===t.msg?"":t.msg,e=void 0===t.templateUrl?"":t.templateUrl,d=void 0===t.confirm?null:t.confirm,l=void 0===t.cancel?null:t.cancel,a=void 0===t.title?"提示":t.title,o=void 0===t.err?{}:t.err,i=void 0===t.style?"modal-default":t.style,s=(new Date).valueOf(),c=function(){$("#new-alert"+s).unbind("hide.bs.modal"),d&&r.find(".new-alert-confirm").unbind("click")},r=null;if(void 0!==t.err&&void 0===t.style&&200!=t.err["static"]&&(i="modal-danger"),document.getElementById("new-alert"+s)||$(document.body).append('<div class="modal fade '+i+' " id="new-alert'+s+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" >提示</h4></div><div class="modal-body">...</div><div class="modal-footer"><button type="button" class="btn '+("modal-default"===i?"btn-default":"btn-outline")+' pull-left" data-dismiss="modal">取消</button></div></div></div></div>'),r=$("#new-alert"+s),d instanceof Function&&0===r.find(".new-alert-confirm").length&&r.find(".modal-footer").append('<button type="button" class="btn '+("modal-default"===i?"btn-primary":"btn-outline")+' new-alert-confirm">确定</button>'),e)$.ajax({url:e,cache:!1,success:function(t){r.modal({backdrop:"static"}).find(".modal-title").html(a).end().find(".modal-body").html(t)}});else{var m,u=0,b="";for(m in o.responseJSON)u++,b+=u+". "+o.responseJSON[m]+"<br/>";""!==n&&(b="<br/>"+b),r.modal({backdrop:"static"}).find(".modal-title").html(a).end().find(".modal-body").html(n+b)}r.on("hide.bs.modal",function(){l instanceof Function&&l(),c()}),r.find(".new-alert-confirm").on("click",function(){d instanceof Function&&d()}),r.on("hidden.bs.modal",function(){c(),$(document.body).css("paddingRight","0px"),r.remove()})}