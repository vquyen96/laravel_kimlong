$(document).ready(function () {
    $(document).on('click', '.btnAddBanner', function () {
        $(this).parents('.row').next().attr('style', 'display: flex !important');
        $(this).parents('.row').hide();

    });
    $('.add-image').click(function(){
        $(this).prev('.file').click();
    });

});
function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $(input).next('.add-image').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}