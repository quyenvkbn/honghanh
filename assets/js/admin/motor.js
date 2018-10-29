switch(window.location.origin){
    case 'http://diamondtour.vn':
        var HOSTNAME = 'http://diamondtour.vn/';
        break;
    default:
        var HOSTNAME = 'http://localhost/honghanh/';
}
switch(window.location.origin){
    case 'http://diamondtour.vn':
        var HOSTNAMEADMIN = 'http://diamondtour.vn/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/honghanh/admin';
}
var remove_image = new Array();
$('#nav-product').html($('#nav-product1').html());
$(".form-horizontal").on('click','a[aria-controls^="version"]',function(){
    $('.remove.version').removeClass('show');
    $('[aria-controls="'+$(this).attr('aria-controls')+'"] i').addClass('show');
    $('[aria-controls^="version"] span.badge').css('background-color','#777');
    $('[aria-controls="'+$(this).attr('aria-controls')+'"] span').css('background-color','#3366CC');
});
$(".form-horizontal").on('click','.specifications',function(){
	$.validator.setDefaults({
		ignore: ":hidden:not('.col-xs-12.date input')"
	});
	$('#register-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).addClass("input-error");
			$(element).closest('.col-xs-12').addClass("has-errors");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').removeClass("has-errors");
			$(element).removeClass("input-error");
		},
		rules: {
			title: {
				required: true
			},
			parent_id_shared: {
				required: true
			}
		},
		messages: {
			title: {
				required: "Tiêu đề không được trống."
			},
			parent_id_shared: {
				required: "Vui lòng chọn danh mục cha."
			}
		},

	});
	if ($('#register-form').valid() === false){
		if($("select[name=parent_id_shared]").parent().attr("class") == "col-xs-12 has-errors"){
			$("select[name=parent_id_shared]")[0].focus();
		}else{
			$(".col-xs-12.has-errors input")[0].focus();
		}
		return false;
	}else{
		$('#nav-product').html($('#nav-product2').html());
	}
});

function change_title(ev){
    if(ev.value == ''){
        ev.parentElement.classList.add("has-error");
        ev.parentElement.querySelector('span').classList.remove("hidden");
    }else{
        ev.parentElement.querySelector('span').classList.add("hidden");
        ev.parentElement.classList.remove("has-error");
    }
} 
$(".form-horizontal").on('click','.information',function(){
		$('#nav-product').html($('#nav-product1').html());
});

$(".form-horizontal").on('click','.highlights',function(){
        $('#nav-product').html($('#nav-product3').html());
});

function highlights(name,post){
    number_highlights = document.querySelectorAll(`#add-${name} [id^="demo${name}"]`);
    var highlights = [];
    for (var i = 0; i < number_highlights.length; i++) {
        if(number_highlights[i].querySelector('.image').files.length == 0){
            post.append(`${name}_img[]`,i);
        }else{
            post.append(`${name}_img[]`,number_highlights[i].querySelector('.image').files[0]);
        }

        post.append(`${name}title[]`,number_highlights[i].querySelector(`[id^="${name}"] .title`).value);
        post.append(`${name}content[]`,number_highlights[i].querySelector(`[id^="${name}"] .content`).value);
           
    }
        
}

function version(post){
    number_color = document.querySelectorAll(`.content-full-color [id^="colorversion"]`);
    for (var i = 0; i < number_color.length; i++) {
        if(number_color[i].querySelector('.img_color').files.length == 0){
            post.append(`version_img[]`,i);
        }else{
            post.append(`version_img[]`,number_color[i].querySelector('.img_color').files[0]);
        }
    }
}

function submit_shared(){
    id = 'content-full-color';
    for (var i = 0; i < document.querySelectorAll(`.${id} .title`).length; i++) {
        if(document.querySelectorAll(`.${id} .title`)[i].value.trim() == ''){
            document.querySelectorAll(`.${id} .title`)[i].parentElement.classList.add("has-error");
            document.querySelectorAll(`.${id} .title`)[i].setAttribute('oninput','change_title(this)');
            document.querySelectorAll(`.${id} .title`)[i].parentElement.querySelector('span').classList.remove("hidden");
        }
    }
    if(document.querySelectorAll(`.${id} div.has-error`).length > 0){
        number_title = document.querySelectorAll(`.${id} div.has-error .title`);
        parent_id1 = number_title[0].closest('[id^="version"]').id;
        if(number_title[0].closest(`[id^="color${parent_id1}"]`)){
            parent_id2 = number_title[0].closest(`[id^="color${parent_id1}"]`).id;
            document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('class','col-xs-10 check-collapse'); 
            document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('aria-expanded','true'); 
            document.querySelector(`#${parent_id2}`).setAttribute('class','form-group collapse in');
            document.querySelector(`#${parent_id2}`).setAttribute('aria-expanded','true');
            document.querySelector(`#${parent_id2}`).setAttribute('style','');
        }
        number_title[0].focus();
        return false;
    }else{
        var html = `<div class="modal" role="dialog" style="display: block; opacity: 0.5">
                        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
                            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
                        </div>
                    </div>`;
        if(window.location.pathname.indexOf("/motor/edit/") != '-1'){
            var url = window.location.href;
        }else{
            var url = HOSTNAME + 'admin/motor/create';
        }
        var post = new FormData(document.querySelector('form.form-horizontal'));
        highlights('design',post);
        version(post);
        post.append(`remove_image[]`,remove_image);
        for (var i = 0; i < remove_image.length; i++) {
            post.append(`remove_image[]`,remove_image[i]); 
        }
        $.ajax({
                method: "post",
                url: url,
                data: post,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#submit-shared').prop('disabled', true);
                    $('#encypted_ppbtn_all').html(html);
                },
                success: function(response){
                    $("#submit-shared").removeAttr('disabled');
                    $('#encypted_ppbtn_all').html('');
                    if(response.status == 200){
                        csrf_hash = response.reponse.csrf_hash;
                        if (response.isExisted == true) {
                            alert(response.message);
                            if(window.location.pathname.indexOf("/motor/edit/") != '-1'){
                                $("input[name='csrf_honghanh_token']").val(csrf_hash);
                                for (var i = 0; i < response.reponse.design_img.length; i++) {
                                    document.querySelectorAll('#design img')[i].setAttribute('value',response.reponse.design_img[i]);
                                }
                                for (var i = 0; i < response.reponse.version_img.length; i++) {
                                    document.querySelectorAll('#version img')[i].setAttribute('value',response.reponse.version_img[i]);
                                }
                                var remove_image = new Array();
                            }else{
                                window.location.href=HOSTNAMEADMIN+"/product";
                            }
                        }
                    }
                },
                error: function(jqXHR, exception){
                    alert(jqXHR.responseJSON.message);
                    console.log(errorHandle(jqXHR, exception));
                    location.reload();
                }
            });
    }
}
$(".form-horizontal").on('click','.color-products',function(){
    id = 'highlights';
    for (var i = 0; i < document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`).length; i++) {
        if(document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].value.trim() == ''){
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].parentElement.classList.add("has-error");
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].setAttribute('oninput','change_title(this)');
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].parentElement.querySelector('span').classList.remove("hidden");
        }
    }
    if(document.querySelectorAll(`#${id} div.has-error`).length > 0){
        number_title = document.querySelectorAll(`#${id} div.has-error .title`);
        parent_id1 = number_title[0].closest('[id^="add-"]').id.replace('add-','');
        parent_id2 = number_title[0].closest(`[id^="demo${parent_id1}"]`).id;
        document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('class','col-xs-10 check-collapse'); 
        document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('aria-expanded','true'); 
        document.querySelector(`#${parent_id2}`).setAttribute('class','form-group collapse in');
        document.querySelector(`#${parent_id2}`).setAttribute('aria-expanded','true');
        document.querySelector(`#${parent_id2}`).setAttribute('style','');
        number_title[0].focus();
        return false;
    }
	$('#nav-product').html($('#nav-product4').html());
});


function addHighlights(ev){
	number = Number(ev.parentElement.parentElement.querySelector('.number-highlights').value);
	name = ev.parentElement.parentElement.id;
    let [html, count_li] = ['',0];
    if(number <= 0){
        alert(`Số highlights ít nhất phải lớn hơn 0`);
        number_highlights = document.querySelectorAll('[id^="demo"]').length == 0 ? '' : document.querySelectorAll('[id^="demo"]').length;
        document.querySelector('.number-highlights').value = number_highlights;
    	return false;
    }
    for(i = 0; i< number; i++){
        let [count_li , li, content] = [0, '', ''];
        html += `<div class="col-xs-12" style="margin-bottom:4px;"> 
                    <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                        <span data-toggle="collapse" data-target="#demo${name}${i+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                            <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${i+1}</span>
                            <b style="font-size: 1.1em;font-weight: 500;"></b> 
                        </span>
                        <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(${i+1},this)"></i>
                    </div>
                    <div id="demo${name}${i+1}" class="collapse in form-group">
                        <img src="" value="" class="hidden" />
                        <div class="col-xs-12" style="padding: 0px;">
                            <div class="col-sm-12 col-xs-12">
                                <label class="control-label" >Hình ảnh</label>
                                <input type="file" value="" placeholder="" class="form-control image">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                <div class="tab-content">
				                    <div role="tabpanel" class="tab-pane fade active in" id="${name}${i+1}">
				                        <div class="box box-default" style="border-top:none;">
				                            <div class="box-body" style="padding:0px;">
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Tiêu đề</label>
				                                    <input type="text" value="" placeholder="" class="form-control title">
				                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
				                                </div>
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Nội dung</label>
				                                    <textarea value="" placeholder="" class="form-control content"></textarea>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        `;
    }
    ev.parentElement.parentElement.querySelector('[id^="add-"]').innerHTML =  html;
}
function addOneHighlights(ev){
	name = ev.parentElement.parentElement.id;
	let [count_li , li, content, html, number] = [0, '', '', '', document.querySelectorAll(`[id^="demo${name}"]`).length];
        html += `<div class="col-xs-12" style="margin-bottom:4px;"> 
                    <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                        <span data-toggle="collapse" data-target="#demo${name}${number+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                            <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${number+1}</span>
                            <b style="font-size: 1.1em;font-weight: 500;"></b> 
                        </span>
                        <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(${number+1},this)"></i>
                    </div>
                    <div id="demo${name}${number+1}" class="collapse in form-group">
                        <div class="col-xs-12" style="padding: 0px;">
                            <img src="" value="" class="hidden" />
                            <div class="col-sm-12 col-xs-12">
                                <label class="control-label" >Hình ảnh</label>
                                <input type="file" name="image_${name}[]" value="" placeholder="" class="form-control image">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                <div class="tab-content">
				                    <div role="tabpanel" class="tab-pane fade active in" id="${name}${number+1}">
				                        <div class="box box-default" style="border-top:none;">
				                            <div class="box-body" style="padding:0px;">
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Tiêu đề</label>
				                                    <input type="text" value="" placeholder="" class="form-control title">
				                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
				                                </div>
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Nội dung</label>
				                                    <textarea value="" placeholder="" class="form-control content"></textarea>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        `;
    ev.parentElement.parentElement.querySelector('[id^="add-"]').insertAdjacentHTML('beforeend', html);
    document.querySelector(`#${name} .number-highlights`).value = document.querySelectorAll(`[id^="demo${name}"]`).length;
}

function remove_highlights(id,ev){
	ids = ev.closest('[id^="add-"]').parentElement.id.replace('add-','');
    if(document.querySelector(`#demo${ids}${id} img`)){
        remove_image.push(document.querySelector(`#demo${ids}${id} img`).getAttribute('value'));
    }
	ev.closest('[id^="add-"]').removeChild(document.getElementById(`demo${ids}${id}`).parentElement);
	let demo = document.querySelectorAll(`[id^="demo${ids}"]`);
    for (i = id; i <= demo.length; i++) {
        demo[i-1].id = `demo${ids}${i}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"]`).setAttribute('data-target',`#demo${ids}${i}`);
		demo[i-1].querySelector(`.tab-content [id^="${ids}"]`).id = `${ids}${demo[i-1].id.replace(`demo${ids}`, "")}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"] span`).innerHTML = i;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"]`).nextElementSibling.setAttribute('onclick',`remove_highlights(${i},this)`);
    }
    number_highlights = demo.length == 0 ? '' : demo.length;
    document.querySelector(`#${ids} .number-highlights`).value = number_highlights;
}




// thêm nhiều field
function addColor(ev){
    number = Number(document.querySelector(`#version .numbercolor`).value);
    html = '';
    for(i = 0; i< number; i++){
        html += `
            <div class="col-xs-12" style="margin-bottom:4px;">
                <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                    <span data-toggle="collapse" data-target="#colorversion${i+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                        <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${i+1}</span>
                        <b style="font-size: 1.18em;font-weight: 500;"></b> 
                    </span>
                    <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color(${i+1},this)"></i>
                </div>
                <div id="colorversion${i+1}" class="collapse in form-group">
                    <div class="col-xs-12" style="padding:0px;">
                        <img src=" value="" class="hidden" />
                        <div class="col-xs-12">
                            <label class="control-label" for="inputError">Hình ảnh sản phẩm theo màu sắc</label>
                            <input type="file" value="" placeholder="" class="form-control img_color">
                        </div>
                        <div class="col-xs-12" style="margin-bottom:5px;">
                            <label class="control-label" for="inputError">Mã sản phẩm</label>
                            <input type="text" value="" name="codeversion[]" placeholder="" class="form-control code_color">
                        </div>
                        <div class="tab-content">
		                    <div role="tabpanel" class="tab-pane fade active in">
		                        <div class="" style="border-top:none;">
		                            <div class="box-body" style="padding:0px;">
		                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
		                                    <div class="col-md-12" style="margin-top:5px;">
		                                        <label class="control-label" for="">Nhập tên màu sắc cho sản phẩm</label>
		                                        <input type="text" name="titleversion[]" class="form-control title" />
		                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
                        </div>
                        <div class="col-xs-12" style="margin-bottom:5px;">
                            <label class="control-label" for="inputError">Giá sản phẩm</label>
                            <input type="text" name="priceversion[]" value="" placeholder="" class="form-control price_color">
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    document.querySelector(`#version .content-full-color`).innerHTML = html;
}

// thêm 1 field
function addOneColor(ev){
    number = Number(document.querySelector(`#version .numbercolor`).value);
    let html = '';
    html += `
        <div class="col-xs-12" style="margin-bottom:4px;">
            <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                <span data-toggle="collapse" data-target="#colorversion${number+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                    <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${number+1}</span>
                    <b style="font-size: 1.18em;font-weight: 500;"></b> 
                </span>
                <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color(${number+1},this)"></i>
            </div>
            <div id="colorversion${number+1}" class="collapse in form-group">
                <div class="col-xs-12" style="padding:0px;">
                    <img src=" value="" class="hidden" />
                    <div class="col-xs-12">
                        <label class="control-label" for="inputError">Hình ảnh cho sản phẩm</label>
                        <input type="file" value="" placeholder="" class="form-control img_color">
                    </div>
                    <div class="col-xs-12" style="margin-bottom:5px;">
                        <label class="control-label" for="inputError">Mã sản phẩm</label>
                        <input type="text" value="" name="codeversion[]" placeholder="" class="form-control code_color">
                    </div>
                    <div class="tab-content">
		                <div role="tabpanel" class="tab-pane fade active in">
		                    <div class="" style="border-top:none;">
		                        <div class="box-body" style="padding:0px;">
		                            <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
		                                <div class="col-md-12" style="margin-top:5px;">
		                                    <label class="control-label" for="">Nhập tên màu sắc cho sản phẩm</label>
		                                    <input type="text" name="titleversion[]" class="form-control title" />
		                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    </div>
                    <div class="col-xs-12" style="margin-bottom:5px;">
                        <label class="control-label" for="inputError">Giá sản phẩm</label>
                        <input type="text" name="priceversion[]" value="" placeholder="" class="form-control price_color">
                    </div>
                </div>
            </div>
        </div>
    `;
    document.querySelector(`#version .content-full-color`).insertAdjacentHTML('beforeend', html);
    document.querySelector(`#version .numbercolor`).value = number+1;
}



function remove_color(id,ev){
    if(document.querySelector(`#colorversion${id} img`)){
        remove_image.push(document.querySelector(`#colorversion${id} img`).getAttribute('value'));
    }
    document.querySelector(`#version .content-full-color`).removeChild(document.querySelector(`#colorversion${id}`).parentElement);
    let demo = document.querySelectorAll(`#version .content-full-color [id^="colorversion"]`);
    for (i = id; i <= demo.length; i++) {
        demo[i-1].id = `colorversion${i}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#colorversion"]`).setAttribute('data-target',`#colorversion${i}`);
        demo[i-1].parentElement.querySelector(`span[data-target^="#colorversion"] span`).innerHTML = i;
        demo[i-1].parentElement.querySelector(`span[data-target^="#colorversion"]`).nextElementSibling.setAttribute('onclick',`remove_color(${i},this)`);
    }
    document.querySelector(`#version .numbercolor`).value = demo.length;
}








