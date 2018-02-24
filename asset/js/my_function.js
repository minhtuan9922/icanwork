
function message_pattern($tag,$name,$message)
{   
    $(''+$tag+'[name='+$name+']').on({ 

        invalid: function(){
            this.setCustomValidity($message);
        },
        valid: function(){
            try {
                this.setCustomValidity('');
            } catch(e) {} 
        }
    });
}
function message_validation($tag,$name,$message)
{   
    $(''+$tag+'[name='+$name+']').on({ 

        invalid: function(){
            this.setCustomValidity($message);
        },
        change: function(){
            try {
                this.setCustomValidity('');
            } catch(e) {} 
        }
    });
}

function isFutureDate(idate)
{
    var today = new Date().getTime();
    idate = idate.split("/");
    console.log(today);
    console.log(idate);
    idate = new Date(idate[2], idate[1]-1, idate[0]).getTime();
    return (today - idate) < 0 ? true : false;
}

function format_date(date,$format,separator)
{
    var dd = (date.getDate() < 10) ? '0'+ date.getDate() : date.getDate();
    var mm = (date.getMonth() + 1) < 10 ? '0'+ (date.getMonth() + 1) : (date.getMonth() + 1);
    var yyyy = date.getFullYear();
    switch ($format) {
        case "yyyy-mm-dd":
        return yyyy + separator + mm  + separator + dd ;
        break;
        case "dd-mm-yyyy":
        return dd + separator + mm  + separator + yyyy ;
        break;
        default:
        return yyyy + separator + mm  + separator + dd ;
        break;
    }
}

function hash_string()
{
    //var url = window.location.href;
    //b =url.replace(/#cv-file/g,'');
    //setTimeout(function() {window.history.pushState("","",b);},1000);
}

// if not use js plugin cookie then use getToken
function getToken() {
    var ck = document.cookie.match(/csrf_cookie_name=([a-z0-9]+)/);
    if (ck.length === 2) return ck[1];
    return null;
}