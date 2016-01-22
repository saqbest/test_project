$(document).ready(function () {
    $('#submit-btn').click(function (e) {
        e.stopPropagation();
        if ($('#FileInput').prop('files').length > 0 && !beforeSubmit()) {
            var data = new FormData();
            data.append('FileInput', $('#FileInput').prop('files')[0]);
            $.ajax({
                url: '/site/imageupload',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data, textStatus, jqXHR) {
                    if (data.status = 'success') {
                        window.location.href = data.url;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            })
        }
        else {
            $("#output").html("Are you kidding me?");

        }
        function beforeSubmit() {
            if (window.File && window.FileReader && window.FileList && window.Blob)
            {
                var fsize = $('#FileInput')[0].files[0].size; //get file size
                var ftype = $('#FileInput')[0].files[0].type; // get file type

                switch (ftype) {
                    case 'image/png':
                    case 'image/gif':
                    case 'image/jpeg':
                        break;
                    default:
                        $("#output").html("<b>" + ftype + "</b> Unsupported file type!");
                        return false
                }
                if (fsize > 5242880) {
                    $("#output").html("<b>" + bytesToSize(fsize) + "</b> Too big file! <br />File is too big, it should be less than 5 MB.");
                    return false
                }
                $("#output").html("");
            }
            else {
                $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                return false;
            }
        }
    });
});
