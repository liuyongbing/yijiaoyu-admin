$(function() {
    // 初始化公司下拉框是否显示，模版上面初始化有js未加载完导致问题，这里js初始化
    if ($("form input[name='type']:checked").val() == 'individual') {
        $("form select[name='company_id']").parents(".form-group").hide();
    }

    // 用户使用类型切换
    $("form input[name='type']").click(function(){
        var type = $(this).val();
        if (type == 'company') {
            $("form select[name='company_id']").parents(".form-group").show();
        } else {
            $("form select[name='company_id']").parents(".form-group").hide();
        }
    });
    $(document).off('click.bs.dropdown.data-api');
    var $dropdownLi = $('.navbar-nav >li');

    $dropdownLi.mouseover(function() {
        $(this).addClass('open');
    }).mouseout(function() {
        $(this).removeClass('open');
    });
});