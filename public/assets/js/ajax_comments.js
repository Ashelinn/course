$(document).ready(function (){

    let form = $('#addcomment-form');

    form.submit(function (e){
        e.preventDefault();

        let formData = new FormData(document.getElementById("addcomment-form"));

        $.ajax({
            url: 'http://127.0.0.1:8000/course/ajax-store',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            cache:false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (response){
                console.log(response);
                $('#comment_list .comment-wrap:first').before(getNewComment(response));
                $('#addcomment-form')[0].reset();
            }
        });
    })


    function getNewComment(res) {

        return "<div class='comment-wrap'><h4>"+res['user_name']+"</h4><p>"+res['text']+"</p></div>";
    }

})
