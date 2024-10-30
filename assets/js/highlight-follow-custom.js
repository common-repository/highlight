
jQuery(document).ready(function($){

function Discussion(){       
    var $this = this;
    $(document).bind("click",function(){
        $this.selectText($this);
    });
}
Discussion.prototype.selectText = function($this){
    $("mark").not('.highlight-scroll-effect').contents().unwrap();
   $("mark").not('.highlight-scroll-effect').remove();
    //$this.removeEmptyResponses($this);
    var selection = $this.getSelection(); 
    if(selection.toString().length > 2){
        var range = selection.getRangeAt(0);
        var cssclass = $(selection.anchorNode.parentNode).attr("class");
        $this.startPoint = selection.anchorOffset;
        $this.endPoint = selection.extentOffset;
        var newNode = document.createElement("mark");
        range.surroundContents(newNode);
        $("mark").not('.highlight-scroll-effect').attr('title', ' ');

        var pageURL = $(location).attr("href");

        var imgPath = qcld_highlight_ajax_tooltip.QCLD_Highlight_IMG_URL1;
        var imgURL = imgPath +"/twitter-tweet-icon.png";
        var imgMailURL = imgPath +"/facebook.png";

        $("mark").not('.highlight-scroll-effect').tooltip({
            content : "<a class='highlight_tooltip_sidebar_mail' href='http://www.facebook.com/sharer.php?u="+pageURL+"' target='_blank'><img src='"+imgMailURL+"' alt='Send Mail'></a><a class='highlight_tooltip_content' href='https://twitter.com/intent/tweet?text="+selection.toString()+"&url="+pageURL+"' target='_blank'><img src='"+imgURL+"' alt='Twitter'></a>"
        });
        $('mark').not('.highlight-scroll-effect').tooltip('option', 'position', { my: 'center bottom', at: 'center top-10' });
        $("mark").not('.highlight-scroll-effect').on('mouseleave',function(event){
            event.stopImmediatePropagation();
        }).tooltip("open");
    }
}
Discussion.prototype.getSelection = function(){
    if(window.getSelection){
        return window.getSelection();
    }
    else if(document.getSelection){
        return document.getSelection();
    }
    else if(document.selection){
        return document.selection.createRange().text;
    }
}
var discussion = new Discussion();


/*    //Close the right float
    $(document).on('click','#highlight_sidebar-close',function () {
        $('.highlight_sidebar-wrap').removeClass('highlight_sidebar-active');
    });

    //To show right floating
    $(document).on('click','#highlight_sidebar-btn',function () {
        
        $('.highlight_sidebar-wrap').addClass('highlight_sidebar-active');
    
    });
*/

})