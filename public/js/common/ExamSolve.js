var tablename=document.currentScript.getAttribute("tablename"); //1
var _id=document.currentScript.getAttribute('_id'); //1


jQuery(document).ready(function() {

                 $.ajax({
                  url: '/'+tablename+'?_id='+_id,
          
                  complete: function(jqXHR){
                  var data = $.parseJSON(jqXHR.responseText);

                      $('#title').html(data.title);
                      $('#authority_name').append(data.authority_name.name);
                      $('#track_name').append(data.track_name.name);

                      var quiz='';
                      var back='';
                      var result='';
                      $.each( data.questions, function( key, item ) {

                      result+=`<div class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3>${item.name}</h3><br><br><input type="hidden"  name="question" value="${item._id.$oid}">`
                      if(item.is_programming=="Yes"){
                          result+=`<div class="form-group m-form__group"><textarea class="form-control m-input" id="exampleTextarea" rows="20"  name="answer[${item._id.$oid}]" ></textarea></div><div class="form-group m-form__group"></div>`;

                      }else{
                          result+=`<div class='row'>`
                          result+=`<input type="hidden"  name="answer[${item._id.$oid}]">`
                          $.each(item.answers, function(i, item2) {
                              item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");

                              result+=  `<div class="col-md-12"><div class="m-invoice__item"><span class="m-invoice__subtitle " ><div class="m-radio-list"><label class="m-radio m-radio--success"><input type="radio"  name="answer[${item._id.$oid}]"   value="${item2._id.$oid}"> ${item2.answer}<span></span></label></div></span></div></div>`
                          });
                          result+="</div>";

                      }
                      next=""


                      result+='</div>'+next+'</div>';
                      console.log(result)


                      });

                      $("#test").html(result);
                      // 
                  }});

$('#submit').click(function(e){

                 $("#proceed").ajaxSubmit({url: '/proceed', type: 'post',      
                      success: function (data) {
                    $("#block-view").show();
                    $("#proceed-view").hide();
                }
               })
e.preventDefault();
})


});