//<![CDATA[
/**
 * Admin Common JQuery 原型扩展方法
 * JQuery prototype extend Method [initPicker]
 */
$.fn.extend({
	/**
	 * 取色器面板
	 * @param {Object} picker
	 */
	initPicker: function(picker){
		var obj = $(this);
		var picker = $(picker).extend({
			showMenu:function(sub){
				$(sub).parent().find("div.picker").slideDown("fast");
				$(sub).parent().hover(function(){
					return false;
                }, function(){
                    $(sub).parent().find("div.picker").slideUp('fast');
                });
			}
		}).hover(
			function(){
				picker.showMenu(this);
				obj.farbtastic(picker);
			},
			function(){
				return false;
			}
		);
	},
	/**
	 * 初始化清空颜色
	 */
	initClearColor: function(color){
		var main = this.click(function(){
			$(color).val("#").css({"background-color": "#F9F9F9"});
		});
	},
    /**
     * 初始化表格行选中
     */
    initTableTrSelected: function(){
        this.find("tr > td").not(":first-child").click(function(e){
            var obj = $(this).parent();
            if(obj.hasClass('selected'))
            {
                obj.removeClass('selected');
            } else
            {
                obj.addClass('selected');
            }
        });
    },
    /**
     * 初始化三级菜单的下拉菜单
     */
    initSubTab: function(){
        var subtab = $("div.subtab");
        this.click(function(){
            subtab.mouseover(function(){
                subtab.show();
            }).mouseout(function(){
                subtab.hide();
            });
            subtab.toggle();
        });
    }
});

/**
 * 确认删除
 * @param url 跳转的地址
 * @param msg 提示信息
 */
function confirmDel(url, msg) {
	msg = msg || '确认要删除吗?';
	if (confirm(msg)) {
		window.location.href = url;
	}
}

/**
 * 绑定全选
 * @param o 全选按钮对象
 * @param checkbox 被选择的对象
 */
function bindSelectAll(o, checkbox) {
	var $o = $(o);
	var $checkbox = $(checkbox);
	$o.click(function (e) {
		if (this.checked) {
			for(var i = 0; i < $checkbox.length; i++) {
				var e = $checkbox[i];
				if(!e.disabled) {
					e.checked = this.checked;
				}
			}
		} else {
			$checkbox.removeAttr('checked');
		}
	});

    $checkbox.change(function (e) {
        if (this.checked) {
            $chkbox = $(checkbox+"[disabled!=true]");
            for (var i=0; i < $chkbox.length; i++) {
                if (!$chkbox.eq(i).attr('checked')) {
                    return;
                }
            }
            $o.attr('checked', true);
        } else {
            $o.removeAttr('checked');
        }
    });
}

/**
 * 获取选中的值
 * @param o 对象
 * @param spliter 分隔符
 * @returns
 */
function getSelectedValues(o, spliter) {
	var $o = $(o).filter(':checked');
	var spliter = spliter || ',';
	var values = [];
	$o.each(function() {
		values.push(this.value);
	});
	return values.join(spliter);
}

/**
 * 显示页面对象
 * @param id
 */
function showObj(id) {
    $("#" + id).show();
}

/**
 * 隐藏页面对象
 * @param id
 */
function hideObj(id) {
    $("#" + id).hide();
}

/**
 * Loading...
 *
 * @type {{show: show, hide: hide}}
 */
window.tinyLoading = {
    show: function( target ) {
        var loadingEl = $( '<div class="tiny-loading"><img alt="Loading..." src="/asset/images/tiny-loading.gif"/></div>' );
        loadingEl.css({
            display: target.css( "display" ),
            "float": target.css( "float" ),
            position: target.css( "position" ),
            top: target.css( "top" ),
            left: target.css( "left" ),
            width: target.outerWidth(),
            height: target.outerHeight(),
            "line-height": target.outerHeight() + "px"
        }).insertBefore( target );

        target.hide()
            .data( "loadingEl", loadingEl );
    },
    hide: function( target ) {
        target.show()
            .data( "loadingEl" )
            .remove();
    }
};

/**
 * 信息提示
 *
 * @type {{show: show, clear: clear}}
 */
window.Tips = {
    show: function( opt ) {
        opt = $.extend({
            color: "red",
            autoHide: true
        },opt );
        if ( !opt.target || !opt.content ) return;
        alert(opt.content);
        opt.target.focus();
        /*opt.target.next( ".valid-tip" ).remove();
        $( "<span class=valid-tip>" + opt.content + "</span>" )
            .css({
                "color": "red",
                "marginLeft": "10px"
            })
            .insertAfter( opt.target )
            .delay( 5000 )
            .fadeOut( function() {
                $( this ).remove();
            });*/
    },
    clear: function() {
        $( "span.valid-tip" ).remove();
    }
};

/**
 * 结果信息
 *
 * @param options
 * @returns {boolean}
 */
window.resultMsg = function( options ) {
    var opts = $.extend( {
            msg: "保存成功",
            type: "success",
            delay: 10000,
            css: {}
        }, options ),
        $msg = opts.target.next( "span.result-msg" );

    if ( !opts.target ) return false;
    if ( $msg.length ) $msg.remove();

    $( "<span/>", {
        text: options.msg || opts.msg,
        "class": "result-msg",
        css: options.css || opts.css
    }).addClass( opts.type )
        .insertAfter( opts.target )
        .delay( opts.delay )
        .fadeOut();
};
//]]>
