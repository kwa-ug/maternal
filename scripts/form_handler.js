
const API_URL = "api/";

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

var xhr = null;
var spinner = $('#loader');

$("form").on("submit", function(e) {
    e.preventDefault();
    // spinner.show();
    // console.log($(this))
    // add_student
    var form_id = $(this).attr("id");
    var action = $(this).attr("action");
    // console.log(form_id)
    var formData;
    formData = $(this).serialize();
    var method = $(this).attr("method");
    var submit_btn = $(this).find('[type=submit]');
    var html_submit = submit_btn.html();
    submit_btn.html("PLEASE WAIT...");
    submit_btn.prop('disabled',true);
    if (xhr) {
        xhr.abort();
    }
    xhr = $.ajax({
        url: API_URL+action,
        method: method,
        cache: false,
        data: formData,
        success: function(res) {
            /*Fire success the message through a toast*/
            $.toast({
                text: res.msg,
                hideAfter: false,
                bgColor: '#28a745',
                loaderBg: '#166328',
                stack: 3,
                icon: 'success',
                position: 'bottom-center'
            })

            $('button[type="reset"]').trigger("click")

            if(res.user_info){
                sessionStorage.setItem(res.store_key, res.user_info);
            }
            submit_btn.html(html_submit)
            submit_btn.prop('disabled',false)
            spinner.hide();
            // $('button[type="reset"]').trigger("click")

            if(res.redirect){
                // sleep(5000);
                window.location=res.redirect;
            }
        },
        error: function(res) {
            submit_btn.html(html_submit)
            submit_btn.prop('disabled',false)
            spinner.hide();
            /*Fire failure the message through a toast*/
            $.toast({
                text: res.responseJSON.errorMsg,
                hideAfter: false,
                bgColor: '#dc3545',
                loaderBg: '#850713',
                stack: 3,
                icon: 'error',
                position: 'bottom-center'
            })
        }
    })

})