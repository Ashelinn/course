$(document).ready(function() {

    $('#tbody form').submit(function (e){
        e.preventDefault();

        let formId = $(this).attr('id');
        let formData = new FormData(document.getElementById(formId));

        $.ajax({
            url: $(this).attr('action'),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            cache:false,
            contentType: false,
            processData: false,
            dataType: 'json',
            data: formData,
            success: function (response){
                let name = `string_${formId}`;
                $(`#${name}`).replaceWith(getNewString(response));
            }
        });
        return false;
    })

    function getNewString(res) {
        console.log(res);
        let role = res['user']['role_id'];
        let role_name = '';
        let role_variant = '';
        let role_name_id = 0;
        let role_variant_id = 0;
        let path = `http://127.0.0.1:8000/admin/ajaxrole-store/`;

        if (role == 1) {
            role_name = res['roles'][0]['role_name'];
            role_name_id = res['roles'][0]['id'];
            role_variant = res['roles'][1]['role_name'];
            role_variant_id = res['roles'][1]['id'];
        }
        else {
            role_name = res['roles'][1]['role_name'];
            role_name_id = res['roles'][1]['id'];
            role_variant = res['roles'][0]['role_name'];
            role_variant_id = res['roles'][0]['id'];
        }

        let ud_form = "<input type='hidden' name='_token' value='"+$('meta[name="csrf-token"]')
            .attr('content')+"'>";

        return `<tr id="string_form-role-`+res['user']['id']+`">
        <form action="`+path+res['user']['id']+`" method="POST" class="form-control" id="form-role-`+res['user']['id']+`">
            `+ud_form+`
            <td>`+res['user']['id']+`</td>
            <td>`+res['user']['name']+`</td>
            <td>`+res['user']['email']+`</td>
            <td>`+role_name+`</td>
        <td>
            <label for="roles_id">Изменить роль:</label>
                <select name="roles_id" id="roles_id">
                    <option selected>`+role_name+`</option>
                        <option value="`+role_name_id+`">`+role_name+`</option>
                        <option value="`+role_variant_id+`">`+role_variant+`</option>
                    </select>
                    <button type="submit" name="confirm" class="btn btn-success">ok</button>
        </td>
    </form>
    </tr>`;
    }
});
